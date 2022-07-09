<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inputrm extends CI_Controller
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
        $this->data['pelayanan'] =  $this->db->query("SELECT * FROM tabel_pelayanan ORDER BY no_rm ASC");
        $this->data['title_web'] = 'Pendaftaran Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/datapasien_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function editpx()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $count = $this->M_Admin->CountTableId('tabel_pelayanan', 'id_pelayanan', $this->uri->segment('3'));
        if ($count > 0) {

            $this->data['pelayanan'] = $this->M_Admin->get_tableid_edit('tabel_pelayanan', 'id_pelayanan', $this->uri->segment('3'));
        } else {
            echo '<script>alert("Data Pasien Belum Dirubah");window.location="' . base_url('data') . '"</script>';
        }

        $this->data['title_web'] = 'Edit Pendaftaran Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/editpx_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function daftarpx()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');


        $this->data['title_web'] = 'Pendaftaran Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/daftar_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function prosespx()
    {
        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }

        // hapus aksi form proses Daftar Pasien
        if (!empty($this->input->get('id_pelayanan'))) {

            $no_rm = $this->M_Admin->get_tableid_edit('tabel_pelayanan', 'id_pelayanan', htmlentities($this->input->get('no_rm')));

            $this->M_Admin->delete_table('tabel_pelayanan', 'id_pelayanan', $this->input->get('id_pelayanan'));

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
					<p> Berhasil Hapus Data Pendaftaran Pasien !</p>
				</div></div>');
            redirect(base_url('daftar'));
        }

        // Daftar pasien aksi form proses Daftar Pasien
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $id = $this->M_Admin->buat_kode('tabel_pelayanan', 'B', 'id_pelayanan', 'ORDER BY id_pelayanan DESC LIMIT 1');

            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'no_rm' => $no_rm,
                'jns_pasien' => htmlentities($post['jns_pasien']),
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'tgl_kunjung' => date('Y-m-d H:i:s'),
                'jns_kunjung' => htmlentities($post['jns_kunjung']),
                'cara_kunjung' => htmlentities($post['cara_kunjung']),
                'ke_poli' => htmlentities($post['ke_poli']),
                'nama_dokter' => htmlentities($post['nama_dokter'])
            );


            $this->db->insert('tabel_pelayanan', $data);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Daftar Pasien Sukses !</p>
			</div></div>');
            redirect(base_url('daftar'));
        }

        // edit aksi form proses Data RM Pasien
        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(
                'id_pelayanan' => $id_pelayanan,
                'no_rm' => htmlentities($post['no_rm']),
                'jns_pasien' => $this->input->post('cara_bayar'),
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'tgl_kunjungan' => date('Y-m-d H:i:s'),
                'pengunjung' => htmlentities($post['pengunjung']),
                'cara_kunjung' => htmlentities($post['cara_kunjung']),
                'ke_poli' => htmlentities($post['ke_poli']),
                'nama_dokter' => htmlentities($post['nama_dokter'])

            );

            $this->db->where('id_pelayanan', htmlentities($post['edit']));
            $this->db->update('tabel_pelayanan', $data);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Data RM Pasien Sukses !</p>
				</div></div>');
            redirect(base_url('daftar' . $post['edit']));
        }
    }

    // public function detail()
    // {
    // if ($this->session->userdata('level') == 'Kepala Rekam Medik') {
    //   if ($this->uri->segment('3') == '') {
    //       echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pasien') . '";</script>';
    //   }
    //   $this->data['idbo'] = $this->session->userdata('ses_id');
    //  $count = $this->M_Admin->CountTableId('tabel_pelayanan', 'no_rm', $this->uri->segment('3'));
    //  if ($count > 0) {
    //       $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_pelayanan', 'no_rm', $this->uri->segment('3'));
    //   } else {
    //       echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
    // }
    // } elseif ($this->session->userdata('level') == 'Dokter Poliklinik') {
    //     $this->data['idbo'] = $this->session->userdata('ses_id');
    //     $count = $this->M_Admin->CountTableId('tabel_pelayanan', 'no_rm', $this->session->userdata('ses_id'));
    //     if ($count > 0) {
    //         $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_pelayanan', 'no_rm', $this->session->userdata('ses_id'));
    //     } else {
    //         echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
    //     }
    // } elseif ($this->session->userdata('level') == 'Kepala Poliklinik') {
    //     $this->data['idbo'] = $this->session->userdata('ses_id');
    //     $count = $this->M_Admin->CountTableId('tabel_pelayanan', 'no_rm', $this->session->userdata('ses_id'));
    //     if ($count > 0) {
    //         $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_pelayanan', 'no_rm', $this->session->userdata('ses_id'));
    //     } else {
    //         echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
    //     }
    // }
    //$this->data['title_web'] = 'Print KIB Pasien ';
    //$this->load->view('pasien/detail', $this->data);
    //}

}
