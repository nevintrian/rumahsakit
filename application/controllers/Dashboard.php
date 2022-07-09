<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Admin');
     $this->load->model('M_antrian', 'antrian');
	 	 if($this->session->userdata('masuk_perpus') != TRUE){
				 $url=base_url('login');
				 redirect($url);
		 }
	 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$data['idbo'] = $this->session->userdata('ses_id');

		$data['title_web'] = 'Dashboard ';
		$data['jumlah_antrian'] = $this->antrian->get_jumlah_antrian()->row();

		$nomor_antrian = $this->antrian->get_no_antrian()->row();
		if ($nomor_antrian) {
            $data['NoAntrian'] = $nomor_antrian->no_antrian;
        } else {
            $data['NoAntrian'] = 0;
        }

		$data['jumlah_kunjungan'] = $this->antrian->get_jumlah_kunjungan()->row();

		$this->load->view('header_view',$data);
		$this->load->view('sidebar_view',$data);
		$this->load->view('dashboard_view',$data);
		$this->load->view('footer_view',$data);
	}

}
