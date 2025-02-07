<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class yudisium_model extends CI_Model {

    public function get_all()
    {
        return $this->db->get('mahasiswa')->result_array();
    }

    public function insertData($insert_data) {
        return $this->db->insert('mahasiswa', $insert_data);
    }

    // Method untuk mengambil data berdasarkan NIM
    public function getByNIM($nim) {
        return $this->db->select('
            mahasiswa.NIM, 
            mahasiswa.Nama, 
            mahasiswa.kode_fakultas, 
            fakultas.nama_fakultas, 
            mahasiswa.kode_jurusan, 
            jurusan.jurusan AS nama_jurusan
        ')
        ->from('mahasiswa')
        ->join('fakultas', 'mahasiswa.kode_fakultas = fakultas.kode_fakultas', 'left')
        ->join('jurusan', 'mahasiswa.kode_jurusan = jurusan.kodeJurusan', 'left')
        ->where('mahasiswa.NIM', $nim)
        ->get()
        ->row_array();
    }
    
    
    
    

    // Method untuk menyimpan PIN
    public function updatePin($nim, $pin) {
        $this->db->where('NIM', $nim);
        return $this->db->update('mahasiswa', ['PIN' => $pin]); // Kembalikan hasil update
    }
    
    
    public function getMahasiswaWithFakultasAndJurusan($pinStatus = NULL) {
        $this->db->select('
            mahasiswa.NIM, 
            mahasiswa.Nama, 
            jurusan.kodeJurusan, 
            fakultas.kode_fakultas
        ');
        $this->db->from('mahasiswa');
        
        // Join ke tabel jurusan dan fakultas
        $this->db->join('jurusan', 'mahasiswa.Jurusan = jurusan.jurusan', 'left');
        $this->db->join('fakultas', 'jurusan.kode_fakultas = fakultas.kode_fakultas', 'left');
    
        // Tambahkan kondisi berdasarkan status PIN
        if ($pinStatus === 'non_pin') {
            $this->db->where('mahasiswa.PIN', NULL);
            $this->db->or_where('mahasiswa.PIN', '');
        } elseif ($pinStatus === 'pin') {
            $this->db->where('mahasiswa.PIN IS NOT NULL');
            $this->db->where('mahasiswa.PIN !=', '');
        }
    
        return $this->db->get()->result_array();
    }
    
    
}

