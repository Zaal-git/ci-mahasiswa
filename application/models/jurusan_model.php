<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jurusan_model extends CI_Model {
    
   // Method untuk mengambil semua data jurusan
   public function getAllJurusan() {
    return $this->db->get('jurusan')->result_array(); // Mengambil semua data dari tabel jurusan
}

// Method untuk mengambil data jurusan berdasarkan kode jurusan
public function getJurusanByKode($kodeJurusan) {
    $this->db->where('kodeJurusan', $kodeJurusan);
    return $this->db->get('jurusan')->row_array(); // Ambil satu baris data
}



// Method untuk menghapus data jurusan
public function deleteJurusan($kodeJurusan) {
    $this->db->where('kodeJurusan', $kodeJurusan); // Menentukan kondisi WHERE
    $this->db->delete('jurusan'); // Menghapus data dari tabel jurusan
}

// Method untuk memperbarui data jurusan
public function updateJurusan($kodeJurusan, $data) {
    $this->db->where('kodeJurusan', $kodeJurusan); // Menentukan kondisi WHERE
    $this->db->update('jurusan', $data); // Memperbarui data di tabel jurusan
}

public function getJurusanByFakultas($kodeFakultas) {
    $this->db->where('kode_fakultas', $kodeFakultas);
    return $this->db->get('jurusan')->result_array();
}


public function insertJurusan($data) {
    return $this->db->insert('jurusan', $data);
}


    




}
