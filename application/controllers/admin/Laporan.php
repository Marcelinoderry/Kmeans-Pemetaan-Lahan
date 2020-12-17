<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk load model
        $this->load->model('m_komoditas');
    }

    public function index()
    {
        $data = [
            'halaman' => 'Laporan',
            'css'     => 'admin/laporan/css/view',
            'content' => 'admin/laporan/view',
            'js'      => 'admin/laporan/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data serverside
    public function get_data_dt()
    {
        return $this->m_komoditas->getDataDt();
    }
}
