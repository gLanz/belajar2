<?php
// controller/petugas.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$query = $this->db->query("SELECT a.*, b.username FROM tbl_petugas a LEFT JOIN tbl_login b ON a.id_login=b.id_login")->result();
		$data['query'] = $query;

		$this->load->view('petugas_view.php',$data);
	}

	public function tambah()
	{
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$this->load->view('petugas_tambah_view.php',@$data);
	}

	public function edit()
	{
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$kode = $this->input->get('kode');
		$rowpetugas = $this->db->query("SELECT a.*, b.username, b.password FROM tbl_petugas a LEFT JOIN tbl_login b ON a.id_login=b.id_login WHERE a.id_petugas='$kode'")->row();
		
		$data['row'] = $rowpetugas;
 
		$this->load->view('petugas_edit_view.php',$data);
	}



 	public function prosestambah(){
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan'); 
		$jk = $this->input->post('jk'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$old_password = $this->input->post('old_password');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('jabatan', 'Jabtan', 'required'); 
	    $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'trim|required');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required');

	    if ($this->form_validation->run() === TRUE){
	    	 
	    	$datalogin = array(
	    		'nama' =>$nama,
	    		'username' => $username,
	    		'password' => sha1($password)
	    	);
	    	$this->db->insert("tbl_login",$datalogin);
        	$idlogin = $this->db->insert_id(); 



	    	$datapetugas = array(
	    		'nama' => $nama,
	    		'jabatan' => $jabatan, 
	    		'jenis_kelamin' => $jk,
 	    		'id_login' => $idlogin
	    	);

	    	$this->db->insert("tbl_petugas",$datapetugas);
        	$idpasien = $this->db->insert_id(); 

	    	$this->session->set_flashdata('message_sukses','Pasien berhasil ditambah');
			redirect('petugas');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Petugas Gagal ditambah, silakan cek field isian'.$err_msg);
			redirect('petugas/tambah');
		}
	}

	public function prosesedit(){
		$idpetugas = $this->input->post('idpetugas');
		$idlogin = $this->input->post('idlogin');
		$old_password = $this->input->post('old_password');
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan'); 
		$jk = $this->input->post('jk'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('jabatan', 'Jabtan', 'required'); 
	    $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'trim|required');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required');

	    if ($this->form_validation->run() === TRUE){
	    	 
	    	$datalogin = array(
	    		'nama' =>$nama,
	    		'username' => $username, 
	    	);

	    	if($old_password!=$password){
	    		$datalogin['password'] = sha1($password);
	    	}
	    	$this->db->where(array('id_login'=>$idlogin));
	    	$this->db->update("tbl_login",$datalogin); 

        	

	    	$datapetugas = array(
	    		'nama' => $nama,
	    		'jabatan' => $jabatan, 
	    		'jenis_kelamin' => $jk,
	    	);
	    	$this->db->where(array('id_petugas'=>$idpetugas));
	    	$this->db->update("tbl_petugas",$datapetugas);
 
	    	$this->session->set_flashdata('message_sukses','Pasien berhasil diperbaharui');
			redirect('petugas');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Petugas Gagal diperbaharui, silakan cek field isian'.$err_msg);
			redirect('petugas/edit');
		}
	}

	public function hapus(){
		$kode = $this->input->get('kode');
		$kode2 = $this->input->get('kode2');

		$this->db->where(array('id_petugas'=>$kode));
        $this->db->delete('tbl_petugas');

        $this->db->where(array('id_login'=>$kode2));
        $this->db->delete('tbl_login');
        if ( $this->db->affected_rows() == 1 ) {
            $this->session->set_flashdata('message_sukses','Pasien berhasil diperbaharui'); 
        }else{
        	$this->session->set_flashdata('message_sukses','Pasien berhasil dihapus');
			$this->session->set_flashdata('message_error','Petugas gagal dihapus');
		}
		redirect('petugas');
	}

}
