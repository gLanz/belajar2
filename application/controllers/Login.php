<?php
//simpan dengan nama Login.php
//xampp/htdocs/belajar2/application/controllers/Login.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){

		$this->load->view('loginview.php');
	}

}