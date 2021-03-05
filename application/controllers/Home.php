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
        $this->load->model('m_perkebunan');
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

    // untuk ambil detail kecamatan
    public function maps_get_komoditas_dt()
    {
        $kd_kecamatan = $this->input->get('kd_kecamatan');
        $tahun        = $this->input->get('tahun');
        $data         = $this->m_komoditas->getDetail($kd_kecamatan, $tahun);
        $sum          = count($data);

        if ($sum != 0) {
            foreach ($data as $key => $value) {
                $result[] = [
                    'perkebunan' => $value->perkebunan,
                    'jumlah'     => $value->jumlah,
                ];
            }
        } else {
            $result[] = [
                'perkebunan' => 'Data Kosong!',
                'jumlah'     => 'Data Kosong!',
            ];
        }

        // sorting multi array / associative array
        array_multisort(array_column($result, 'jumlah'), SORT_DESC, $result);

        $response = ['data' => $result];
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

    // untuk menu komoditas
    public function komoditas()
    {
        $data = [
            'css'        => 'home/komoditas/css/view',
            'halaman'    => 'Komoditas',
            'content'    => 'home/komoditas/view',
            'js'         => 'home/komoditas/js/view',
            'kecamatan'  => $this->m_kecamatan->getAll(),
            'perkebunan' => $this->m_perkebunan->getAll(),
            'tahun'      => tahun(1970),
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function komoditas_get_data_dt()
    {
        return $this->m_komoditas->getDataDt();
    }

    // untuk menu production
    public function production()
    {
        $data = [
            'css'        => 'home/production/css/view',
            'halaman'    => 'Produksi',
            'content'    => 'home/production/view',
            'js'         => 'home/production/js/view',
            'tahun'      => tahun(1970),
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function production_get_data_dt()
    {
        return $this->m_komoditas->getDataProduksiDt();
    }
}
