<?php

class M_pendaftaran_pasien extends CI_Model
{

    // Dokter
    public function get_rm_pasien($id_daftar = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');

        if ($id_daftar) {
            $this->db->where('a.id_daftar', $id_daftar);
        }

        $this->db->join('tabel_dokter c', 'a.id_dokter=c.id_dokter');
        $this->db->join('tabel_poli b', 'c.id_poli=b.id_poli');
        $this->db->join('tabel_kunjung d', 'a.cara_kunjung=d.id_kunjung');
        $this->db->join('antrian e', 'a.id_daftar=e.id_daftar');
        $this->db->join('tabel_jenis_pasien f', 'a.jns_pasien=f.id_jns_pasien');
        $this->db->join('tabel_pasien g', 'a.no_rm=g.no_rm');

        $this->db->order_by('a.tgl_kunjung', 'DESC');
        $this->db->order_by('e.no_antrian', 'ASC');

        return $this->db->get();
    }
}
