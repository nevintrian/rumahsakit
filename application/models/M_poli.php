<?php

class M_poli extends CI_Model {

    // Poli
    public function get_poli($id_poli='') {
        $this->db->select('*');
        $this->db->from('tabel_poli');

        if($id_poli) {
            $this->db->where('id_poli', $id_poli);
        }

        return $this->db->get();
    }
}