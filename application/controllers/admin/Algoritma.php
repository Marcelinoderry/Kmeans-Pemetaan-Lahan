<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Algoritma extends MY_Controller
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
            'halaman' => 'Algoritma',
            'css'     => '',
            'content' => 'admin/algoritma/view',
            'js'      => 'admin/algoritma/js/view',
            'tahun'   => $this->m_komoditas->getYear(),
        ];
        $this->load->view('admin/base', $data);
    }

    public function tahun()
    {
        $post        = $this->input->post(NULL, TRUE);
        $inptahun1   = $post['inptahun1'];
        $inptahun2   = $post['inptahun2'];
        $inptahun3   = $post['inptahun3'];
        $result      = $this->db->query("SELECT * FROM tb_perkebunan ORDER BY kd_perkebunan")->result();
        $datacluster = array();
        foreach ($result as $key => $value) {
            $kd_perkebunan = $value->kd_perkebunan;
            // menampilkan data berdasarkan tahun
            $sql1    = "SELECT ROUND( SUM( jumlah ), 0 ) AS jumlah FROM tb_komoditas WHERE kd_perkebunan = '$kd_perkebunan' AND tahun = '$inptahun1'";
            $result1 = $this->db->query($sql1)->result_array();
            $sql2    = "SELECT ROUND( SUM( jumlah ), 0 ) AS jumlah FROM tb_komoditas WHERE kd_perkebunan = '$kd_perkebunan' AND tahun = '$inptahun2'";
            $result2 = $this->db->query($sql2)->result_array();
            $sql3    = "SELECT ROUND( SUM( jumlah ), 0 ) AS jumlah FROM tb_komoditas WHERE kd_perkebunan = '$kd_perkebunan' AND tahun = '$inptahun3'";
            $result3 = $this->db->query($sql3)->result_array();
            // mengambil nama penyakit
            $datacluster[$key]['nama_produk'] = $value->nama;
            // mengambil jumlah penderita
            foreach ($result1 as $value1) {
                $datacluster[$key]['jumlahproduk1'] = $value1['jumlah'];
            }
            foreach ($result2 as $value2) {
                $datacluster[$key]['jumlahproduk2'] = $value2['jumlah'];
            }
            foreach ($result3 as $value3) {
                $datacluster[$key]['jumlahproduk3'] = $value3['jumlah'];
            }
        }
        $data = [];
        foreach ($datacluster as $key => $value) {
            $hasil = [
                'nama_produk' => $value['nama_produk'],
                $value['jumlahproduk1'],
                $value['jumlahproduk2'],
                $value['jumlahproduk3'],
            ];
            array_push($data, $hasil);
        }
        $data = [
            'tahun1'      => $post['inptahun1'],
            'tahun2'      => $post['inptahun2'],
            'tahun3'      => $post['inptahun3'],
            'datacluster' => $datacluster,
            'data'        => $data,
        ];
        $this->load->view('admin/algoritma/result', $data);
    }
}
