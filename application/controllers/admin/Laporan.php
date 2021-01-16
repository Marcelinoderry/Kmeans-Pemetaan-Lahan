<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('m_komoditas');
    }

    public function index()
    {
        $data = [
            'halaman' => 'Laporan',
            'css'     => 'admin/laporan/css/view',
            'content' => 'admin/laporan/view',
            'js'      => 'admin/laporan/js/view',
            'tahun'   => tahun(1970),
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data serverside
    public function get_data_dt()
    {
        return $this->m_komoditas->getDataDt();
    }

    // untuk cetak
    public function cetak()
    {
        $tahun  = $this->input->get('tahun');
        $where  = "WHERE tb_komoditas.tahun = '{$tahun}'";
        $result = $this->m_komoditas->getDataWhere($where);

        $data = [
            'data'  => $result,
            'tahun' => $tahun
        ];

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('admin/laporan/cetak', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
