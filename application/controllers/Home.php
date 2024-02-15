<?php

//simpan
//xampp/htdocs/belajar1/application/controllers/Home.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
		
		$this->load->view('homeview.php');
	}

	function berita(){

	}
}