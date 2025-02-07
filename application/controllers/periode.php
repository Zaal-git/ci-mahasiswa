<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class periode extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('periode_model');
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
            $this->periode_model->addPeriode([
                'periode' => $this->input->post('periode'),
                'keterangan' => $this->input->post('keterangan'),
                'status' => $this->input->post('status')
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
        $this->Periode_model->deletePeriode($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Periode berhasil dihapus.</div>');
        redirect('periode');
    }
}
