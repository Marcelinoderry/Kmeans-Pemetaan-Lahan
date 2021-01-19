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
        $this->load->model('m_kecamatan');
    }

    public function index()
    {
        $data = [
            'halaman'   => 'Laporan',
            'css'       => 'admin/laporan/css/view',
            'content'   => 'admin/laporan/view',
            'js'        => 'admin/laporan/js/view',
            'kecamatan' => $this->m_kecamatan->getAll(),
            'tahun'     => tahun(1970),
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
        $kecamatan = $this->input->get('kecamatan');
        $tahun     = $this->input->get('tahun');

        if ($kecamatan === 'all') {
            $where         = "WHERE tb_komoditas.tahun = '{$tahun}'";
            $kecamatanText = "untuk <b>SEMUA</b> Kecamatan";
        } else {
            $where         = "WHERE tb_komoditas.kd_kecamatan = '{$kecamatan}' AND tb_komoditas.tahun = '{$tahun}'";
            $nmaKecamatan  = $this->m_kecamatan->getWhere($kecamatan)->nama;
            $kecamatanText = "untuk Kecamatan <b>". strtoupper($nmaKecamatan)."</b>";
        }

        $result = $this->m_komoditas->getDataWhere($where);

        $data = [
            'kecamatan' => $kecamatanText,
            'data'      => $result,
            'tahun'     => $tahun
        ];

        $mpdf = new \Mpdf\Mpdf();
        $html = $this->load->view('admin/laporan/cetak', $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
