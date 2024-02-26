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
				'group'=>$row->group,
				'status' => TRUE
			);
			$this->session->set_userdata($arrsession);
			redirect('home');
		}else{
			$this->session->set_flashdata('message_error','Login Gagal silakan cek field isian');
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function gantipassword(){ 
         
         $push = [
            "title" => "Ganti Password",
            "menu" => "gantipassword", 
        ];

        $kode = $this->session->userdata('idsession');

        $push['row'] = $this->db->query("SELECT *FROM `tbl_login` WHERE id_login='$kode'")->row();

    
		$this->load->view('gantipassword_view',$push);
    }

    public function submitpassword(){
       
        $data = [
            "title" => "Ganti Password",
            "menu" => "gantipassword", 
        ];

        $kode = $this->session->userdata('idsession');
        $oldinputpassword = $this->input->post('oldpassword');
        $oldpass = $this->db->query("SELECT * FROM `tbl_login` WHERE id_login='$kode'")->row(); 
        $data['row'] = $oldpass;
		$passwordlamadb			= $oldpass->password;
		// $passwordlamain			= password_hash($this->input->post('oldpassword'),PASSWORD_DEFAULT);//$this->input->post('oldpassword');
        
        $passwordlamain = $oldinputpassword;
        $password				= addslashes($this->input->post('newpassword'));
		$cpassword				= addslashes($this->input->post('cnewpassword'));

        

        $data['info']['oldpass']= $this->input->post('oldpassword');
        $data['info']['newpass']=$this->input->post('newpassword');
        $data['info']['cnewpass']=$this->input->post('cnewpassword');

        if($passwordlamain!= $passwordlamadb){
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger p-3\" id=\"alert\"><i class=\"fas fa-ban\"></i> Password lama anda tidak sesuai dengan yang anda input, silakan diulangi</div>");
 
            $this->load->view('gantipassword_view',$data);

        }elseif($password !=$cpassword){

            $this->session->set_flashdata("pesan", "<div class=\"alert alert-danger p-3\" id=\"alert\"><i class=\"fas fa-ban\"></i> Password konfirmasi tidak sama, silakan diulangi</div>");

            $this->load->view('gantipassword_view',$data);
        }else{
 			$this->db->query("UPDATE `tbl_login` SET password = '".sha1($cpassword)."'  WHERE id_login= '$kode'");
				    
            $this->session->set_flashdata("pesan", "<div class=\"alert alert-success p-3\" id=\"alert\"><i class=\"icon fas fa-check\"></i>  Password berhasil diganti silakan logout dan login kembali.</div>");
            redirect('login/gantipassword');
        }
        
    }
}