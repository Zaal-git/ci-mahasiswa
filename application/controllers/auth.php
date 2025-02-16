<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }
    
    public function index(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user_model->get_user_by_email($email);

        // Jika user ditemukan
        if ($user) {
            // Cek apakah akun aktif
            if ($user['is_active'] == 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Please activate your role status</div>');
                redirect('auth');
            }

            // Check password dengan MD5
            if ($user['password'] == md5($password)) {
                $this->session->set_userdata('email', $user['email']);
                $this->session->set_userdata('role', $user['role']);
                $this->session->set_userdata('name', $user['name']);
                redirect('Welcome');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } else {
            // Jika user tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('name');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('auth/blocked');
    }
}
