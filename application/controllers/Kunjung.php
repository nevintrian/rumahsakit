<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kunjung extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {

        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['kunjung'] =  $this->db->query("SELECT * FROM tabel_kunjung ORDER BY id_kunjung ASC");

        if (!empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            $count = $this->M_Admin->CountTableId('tabel_kunjung', 'id_kunjung', $id);
            if ($count > 0) {
                $this->data['kunjungpasien'] = $this->db->query("SELECT *FROM tabel_kunjung WHERE id_kunjung='$id'")->row();
            } else {
                echo '<script>alert("CARA KUNJUNG TIDAK DITEMUKAN");window.location="' . base_url('data/kunjung') . '"</script>';
            }
        }

        $this->data['title_web'] = 'CARA KUNJUNG PASIEN RJ ';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('kunjung/kunjung_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function kunjungproses()
    {
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $data = array(
                'cara_kunjung' => htmlentities($post['kunjung']),
            );

            $this->db->insert('tabel_kunjung', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Cara Kunjung Sukses !</p>
			</div></div>');
            redirect(base_url('kunjung'));
        }

        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(
                'cara_kunjung' => htmlentities($post['kunjung']),
            );
            $this->db->where('id_kunjung', htmlentities($post['edit']));
            $this->db->update('tabel_kunjung', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Cara Kunjung Sukses !</p>
			</div></div>');
            redirect(base_url('kunjung'));
        }

        if (!empty($this->input->get('kunjung_id'))) {
            $this->db->where('id_kunjung', $this->input->get('kunjung_id'));
            $this->db->delete('tabel_kunjung');

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Cara Kunjung Sukses !</p>
			</div></div>');
            redirect(base_url('kunjung'));
        }
    }
}
