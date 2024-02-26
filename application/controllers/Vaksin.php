<?php
// controller/vaksin.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vaksin extends CI_Controller {
	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = 'Vaksin Imunisasi';
		$data['menu'] = 'vaksin';

		$query = $this->db->query("SELECT *FROM tbl_vaksin")->result();
		$data['query'] = $query;

		$this->load->view('vaksin_view.php',$data);
	}

	public function tambah(){
		$data['title'] = 'Tambah Vaksin Imunisasi';
		$data['menu'] = 'vaksin';

		$data['rowvaksin'] = $this->db->query("SELECT *FROM tbl_vaksin")->result();
		 
		$this->load->view('vaksin_view_tambah.php',$data);
	}

 

	public function edit(){
		$data['title'] = 'Edit Vaksin Imunisasi';
		$data['menu'] = 'vaksin';

		$kode = $this->input->get('kode'); 
		$data['row'] = $this->db->query("SELECT *FROM tbl_vaksin WHERE id_vaksin='$kode'")->row();
  
		$this->load->view('vaksin_view_edit.php',$data);
	}

 	public function prosestambah(){
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');  

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required'); 

	    if ($this->form_validation->run() === TRUE){
	    	
	    	$datavaksin = array(
	    		'nama_vaksin' => $nama,
	    		'keterangan' => $keterangan, 
	    	);
	    	$this->db->insert('tbl_vaksin',$datavaksin); 

	    	$this->session->set_flashdata('message_sukses','Vaksin berhasil ditambah');
			redirect('vaksin');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Vaksin Gagal ditambah, silakan cek field isian'.$err_msg);
			redirect('vaksin/tambah');
		}
	}

	public function prosesedit(){
		$idvaksin = $this->input->post('idvaksin');
		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');

		$this->form_validation->set_rules('nama', 'nama vaksin', 'trim|required');

	    if ($this->form_validation->run() === TRUE){
	    	
	    	$datavaksin = array(
	    		'nama_vaksin' => $nama,
	    		'keterangan' => $keterangan, 
	    	);
	    	$this->db->where(array('id_vaksin'=>$idvaksin));
	    	$this->db->update('tbl_vaksin',$datavaksin); 

			$this->session->set_flashdata('message_sukses','Vaksin berhasil diperbaharui');
			redirect('vaksin');
		}else{
			$err_msg = validation_errors();
			$this->session->set_flashdata('message_error','Vaksin gagal diperbaharui, silakan cek field isian'.$err_msg);
			redirect('vaksin/edit/?kode='.$idvaksin);
		}
 
	}



	public function hapus(){
		$kode = $this->input->get('kode'); 
		
		$cek = $this->db->query("SELECT *FROM tbl_imunisasi WHERE id_vaksin='$kode'")->num_rows();

		
 		if($cek > 0){
 			$this->session->set_flashdata('message_error','Vaksin tidak dapat dihapus karena telah digunakan dalam Imunisasi');
 		}else{
 			//hapus dari tabel vaksin
	        $this->db->where(array('id_vaksin'=>$kode));
	        $this->db->delete('tbl_vaksin');
	        if ( $this->db->affected_rows() == 1 ) {
	            $this->session->set_flashdata('message_sukses','Vaksin berhasil dihapus'); 
	        }else{ 
				$this->session->set_flashdata('message_error','Vaksin gagal dihapus');
			}
			
		} 
		redirect('vaksin');
	}

}
