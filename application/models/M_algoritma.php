<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_algoritma extends CI_Model
{
    public function getDataMining($perkebunan, $tahun1, $tahun2, $tahun3)
    {
        $dataCluster = [];
        foreach ($perkebunan as $key => $value) {
            $kd_perkebunan = $value->kd_perkebunan;
            // menampilkan data berdasarkan tahun
            $sql1    = "SELECT ROUND( SUM( jumlah ), 0 ) AS jumlah FROM tb_komoditas WHERE kd_perkebunan = '$kd_perkebunan' AND tahun = '$tahun1'";
            $result1 = $this->db->query($sql1)->result_array();
            $sql2    = "SELECT ROUND( SUM( jumlah ), 0 ) AS jumlah FROM tb_komoditas WHERE kd_perkebunan = '$kd_perkebunan' AND tahun = '$tahun2'";
            $result2 = $this->db->query($sql2)->result_array();
            $sql3    = "SELECT ROUND( SUM( jumlah ), 0 ) AS jumlah FROM tb_komoditas WHERE kd_perkebunan = '$kd_perkebunan' AND tahun = '$tahun3'";
            $result3 = $this->db->query($sql3)->result_array();
            // mengambil nama perkebunan
            $dataCluster[$key]['nama_produk'] = $value->nama;
            // mengambil jumlah hasil perkebunan
            foreach ($result1 as $value1) {
                $dataCluster[$key]['jumlah_hasil1'] = $value1['jumlah'];
            }
            foreach ($result2 as $value2) {
                $dataCluster[$key]['jumlah_hasil2'] = $value2['jumlah'];
            }
            foreach ($result3 as $value3) {
                $dataCluster[$key]['jumlah_hasil3'] = $value3['jumlah'];
            }
        }
        // untuk mengembalikan hasil
        return $dataCluster;
    }
}
