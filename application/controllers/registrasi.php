<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('registrasi_model');
		$this->load->model('fakultas_model');
		$this->load->model('jurusan_model');
		$this->load->model('periode_model');

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda Belum Login!!</div>');
            redirect('auth');
        }

        // Cek role user (misalnya hanya role 1 dan 2 yang bisa akses)
        if (!in_array($this->session->userdata('role'), ['1', '2', '3'])) {
            redirect('auth/blocked'); // Redirect ke halaman blokir jika tidak sesuai role
        }
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
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Validasi gagal. Pastikan semua field diisi dengan benar.</div>');
        redirect('registrasi');
    }

    $periode_aktif = $this->periode_model->getActivePeriode();
    if (!$periode_aktif) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Tidak ada periode aktif yang ditemukan.</div>');
        redirect('registrasi');
    }

    $nim = $this->input->post('nim', true);
    $nama = $this->input->post('nama', true);
    $email = $this->input->post('email', true);
    $password = md5($nim); // Enkripsi password dengan MD5


    $fakultas = $this->db->get_where('mahasiswa', ['NIM' => $nim])->row_array();

    $nama_fakultas = $fakultas ? $fakultas['Fakultas'] : 'Unknown';
    $nama_jurusan = $fakultas ? $fakultas['Jurusan'] : 'Unknown';

    // Update data mahasiswa
    $update_data = [
        'Alamat'       => $this->input->post('alamat', true),
        'NomorHp'      => $this->input->post('nomor_hp', true),
        'Ipk'          => $this->input->post('ipk', true),
        'jenisKelamin' => $this->input->post('jenis_kelamin', true),
        'statusRegist' => 1, 
        'periode'      => $periode_aktif['id_periode']
    ];

    // Simpan data dalam session
    $data_session = [
        'nim'           => $nim,
        'nama'          => $nama,
        'fakultas'      => $nama_fakultas, // Simpan nama fakultas ke session
        'jurusan'       => $nama_jurusan,  // Simpan nama jurusan ke session
        'alamat'        => $this->input->post('alamat'),
        'nomor'         => $this->input->post('nomor_hp'),
        'ipk'           => $this->input->post('ipk'),
        'jenisKelamin'  => $this->input->post('jenis_kelamin'),
        'periode'       => $periode_aktif['periode']
    ];
    
    $this->session->set_userdata($data_session);

    // Insert ke tabel user
    $insertUser = [
        'name'         => $nama,
        'email'        => $email,
        'password'     => $password,
        'role'         => 4,
        'date_created' => time()
    ];

    $this->db->trans_start(); // Mulai transaksi
    $this->registrasi_model->update_data($nim, $update_data);
    $this->db->insert('user', $insertUser);
    $this->db->trans_complete(); // Selesaikan transaksi

    if ($this->db->trans_status()) {
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data mahasiswa dan user berhasil diperbarui!</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Gagal memperbarui data.</div>');
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
