<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalpoli extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
    }

    public function index()
    {
        $this->load->view('home/header');
        $this->load->view('home/jadwalpoli');
        $this->load->view('home/footer');
    }
}
