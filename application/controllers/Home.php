<?php

//simpan
//xampp/htdocs/belajar1/application/controllers/Home.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}
		$data['title'] = "Dashboard";
		$data['menu'] = "dashboard";
		$data['rowbalita'] = $this->db->query("SELECT *FROM tbl_balita")->num_rows();
		$data['rowpetugas'] = $this->db->query("SELECT *FROM tbl_petugas")->num_rows();
		$data['rowdokter'] = $this->db->query("SELECT *FROM tbl_dokter")->num_rows();
		$this->load->view('home_view.php',$data);
	}

	function berita(){

	}
}