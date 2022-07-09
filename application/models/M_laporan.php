<?php

class M_laporan extends CI_Model {

    //LAPORAN KUNJUNGAN
    public function get_laporan_kunjungan() {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');

        $this->db->join('tabel_pasien b', 'a.no_rm=b.no_rm');
        $this->db->join('tabel_jenis_pasien c', 'a.jns_pasien=c.id_jns_pasien');
        $this->db->where('a.status', '2');
        
        return $this->db->get();
    }

    public function get_laporan_kunjungan_search($bulan, $tahun, $jns_pasien, $kunjungan) {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');

        if($bulan) {
            $this->db->where("MONTH(a.tgl_kunjung) = $bulan");
        }

        if($tahun) {
            $this->db->where("YEAR(a.tgl_kunjung) = $tahun");
        }

        if($jns_pasien) {
            $this->db->where('a.jns_pasien', $jns_pasien);
        }

        if($kunjungan) {
            $this->db->where('a.jns_kunjung', $kunjungan);
        }

        $this->db->join('tabel_pasien b', 'a.no_rm=b.no_rm');
        $this->db->join('tabel_jenis_pasien c', 'a.jns_pasien=c.id_jns_pasien');
        $this->db->where('a.status', '2');
        
        return $this->db->get();
    }

    
    public function get_laporan_rm_pasien() {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_resep d', 'a.id_daftar = d.id_daftar');
        $this->db->join('tabel_pelayanan e', 'a.id_daftar = e.id_daftar');

        $this->db->where('a.status', '2');
        return $this->db->get();
    }

    public function get_laporan_rm_search($bulan, $tahun, $poli, $jns_pasien, $kunjungan) {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');

        if($bulan) {
            $this->db->where("MONTH(a.tgl_kunjung) = $bulan");
        }

        if($tahun) {
            $this->db->where("YEAR(a.tgl_kunjung) = $tahun");
        }

        if($jns_pasien) {
            $this->db->where('a.jns_pasien', $jns_pasien);
        }

        if($kunjungan) {
            $this->db->where('a.jns_kunjung', $kunjungan);
        }

        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_resep d', 'a.id_daftar = d.id_daftar');
        $this->db->join('tabel_pelayanan e', 'a.id_daftar = e.id_daftar');
        $this->db->join('tabel_poli f', 'c.id_poli = f.id_poli');

        if($poli) {
            $this->db->where('c.id_poli', $poli);
        }

        $this->db->where('a.status', '2');
        
        return $this->db->get();
    }

    public function get_laporan_rl4($id_daftar = '') {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_poli d', 'c.id_poli = d.id_poli');
        $this->db->join('tabel_pelayanan e', 'a.id_daftar = e.id_daftar');

        if($id_daftar){
            $this->db->where('a.id_daftar', $id_daftar);
        }

        $this->db->where('a.status', '2');
        return $this->db->get();
    }

    public function get_laporan_rl4_search($bulan, $tahun, $poli) {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');

        if($bulan) {
            $this->db->where("MONTH(a.tgl_kunjung) = $bulan");
        }

        if($tahun) {
            $this->db->where("YEAR(a.tgl_kunjung) = $tahun");
        }

        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_poli d', 'c.id_poli = d.id_poli');
        $this->db->join('tabel_pelayanan e', 'a.id_daftar = e.id_daftar');

        if($poli) {
            $this->db->where('c.id_poli', $poli);
        }

        $this->db->where('a.status', '2');
        
        return $this->db->get();
    }

    public function get_laporan_rm_per_pasien($id_daftar) {
        $this->db->select('*');
        $this->db->from('tbl_daftar a');
        $this->db->join('tabel_pasien b', 'a.no_rm = b.no_rm');
        $this->db->join('tabel_dokter c', 'a.id_dokter = c.id_dokter');
        $this->db->join('tabel_resep d', 'a.id_daftar = d.id_daftar');
        $this->db->join('tabel_pelayanan e', 'a.id_daftar = e.id_daftar');
        $this->db->join('tabel_poli f', 'c.id_poli = f.id_poli');

        $this->db->where('a.id_daftar', $id_daftar);
        return $this->db->get();
    }
}