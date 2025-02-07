<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('registrasi_model');
		$this->load->model('fakultas_model');
		$this->load->model('jurusan_model');
		$this->load->model('periode_model');
	}

	public function index()
{   
    // Title dan footer
    $data['title'] = 'Registrasi';
    $data['footer'] = 'Nabil Afzaal';

    // Ambil mahasiswa yang memiliki PIN dan statusRegist = 0
    $data['mahasiswa_pin'] = $this->db->select('mahasiswa.*, fakultas.nama_fakultas, jurusan.jurusan')
                                      ->from('mahasiswa')
                                      ->join('fakultas', 'mahasiswa.Fakultas = fakultas.nama_fakultas', 'left')
                                      ->join('jurusan', 'mahasiswa.Jurusan = jurusan.jurusan', 'left')
                                      ->where('mahasiswa.PIN IS NOT NULL')
                                      ->where('mahasiswa.PIN !=', '')
                                      ->where('mahasiswa.statusRegist', 0)
                                      ->get()
                                      ->result_array();

    // Load views
    $this->load->view('templates/header', $data);        
    $this->load->view('templates/sidebar');    
    $this->load->view('templates/navbar');        
    $this->load->view('registrasi/index', $data);    
    $this->load->view('templates/footer', $data);
}


public function saveData(){
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('nomor_hp', 'Nomor Hp', 'required|numeric');
    $this->form_validation->set_rules('ipk', 'Ipk', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Validasi gagal. Pastikan semua field diisi dengan benar.</div>');
        redirect('registrasi');
    }

    // Ambil periode yang aktif
    $periode_aktif = $this->periode_model->getActivePeriode();

    if (!$periode_aktif) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Tidak ada periode aktif yang ditemukan.</div>');
        redirect('registrasi');
    }

    $jenis_kelamin = $this->input->post('jenis_kelamin', true);
    log_message('error', 'Jenis Kelamin: ' . $jenis_kelamin); // Debugging
    
    $update_data = [
        'Alamat'       => $this->input->post('alamat', true),
        'NomorHp'      => $this->input->post('nomor_hp', true),
        'Ipk'          => $this->input->post('ipk', true),
        'jenisKelamin' => $jenis_kelamin, // Pastikan sesuai dengan database
        'statusRegist' => 1, 
        'periode'      => $periode_aktif['id_periode']
    ];
    

    $nim = $this->input->post('nim', true);

    if ($this->registrasi_model->update_data($nim, $update_data)) {
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data mahasiswa berhasil diperbarui!</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbarui data mahasiswa.</div>');
    }

    redirect('registrasi');
}


public function completeData($nim){
    $data['title'] = "Complete Student Data";
    $data['footer'] = 'Nabil Afzaal';
    $data['mahasiswa'] = $this->registrasi_model->getByNIM($nim);
    
    $this->load->view('templates/header', $data);		
    $this->load->view('templates/sidebar');	
    $this->load->view('templates/navbar');		
    $this->load->view('registrasi/complete', $data);	
    $this->load->view('templates/footer', $data);
}
}
