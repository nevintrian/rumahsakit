<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
    }

    public function index()
    {
        $this->load->view('home/index');
    }
}
