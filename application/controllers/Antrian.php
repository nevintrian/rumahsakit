<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
        $this->load->model('M_antrian', 'antrian');
        $this->load->model('M_dokter', 'dokter');
        $this->load->model('M_kunjungan', 'kunjung');
        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('antrian');
        }
    }

    public function index()
    {
        $no_rm = $this->session->userdata('ses_id');
        $daftar_antrian = $this->antrian->get_daftar_antrian($no_rm)->result();
        $count_antrian = $this->antrian->get_count_antrian();
        $data['daftar_antrian'] = $daftar_antrian;
        $data['count_antrian'] = $count_antrian;
        $data['idbo'] = $this->session->userdata('ses_id');

        $antrian = $this->antrian->get_jumlah_antrian()->row();

        if ($antrian) {
            $data['jumlah_antrian'] = $antrian->JumlahAntrian;
        } else {
            $data['jumlah_antrian'] = 0;
        }

        $nomor_antrian = $this->antrian->get_no_antrian()->row();

        if ($nomor_antrian) {
            $data['NoAntrian'] = $nomor_antrian->no_antrian;
        } else {
            $data['NoAntrian'] = 0;
        }

        $data['title_web'] = 'SISTEM ANTRIAN RSU BHAKTI HUSADA';

        $this->load->view('header_antrian', $data);
        $this->load->view('antrian/antrian_view', $data);
    }

    public function getNoAntrian()
    {

        $no_rm = $this->input->post('no_rm');
        $nama_pasien = $this->input->post('nama_pasien');
        $j_pasien = $this->input->post('jns_pasien');
        $tgl_kunjung = $this->input->post('tgl_kunjung');
        $j_kunjung = $this->input->post('kunjung');
        $cara_kunjung = $this->input->post('cara_kunjung');
        $dokter = $this->input->post('dokter');

        $data = array(
            'no_rm' => $no_rm,
            'jns_pasien' => $j_pasien,
            'tgl_masuk' => date('Y-m-d'),
            'tgl_kunjung' => $tgl_kunjung,
            'jns_kunjung' => $j_kunjung,
            'cara_kunjung' => $cara_kunjung,
            'id_dokter' => $dokter,
            'status' => '0'
        );

        $this->db->insert('tbl_daftar', $data);

        $latestID = $this->db->insert_id();

        $this->GenerateNoAntrian($latestID, $tgl_kunjung);
    }

    public function GenerateNoAntrian($latestID, $tgl_kunjung)
    {
        // $nowDate = date('Y-m-d');

        $this->db->limit('1');
        $this->db->where('tgl_antrian', $tgl_kunjung);
        $this->db->order_by('no_antrian', 'DESC');
        $antrian = $this->db->get('antrian')->row();

        if ($antrian) {
            $no = $antrian->no_antrian;
        } else {
            $no = 0;
        }

        $no = $no + 1;

        $this->db->set('no_antrian', $no);
        $this->db->set('tgl_antrian', $tgl_kunjung);
        $this->db->set('no_rm', $this->session->userdata('ses_id'));
        $this->db->set('id_daftar', $latestID);
        $getRow = $this->db->insert('antrian');

        $hasil = array("no" => $no);
        // echo json_encode($hasil);
        redirect(base_url('antrian'));
    }

    public function daftar_antrian()
    {

        $data['datadokter'] = $this->dokter->get_dokter()->result();
        $data['datakunjung'] = $this->kunjung->get_kunjungan()->result();
        $data['datajenis'] = $this->antrian->get_jenis_pasien()->result();

        $data['title_web'] = 'SISTEM ANTRIAN RSU BHAKTI HUSADA';

        $this->load->view('header_antrian', $data);
        $this->load->view('antrian/daftar_antrian_view', $data);
    }

    public function cetak($no)
    {
        $data['row'] =   array('no' => $no, 'tgl' => date('Y-m-d'));
        $this->load->view('user/cetak_antrian_1', $data);
    }

    public function regis()
    {
        $data['title_web'] = 'SISTEM ANTRIAN RSU BHAKTI HUSADA';

        $this->load->view('header_antrian', $data);
        $this->load->view('antrian/registrasi_view');
    }

    public function login_antrian()
    {

        $data['title_web'] = 'SISTEM ANTRIAN RSU BHAKTI HUSADA';

        $this->load->view('header_antrian', $data);
        $this->load->view('antrian/login_view');
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function cetak_kartu($id_daftar)
    {

        $data['cetak_kartu'] = $this->antrian->get_cetak_antrian($id_daftar)->row();

        $data['title_web'] = 'Print Antrian Pasien ';
        $this->load->view('antrian/cetak_kartu', $data);
    }
}
