<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Admin');
        $this->load->model('M_kunjungan', 'kunjungan');
        $this->load->model('M_dokter', 'dokter');
        $this->load->model('M_poli', 'poli');
        $this->load->model('M_antrian', 'antrian');
        $this->load->model('M_pendaftaran_pasien', 'pasien');
        $this->load->model('M_kunjungan', 'kunjung');
        if ($this->session->userdata('masuk_perpus') != TRUE) {
            $url = base_url('login');
            redirect($url);
        }
    }

    public function index()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['rmpasien'] =  $this->db->query("SELECT * FROM tabel_pasien ORDER BY no_rm ASC");
        $this->data['title_web'] = 'Pendaftaran Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/datapasien_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function edit_rj($id_daftar)
    {

        $this->data['idbo'] = $this->session->userdata('ses_id');

        $this->data['rm_pasien'] = $this->pasien->get_rm_pasien($id_daftar)->row();

        $this->data['data_kunjung'] = $this->kunjungan->get_kunjungan()->result();
        $this->data['data_dokter'] = $this->dokter->get_dokter()->result();
        $this->data['data_poli'] = $this->poli->get_poli()->result();
        $this->data['datajenis'] = $this->antrian->get_jenis_pasien()->result();

        $this->data['title_web'] = 'Edit Pendaftaran Pasien';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/edit_rj_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function editpx()
    {


        $this->data['idbo'] = $this->session->userdata('ses_id');
        $count = $this->M_Admin->CountTableId('tbl_daftar', 'id_daftar', $this->uri->segment('3'));
        if ($count > 0) {

            $this->data['rm_pasien'] = $this->M_Admin->get_tableid_edit('tbl_daftar', 'id_daftar', $this->uri->segment('3'));
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
        $count = $this->M_Admin->CountTableId('tabel_pasien', 'no_rm', $this->uri->segment('3'));
        if ($count > 0) {

            $this->data['rm_pasien'] = $this->M_Admin->get_tableid_edit('tabel_pasien', 'no_rm', $this->uri->segment('3'));
        } else {
            echo '<script>alert("Data Pasien Belum Dirubah");window.location="' . base_url('data') . '"</script>';
        }

        $this->data['data_kunjung'] = $this->kunjungan->get_kunjungan()->result();
        $this->data['data_dokter'] = $this->dokter->get_dokter()->result();
        $this->data['data_poli'] = $this->poli->get_poli()->result();
        $this->data['datajenis'] = $this->antrian->get_jenis_pasien()->result();

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
        if (!empty($this->input->get('id_daftar'))) {

            $id_daftar = $this->input->get('id_daftar');

            $this->M_Admin->delete_table('tbl_daftar', 'id_daftar', $id_daftar);
            $this->M_Admin->delete_table('antrian', 'id_daftar', $id_daftar);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
					<p> Berhasil Hapus Data Pendaftaran Pasien !</p>
				</div></div>');
            redirect(base_url('datadaftar'));
        }

        // Daftar pasien aksi form proses Daftar Pasien
        if (!empty($this->input->post('tambah'))) {
            $post = $this->input->post();
            $tgl_kunjung = $this->input->post('tgl_kunjung');
            $no_rm = $this->input->post('no_rm');

            $data = array(
                'no_rm' => $no_rm,
                'jns_pasien' => htmlentities($post['jns_pasien']),
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'tgl_kunjung' => $tgl_kunjung,
                'jns_kunjung' => htmlentities($post['jns_kunjung']),
                'cara_kunjung' => htmlentities($post['cara_kunjung']),
                'id_dokter' => htmlentities($post['nama_dokter']),
                'status' => '0'
            );

            $this->db->insert('tbl_daftar', $data);

            $latestID = $this->db->insert_id();

            $this->GenerateNoAntrian($latestID, $tgl_kunjung, $no_rm);

            // $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
            // <p> Daftar Pasien Sukses !</p>
            // </div></div>');
            // redirect(base_url('datadaftar'));
        }

        // edit aksi form proses Data RM Pasien

        if (!empty($this->input->post('edit'))) {
            $post = $this->input->post();
            $tgl_kunjung = $this->input->post('tgl_kunjung');

            $data = array(
                'jns_pasien' => htmlentities($post['jns_pasien']),
                'tgl_masuk' => date('Y-m-d H:i:s'),
                'tgl_kunjung' => $tgl_kunjung,
                'jns_kunjung' => htmlentities($post['jns_kunjung']),
                'cara_kunjung' => htmlentities($post['cara_kunjung']),
                'id_dokter' => htmlentities($post['nama_dokter']),
            );

            $this->db->where('id_daftar', htmlentities($post['edit']));
            $this->db->update('tbl_daftar', $data);

            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
					<p> Edit Data RM Pasien Sukses !</p>
				</div></div>');
            redirect(base_url('datadaftar'));
        }
    }

    public function GenerateNoAntrian($latestID, $tgl_kunjung, $no_rm)
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
        $this->db->set('no_rm', $no_rm);
        $this->db->set('id_daftar', $latestID);
        $getRow = $this->db->insert('antrian');

        $hasil = array("no" => $no);

        $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
			<p> Daftar Pasien Sukses !</p>
			</div></div>');
        redirect(base_url('datadaftar'));
    }

    public function tambah()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Admin->get_table('tbl_login');
        $this->data['datadokter'] = $this->dokter->get_dokter()->result();
        $this->data['datakunjung'] = $this->kunjung->get_kunjungan()->result();
        $this->data['datajenis'] = $this->antrian->get_jenis_pasien()->result();
        $this->data['title_web'] = 'Tambah Pasien ';


        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/tambahpasien_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function tambah_new()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Admin->get_table('tbl_login');
        $this->data['title_web'] = 'Tambah Pasien ';


        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('daftar/tambahpasiennew_view', $this->data);
        $this->load->view('footer_view', $this->data);
    }

    public function tambah_pasien_new()
    {
        if (isset($_POST['username'])) {
            $user = htmlentities($this->input->post('username', TRUE));
            $dd = $this->db->query("SELECT * FROM tabel_pasien WHERE username = '$user'");
        } else {
            $num = 1;
        }

        if ($dd->num_rows() > 0 || $num == 1) {
            $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-warning">
			<p> Gagal Tambah Pasien !, Username Anda Sudah Terpakai</p>
			</div></div>');
            redirect(base_url('daftar/tambah_new'));
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
            <p> Daftar Pasien telah berhasil !</p>
            </div></div>');
            redirect(base_url('daftar'));
        }
    }

    public function tambah_pasien()
    {

        $j_pasien = $this->input->post('jns_pasien');
        $tgl_kunjung = $this->input->post('tgl_kunjung');
        $j_kunjung = $this->input->post('kunjung');
        $cara_kunjung = $this->input->post('cara_kunjung');
        $dokter = $this->input->post('dokter');

        $nama = $this->input->post('nama');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $telepon = $this->input->post('telepon');
        $jenkel  = $this->input->post('jenkel');

        $this->db->limit('1');
        $this->db->order_by('no_rm', 'DESC');
        $no_pasien = $this->db->get('tabel_pasien')->row();
        $no =  $no_pasien->no_rm;

        $next = $no + 1;
        $no_rm = '0000' . $next;


        $data1 = array(
            'nama_pasien' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'no_telp' => $telepon,
            'j_kel' => $jenkel
        );

        $this->db->insert('tabel_pasien', $data1);

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
        $this->GenerateNoAntrianNew($latestID, $tgl_kunjung);
    }

    public function GenerateNoAntrianNew($latestID, $tgl_kunjung)
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
        $this->db->insert('antrian');

        $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
        <p> Daftar Pasien telah berhasil !</p>
        </div></div>');
        redirect(base_url('daftar'));
    }
}
