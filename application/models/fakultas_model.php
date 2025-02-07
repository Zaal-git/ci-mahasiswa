<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class fakultas_model extends CI_Model {

    // Method untuk mengambil semua data fakultas
    public function getAllFakultas() {
        return $this->db->get('fakultas')->result_array(); // Mengambil semua data dari tabel fakultas
    }

    // Method untuk mengambil data fakultas berdasarkan kode fakultas
    public function getJurusanByFakultas($kodeFakultas) {
        $this->db->where('kodeFakultas', $kodeFakultas); // Filter berdasarkan kode fakultas
        return $this->db->get('jurusan')->result_array(); // Ambil data jurusan
    }

    public function getFakultasByKode($kodeFakultas) {
        return $this->db->get_where('fakultas', ['kode_fakultas' => $kodeFakultas])->row_array();
    }
    

    // Method untuk menghapus data fakultas
    public function deleteFakultas($kodeFakultas) {
        $this->db->where('kode_fakultas', $kodeFakultas); // Menentukan kondisi WHERE
        $this->db->delete('fakultas'); // Menghapus data dari tabel fakultas
    }

    // Method untuk memperbarui data fakultas
    public function updateFakultas($kodeFakultas, $data) {
        $this->db->where('kodeFakultas', $kodeFakultas); // Menentukan kondisi WHERE
        $this->db->update('fakultas', $data); // Memperbarui data di tabel fakultas
    }

    // Method untuk menyimpan data fakultas baru
    public function insertFakultas($data) {
        return $this->db->insert('fakultas', $data);
    }
}