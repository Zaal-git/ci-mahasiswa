<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class yudisium extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('yudisium_model');
        $this->load->model('registrasi_model');
        $this->load->model('fakultas_model');
        $this->load->model('jurusan_model');
    }

    public function index() {
        $data['title'] = 'Mahasiswa PIN & Mahasiswa Non-PIN';
        $data['footer'] = 'Nabil Afzaal';
    
        // Get students with and without PIN
        $data['mahasiswa_non_pin'] = $this->yudisium_model->getMahasiswaWithFakultasAndJurusan('non_pin');
        $data['mahasiswa_pin'] = $this->yudisium_model->getMahasiswaWithFakultasAndJurusan('pin');
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('yudisium/index', $data);
        $this->load->view('templates/footer', $data);
    }
    

    public function addData() {
        $data['title'] = 'Tambah Data Yudisium';
        $data['footer'] = 'Nabil Afzaal';
        $data['fakultas'] = $this->fakultas_model->getAllFakultas();
    
        // Validation rules
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('kodeFakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('kodeJurusan', 'Jurusan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Load form jika validasi gagal
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/navbar');
            $this->load->view('yudisium/add', $data);
            $this->load->view('templates/footer');
        } else {
            // Ambil kode fakultas dan jurusan dari form
            $kodeFakultas = $this->input->post('kodeFakultas');
            $kodeJurusan = $this->input->post('kodeJurusan');
    
            // Ambil nama fakultas dan nama jurusan berdasarkan kode
            $fakultas = $this->fakultas_model->getFakultasByKode($kodeFakultas);
            $jurusan = $this->jurusan_model->getJurusanByKode($kodeJurusan);
            
            
            

            // Siapkan data untuk di-insert
            $insert_data = [
                'Nama' => $this->input->post('nama', true),
                'NIM' => $this->input->post('nim', true),
                'kode_fakultas' => $kodeFakultas, 
                'Fakultas' => isset($fakultas['nama_fakultas']) ? $fakultas['nama_fakultas'] : null, // Tambahkan ini
                'kode_jurusan' => $kodeJurusan, 
                'Jurusan' => isset($jurusan['jurusan']) ? $jurusan['jurusan'] : null// Tambahkan ini
            ];
            
            ;
            // Insert ke database
            $result = $this->yudisium_model->insertData($insert_data);
    
            if ($result) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil ditambahkan ke Yudisium!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan data Yudisium.</div>');
            }
    
            redirect('yudisium');
        }
    }
    
    
    

    public function pinData($nim) {
        // Get Yudisium data by NIM (now includes fakultas & jurusan)
        $data['yudisium'] = $this->yudisium_model->getByNIM($nim);
    
        // Jika data tidak ditemukan, redirect dengan pesan error
        if (!$data['yudisium']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Data tidak ditemukan!</div>');
            redirect('yudisium');
        }
    
        // Load PIN form
        $data['title'] = 'Tambah PIN';
        $data['footer'] = 'Nabil Afzaal';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('yudisium/pin_form', $data);  // Pastikan di view pakai 'nama_fakultas' dan 'nama_jurusan'
        $this->load->view('templates/footer');
    }
    

    public function savePin() {
        $nim = $this->input->post('nim');
        $pin = $this->input->post('pin');
    
        // Check for PIN format validation (optional)
        if (empty($pin) || !is_numeric($pin)) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">PIN tidak valid!</div>');
            redirect('yudisium/pinData/'.$nim);
        }
    
        // Update PIN in database
        if ($this->yudisium_model->updatePin($nim, $pin)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">PIN berhasil ditambahkan!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan PIN!</div>');
        }
    
        redirect('yudisium');
    }
    

    public function getJurusanByFakultas() {
        // Get fakultas code from AJAX request
        $kodeFakultas = $this->input->post('kodeFakultas');
        
        // Get jurusan data based on fakultas
        $jurusan = $this->jurusan_model->getJurusanByFakultas($kodeFakultas);
        
        // Return data in JSON format
        echo json_encode($jurusan);
    }
}
