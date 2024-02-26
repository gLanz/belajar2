<?php
// controller/jadwal.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Jadwal Dokter";
		$data['menu'] = "jadwal";

		$query = $this->db->query("SELECT a.*, b.nama_dokter FROM tbl_jadwal a LEFT JOIN tbl_dokter b ON a.id_dokter=b.id_dokter")->result();
		$data['query'] = $query;

		$this->load->view('jadwal_view.php',$data);
	}

	public function tambah(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Tambah jadwal dokter";
		$data['menu'] = "jadwal";
		$data['rowdokter'] = $this->db->query("SELECT a.* FROM tbl_dokter a")->result();
		$this->load->view('jadwal_view_tambah.php',@$data);
	}

	public function edit(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Edit jadwal dokter";
		$data['menu'] = "jadwal";
		
		$kode = $this->input->get('kode');
		$data['row'] = $this->db->query("SELECT a.* FROM tbl_jadwal a  WHERE a.id_jadwal='$kode'")->row();
		$data['rowdokter'] = $this->db->query("SELECT a.* FROM tbl_dokter a")->result(); 
 
		$this->load->view('jadwal_view_edit.php',$data);
	}

 	public function prosestambah(){
		$dokter = $this->input->post('dokter');  
		$jadwal = $this->input->post('jadwal');   

		$this->form_validation->set_rules('dokter', 'dokter', 'trim|required');
	    $this->form_validation->set_rules('jadwal', 'jadwal', 'required');   
	    if ($this->form_validation->run() === TRUE){
 
	    	$dataJadwal = array(
	    		'id_dokter' => $dokter, 
	    		'jadwal' => $jadwal 
	    	);

	    	$this->db->insert("tbl_jadwal",$dataJadwal);
        	$idpasien = $this->db->insert_id(); 

	    	$this->session->set_flashdata('message_sukses','Jadwal berhasil ditambah');
			redirect('jadwal');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Jadwal Gagal ditambah, silakan cek field isian'.$err_msg);
			redirect('jadwal/tambah');
		}
	}

	public function prosesedit(){
		$idjadwal = $this->input->post('idjadwal'); 
		$dokter = $this->input->post('dokter');
		$jadwal = $this->input->post('jadwal');  

		$this->form_validation->set_rules('dokter', 'dokter', 'trim|required');
	    $this->form_validation->set_rules('jadwal', 'jadwal', 'required');  
	    if ($this->form_validation->run() === TRUE){
	    	 
	     
	    	$datadokter = array(
	    		'id_dokter' => $dokter,
	    		'jadwal' => $jadwal,  
	    	);
	    	$this->db->where(array('id_jadwal'=>$idjadwal));
	    	$this->db->update("tbl_jadwal",$datadokter);
 
	    	$this->session->set_flashdata('message_sukses','Jadwal berhasil diperbaharui');
			redirect('jadwal');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Jadwal Gagal diperbaharui, silakan cek field isian'.$err_msg);
			redirect('jadwal/edit/?kode='.$idjadwal);
		}
	}

	public function hapus(){
		$kode = $this->input->get('kode');
		 
	    //hapus dari tabel jadwal
		$this->db->where(array('id_jadwal'=>$kode));
		$this->db->delete('tbl_jadwal');


		if ( $this->db->affected_rows() == 1 ) {
			$this->session->set_flashdata('message_sukses','Jadwal berhasil dihapus'); 
		}else{ 
			$this->session->set_flashdata('message_error','Jadwal gagal dihapus');
		} 
		redirect('dokter');
	}

}
