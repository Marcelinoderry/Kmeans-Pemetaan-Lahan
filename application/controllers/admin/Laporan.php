<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'halaman' => 'Laporan',
            'css'     => '',
            'content' => 'admin/laporan/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }
}
