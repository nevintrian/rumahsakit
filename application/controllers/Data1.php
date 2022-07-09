<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data1 extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		$this->load->model('M_dokter', 'dokter');
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['jadwal'] =  $this->dokter->get_jadwal_per_dokter($this->session->userdata('ses_id'));

		$this->data['title_web'] = 'Jadwal Poli';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/buku_view1', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function pencarian1()
	{
		if ($this->input->post('tanggal') != '') {
			$tanggal = $this->input->post('tanggal');
			$poli = $this->input->post('poli');
			$dokter = $this->input->post('dokter');
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['jadwal'] =  $this->db->query("SELECT * FROM tabel_jadwalpoli WHERE tanggal = '$tanggal' AND nama_poli LIKE '%$poli%' AND nama_dokter LIKE '%$dokter%' ORDER BY no_rm DESC");

			$this->data['tanggal'] = $tanggal;
			$this->data['poli'] = $poli;
			$this->data['dokter'] = $dokter;
			$this->data['title_web'] = 'Pencarian Jadwal Poli';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('buku/buku_pencarian1', $this->data);
			$this->load->view('footer_view', $this->data);
		} else {
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['jadwal'] =  $this->db->query("SELECT * FROM tabel_jadwalpoli ORDER BY no_rm DESC");
			$this->data['title_web'] = 'Jadwal Poli';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('buku/buku_view1', $this->data);
			$this->load->view('footer_view', $this->data);
		}
	}

	function cetak1($tanggal, $poli, $dokter)
	{
		$poli = urldecode($poli);
		$dokter = urldecode($dokter);
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['jadwal'] =  $this->db->query("SELECT * FROM tabel_jadwalpoli WHERE tanggal = '$tanggal' AND nama_poli LIKE '%$poli%' AND nama_dokter LIKE '%$dokter%' ORDER BY no_rm DESC");

		$this->data['tanggal'] = $tanggal;
		$this->data['poli'] = $poli;
		$this->data['dokter'] = $dokter;
		$this->load->view('buku/buku_cetak1', $this->data);
	}

	public function bukudetail1()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tabel_jadwalpoli', 'no_rm', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['jadwal'] = $this->M_Admin->get_tableid_edit('tabel_jadwalpoli', 'no_rm', $this->uri->segment('3'));
			// $this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			// $this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();
		} else {
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="' . base_url('data1') . '"</script>';
		}

		$this->data['title_web'] = 'Data Buku Detail';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/detail1', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function bukuedit1()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tabel_jadwalpoli', 'no_rm', $this->uri->segment('3'));
		if ($count > 0) {

			$this->data['jadwal'] = $this->M_Admin->get_tableid_edit('tabel_jadwalpoli', 'no_rm', $this->uri->segment('3'));

			// $this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			// $this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();
		} else {
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="' . base_url('data1') . '"</script>';
		}

		$this->data['title_web'] = 'Data Buku Edit';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('buku/edit_view1', $this->data);
		$this->load->view('footer_view', $this->data);
	}




	public function prosesbuku1()
	{
		if ($this->session->userdata('masuk_perpus') != TRUE) {
			$url = base_url('login');
			redirect($url);
		}

		// hapus aksi form proses buku
		if (!empty($this->input->get('no_rm'))) {

			$buku = $this->M_Admin->get_tableid_edit('tabel_jadwalpoli', 'no_rm', htmlentities($this->input->get('No')));

			$this->M_Admin->delete_table('tabel_jadwalpoli', 'no_rm', $this->input->get('no_rm'));

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
					<p> Berhasil Hapus Data !</p>
				</div></div>');
			redirect(base_url('data1'));
		}

		// tambah aksi form proses buku
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$no_rm = $this->M_Admin->buat_kode('tabel_jadwalpoli', 'NK', 'no_rm', 'ORDER BY no_rm ASC');
			$data = array(
				'no_rm' => $no_rm,
				'tanggal' => htmlentities($post['tanggal']),
				'hari' => htmlentities($post['hari']),
				'nama_poli' => htmlentities($post['nama_poli']),
				'nama_dokter'  => htmlentities($post['nama_dokter']),
			);
			$this->db->insert('tabel_jadwalpoli', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Data Pasien Sukses !</p>
			</div></div>');
			redirect(base_url('data1'));
		}

		// edit aksi form proses buku
		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				'id_kategori' => htmlentities($post['kategori']),
				'id_rak' => htmlentities($post['rak']),
				'isbn' => htmlentities($post['isbn']),
				'title'  => htmlentities($post['title']),
				'pengarang' => htmlentities($post['pengarang']),
				'penerbit' => htmlentities($post['penerbit']),
				'thn_buku' => htmlentities($post['thn']),
				'isi' => $this->input->post('ket'),
				'jml' => htmlentities($post['jml']),
				'tgl_masuk' => date('Y-m-d H:i:s')
			);

			if (!empty($_FILES['gambar']['name'])) {
				// setting konfigurasi upload
				$config['upload_path'] = './assets_style/image/buku/';
				$config['allowed_types'] = 'gif|jpg|jpeg|png';
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				// load library upload
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$gambar = './assets/image/buku/' . htmlentities($post['gmbr']);
					if (file_exists($gambar)) {
						unlink($gambar);
					}
					$file1 = array('upload_data' => $this->upload->data());
					$this->db->set('sampul', $file1['upload_data']['file_name']);
				} else {
					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
							<p> Edit Buku Gagal !</p>
						</div></div>');
					redirect(base_url('data1'));
				}
			}

			if (!empty($_FILES['lampiran']['name'])) {
				// setting konfigurasi upload
				$config['upload_path'] = './assets_style/image/buku/';
				$config['allowed_types'] = 'pdf';
				$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
				// load library upload
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$lampiran = './assets_style/image/buku/' . htmlentities($post['lamp']);
					if (file_exists($lampiran)) {
						unlink($lampiran);
					}
					$file2 = array('upload_data' => $this->upload->data());
					$this->db->set('lampiran', $file2['upload_data']['file_name']);
				} else {

					$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
							<p> Edit Buku Gagal !</p>
						</div></div>');
					redirect(base_url('data1'));
				}
			}

			$this->db->where('id_buku', htmlentities($post['edit']));
			$this->db->update('tbl_buku', $data);

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Buku Sukses !</p>
				</div></div>');
			redirect(base_url('data1/bukuedit1/' . $post['edit']));
		}
	}

	public function kategori()
	{

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC");

		if (!empty($this->input->get('id'))) {
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_kategori', 'id_kategori', $id);
			if ($count > 0) {
				$this->data['kat'] = $this->db->query("SELECT *FROM tbl_kategori WHERE id_kategori='$id'")->row();
			} else {
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="' . base_url('data/kategori') . '"</script>';
			}
		}

		$this->data['title_web'] = 'Data Kategori ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kategori/kat_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function katproses()
	{
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$data = array(
				'nama_kategori' => htmlentities($post['kategori']),
			);

			$this->db->insert('tbl_kategori', $data);


			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));
		}

		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				'nama_kategori' => htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori', htmlentities($post['edit']));
			$this->db->update('tbl_kategori', $data);


			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));
		}

		if (!empty($this->input->get('kat_id'))) {
			$this->db->where('id_kategori', $this->input->get('kat_id'));
			$this->db->delete('tbl_kategori');

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));
		}
	}

	public function rak()
	{

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC");

		if (!empty($this->input->get('id'))) {
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_rak', 'id_rak', $id);
			if ($count > 0) {
				$this->data['rak'] = $this->db->query("SELECT *FROM tbl_rak WHERE id_rak='$id'")->row();
			} else {
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="' . base_url('data/rak') . '"</script>';
			}
		}

		$this->data['title_web'] = 'Data Rak Buku ';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('rak/rak_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function rakproses()
	{
		if (!empty($this->input->post('tambah'))) {
			$post = $this->input->post();
			$data = array(
				'nama_rak' => htmlentities($post['rak']),
			);

			$this->db->insert('tbl_rak', $data);


			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak'));
		}

		if (!empty($this->input->post('edit'))) {
			$post = $this->input->post();
			$data = array(
				'nama_rak' => htmlentities($post['rak']),
			);
			$this->db->where('id_rak', htmlentities($post['edit']));
			$this->db->update('tbl_rak', $data);


			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Rak Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak'));
		}

		if (!empty($this->input->get('rak_id'))) {
			$this->db->where('id_rak', $this->input->get('rak_id'));
			$this->db->delete('tbl_rak');

			$this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak'));
		}
	}
}
