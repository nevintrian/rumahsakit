<?php

class M_cetak extends CI_Model {

    // Get data User for Cetak
    public function get_user_for_cetak($id_login) {
        $this->db->select('*');
        $this->db->from('tbl_login');

        $this->db->where('id_login', $id_login);

        return $this->db->get();
    }

    public function get_dokter_for_cetak($id_dokter) {
        $this->db->select('*');
        $this->db->from('tabel_dokter a');

        $this->db->join('tbl_login b', 'a.id_login=b.id_login');
        $this->db->join('tabel_poli c', 'a.id_poli=c.id_poli');

        $this->db->where('a.id_dokter', $id_dokter);

        return $this->db->get();
    }

    public function get_pasien_for_cetak($no_rm) {
        $this->db->select('*');
        $this->db->from('tabel_pasien');

        $this->db->where('no_rm', $no_rm);

        return $this->db->get();
    }

    public function get_resep_for_cetak($kode_resep) {
        $this->db->select('*');
        $this->db->from('tabel_resep a');
        $this->db->join('tabel_pasien b', 'a.no_rm=b.no_rm');
        $this->db->where('a.kode_resep', $kode_resep);
        return $this->db->get();
    }
}