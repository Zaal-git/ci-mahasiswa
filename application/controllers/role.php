<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class role extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login!!</div>');
            redirect('auth');
        }

        // Cek role user (misalnya hanya role 1 dan 2 yang bisa akses)
        if (!in_array($this->session->userdata('role'), ['1'])) {
            redirect('auth/blocked'); // Redirect ke halaman blokir jika tidak sesuai role
        }
    }
    
    public function index(){
    $data['title'] = 'Role Management';
    $data['role'] = $this->db->get('user')->result_array();
    $data['footer'] = 'Nabil Afzaal';

    $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/navbar');
        $this->load->view('role/role', $data);
        $this->load->view('templates/footer', $data);
            
}
public function update_status() {
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    
    // Update status di database
    $new_status = $status == 1 ? 0 : 1;
    $this->db->where('id', $id);
    $this->db->update('user', ['is_active' => $new_status]);
    
    if ($this->db->affected_rows() > 0) {
        echo 'success';
    } else {
        echo 'error';
    }
}


}

