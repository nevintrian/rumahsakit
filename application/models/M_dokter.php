<?php

class M_dokter extends CI_Model {

    // Dokter
    public function get_dokter($id_dokter='') {
        $this->db->select('*');
        $this->db->from('tabel_dokter a');

        if($id_dokter) {
            $this->db->where('a.id_dokter', $id_dokter);
        }

        $this->db->join('tabel_poli b', 'a.id_poli=b.id_poli');
        $this->db->join('tbl_login c', 'a.id_login=c.id_login');
        $this->db->where('c.level', 'Dokter Poliklinik');

        $this->db->order_by('a.id_poli', 'ASC');

        return $this->db->get();
    }

    public function get_dokter_user($id_login='') {
        $this->db->select('*');
        $this->db->from('tbl_login');

        if($id_login) {
            $this->db->where('id_login', $id_login);
        }

        $this->db->where('level', 'Dokter Poliklinik');

        return $this->db->get();
    }

    public function get_jadwal_per_dokter($id_login='') {
        $this->db->select('*');
        $this->db->from('tabel_jadwalpoli a');

        $this->db->join('tabel_dokter b', 'a.id_dokter=b.id_dokter');
        $this->db->join('tabel_poli c', 'b.id_poli=c.id_poli');


        if($id_login) {
            $this->db->where('b.id_login', $id_login);
        }

        return $this->db->get();
    }

    public function get_jadwal_poli($no_rm) {
        $this->db->select('*');
        $this->db->from('tabel_jadwalpoli a');

        $this->db->join('tabel_dokter b', 'a.id_dokter=b.id_dokter');
        $this->db->join('tabel_poli c', 'b.id_poli=c.id_poli');


        if($no_rm) {
            $this->db->where('a.no_rm', $no_rm);
        }

        return $this->db->get();
    }
}