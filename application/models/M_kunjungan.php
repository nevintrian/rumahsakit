<?php

class M_kunjungan extends CI_Model {

    // Cara Kunjungan
    public function get_kunjungan($id_kunjung='') {
        $this->db->select('*');
        $this->db->from('tabel_kunjung');

        if($id_kunjung) {
            $this->db->where('id_kunjung', $id_kunjung);
        }

        return $this->db->get();
    }
}