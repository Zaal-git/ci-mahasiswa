    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class mahasiswa_model extends CI_Model {

        public function getMahasiswaWithPeriode() {
            $this->db->select('
                mahasiswa.*, 
                fakultas.nama_fakultas, 
                jurusan.jurusan AS nama_jurusan, 
                periode.periode
            ');
            $this->db->from('mahasiswa');
            $this->db->join('fakultas', 'fakultas.kode_fakultas = mahasiswa.kode_fakultas', 'left'); 
            $this->db->join('jurusan', 'jurusan.kodeJurusan = mahasiswa.kode_jurusan', 'left'); 
            $this->db->join('periode', 'periode.id_periode = mahasiswa.periode', 'left'); 
            $this->db->where('mahasiswa.statusRegist', 1); 
        
            return $this->db->get()->result_array();
        }
        

        public function getByNIM($nim) {
            $this->db->select('mahasiswa.*, fakultas.nama_fakultas, fakultas.kode_fakultas, jurusan.jurusan AS nama_jurusan, jurusan.kodeJurusan');
            $this->db->from('mahasiswa');
            $this->db->join('fakultas', 'fakultas.kode_fakultas = mahasiswa.kode_fakultas', 'left'); 
            $this->db->join('jurusan', 'jurusan.kodeJurusan = mahasiswa.kode_jurusan', 'left'); 
            $this->db->where('mahasiswa.NIM', $nim);

            return $this->db->get()->row_array(); // Ambil satu data mahasiswa
        }

        public function getByFakultas($kodeFakultas) {
            $this->db->where('kode_fakultas', $kodeFakultas); // Filter berdasarkan kode fakultas
            return $this->db->get('jurusan')->result_array(); // Ambil data jurusan
        }

        public function update_data($nim, $update_data) {
            $this->db->where('NIM', $nim);
            return $this->db->update('mahasiswa', $update_data);
        }

        public function delete_data($nim) {
            return $this->db->delete('mahasiswa', ['NIM' => $nim]);
        }
        
    }
