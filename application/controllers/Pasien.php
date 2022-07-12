<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
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
        $this->data['rmpasien'] =  $this->db->query("SELECT * FROM tabel_pasien ORDER BY no_rm ASC");
        $this->data['title_web'] = 'Data Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pasien/pasien_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function print_kartu_pasien($no_rm)
    {

        $data['cetak_kartu'] = $this->cetak->get_pasien_for_cetak($no_rm)->row();

        $data['title_web'] = 'Print Kartu Pasien ';
        $this->load->view('pasien/print', $data);
    }

    public function jenis_pasien()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['jnspasien'] =  $this->db->query("SELECT * FROM tabel_jenis_pasien ORDER BY id_jns_pasien ASC");

        if (!empty($this->input->get('id'))) {
            $id = $this->input->get('id');
            $count = $this->M_Admin->CountTableId('tabel_jenis_pasien', 'id_jns_pasien', $id);
            if ($count > 0) {
                $this->data['datajnspasien'] = $this->db->query("SELECT *FROM tabel_jenis_pasien WHERE id_jns_pasien='$id'")->row();
            } else {
                echo '<script>alert("JENIS PASIEN TIDAK DITEMUKAN");window.location="' . base_url('pasien/jenis_pasien') . '"</script>';
            }
        }

        $this->data['title_web'] = 'Data Jenis Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pasien/jenis_pasien_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function jenis_pasien_proses()
    {
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $data = array(
                'jns_pasien' => htmlentities($post['jns_pasien']),
            );

            $this->db->insert('tabel_jenis_pasien', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Jenis Pasien Sukses !</p>
			</div></div>');
            redirect(base_url('pasien/jenis_pasien'));
        }

        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(
                'jns_pasien' => htmlentities($post['jns_pasien']),
            );
            $this->db->where('id_jns_pasien', htmlentities($post['edit']));
            $this->db->update('tabel_jenis_pasien', $data);


            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Jenis Pasien Sukses !</p>
			</div></div>');
            redirect(base_url('pasien/jenis_pasien'));
        }

        if (!empty($this->input->get('jenis_id'))) {
            $this->db->where('id_jns_pasien', $this->input->get('jenis_id'));
            $this->db->delete('tabel_jenis_pasien');

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Jenis Pasien Sukses !</p>
			</div></div>');
            redirect(base_url('pasien/jenis_pasien'));
        }
    }

    public function editrm()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $count = $this->M_Admin->CountTableId('tabel_pasien', 'no_rm', $this->uri->segment('3'));
        if ($count > 0) {

            $this->data['rm_pasien'] = $this->M_Admin->get_tableid_edit('tabel_pasien', 'no_rm', $this->uri->segment('3'));
        } else {
            echo '<script>alert("Data Pasien Belum Dirubah");window.location="' . base_url('data') . '"</script>';
        }

        $this->data['title_web'] = 'Edit Data Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pasien/edit_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function tambahrm()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');


        $this->data['title_web'] = 'Tambah Data Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('pasien/tambah_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }


    public function prosesrm()
    {
        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }

        // hapus aksi form proses Data RM Pasien
        if (!empty($this->input->get('no_rm'))) {

            $no_rm = $this->M_Admin->get_tableid_edit('tabel_pasien', 'no_rm', htmlentities($this->input->get('no_rm')));

            $this->M_Admin->delete_table('tabel_pasien', 'no_rm', $this->input->get('no_rm'));

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
					<p> Berhasil Hapus Data  Pasien !</p>
				</div></div>');
            redirect(base_url('pasien'));
        }

        // tambah aksi form proses Data RM Pasien
        if (!empty($this->input->post('tambah'))) {
            if (isset($_POST['username'])) {
                $user = htmlentities($this->input->post('username', TRUE));
                $dd = $this->db->query("SELECT * FROM tabel_pasien WHERE username = '$user'");
            } else {
                $num = 1;
            }
            if ($dd->num_rows() > 0  || $num == 1) {
                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
                <p> Gagal Tambah Pasien !, Username Anda Sudah Terpakai</p>
                </div></div>');
                redirect(base_url('pasien/tambahrm'));
            } else {
                $post = $this->input->post();

                $data = array(
                    'no_identitas' => htmlentities($post['no_identitas']),
                    'nama_pasien' => htmlentities($post['nama_pasien']),
                    'alamat' => $this->input->post('alamat'),
                    'j_kel' => htmlentities($post['j_kel']),
                    'tgl_lahir' => htmlentities($post['tgl_lahir']),
                    'agama' => htmlentities($post['agama']),
                    'pekerjaan' => htmlentities($post['pekerjaan']),
                    'no_telp' => htmlentities($post['no_telp']),
                    'username' => htmlentities($post['username']),
                    'pass' => md5(htmlentities($post['password']))
                );


                $this->db->insert('tabel_pasien', $data);

                $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
                <p> Tambah Data RM Pasien Sukses !</p>
                </div></div>');
                redirect(base_url('pasien'));
            }
        }

        // edit aksi form proses Data RM Pasien
        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $data = array(
                // 'no_rm' => $no_rm,
                'nama_pasien' => htmlentities($post['nama_pasien']),
                'alamat' => $this->input->post('alamat'),
                'j_kel' => htmlentities($post['j_kel']),
                'tgl_lahir' => htmlentities($post['tgl_lahir']),
                'agama' => htmlentities($post['agama']),
                'pekerjaan' => htmlentities($post['pekerjaan']),
                'no_telp' => htmlentities($post['no_telp'])

            );

            $this->db->where('no_rm', htmlentities($post['edit']));
            $this->db->update('tabel_pasien', $data);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Data RM Pasien Sukses !</p>
				</div></div>');
            redirect(base_url('pasien'));
        }
    }
    public function detail()
    {
        if ($this->session->userdata('level') == 'Kepala Rekam Medik') {
            if ($this->uri->segment('3') == '') {
                echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('pasien') . '";</script>';
            }
            $this->data['idbo'] = $this->session->userdata('ses_id');
            $count = $this->M_Admin->CountTableId('tabel_pasien', 'no_rm', $this->uri->segment('3'));
            if ($count > 0) {
                $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_pasien', 'no_rm', $this->uri->segment('3'));
            } else {
                echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
            }
            // } elseif ($this->session->userdata('level') == 'Dokter Poliklinik') {
            //     $this->data['idbo'] = $this->session->userdata('ses_id');
            //     $count = $this->M_Admin->CountTableId('tabel_pasien', 'no_rm', $this->session->userdata('ses_id'));
            //     if ($count > 0) {
            //         $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_pasien', 'no_rm', $this->session->userdata('ses_id'));
            //     } else {
            //         echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
            //     }
            // } elseif ($this->session->userdata('level') == 'Kepala Poliklinik') {
            //     $this->data['idbo'] = $this->session->userdata('ses_id');
            //     $count = $this->M_Admin->CountTableId('tabel_pasien', 'no_rm', $this->session->userdata('ses_id'));
            //     if ($count > 0) {
            //         $this->data['pasien'] = $this->M_Admin->get_tableid_edit('tabel_pasien', 'no_rm', $this->session->userdata('ses_id'));
            //     } else {
            //         echo '<script>alert("USER TIDAK DITEMUKAN");window.location="' . base_url('pasien') . '"</script>';
            //     }
        }
        $this->data['title_web'] = 'Print KIB Pasien ';
        $this->load->view('pasien/detail', $this->data);
    }
}
