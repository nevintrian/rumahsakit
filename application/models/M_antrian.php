<?php

class M_antrian extends CI_Model
{

    // Jumlah Antrian
    public function get_jumlah_antrian()
    {
        $this->db->select('COUNT(id_antrian) AS JumlahAntrian');
        $this->db->from('antrian a');

        $this->db->join('tbl_daftar b', 'a.id_daftar=b.id_daftar');
        $this->db->where('a.tgl_antrian = CURDATE()');
        $this->db->where('b.status', '0');

        return $this->db->get();
    }

    public function get_no_antrian()
    {
        $this->db->select('*');
        $this->db->from('antrian a');

        $this->db->join('tbl_daftar b', 'a.id_daftar=b.id_daftar');
        $this->db->where('a.tgl_antrian = CURDATE()');
        $this->db->where('b.status', '0');
        $this->db->limit('1');

        return $this->db->get();
    }

    public function get_jenis_pasien()
    {
        $this->db->select('*');
        $this->db->from('tabel_jenis_pasien');

        return $this->db->get();
    }

    public function get_jumlah_kunjungan()
    {
        $this->db->select('COUNT(id_antrian) AS JumlahKunjungan');
        $this->db->from('antrian a');

        $this->db->join('tbl_daftar b', 'a.id_daftar=b.id_daftar');
        $this->db->where('a.tgl_antrian = CURDATE()');
        $this->db->where('b.status', '2');

        return $this->db->get();
    }
    public function get_daftar_antrian($no_rm)
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar');
        $this->db->join('tabel_dokter', 'tabel_dokter.id_dokter = tbl_daftar.id_dokter');
        $this->db->join('tabel_poli', 'tabel_poli.id_poli = tabel_dokter.id_poli');
        $this->db->join('tabel_jenis_pasien', ' tbl_daftar.jns_pasien = tabel_jenis_pasien.id_jns_pasien');
        $this->db->join('tabel_pasien', 'tabel_pasien.no_rm = tbl_daftar.no_rm');
        $this->db->join('antrian', 'antrian.id_daftar = tbl_daftar.id_daftar');
        $this->db->where('tbl_daftar.no_rm', $no_rm);
        return $this->db->get();
    }

    public function get_cetak_antrian($id_daftar)
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar');
        $this->db->join('tabel_dokter', 'tabel_dokter.id_dokter = tbl_daftar.id_dokter');
        $this->db->join('tabel_poli', 'tabel_poli.id_poli = tabel_dokter.id_poli');
        $this->db->join('tabel_jenis_pasien', ' tbl_daftar.jns_pasien = tabel_jenis_pasien.id_jns_pasien');
        $this->db->join('tabel_pasien', 'tabel_pasien.no_rm = tbl_daftar.no_rm');
        $this->db->join('antrian', 'antrian.id_daftar = tbl_daftar.id_daftar');
        $this->db->where('tbl_daftar.id_daftar', $id_daftar);
        return $this->db->get();
    }
}
