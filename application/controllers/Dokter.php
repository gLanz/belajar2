<?php
// controller/dokter.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Dokter";
		$data['menu'] = "dokter";

		$query = $this->db->query("SELECT a.* FROM tbl_dokter a")->result();
		$data['query'] = $query;

		$this->load->view('dokter_view.php',$data);
	}

	public function tambah(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Dokter";
		$data['menu'] = "dokter";

		$this->load->view('dokter_view_tambah.php',@$data);
	}

	public function edit(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Dokter";
		$data['menu'] = "dokter";
		
		$kode = $this->input->get('kode');
		$rowdokter = $this->db->query("SELECT a.* FROM tbl_dokter a  WHERE a.id_dokter='$kode'")->row();
		
		$data['row'] = $rowdokter;
 
		$this->load->view('dokter_view_edit.php',$data);
	}

 	public function prosestambah(){
		$nama = $this->input->post('nama');
		$spesialisasi = $this->input->post('spesialisasi'); 
		$jk = $this->input->post('jk');  
		$hp = $this->input->post('no_hp');  

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('spesialisasi', 'spesialisasi', 'required'); 
	    $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'trim|required'); 
	    if ($this->form_validation->run() === TRUE){
 
	    	$datadokter = array(
	    		'nama_dokter' => $nama,
	    		'spesialisasi' => $spesialisasi, 
	    		'jenis_kelamin' => $jk,
	    		'no_hp' => $hp 
	    	);

	    	$this->db->insert("tbl_dokter",$datadokter);
        	$idpasien = $this->db->insert_id(); 

	    	$this->session->set_flashdata('message_sukses','Dokter berhasil ditambah');
			redirect('dokter');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Dokter Gagal ditambah, silakan cek field isian'.$err_msg);
			redirect('dokter/tambah');
		}
	}

	public function prosesedit(){
		$iddokter = $this->input->post('iddokter'); 
		$nama = $this->input->post('nama');
		$spesialisasi = $this->input->post('spesialisasi'); 
		$jk = $this->input->post('jk');  
		$hp = $this->input->post('no_hp');  

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	    $this->form_validation->set_rules('spesialisasi', 'spesialisasi', 'required'); 
	    $this->form_validation->set_rules('jk[]', 'Jenis Kelamin', 'trim|required'); 

	    if ($this->form_validation->run() === TRUE){
	    	 
	     
	    	$datadokter = array(
	    		'nama_dokter' => $nama,
	    		'spesialisasi' => $spesialisasi, 
	    		'jenis_kelamin' => $jk,
	    		'no_hp' => $hp 
	    	);
	    	$this->db->where(array('id_dokter'=>$iddokter));
	    	$this->db->update("tbl_dokter",$datadokter);
 
	    	$this->session->set_flashdata('message_sukses','Dokter berhasil diperbaharui');
			redirect('dokter');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Dokter Gagal diperbaharui, silakan cek field isian'.$err_msg);
			redirect('dokter/edit/?kode='.$iddokter);
		}
	}

	public function hapus(){
		$kode = $this->input->get('kode');
		$cek = $this->db->query("SELECT *FROM tbl_dokter WHERE id_dokter='$kode'")->num_rows(); 
 		if($cek > 0){
 			$this->session->set_flashdata('message_error','Dokter tidak dapat dihapus karena masih memiliki relasi dengan tabel lain');
 		}else{

	        //hapus dari tabel petugas
	       	$this->db->where(array('id_dokter'=>$kode));
	        $this->db->delete('tbl_dokter');


	        if ( $this->db->affected_rows() == 1 ) {
	            $this->session->set_flashdata('message_sukses','Dokter berhasil dihapus'); 
	        }else{ 
				$this->session->set_flashdata('message_error','Dokter gagal dihapus');
			}
		}
		redirect('dokter');
	}

}
