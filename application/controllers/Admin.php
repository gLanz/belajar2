<?php
// controller/admin.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Admin";
		$data['menu'] = "admin";
		
		$this->load->view('adminview.php',$data);
	}
}
