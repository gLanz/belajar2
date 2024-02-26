<?php
// controller/pemeriksaan.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller {

	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
		$data['title'] = 'Imunisasi';
		$data['menu'] = 'imunisasi';

		@$key = $this->input->get('key');
		$data['key'] = $key;

		if($key!=""){
			$query = $this->db->query("SELECT *FROM tbl_balita WHERE (nama_balita LIKE '%$key%' OR id_balita LIKE '%$key%')")->result();
			$data['query'] = $query;
		}

		$data['query2'] = $this->db->query("SELECT a.*, b.nama_balita, b.jenkel_balita as jenis_kelamin FROM tbl_daftar a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita WHERE status='Periksa'")->result();

		$this->load->view('pemeriksaan_view',@$data);
	}

	public function daftarlist(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
 
		$data['title'] = 'List Pendaftaran Imunisasi';
		$data['menu'] = 'daftar';

		$data['rowdaftar'] = $this->db->query("SELECT a.*, b.nama_balita, b.tanggal_lahir FROM tbl_daftar a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita WHERE (a.status='Daftar' OR a.status='Periksa')")->result();
		$this->load->view('pemeriksaan_view_daftar_list',@$data);
	}	

	public function daftar(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
 
		$data['title'] = 'Pendaftaran Imunisasi';
		$data['menu'] = 'daftar';

		$data['rowbalita'] = $this->db->query("SELECT *FROM tbl_balita")->result(); 
		$today = date('Y-m-d');
		$data['nomorantrian'] = $this->db->query("SELECT max(no_antrian) as noantri FROM tbl_daftar WHERE tgl_daftar='$today'")->row();
		$this->load->view('pemeriksaan_view_daftar',@$data);
	}	

	public function daftar2(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
 
		$data['title'] = 'Pendaftaran Imunisasi';
		$data['menu'] = 'daftar';
		$kode =$this->input->get('kode');
		$data['row'] = $this->db->query("SELECT a.*, b.nama_balita FROM tbl_daftar a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita WHERE a.id_daftar='$kode'")->row(); 
		$today = date('Y-m-d');
		$data['nomorantrian'] = $this->db->query("SELECT max(no_antrian) as noantri FROM tbl_daftar WHERE tgl_daftar='$today'")->row();
		$this->load->view('pemeriksaan_view_daftar2',@$data);
	}

	public function prosesdaftar(){
		$idbalita = $this->input->post('balita');
		$tgldaftar = $this->input->post('tgldaftar');
		$tinggi = $this->input->post('tinggi');
		$berat = $this->input->post('berat');
		$keluhan = $this->input->post('keluhan');
		$antrian = $this->input->post('noantri');

		$this->form_validation->set_rules('balita', 'Balita', 'trim|required');
	    $this->form_validation->set_rules('tgldaftar', 'Tanggal', 'required');
	    $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
	    $this->form_validation->set_rules('berat', 'Berat', 'required');

	    if ($this->form_validation->run() === TRUE){
	    	$datadaftar = array(
	    		'id_balita' => $idbalita,
	    		'id_petugas' => $this->session->userdata('idsession'),
	    		'tgl_daftar' => $tgldaftar,
	    		'tinggi' => $tinggi,
	    		'berat' => $berat,
	    		'no_antrian' => $antrian,
	    		'keluhan' => $keluhan,
	    		'status' => 'Periksa'
	    	);
	    	$this->db->insert("tbl_daftar",$datadaftar);

	    	$this->session->set_flashdata('message_sukses','Pendaftaran antrian berhasil ditambah');
			redirect('pemeriksaan/daftarlist');

	    }else{
	    	//proses gagal
			$err_msg = validation_errors();
			$data_error = array(
				'no_antrian' => $antrian,
				'no_antrian' => $tgldaftar,
				'tinggi' => $tinggi,
				'berat' => $berat,
				'keluhan' => $keluhan,
			);
			$this->session->set_flashdata('message_error','Pendaftaran Gagal, silakan cek field isian'.$err_msg,);
			redirect('pemeriksaan/daftar');
		}
	}	

	public function prosesdaftar2(){
		$idbalita = $this->input->post('balita');
		$iddaftar = $this->input->post('iddaftar');
		$tinggi = $this->input->post('tinggi');
		$berat = $this->input->post('berat');
		$keluhan = $this->input->post('keluhan');
		$antrian = $this->input->post('noantri');
  
	    $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
	    $this->form_validation->set_rules('berat', 'Berat', 'required');

	    if ($this->form_validation->run() === TRUE){
	    	$datadaftar = array( 
	    		'id_petugas' => $this->session->userdata('idsession'), 
	    		'tinggi' => $tinggi,
	    		'berat' => $berat,
	    		'no_antrian' => $antrian,
	    		'keluhan' => $keluhan,
	    		'status' => 'Periksa'
	    	);
	    	$this->db->where(array('id_daftar'=>$iddaftar));
	    	$this->db->update("tbl_daftar",$datadaftar);

	    	$this->session->set_flashdata('message_sukses','Pendaftaran antrian berhasil diperbaharui');
			redirect('pemeriksaan/daftar2');

	    }else{
	    	//proses gagal
			$err_msg = validation_errors();
		 
			$this->session->set_flashdata('message_error','Pendaftaran Gagal, silakan cek field isian'.$err_msg,);
			redirect('pemeriksaan/daftar2/?kode='.$iddaftar);
		}

	}

	public function periksa(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = 'Pemberian Vaksin Imunisasi';
		$data['menu'] = 'imunisasi';

		$iddaftar = $this->input->get('kode');
		$data['rowdaftar'] = $this->db->query("SELECT a.*, b.nama_balita, b.jenkel_balita as jenis_kelamin, b.tanggal_lahir FROM tbl_daftar a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita WHERE a.id_daftar='$iddaftar'")->row(); 

		$idbalita = $data['rowdaftar']->id_balita;

		$data['rowvaksin'] = $this->db->query("SELECT *FROM tbl_vaksin")->result();
		$data['rowdokter'] = $this->db->query("SELECT *FROM tbl_dokter")->result();
		$data['rowrekammedis'] = $this->db->query("SELECT a.*, c.nama_vaksin,d.nama_dokter, e.tinggi, e.berat FROM tbl_imunisasi a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita LEFT JOIN tbl_vaksin c ON a.id_vaksin=c.id_vaksin LEFT JOIN tbl_dokter d ON a.id_dokter=d.id_dokter LEFT JOIN tbl_daftar e ON a.id_daftar=e.id_daftar WHERE a.id_balita='$idbalita' ORDER BY a.tgl_vaksin DESC")->result();
 		$this->load->view('pemeriksaan_view_periksa',@$data);
	}	



	public function prosesTambah(){
		$idbalita = $this->input->post('idbalita');
		$iddaftar = $this->input->post('iddaftar');
		$vaksin = $this->input->post('vaksin');
		$dokter = $this->input->post('dokter'); 
		$tindakan = $this->input->post('tindakan');

		$this->form_validation->set_rules('vaksin', 'vaksin', 'trim|required');
	    $this->form_validation->set_rules('dokter', 'dokter', 'required');
	    $this->form_validation->set_rules('tindakan', 'tindakan', 'required');

	    if ($this->form_validation->run() === TRUE){
	    	//proses simpan
	    	$datasimpan = array(
	    		'id_balita' => $idbalita,
	    		'id_petugas' => $this->session->userdata('idsession'),
	    		'id_dokter' => $dokter,
	    		'id_daftar' => $iddaftar,
	    		'id_vaksin' => $vaksin,
	    		'tindakan' => $tindakan,
	    		'tgl_vaksin' => date('Y-m-d'),
	    	);

	    	$this->db->insert("tbl_imunisasi",$datasimpan); 


	    	$this->db->where(array('id_daftar'=>$iddaftar));
	    	$this->db->update("tbl_daftar",array('status'=>'Selesai'));

	    	echo json_encode(array('status'=>'sukses','pesan'=>'Berhasil ditambah'));

	    }else{
	    	//proses gagal
			$err_msg = validation_errors();
			
			echo json_encode(array('status'=>'error','pesan'=>'Gagal ditambah '.$err_msg));
		}
	}
}