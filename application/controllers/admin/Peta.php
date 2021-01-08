<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('m_kecamatan');
        $this->load->model('m_komoditas');
    }

    // fungsi default
    public function index()
    {
        $data = [
            'halaman' => 'Peta',
            'css'     => 'admin/peta/css/view',
            'content' => 'admin/peta/view',
            'js'      => 'admin/peta/js/view'
        ];

        $this->load->view('admin/base', $data);
    }

    // untuk detail kecamatan
    public function detail()
    {
        $kd_kecamatan = $this->uri->segment(4);
        $data = [
            'halaman' => 'Detail Kecamatan',
            'content' => 'admin/peta/detail',
            'data'    => $this->m_kecamatan->getWhere($kd_kecamatan),
            'css'     => 'admin/peta/css/detail',
            'js'      => 'admin/peta/js/detail',
            'tahun'   => $this->m_komoditas->getYear(),
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk ambil data kecamatan
    public function get_peta()
    {
        $result = $this->m_kecamatan->getAll();

        // untuk response
        $this->_response($result);
    }

    // untuk ambil detail kecamatan
    public function get_peta_rincian()
    {
        $kd_kecamatan = $this->input->get('kd_kecamatan');

        $data['kecamatan'] = $this->m_kecamatan->getWhere($kd_kecamatan);

        $this->load->view('admin/peta/rincian', $data);
    }

    // untuk ambil detail kecamatan
    public function get_komoditas()
    {
        $kd_kecamatan = $this->input->get('kd_kecamatan');
        $tahun        = $this->input->get('tahun');
        $data         = $this->m_komoditas->getDetail($kd_kecamatan, $tahun);
        $sum          = count($data);

        if ($sum != 0) {
            foreach ($data as $key => $value) {
                $response['data'][] = [
                    $value->perkebunan,
                    (int) $value->jumlah
                ];
            }
        } else {
            $response['data'] = [
                ['Data Kosong', 0]
            ];
        }
        $response['tahun'] = $tahun;
        // untuk response json
        $this->_response($response);
    }
}
