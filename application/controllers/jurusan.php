<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jurusan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('jurusan_model'); // Memuat model Jurusan
        $this->load->model('fakultas_model'); // Memuat model Jurusan
    }

    // Method untuk menampilkan halaman index
    public function index() {
        $data['title'] = 'Data Jurusan'; // Judul halaman
        $data['footer'] = 'Nabil Afzaal';
        $data['data_jurusan'] = $this->jurusan_model->getAllJurusan(); // Mengambil data jurusan dari model

        // Memuat view dan meneruskan data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('jurusan/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // Method untuk menghapus data jurusan
    public function delete($kode_jurusan) {
        $this->jurusan_model->deleteJurusan($kode_jurusan); // Memanggil method delete di model
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data jurusan berhasil dihapus.</div>'); // Set pesan flashdata
        redirect('jurusan'); // Redirect ke halaman index
    }

    // Method untuk menampilkan form edit
    public function edit($kode_jurusan) {
        $data['title'] = 'Edit Jurusan';
        $data['footer'] = 'Nabil Afzaal';
        $data['jurusan'] = $this->jurusan_model->getJurusanByKode($kode_jurusan);
        $data['fakultas'] = $this->fakultas_model->getAllFakultas(); // Ambil semua fakultas
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('jurusan/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update() {
        $kode_jurusan = $this->input->post('kode_jurusan');
        $data = [
            'jurusan' => $this->input->post('jurusan'),
            'kode_fakultas' => $this->input->post('kode_fakultas')
        ];
    
        $this->jurusan_model->updateJurusan($kode_jurusan, $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data jurusan berhasil diperbarui!</div>');
        redirect('jurusan');
    }
    

    public function addData() {
        $data['title'] = 'Tambah Data Jurusan';
        $data['footer'] = 'Nabil Afzaal';
        $data['fakultas'] = $this->fakultas_model->getAllFakultas(); // Ambil daftar fakultas

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('jurusan/add', $data);
        $this->load->view('templates/footer', $data);
    }

    // Proses menyimpan data ke database
    public function save() {
        $this->form_validation->set_rules('kodeJurusan', 'Kode Jurusan', 'required|is_unique[jurusan.kodeJurusan]');
        $this->form_validation->set_rules('jurusan', 'Nama Jurusan', 'required');
        $this->form_validation->set_rules('kode_fakultas', 'Fakultas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan data! Pastikan semua kolom terisi.</div>');
            redirect('jurusan/addData');
        } else {
            $data = [
                'kodeJurusan' => $this->input->post('kodeJurusan'),
                'jurusan' => $this->input->post('jurusan'),
                'kode_fakultas' => $this->input->post('kode_fakultas'),
            ];

            if ($this->jurusan_model->insertJurusan($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data jurusan berhasil ditambahkan!</div>');
                redirect('jurusan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menyimpan data.</div>');
                redirect('jurusan/addData');
            }
        }
    }

}