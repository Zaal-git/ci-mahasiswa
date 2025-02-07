<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {
    
    public function get_jumlah_yudisium() {
        return $this->db->count_all('mahasiswa');
    }

    public function get_jumlah_registrasi() {
        return $this->db->count_all('mahasiswa');
    }

    public function get_jumlah_mahasiswa() {
        return $this->db->where('statusRegist', 'Aktif')->count_all_results('mahasiswa');
    }
}
