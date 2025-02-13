<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_model extends CI_Model {
    
    public function get_jumlah_mahasiswa() {
        return $this->db->where('statusRegist', '1')->count_all_results('mahasiswa');
    }

    public function getJumlahNonPin(){
        $this->db->where('PIN IS NULL');
        $this->db->or_where('pin', '');
        return $this->db->count_all_results('mahasiswa');
    }
    public function getJumlahPin(){
        $this->db->where('PIN IS NOT NULL');
        $this->db->or_where('pin !=', '');
        return $this->db->count_all_results('mahasiswa');
    }
}
