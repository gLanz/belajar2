	<?php
// controller/admin.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$query = $this->db->query("SELECT *FROM tbl_pasien")->result();
		$data['query'] = $query;

		$this->load->view('pasienview.php',$data);
	}

	public function tambah(){
		$query_obat = $this->db->query("SELECT *FROM tbl_obat")->result();
		$data['qobat'] = $query_obat;
		$this->load->view('pasien_tambah_view.php',$data);
	}

	public function edit(){
		$kode = $this->input->get('kode');
		$rowpasien = $this->db->query("SELECT a.*, b.username, b.password FROM tbl_pasien a LEFT JOIN tbl_login b ON a.id_login=b.id WHERE a.id_pasien='$kode'")->row();
		$data['row'] = $rowpasien;

		$query_obat = $this->db->query("SELECT *FROM tbl_obat")->result();
		$data['qobat'] = $query_obat;
		$this->load->view('pasien_edit_view.php',$data);
	}

 	public function prosesdaftar(){
		$nama = $this->input->post('nama');
		$tgllahir = $this->input->post('tgllahir');
		$hp = $this->input->post('hp');
		$jk = $this->input->post('jk');
		$alamat = $this->input->post('alamat');
		$alergi = $this->input->post('alergi');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
	    $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required');
	    $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'trim|required');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required');

	    if ($this->form_validation->run() === TRUE){
	    	$datalogin = array(
	    		'username' => $username,
	    		'password' => sha1($password),
	    		'nama' => $nama
	    	);
	    	$this->db->insert('tbl_login',$datalogin);
	    	$idlogin = $this->db->insert_id();

	    	$datapasien = array(
	    		'nama_pasien' => $nama,
	    		'tgl_lahir' => $tgllahir,
	    		'no_hp' => $hp,
	    		'jenis_kelamin' => $jk,
	    		'alamat' => $alamat,
	    		'id_login' => $idlogin
	    	);

	    	$this->db->insert("tbl_pasien",$datapasien);
        	$idpasien = $this->db->insert_id();

	    	$dataalergi = array(
	    		'id_pasien' => $idpasien,
	    		'id_obat' => $alergi
	    	);
	    	$this->db->insert('tbl_alergi_obat',$dataalergi);



	    	$this->session->set_flashdata('message_sukses','Pasien berhasil ditambah');
			redirect('pasien');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Pasien Gagal ditambah, silakan cek field isian'.$err_msg);
			redirect('pasien/tambah');
		}
	}

	public function prosesedit(){}


}
