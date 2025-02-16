<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->model('fakultas_model');
        $this->load->model('jurusan_model');

		if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login!!</div>');
            redirect('auth');
        }
    }

    public function index() {    
        $data['title'] = 'Mahasiswa';
        $data['footer'] = 'Nabil Afzaal';
        $role = $this->session->userdata('role');
        $data['mahasiswa'] = $this->mahasiswa_model->getMahasiswaWithPeriode();

        $this->load->view('templates/header', $data);        
        $this->load->view('templates/sidebar');    
        $this->load->view('templates/navbar');        
        if ($role == '4') {
            $this->load->view('mahasiswa/mahasiswa_index', $data);
        } else {
            $this->load->view('mahasiswa/index', $data);
        }
        $this->load->view('templates/footer', $data);
    }

	public function editData($nim) {
		$data['title'] = "Edit Data Mahasiswa";
		$data['footer'] = 'Nabil Afzaal';
		$data['mahasiswa'] = $this->mahasiswa_model->getByNIM($nim);
	
		if (!$data['mahasiswa']) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Mahasiswa tidak ditemukan!</div>');
			redirect('mahasiswa');
		}
	
		// Ambil semua fakultas
		$data['fakultas'] = $this->fakultas_model->getAllFakultas();
	
		// Ambil jurusan sesuai dengan fakultas mahasiswa
		$data['jurusan'] = $this->jurusan_model->getJurusanByFakultas($data['mahasiswa']['kode_fakultas']);

	
		$this->load->view('templates/header', $data);        
		$this->load->view('templates/sidebar');    
		$this->load->view('templates/navbar');        
		$this->load->view('mahasiswa/edit', $data);    
		$this->load->view('templates/footer', $data);
	}
		

    public function getJurusanByFakultas() {
		// Get fakultas code from AJAX request
		$kodeFakultas = $this->input->post('kodeFakultas');
		
		// Get jurusan data based on fakultas
		$jurusan = $this->jurusan_model->getJurusanByFakultas($kodeFakultas);
		
		// Return data in JSON format
		echo json_encode($jurusan);
	}

	public function updateData() {
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|numeric');
		$this->form_validation->set_rules('ipk', 'IPK', 'required|numeric');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Validasi gagal. Pastikan semua field diisi dengan benar.</div>');
			redirect('mahasiswa/editData/'.$this->input->post('nim'));
		}
	
		$kodeFakultas = $this->input->post('fakultas', true);
		$kodeJurusan  = $this->input->post('jurusan', true);
		$namaJurusan  = $this->input->post('nama_jurusan', true); // Ambil nama jurusan dari input hidden
	
		$fakultasData = $this->fakultas_model->getFakultasByKode($kodeFakultas);
	
		$update_data = [
			'Alamat'       => $this->input->post('alamat', true),
			'NomorHp'      => $this->input->post('nomor_hp', true),
			'Ipk'          => $this->input->post('ipk', true),
			'jenisKelamin' => $this->input->post('jenis_kelamin', true),
			'Fakultas'     => $fakultasData['nama_fakultas'],
			'Jurusan'      => $namaJurusan // Simpan nama jurusan langsung dari input hidden
		];
	
		$nim = $this->input->post('nim', true);
	
		if ($this->mahasiswa_model->update_data($nim, $update_data)) {
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data mahasiswa berhasil diperbarui!</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbarui data mahasiswa.</div>');
		}
	
		redirect('mahasiswa');
	}
	
	public function deleteData($nim) {
		if (!$nim) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">NIM tidak ditemukan.</div>');
			redirect('mahasiswa');
		}
	
		// Ambil data mahasiswa berdasarkan NIM
		$mahasiswa = $this->mahasiswa_model->getByNIM($nim);
	
		if (!$mahasiswa) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Mahasiswa tidak ditemukan.</div>');
			redirect('mahasiswa');
		}
	
		// Mulai transaksi database
		$this->db->trans_start();
		
		// Hapus dari tabel mahasiswa
		$this->mahasiswa_model->delete_data($nim);
	
		// Hapus dari tabel user berdasarkan nama mahasiswa
		$this->mahasiswa_model->deleteByName($mahasiswa['Nama']);
	
		// Selesaikan transaksi
		$this->db->trans_complete();
	
		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal menghapus data mahasiswa.</div>');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-success">Data mahasiswa dan pengguna terkait berhasil dihapus.</div>');
		}
	
		redirect('mahasiswa');
	}
	
	
	
	
}
