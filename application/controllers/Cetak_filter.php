<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_Filter extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Cetak laporan berdasarkan filter data di PHP Codeigniter";
        $data['tabel_pasien'] = $this->db->get('tabel_pasien')->result();
        $this->load->view('laporan/filter', $data);
    }

    public function filter($id)
    {
        if ($id == 0) {
            $data = $this->db->get('tabel_pasien')->result();
        } else {
            $data = $this->db->get_where('tabel_pasien', ['no_rm' => $id])->result();
        }
        $dt['nama_pasien'] = $data;
        $dt['no_rm'] = $id;
        $this->load->view('laporan/result', $dt);
    }

    public function cetak($id)
    {
        if ($id == 0) {
            $data = $this->db->get('tabel_pasien')->result();
        } else {
            $data = $this->db->get_where('tabel_pasien', ['no_rm' => $id])->result();
        }
        $dt['nama_pasien'] = $data;
        $this->load->library('fpdf');
        $this->mypdf->generate('Laporan/cetak', $dt, 'laporan-mahasiswa', 'A4', 'portrait');
    }
}

/* End of file Cetak_Filter.php */
/* Location: ./application/controllers/Cetak_Filter.php */