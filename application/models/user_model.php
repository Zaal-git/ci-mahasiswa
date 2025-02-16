<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk menyimpan data user
    public function insert_user($data) {
        return $this->db->insert('user', $data); // Insert ke tabel user
    }

    public function get_user_by_email($email){
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
}
