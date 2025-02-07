    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class registrasi_model extends CI_Model {

        public function get_all()
{
    $this->db->select('mahasiswa.*, fakultas.nama_fakultas, jurusan.nama_jurusan');
    $this->db->from('mahasiswa');
    $this->db->join('fakultas', 'mahasiswa.id_fakultas = fakultas.id_fakultas', 'left');
    $this->db->join('jurusan', 'mahasiswa.id_jurusan = jurusan.id_jurusan', 'left');
    return $this->db->get()->result_array();
}


        public function insert_data($insert_data)
        {
            return $this->db->insert('mahasiswa', $insert_data);
        }

        public function getByNIM($nim) {
            return $this->db->get_where('mahasiswa', ['NIM' => $nim])->row_array();
        }

        public function update_data($nim, $update_data) {
            $this->db->where('NIM', $nim);
            return $this->db->update('mahasiswa', $update_data);
        }
    }

