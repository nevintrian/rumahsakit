<?php
class Pelayanan_model extends CI_Model
{
    public function data_pasien()
    {
        $this->db->select('*');
        $this->db->from('tabel_pasien');
        $query = $this->db->get();
        return $query;
    }
    public function data_pelayanan()
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar');
        $this->db->join('tabel_pasien', 'tabel_pasien.no_rm = tbl_daftar.no_rm');
        $query = $this->db->get();
        return $query;
    }
    function join2table()
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar');
        $this->db->join('tabel_pasien', 'tabel_pasien.no_rm = tbl_daftar.no_rm');
        $query = $this->db->get();
        return $query;
    }

    public function get_pelayanan_per_dokter($id_login)
    {

        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_jenis_pasien d', 'a.jns_pasien = d.id_jns_pasien');
        $this->db->join('antrian e', 'a.id_daftar = e.id_daftar');

        $this->db->where('c.id_login', $id_login);
        $this->db->where('a.status', '0');
        $this->db->where('e.tgl_antrian=CURDATE()');

        $this->db->order_by('e.no_antrian', 'ASC');
        return $this->db->get();
    }

    public function get_selesai_pelayanan_per_dokter($id_login)
    {

        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_jenis_pasien d', 'a.jns_pasien = d.id_jns_pasien');
        $this->db->join('antrian e', 'a.id_daftar = e.id_daftar');

        $this->db->where('c.id_login', $id_login);
        $this->db->where('a.status > 0');

        $this->db->order_by('e.no_antrian', 'ASC');
        $this->db->order_by('a.tgl_kunjung', 'ASC');
        return $this->db->get();
    }

    public function get_data_pelayanan_pasien($id_daftar)
    {

        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_jenis_pasien d', 'a.jns_pasien = d.id_jns_pasien');

        $this->db->where('a.id_daftar', $id_daftar);
        return $this->db->get();
    }

    public function get_data_pelayanan_pasien_detail($id_daftar)
    {

        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_pelayanan c', 'a.id_daftar = c.id_daftar');
        $this->db->join('tabel_jenis_pasien d', 'a.jns_pasien = d.id_jns_pasien');

        $this->db->where('a.id_daftar', $id_daftar);
        return $this->db->get();
    }

    public function get_data_resep($kode_resep)
    {
        $this->db->select('*');
        $this->db->from('tabel_resep');
        $this->db->where('kode_resep', $kode_resep);
        return $this->db->get();
    }
}
