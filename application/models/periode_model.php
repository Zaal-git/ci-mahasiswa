    <?php
    class periode_model extends CI_Model {

        public function getAllPeriode() {
            return $this->db->get('periode')->result_array();
        }
    
        public function getPeriodeById($id) {
            return $this->db->get_where('periode', ['id_periode' => $id])->row_array();
        }
    
        public function addPeriode($data) {
            return $this->db->insert('periode', $data);
        }
    
        public function updatePeriode($id, $data) {
            $this->db->where('id_periode', $id);
            return $this->db->update('periode', $data);
        }
    
        public function deletePeriode($id) {
            $this->db->where('id_periode', $id);
            return $this->db->delete('periode');
        }
    
        public function deactivateOtherPeriods($id) {
            // Set all other periods to inactive
            $this->db->set('status', 0);
            $this->db->where('id_periode !=', $id);
            return $this->db->update('periode'); 
        }
    
        public function countActivePeriods() {
            return $this->db->where('status', 1)
                            ->from('periode')
                            ->count_all_results();
        }
    
        public function getActivePeriode() {
            return $this->db->where('status', 1) // Asumsikan status = 1 berarti aktif
                            ->order_by('id_periode', 'DESC')
                            ->get('periode')
                            ->row_array(); // Ambil satu baris data
        }
        
        public function activateLatestPeriode() {
            // Ambil periode terbaru berdasarkan id_periode terbesar
            $latestPeriode = $this->db->order_by('id_periode', 'DESC')
                                      ->limit(1)
                                      ->get('periode')
                                      ->row_array();
            
            if ($latestPeriode) {
                // Aktifkan periode terbaru
                $this->db->where('id_periode', $latestPeriode['id_periode']);
                $this->db->update('periode', ['status' => 1]);
            }
        }
    }
