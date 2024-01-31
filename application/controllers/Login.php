<?php
//simpan dengan nama Login.php
//xampp/htdocs/belajar2/application/controllers/Login.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){

		$this->load->view('loginview.php');
	}

	public function proseslogin(){
		$username =  $this->input->post('username');
		$password =  sha1($this->input->post('password'));

		$ceklogin = $this->db->query("SELECT *FROM tbl_login WHERE username='$username' AND password='$password'");
		if($ceklogin->num_rows() >0){
			$row = $ceklogin->row();
			$arrsession = array(
				'idsession'=>$row->id_login,
				'namasession'=>$row->nama,
				'status' => TRUE
			);
			$this->session->set_userdata($arrsession);
			redirect('admin');
		}else{
			$this->session->set_flashdata('message_error','Login Gagal silakan cek field isian');
			$this->load->view('login');
		}
	}
}