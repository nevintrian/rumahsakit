<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika dokter belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_dokter', 'dokter');
		$this->load->model('M_poli', 'poli');
		$this->load->model('M_Admin');
		$this->load->model('M_cetak', 'cetak');
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['datadokter'] = $this->dokter->get_dokter();

		$this->data['title_web'] = 'Data Dokter';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('dokter/dokter_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function print_kartu_dokter($id_dokter)
	{

		$data['cetak_kartu'] = $this->cetak->get_dokter_for_cetak($id_dokter)->row();

		$data['title_web'] = 'Print Kartu Dokter';
		$this->load->view('dokter/print', $data);
	}

	public function editdokter($id_dokter)
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		// $count = $this->M_Admin->CountTableId('tabel_dokter', 'id_dokter', $this->uri->segment('3'));
		// if ($count > 0) {

		// 	$this->data['data_dokter'] = $this->M_Admin->get_tableid_edit('tabel_dokter', 'id_dokter', $this->uri->segment('3'));
		// } else {
		// 	echo '<script>alert("Data Dokter Belum Diubah");window.location="' . base_url('data') . '"</script>';
		// }

		$this->data['data_dokter'] = $this->dokter->get_dokter($id_dokter)->row();

		$this->data['datapoli'] = $this->poli->get_poli()->result();
		$this->data['title_web'] = 'Edit Data Dokter';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('dokter/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambahdokter()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');


		$this->data['datapoli'] = $this->poli->get_poli()->result();
		$this->data['datadokter_user'] = $this->dokter->get_dokter_user()->result();

		$this->data['title_web'] = 'Tambah Data Dokter';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('dokter/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}


	public function prosesdokter()
	{
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}

		// hapus aksi form proses Data Dokter
		if (!empty($this->input->get('id_dokter'))) {

			$id_dokter = $this->M_Admin->get_tableid_edit('tabel_dokter', 'id_dokter', htmlentities($this->input->get('id_dokter')));

			$this->M_Admin->delete_table('tabel_dokter', 'id_dokter', $this->input->get('id_dokter'));

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
					<p> Berhasil Hapus Data  Dokter !</p>
				</div></div>');
			redirect(base_url('dokter'));
		}

		// tambah aksi form proses Data Dokter
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();

			$id_login = $this->input->post('id_login');
			$get_nama_dokter = $this->dokter->get_dokter_user($id_login)->row();
			$nama_dokter = $get_nama_dokter->nama;

			$id_dokter = $this->M_Admin->buat_kode('tabel_dokter', '40', 'id_dokter', 'ORDER BY id_dokter ASC');
			$data = array(
				'id_login' => htmlentities($post['id_login']),
				'nama_dokter' => $nama_dokter,
				'id_poli' => htmlentities($post['id_poli']),
			);


			$this->db->insert('tabel_dokter', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Dokter Sukses !</p>
			</div></div>');
			redirect(base_url('dokter'));
		}

		// edit aksi form proses Data Dokter
		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				// 'id_dokter' => $id_dokter,
				'nama_dokter' => htmlentities($post['nama_dokter']),
				'id_poli' => htmlentities($post['id_poli']),

			);

			$this->db->where('id_dokter', htmlentities($post['edit']));
			$this->db->update('tabel_dokter', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Data Dokter Sukses !</p>
				</div></div>');
			redirect(base_url('dokter'));
		}
	}
	public function detail()
	{
		if ($this->session->userdata('level') == 'Kepala Rekam Medik') {
			if ($this->uri->segment('3') == '') {
				echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('dokter') . '";</script>';
			}
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$count = $this->M_Admin->CountTableId('tabel_dokter', 'id_dokter', $this->uri->segment('3'));
			if ($count > 0) {
				$this->data['dokter'] = $this->M_Admin->get_tableid_edit('tabel_dokter', 'id_dokter', $this->uri->segment('3'));
			} else {
				echo '<script>alert("DATA DOKTER TIDAK DITEMUKAN");window.location="' . base_url('dokter') . '"</script>';
			}
			// } elseif ($this->session->userdata('level') == 'Dokter Poliklinik') {
			//     $this->data['idbo'] = $this->session->userdata('ses_id');
			//     $count = $this->M_Admin->CountTableId('tabel_dokter', 'id_dokter', $this->session->userdata('ses_id'));
			//     if ($count > 0) {
			//         $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_dokter', 'id_dokter', $this->session->userdata('ses_id'));
			//     } else {
			//         echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
			//     }
			// } elseif ($this->session->userdata('level') == 'Kepala Poliklinik') {
			//     $this->data['idbo'] = $this->session->userdata('ses_id');
			//     $count = $this->M_Admin->CountTableId('tabel_dokter', 'id_dokter', $this->session->userdata('ses_id'));
			//     if ($count > 0) {
			//         $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_dokter', 'id_dokter', $this->session->userdata('ses_id'));
			//     } else {
			//         echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
			//     }
		}
		$this->data['title_web'] = 'Print Data Dokter';
		$this->load->view('dokter/detail', $this->data);
	}
}
