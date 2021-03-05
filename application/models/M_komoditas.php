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

    public function getDetail($kd_kecamatan, $tahun)
    {
        $result = $this->db->query("SELECT tb_kecamatan.nama AS kecamatan, tb_perkebunan.nama AS perkebunan, tb_komoditas.jumlah FROM tb_komoditas LEFT JOIN tb_kecamatan ON tb_komoditas.kd_kecamatan = tb_kecamatan.kd_kecamatan LEFT JOIN tb_perkebunan ON tb_komoditas.kd_perkebunan = tb_perkebunan.kd_perkebunan WHERE tb_komoditas.kd_kecamatan = '$kd_kecamatan' AND tb_komoditas.tahun = '$tahun' ORDER BY tb_kecamatan.nama")->result();
        return $result;
    }

    public function getDataWhere($where)
    {
        $result = $this->db->query("SELECT tb_perkebunan.nama AS perkebunan, SUM(tb_komoditas.jumlah) AS produksi FROM tb_komoditas LEFT JOIN tb_perkebunan ON tb_komoditas.kd_perkebunan = tb_perkebunan.kd_perkebunan $where GROUP BY tb_perkebunan.nama ORDER BY tb_perkebunan.nama")->result();
        return $result;
    }

    // get data komoditas
    public function getDataDt()
    {
        $this->datatables->select('tb_kecamatan.nama AS kecamatan, tb_perkebunan.nama AS perkebunan, tb_komoditas.tahun, tb_komoditas.jumlah');
        $this->datatables->join('tb_kecamatan', 'tb_komoditas.kd_kecamatan = tb_kecamatan.kd_kecamatan', 'left');
        $this->datatables->join('tb_perkebunan', 'tb_komoditas.kd_perkebunan = tb_perkebunan.kd_perkebunan', 'left');

        // untuk filter
        if ($this->input->post('kecamatan')) {
            $this->datatables->where('tb_kecamatan.kd_kecamatan', $this->input->post('kecamatan'));
        }

        if ($this->input->post('perkebunan')) {
            $this->datatables->where('tb_perkebunan.kd_perkebunan', $this->input->post('perkebunan'));
        }

        if ($this->input->post('tahun')) {
            $this->datatables->where('tb_komoditas.tahun', $this->input->post('tahun'));
        }

        if ($this->input->post('tahun_awal')) {
            $tahunAwal  = $this->input->post('tahun_awal');
            $tahunAkhir = $this->input->post('tahun_akhir');
            $this->datatables->where("tb_komoditas.tahun BETWEEN '$tahunAwal' AND '$tahunAkhir'");
        }
        
        if ($this->input->post('tahun_akhir')) {
            $tahunAwal  = $this->input->post('tahun_awal');
            $tahunAkhir = $this->input->post('tahun_akhir');
            $this->datatables->where("tb_komoditas.tahun BETWEEN '$tahunAwal' AND '$tahunAkhir'");
        }

        $this->datatables->from('tb_komoditas');

        return print_r($this->datatables->generate());
    }

    // get data produksi
    public function getDataProduksiDt()
    {
        $this->datatables->select('tb_kecamatan.nama AS kecamatan, tb_perkebunan.nama AS perkebunan, tb_komoditas.tahun, tb_komoditas.jumlah');
        $this->datatables->join('tb_kecamatan', 'tb_komoditas.kd_kecamatan = tb_kecamatan.kd_kecamatan', 'left');
        $this->datatables->join('tb_perkebunan', 'tb_komoditas.kd_perkebunan = tb_perkebunan.kd_perkebunan', 'left');

        // untuk filter
        if ($this->input->post('tahun')) {
            $tahun = $this->input->post('tahun');
            $this->datatables->where("tb_komoditas.jumlah = (SELECT MAX( tb_komoditas.jumlah ) AS tertinggi FROM tb_komoditas WHERE tb_komoditas.tahun = '$tahun' AND tb_komoditas.kd_kecamatan = tb_kecamatan.kd_kecamatan)");
        }

        $this->datatables->from('tb_komoditas');

        return print_r($this->datatables->generate());
    }
}
