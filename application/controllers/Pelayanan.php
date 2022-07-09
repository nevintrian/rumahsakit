<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('pelayanan_model');
        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');

        $data['join_rmpasien_pelayanan'] = $this->pelayanan_model->get_pelayanan_per_dokter($this->session->userdata('ses_id'))->result();
        $data['selesai_pelayanan'] = $this->pelayanan_model->get_selesai_pelayanan_per_dokter($this->session->userdata('ses_id'))->result();

        $this->data['title_web'] = 'Data Pelayanan Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pelayanan/pelayanan_view', $data);
        $this->load->view('footer_view', $this->data);
    }

    public function inputrm($id_daftar)
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');

        $data['inputrm'] = $this->pelayanan_model->get_data_pelayanan_pasien($id_daftar)->row();

        $this->data['title_web'] = 'Data Pelayanan Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pelayanan/inputrm_view', $data);
        $this->load->view('footer_view', $this->data);
    }

    public function detailrm($id_daftar)
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');

        $data['detailrm'] = $this->pelayanan_model->get_data_pelayanan_pasien_detail($id_daftar)->row();

        $this->data['title_web'] = 'Data Pelayanan Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pelayanan/detailrm_view', $data);
        $this->load->view('footer_view', $this->data);
    }

    public function add_rekam_medis()
	{
        $id_daftar = htmlentities($this->input->post('id_daftar', TRUE));
        $no_rm = htmlentities($this->input->post('no_rm', TRUE));
		$nama_pasien = htmlentities($this->input->post('nama_pasien', TRUE));
		$anamnesa = htmlentities($this->input->post('anamnesis', TRUE));
		$diagnosa = htmlentities($this->input->post('diagnosa', TRUE));
		$pem_fisik = htmlentities($this->input->post('periksa_fisik', TRUE));
        $tindakan = htmlentities($this->input->post('tindakan', TRUE));
		$status = '1';

			// setting konfigurasi upload
			$nmfile = "user_" . time();
			$config['upload_path'] = './assets_style/image/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['file_name'] = $nmfile;
			// load library upload
			$this->load->library('upload', $config);
			// upload gambar 1
			$this->upload->do_upload('gambar');
			$result1 = $this->upload->data();
			$result = array('gambar' => $result1);
			$data1 = array('upload_data' => $this->upload->data());
			$data = array(
                'id_daftar' => $id_daftar,
                'no_rm' => $no_rm,
				'nama_pasien' => $nama_pasien,
				'anamnesa' => $anamnesa,
				'diagnosa' => $diagnosa,
				'pem_fisik' => $pem_fisik,
                'tindakan' => $tindakan,
				'foto' => $data1['upload_data']['file_name']
			);
			$this->db->insert('tabel_pelayanan', $data);

            $data2 = array(
                'status' => $status
            );
            $this->db->where('id_daftar', $id_daftar);
            $this->db->update('tbl_daftar', $data2);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Input RM telah berhasil !</p>
            </div></div>');
			redirect(base_url('Pelayanan'));
		
	}
}
