<?php

//simpan
//xampp/htdocs/belajar1/application/controllers/Home.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('homeview.php');
	}
}