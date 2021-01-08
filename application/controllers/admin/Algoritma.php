<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Algoritma extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('m_komoditas');
        $this->load->model('m_perkebunan');
        $this->load->model('m_algoritma');
    }

    public function index()
    {
        $data = [
            'halaman' => 'Algoritma',
            'css'     => '',
            'content' => 'admin/algoritma/view',
            'js'      => 'admin/algoritma/js/view',
            'tahun'   => $this->m_komoditas->getYear(),
        ];
        $this->load->view('admin/base', $data);
    }

    // untuk proses metode
    public function tahun()
    {
        $post = $this->input->post(NULL, TRUE);

        $inptahun1 = $post['inptahun1'];
        $inptahun2 = $post['inptahun2'];
        $inptahun3 = $post['inptahun3'];
        
        $perkebunan  = $this->m_perkebunan->getAll();
        $dataCluster = $this->m_algoritma->getDataMining($perkebunan, $inptahun1, $inptahun2, $inptahun3);
        
        $result = [];
        foreach ($dataCluster as $key => $value) {
            $hasil = [
                'nama_produk' => $value['nama_produk'],
                $value['jumlah_hasil1'],
                $value['jumlah_hasil2'],
                $value['jumlah_hasil3'],
            ];
            array_push($result, $hasil);
        }

        $data = [
            'tahun1'      => $post['inptahun1'],
            'tahun2'      => $post['inptahun2'],
            'tahun3'      => $post['inptahun3'],
            'datacluster' => $dataCluster,
            'data'        => $result,
        ];
        // untuk menload view
        $this->load->view('admin/algoritma/result', $data);
    }

    // untuk cetak hasil
    public function cetak()
    {
        $data['hasil_cluster'] = array(
            $this->input->post('cls1'),
            $this->input->post('cls2'),
            $this->input->post('cls3'),
        );
        // untuk menload view
        $this->load->view('admin/algoritma/cetak', $data);
    }
}
