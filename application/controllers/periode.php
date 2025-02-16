<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class periode extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('periode_model');

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login!!</div>');
            redirect('auth');
        }

        // Cek role user (misalnya hanya role 1 dan 2 yang bisa akses)
        if (!in_array($this->session->userdata('role'), ['1', '2'])) {
            redirect('auth/blocked'); // Redirect ke halaman blokir jika tidak sesuai role
        }
    }

    public function index() {
        $data['title'] = "Manajemen Periode";
        $data['footer'] = "Nabil Afzaal";
        $data['data_periode'] = $this->periode_model->getAllPeriode();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('periode/index', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function add() {
        if ($this->input->post()) {
            $status = $this->input->post('status');
            
            // Validasi: Pastikan tidak semua periode dinonaktifkan
            if ($status == 0 && $this->periode_model->countActivePeriods() == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Tidak bisa menonaktifkan semua periode. Harus ada setidaknya satu periode yang aktif.</div>');
                redirect('periode/add');
            }
            
            if($status == 1){
                $this->periode_model->deactivateOtherPeriods();
            }
            
            $this->periode_model->addPeriode([
                'periode' => $this->input->post('periode'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => $status
            ]);
            
            $this->session->set_flashdata('message', '<div class="alert alert-success">Periode berhasil ditambahkan.</div>');
            redirect('periode');
        }
        
        $data['title'] = "Tambah Periode";
        $data['footer'] = "Nabil Afzaal";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('periode/add', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit($id) {
        $data['title'] = "Edit Periode";
        $data['footer'] = "Nabil Afzaal";
        $data['periode'] = $this->periode_model->getPeriodeById($id);
        
        if ($this->input->post()) {
            $status = $this->input->post('status');
    
            // Validasi: Pastikan tidak semua periode dinonaktifkan
            if ($status == 0 && $this->periode_model->countActivePeriods() == 1 && $this->periode_model->getPeriodeById($id)['status'] == 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Tidak bisa menonaktifkan semua periode. Harus ada setidaknya satu periode yang aktif.</div>');
                redirect('periode/edit/' . $id);
            }
    
            // If the status is 1 (active), set all other periods to inactive
            if ($status == 1) {
                $this->periode_model->deactivateOtherPeriods($id);
            }
    
            // Update the selected periode
            $this->periode_model->updatePeriode($id, [
                'periode' => $this->input->post('periode'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => $status
            ]);
    
            $this->session->set_flashdata('message', '<div class="alert alert-success">Periode berhasil diubah.</div>');
            redirect('periode');
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('periode/edit', $data);
        $this->load->view('templates/footer', $data);
    }
    

    public function delete($id) {
        // Ambil data periode yang akan dihapus
        $periode = $this->periode_model->getPeriodeById($id);
        
        // Hapus periode
        $this->periode_model->deletePeriode($id);
        
        // Jika periode yang dihapus adalah periode aktif, aktifkan periode terbaru
        if ($periode['status'] == 1) {
            $this->periode_model->activateLatestPeriode();
        }
        
        $this->session->set_flashdata('message', '<div class="alert alert-success">Periode berhasil dihapus.</div>');
        redirect('periode');
    }
}