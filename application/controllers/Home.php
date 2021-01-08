<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // untuk mengecek role user
        checking_role_session($this->session->userdata('role'));
        // untuk load model
        $this->load->model('m_kecamatan');
        $this->load->model('m_komoditas');
    }

    public function index()
    {
        $data = [
            'css'     => '',
            'halaman' => 'Home',
            'content' => 'home/home/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function about()
    {
        $data = [
            'css'     => '',
            'halaman' => 'About',
            'content' => 'home/about/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function contact()
    {
        $data = [
            'css'     => '',
            'halaman' => 'Contact',
            'content' => 'home/contact/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function maps()
    {
        $data = [
            'css'     => '',
            'halaman' => 'Maps',
            'content' => 'home/maps/view',
            'js'      => 'home/maps/js/view'
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    // untuk ambil data kecamatan
    public function maps_get_peta()
    {
        $result = $this->m_kecamatan->getAll();

        // untuk response
        $this->_response($result);
    }

    // untuk ambil detail kecamatan
    public function maps_get_peta_rincian()
    {
        $kd_kecamatan = $this->input->get('kd_kecamatan');

        $data['kecamatan'] = $this->m_kecamatan->getWhere($kd_kecamatan);

        $this->load->view('home/maps/rincian', $data);
    }

    // untuk ambil detail kecamatan
    public function maps_get_komoditas()
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

    public function maps_detail()
    {
        $kd_kecamatan = $this->uri->segment(2);
        $data = [
            'halaman' => 'Detail Kecamatan',
            'content' => 'home/maps/detail',
            'data'    => $this->m_kecamatan->getWhere($kd_kecamatan),
            'css'     => 'home/maps/css/detail',
            'js'      => 'home/maps/js/detail',
            'tahun'   => $this->m_komoditas->getYear(),
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }
}
