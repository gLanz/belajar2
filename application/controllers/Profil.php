<?php
// controller/Profil.php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function index()
	{
		$this->load->view('profilview.php');
	}
}
