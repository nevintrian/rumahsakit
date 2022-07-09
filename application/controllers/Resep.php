<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		$this->load->model('pelayanan_model');
		$this->load->model('M_cetak', 'cetak');
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['resep'] = $this->M_Admin->get_table('tabel_resep');
		$this->data['rmpasien'] = $this->M_Admin->get_table('tabel_pasien');
		$this->data['poli'] = $this->M_Admin->get_table('tabel_poli');
		$this->data['dokter'] = $this->M_Admin->get_table('tabel_dokter');

		$this->data['title_web'] = 'Data Resep ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('resep/resep1_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah_resep($id_daftar)
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['detailrm'] = $this->pelayanan_model->get_data_pelayanan_pasien_detail($id_daftar)->row();

		$this->data['title_web'] = 'Tambah Resep ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('resep/tambah_resep_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add_resep()
	{
		$id_daftar = htmlentities($this->input->post('id_daftar', TRUE));
		$no_rm = htmlentities($this->input->post('no_rm', TRUE));
		$nama_pasien = htmlentities($this->input->post('nama_pasien', TRUE));
		$nama_obat = htmlentities($this->input->post('nama_obat', TRUE));
		$jumlah = htmlentities($this->input->post('jumlah', TRUE));
		$aturan_pakai = htmlentities($this->input->post('aturan_pakai', TRUE));
		$tgl_resep = htmlentities($this->input->post('tgl_resep', TRUE));
		$status = '2';

		$data = array(
			'id_daftar' => $id_daftar,
			'no_rm' => $no_rm,
			'nama_pasien' => $nama_pasien,
			'nama_obat' => $nama_obat,
			'jumlah' => $jumlah,
			'aturan_pakai' => $aturan_pakai,
			'tgl_resep' => $tgl_resep
		);
		$this->db->insert('tabel_resep', $data);

		$data2 = array(
			'status' => $status
		);
		$this->db->where('id_daftar', $id_daftar);
		$this->db->update('tbl_daftar', $data2);

		$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            <p> Input Resep telah berhasil !</p>
            </div></div>');
		redirect(base_url('Resep'));
	}

	public function edit($kode_resep, $id_daftar)
	{

		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['detailrm'] = $this->pelayanan_model->get_data_pelayanan_pasien_detail($id_daftar)->row();
		$this->data['resep'] = $this->pelayanan_model->get_data_resep($kode_resep)->row();

		$this->data['title_web'] = 'Data Resep';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('resep/resep_edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function proses()
	{
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}

		// hapus aksi form proses Daftar Pasien
		if (!empty($this->input->get('id_daftar'))) {

			$id_daftar = $this->input->get('id_daftar');

			$data = array(
				'status' => '1'
			);

			$this->M_Admin->delete_table('tabel_resep', 'id_daftar', $id_daftar);

			$this->db->where('id_daftar', $id_daftar);
			$this->db->update('tbl_daftar', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
					<p> Berhasil Hapus Data Resep Pasien !</p>
				</div></div>');
			redirect(base_url('resep'));
		}

		// edit aksi form proses Data RM Pasien

		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();

			$nama_obat = htmlentities($this->input->post('nama_obat', TRUE));
			$jumlah = htmlentities($this->input->post('jumlah', TRUE));
			$aturan_pakai = htmlentities($this->input->post('aturan_pakai', TRUE));
			$tgl_resep = htmlentities($this->input->post('tgl_resep', TRUE));

			$data = array(
				'nama_obat' => $nama_obat,
				'jumlah' => $jumlah,
				'aturan_pakai' => $aturan_pakai,
				'tgl_resep' => $tgl_resep
			);

			$this->db->where('kode_resep', htmlentities($post['edit']));
			$this->db->update('tabel_resep', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Data Resep Pasien Sukses !</p>
				</div></div>');
			redirect(base_url('resep'));
		}
	}

	public function detail($kode_resep)
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['resep'] = $this->cetak->get_resep_for_cetak($kode_resep)->row();

		$this->data['title_web'] = 'Cetak Resep';
		$this->load->view('resep/print', $this->data);
	}
}
