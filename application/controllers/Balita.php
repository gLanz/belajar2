<?php
// controller/balita.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Balita extends CI_Controller {
	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
		$data['title'] = "Balita";
		$data['menu'] = "balita";
		
		$query = $this->db->query("SELECT *FROM tbl_balita")->result();
		$data['query'] = $query;

		$this->load->view('balita_view.php',$data);
	}

	public function tambah(){ 
		$data['title'] = "Tambah balita";
		$data['menu'] = "balita";
		$this->load->view('balita_view_tambah.php',$data);
	}

	public function edit(){
		$data['title'] = "Edit data balita";
		$data['menu'] = "balita";

		$kode = $this->input->get('kode'); 
		
		$rowbalita = $this->db->query("SELECT a.*, b.username, b.password FROM tbl_balita a LEFT JOIN tbl_login b ON a.id_login=b.id_login WHERE a.id_balita='$kode'")->row();
		$data['row'] = $rowbalita;
 
		$this->load->view('balita_view_edit.php',$data);
	}	

	public function detail(){
		$data['title'] = "Profil data balita";
		$data['menu'] = "balita";

		$kode = $this->input->get('kode'); 
		 
		$data['rowbalita'] = $this->db->query("SELECT a.*,a.jenkel_balita as jenis_kelamin, b.username, b.password FROM tbl_balita a LEFT JOIN tbl_login b ON a.id_login=b.id_login WHERE a.id_balita='$kode'")->row();
 		$data['rowrekammedis'] = $this->db->query("SELECT a.*, c.nama_vaksin,d.nama_dokter, e.tinggi, e.berat FROM tbl_imunisasi a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita LEFT JOIN tbl_vaksin c ON a.id_vaksin=c.id_vaksin LEFT JOIN tbl_dokter d ON a.id_dokter=d.id_dokter LEFT JOIN tbl_daftar e ON a.id_daftar=e.id_daftar WHERE a.id_balita='$kode' ORDER BY a.tgl_vaksin DESC")->result();

		$this->load->view('balita_view_detail.php',$data);
	}

 	public function prosestambah(){
		$var_nama = $this->input->post('nama');
		$var_tgllahir = $this->input->post('tgllahir');
		$var_hp = $this->input->post('hp');
		$var_jk = $this->input->post('jk');
		$var_alamat = $this->input->post('alamat');
		$var_alergi = $this->input->post('alergi');
		$var_username = $this->input->post('username');
		$var_password = $this->input->post('password');

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
	    		'nama' => $nama,
	    		'group' => '3',
	    	);
	    	$this->db->insert('tbl_login',$datalogin);
	    	$var_idlogin = $this->db->insert_id();

	    	
	    	$datapasien = array(
	    		'nama_pasien' => $var_nama,
	    		'tgl_lahir' => $var_tgllahir,
	    		'no_hp' => $var_hp,
	    		'jenis_kelamin' => $var_jk,
	    		'alamat' => $var_alamat,
	    		'id_login' => $var_idlogin
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

	public function prosesedit(){
		$var_nama = $this->input->post('nama');
		$var_tgllahir = $this->input->post('tgllahir');
		$var_hp = $this->input->post('hp');
		$var_jk = $this->input->post('jk');
		$var_alamat = $this->input->post('alamat');
		$var_ayah = $this->input->post('ayah');
		$var_ibu = $this->input->post('ibu');
		$var_username = $this->input->post('username');
		$var_password = $this->input->post('password');
		$old_password = $this->input->post('oldpassword');
		
		$idbalita = $this->input->post('idbalita');
		$idlogin = $this->input->post('idlogin');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
	    $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required');
	    $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'trim|required');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required'); 

	    if ($this->form_validation->run() === TRUE){
	    	
	    	$datalogin = array(
	    		'nama' =>$var_nama,
	    		'username' => $var_username, 
	    		'group' => '3',
	    	);

	    	if($idlogin==""){
	    		$this->db->insert('tbl_login',$datalogin);
	    		$var_idlogin = $this->db->insert_id();
	    	}else{
		    	if($old_password!=$var_password){
		    		$datalogin['password'] = sha1($var_password);
		    	}
		    	$this->db->where(array('id_login'=>$idlogin));
		    	$this->db->update("tbl_login",$datalogin); 
		    }
	    	
	    	$databalita = array(
	    		'nama_balita' => $var_nama,
	    		'tanggal_lahir' => $var_tgllahir,
	    		'no_hp' => $var_hp,
	    		'jenkel_balita' => $var_jk,
	    		'alamat' => $var_alamat,
	    		'nama_ibu' => $var_ayah,
	    		'nama_ayah' => $var_ibu 
	    	);

	    	if($idlogin ==""){
	    		$databalita['id_login'] = $var_idlogin;
	    	}
 
	    	$this->db->where(array('id_balita'=>$idbalita));
	    	$this->db->update("tbl_balita",$databalita);
 

	    	$this->session->set_flashdata('message_sukses','Balita berhasil diperbaharui');
			redirect('balita');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Balita Gagal diperbaharui, silakan cek field isian'.$err_msg);
			redirect('balita/edit/?kode='.$idbalita);
		}
	}

 
	public function hapus(){
		$kode = $this->input->get('kode');
		$kode2 = $this->input->get('kode2');

		//hapus dari tabel login
		$this->db->where(array('id_login'=>$kode2));
        $this->db->delete('tbl_login');

		//hapus dati tabel balita
		$this->db->where(array('id_balita'=>$kode));
        $this->db->delete('tbl_balita');

		//hapus dati tabel daftar
		$this->db->where(array('id_balita'=>$kode));
        $this->db->delete('tbl_daftar');

		//hapus dati tabel daftar
		$this->db->where(array('id_balita'=>$kode));
        $this->db->delete('tbl_imunisasi');




        if ( $this->db->affected_rows() == 1 ) {
            $this->session->set_flashdata('message_sukses','Pasien berhasil diperbaharui'); 
        }else{ 
			$this->session->set_flashdata('message_error','Pasien gagal dihapus');
		}
		redirect('petugas');
	}
}
