<?php
// controller/user.php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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

	public function imunisasi(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = 'Data Imunisasi';
		$data['menu'] = 'imunisasi';

		$idsession = $this->session->userdata('idsession'); 
		
		$data['rowbalita'] = $this->db->query("SELECT a.*, a.jenkel_balita as jenis_kelamin FROM tbl_balita a LEFT JOIN tbl_login b ON a.id_login=b.id_login WHERE b.id_login='$idsession'")->row();
		$idbalita = $data['rowbalita']->id_balita; 
		$data['rowrekammedis'] = $this->db->query("SELECT a.*, c.nama_vaksin,d.nama_dokter, e.tinggi, e.berat FROM tbl_imunisasi a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita LEFT JOIN tbl_vaksin c ON a.id_vaksin=c.id_vaksin LEFT JOIN tbl_dokter d ON a.id_dokter=d.id_dokter LEFT JOIN tbl_daftar e ON a.id_daftar=e.id_daftar WHERE a.id_balita='$idbalita' ORDER BY a.tgl_vaksin DESC")->result();
 		$this->load->view('user_view_imunisasi',@$data);
	}

	public function daftar(){ 
		$data['title'] = "Daftar Imunisasi";
		$data['menu'] = "balita";
		$idsession = $this->session->userdata('idsession');  
		$data['rowbalita'] = $this->db->query("SELECT a.*, a.jenkel_balita as jenis_kelamin FROM tbl_balita a LEFT JOIN tbl_login b ON a.id_login=b.id_login WHERE b.id_login='$idsession'")->row();
		$idbalita = $data['rowbalita']->id_balita; 

		$data['rowdaftar'] = $this->db->query("SELECT *FROM tbl_daftar WHERE id_balita='$idbalita'")->result();
		$this->load->view('user_view_daftar.php',$data);
	}

	public function prosesdaftar(){
		$idbalita = $this->input->post('idbalita');
		$tgldaftar = $this->input->post('tgldaftar'); 
		$keluhan = $this->input->post('keluhan'); 
 
	    $this->form_validation->set_rules('tgldaftar', 'Tanggal', 'required'); 

	    if ($this->form_validation->run() === TRUE){
	    	$cek = $this->db->query("SELECT *FROM tbl_daftar WHERE tgl_daftar >= '$tgldaftar' AND id_balita='$idbalita'")->num_rows();
	    	if($cek > 0){
	    		$this->session->set_flashdata('message_error','Pendaftaran Gagal, anda memiliki pendaftaran yang belum diproses');
				redirect('user/daftar'); 
			}else{
				$datadaftar = array(
		    		'id_balita' => $idbalita, 
		    		'tgl_daftar' => $tgldaftar, 
		    		'keluhan' => $keluhan,
		    		'status' => 'Daftar'
		    	);
		    	$this->db->insert("tbl_daftar",$datadaftar);

		    	$this->session->set_flashdata('message_sukses','Pendaftaran imunisasi berhasil ditambah');
				redirect('user/daftar');
			}
	    }else{
	    	//proses gagal
			$err_msg = validation_errors();
			 
			$this->session->set_flashdata('message_error','Pendaftaran Gagal, silakan cek field isian'.$err_msg);
			redirect('user/daftar');
		}

	}

	public function batal(){
		$kode = $this->input->get('kode'); 

		//hapus dari tabel login
		$this->db->where(array('id_daftar'=>$kode));
        $this->db->update('tbl_daftar',array('status'=>'Batal'));

        if ( $this->db->affected_rows() == 1 ) {
            $this->session->set_flashdata('message_sukses','Pendaftaran berhasil dibatalkan'); 
        }else{ 
			$this->session->set_flashdata('message_error','Pendaftaran gagal dibatalkan');
		}
		redirect('user/daftar');
    }
}