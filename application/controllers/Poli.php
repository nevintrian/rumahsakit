<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poli extends CI_Controller
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
        $this->data['poli'] =  $this->db->query("SELECT * FROM tabel_poli ORDER BY id_poli DESC");

        if (!empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            $count = $this->M_Admin->CountTableId('tabel_poli', 'id_poli', $id);
            if ($count > 0) {
                $this->data['polipasien'] = $this->db->query("SELECT *FROM tabel_poli WHERE id_poli='$id'")->row();
            } else {
                echo '<script>alert("DATA POLI TIDAK DITEMUKAN");window.location="' . base_url('data/poli') . '"</script>';
            }
        }

        $this->data['title_web'] = 'Data Poli ';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('poli/poli_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function jadwal_poli()
    {

        $this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['jadwal'] =  $this->dokter->get_jadwal_per_dokter();

		$this->data['title_web'] = 'Jadwal Poli';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('poli/jadwal_poli', $this->data);
		$this->load->view('footer_view', $this->data);
    }

    public function tambah_jadwal_poli() {

        $this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['datadokter'] = $this->dokter->get_dokter()->result();

		$this->data['title_web'] = 'Jadwal Poli';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('poli/tambah_jadwal_poli', $this->data);
		$this->load->view('footer_view', $this->data);
    }

    public function jadwal_poli_edit($no_rm) {

        $this->data['idbo'] = $this->session->userdata('ses_id');

        $this->data['datadokter'] = $this->dokter->get_dokter()->result();
		$this->data['jadwal_poli'] = $this->dokter->get_jadwal_poli($no_rm)->row();

		$this->data['title_web'] = 'Jadwal Poli';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('poli/edit_jadwal_poli', $this->data);
		$this->load->view('footer_view', $this->data);
    }

    public function poliproses()
    {
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $data = array(
                // 'id_poli' => htmlentities($post['id_poli']),
                'nama_poli' => htmlentities($post['poli']),
            );

            $this->db->insert('tabel_poli', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Poli Sukses !</p>
			</div></div>');
            redirect(base_url('poli'));
        }


        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(

                // 'id_poli' => htmlentities($post['id_poli']),
                'nama_poli' => htmlentities($post['poli']),

            );
            $this->db->where('id_poli', htmlentities($post['edit']));
            $this->db->update('tabel_poli', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Data Poli Sukses !</p>
			</div></div>');
            redirect(base_url('poli'));
        }

        if (!empty($this->input->get('poli_id'))) {
            $this->db->where('id_poli', $this->input->get('poli_id'));
            $this->db->delete('tabel_poli');

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Data Poli Sukses !</p>
			</div></div>');
            redirect(base_url('poli'));
        }
    }


    public function jadwal_poli_proses()
    {
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $data = array(
                'jam_buka' => htmlentities($post['jam_buka']),
                'jam_tutup' => htmlentities($post['jam_tutup']),
                'hari' => htmlentities($post['hari']),
                'id_dokter' => htmlentities($post['id_dokter']),
            );

            $this->db->insert('tabel_jadwalpoli', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Jadwal Poli Sukses !</p>
			</div></div>');
            redirect(base_url('poli/jadwal_poli'));
        }


        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(

                'jam_buka' => htmlentities($post['jam_buka']),
                'jam_tutup' => htmlentities($post['jam_tutup']),
                'hari' => htmlentities($post['hari'])

            );
            $this->db->where('no_rm', htmlentities($post['edit']));
            $this->db->update('tabel_jadwalpoli', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Data Jadwal Poli Sukses !</p>
			</div></div>');
            redirect(base_url('poli/jadwal_poli'));
        }

        if (!empty($this->input->get('no_rm'))) {
            $this->db->where('no_rm', $this->input->get('no_rm'));
            $this->db->delete('tabel_jadwalpoli');

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Data Jadwal Poli Sukses !</p>
			</div></div>');
            redirect(base_url('poli/jadwal_poli'));
        }
    }
}
