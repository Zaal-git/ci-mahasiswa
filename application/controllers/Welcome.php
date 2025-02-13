<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{	
		// Title dan footer
		$data['title'] = 'Yudisium';
		$data['footer'] = 'Nabil Afzaal';
		// Mengambil jumlah data dari tabel
		$data['mahasiswa'] = $this->dashboard_model->get_jumlah_mahasiswa();
		$data['pin'] = $this->dashboard_model->getJumlahPin();
		$data['nonPin'] = $this->dashboard_model->getJumlahNonPin();

		$this->load->view('templates/header', $data);		
		$this->load->view('templates/sidebar');	
		$this->load->view('templates/navbar');		
		$this->load->view('templates/index', $data);	
		$this->load->view('templates/footer', $data);
		
	}
}
