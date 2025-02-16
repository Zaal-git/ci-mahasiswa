<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fakultas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('fakultas_model'); // Memuat model Fakultas

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login!!</div>');
            redirect('auth');
        }

        // Cek role user (misalnya hanya role 1 dan 2 yang bisa akses)
        if (!in_array($this->session->userdata('role'), ['1', '2'])) {
            redirect('auth/blocked'); // Redirect ke halaman blokir jika tidak sesuai role
        }
    }

    // Method untuk menampilkan halaman index
    public function index() {
        $data['title'] = 'Data Fakultas'; // Judul halaman
        $data['footer'] = 'Nabil Afzaal'; // Judul footer
        $data['data_fakultas'] = $this->fakultas_model->getAllFakultas(); // Mengambil data fakultas dari model

        // Memuat view dan meneruskan data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('fakultas/index', $data);
        $this->load->view('templates/footer', $data);
    }

    // Method untuk menghapus data fakultas
    public function delete($kodeFakultas) {
        $this->fakultas_model->deleteFakultas($kodeFakultas); // Memanggil method delete di model
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data fakultas berhasil dihapus.</div>'); // Set pesan flashdata
        redirect('fakultas'); // Redirect ke halaman index
    }

    // Method untuk menampilkan form edit
    public function edit($kodeFakultas) {
        $data['title'] = 'Edit Fakultas';
        $data['footer'] = 'Nabil Afzaal';
        $data['fakultas'] = $this->fakultas_model->getFakultasByKode($kodeFakultas); // Get fakultas data by code
    
        // Check if fakultas data exists
        if (!$data['fakultas']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Fakultas not found!</div>');
            redirect('fakultas');
        }
    
        // Load view with data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('fakultas/edit', $data);
        $this->load->view('templates/footer', $data);
    }
    

    // Method untuk menyimpan perubahan data fakultas
    public function update() {
        $kodeFakultas = $this->input->post('kodeFakultas'); // Get fakultas code
        $data = [
            'nama_fakultas' => $this->input->post('nama_fakultas') // Get the new name of fakultas
        ];
    
        // Update the faculty in the database
        if ($this->fakultas_model->updateFakultas($kodeFakultas, $data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data fakultas berhasil diperbarui!</div>');
            redirect('fakultas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbarui data fakultas.</div>');
            redirect('fakultas/edit/'.$kodeFakultas);
        }
    }
    

    // Method untuk menampilkan form tambah data
    public function addData() {
        $data['title'] = 'Tambah Fakultas';
        $data['footer'] = 'Nabil Afzaal';

        // Memuat view form tambah data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('fakultas/add', $data);
        $this->load->view('templates/footer', $data);
    }

    // Method untuk menyimpan data fakultas baru
    public function save() {
        $this->form_validation->set_rules('kode_fakultas', 'Kode Fakultas', 'required|is_unique[fakultas.kode_fakultas]');
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menambahkan data! Pastikan semua kolom terisi.</div>');
            redirect('fakultas/addData');
        } else {
            $data = [
                'kode_fakultas' => $this->input->post('kode_fakultas'),
                'nama_fakultas' => $this->input->post('nama_fakultas'),
            ];

            if ($this->fakultas_model->insertFakultas($data)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success">Data fakultas berhasil ditambahkan!</div>');
                redirect('fakultas');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menyimpan data.</div>');
                redirect('fakultas/addData');
            }
        }
    }

    // public function delete($kodeFakultas) {
    //     // Check if the fakultas exists
    //     $fakultas = $this->fakultas_model->getFakultasByKode($kodeFakultas);
    //     if (!$fakultas) {
    //         $this->session->set_flashdata('message', '<div class="alert alert-danger">Fakultas not found!</div>');
    //         redirect('fakultas');
    //     }
    
    //     // Delete fakultas
    //     $this->fakultas_model->deleteFakultas($kodeFakultas);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success">Data fakultas berhasil dihapus!</div>');
    //     redirect('fakultas');
    // }
    
}
