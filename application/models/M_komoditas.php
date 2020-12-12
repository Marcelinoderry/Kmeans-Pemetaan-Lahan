<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_komoditas extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT tb_kecamatan.nama AS kecamatan, tb_perkebunan.nama AS perkebunan, tb_komoditas.tahun, tb_komoditas.jumlah FROM tb_komoditas LEFT JOIN tb_kecamatan ON tb_komoditas.kd_kecamatan = tb_kecamatan.kd_kecamatan LEFT JOIN tb_perkebunan ON tb_komoditas.kd_perkebunan = tb_perkebunan.kd_perkebunan ORDER BY tb_kecamatan.nama")->result();
        return $result;
    }

    public function getYear()
    {
        $result = $this->db->query("SELECT DISTINCT tahun FROM tb_komoditas")->result();
        return $result;
    }
}
