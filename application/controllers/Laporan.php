<?php
// controller/laporan.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Laporan";
		$data['menu'] = "laporan";

		$this->load->view('laporan_view.php',$data);
	}

	public function balita(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Laporan data balita";
		$data['menu'] = "laporan";

		$d1 = $this->input->get('d1');
		$d2 = $this->input->get('d2');
		$data['query'] = $this->db->query("SELECT *FROM tbl_balita")->result();

		$this->load->view('laporan_view_balita.php',$data);
	}	

	public function balitavaksin(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		$data['title'] = "Laporan data vaksin balita";
		$data['menu'] = "laporan";

		$d1 = $this->input->get('d1');
		$d2 = $this->input->get('d2');
		$data['query'] = $this->db->query("SELECT *FROM tbl_balita")->result();

		$this->load->view('laporan_view_balitavaksin.php',$data);
	}	

	public function vaksinbulanan(){
		if ($this->session->userdata('status') == FALSE && $this->session->userdata('idsession') == "") {
		    redirect("login");
		}

		

		$d1 = $this->input->get('dt'); 
		$data['dt'] = $d1;
		$data['query'] = $this->db->query("SELECT a.*, b.nama_balita, b.jenkel_balita, b.tanggal_lahir, c.nama_vaksin FROM tbl_imunisasi a LEFT JOIN tbl_balita b ON a.id_balita=b.id_balita LEFT JOIN tbl_vaksin c ON a.id_vaksin=c.id_vaksin WHERE DATE_FORMAT(a.tgl_vaksin, '%m-%Y')='$d1'")->result();

		$data['title'] = "Laporan data balita di vaksin ".@$d1;
		$data['menu'] = "laporan";
		$this->load->view('laporan_view_vaksinbulanan.php',$data);
	}
}