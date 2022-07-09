<?php
defined('BASEPATH') or exit('No direct script access allowed');

class datadaftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
        $this->load->model('M_pendaftaran_pasien', 'rjpasien');

        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        
        // $this->data['rmpasien'] =  $this->db->query("SELECT * FROM tbl_daftar ORDER BY id_daftar ASC");
        
        $this->data['rmpasien'] = $this->rjpasien->get_rm_pasien();
        $this->data['title_web'] = 'Data Pendaftaran Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/datadaftar_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

}
