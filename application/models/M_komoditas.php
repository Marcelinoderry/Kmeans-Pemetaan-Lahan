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
        $result = $this->db->query("SELECT tb_kecamatan.nama AS kecamatan, tb_perkebunan.nama AS perkebunan, tb_komoditas.jumlah FROM tb_komoditas LEFT JOIN tb_kecamatan ON tb_komoditas.kd_kecamatan = tb_kecamatan.kd_kecamatan LEFT JOIN tb_perkebunan ON tb_komoditas.kd_perkebunan = tb_perkebunan.kd_perkebunan WHERE tb_komoditas.kd_kecamatan = '$kd_kecamatan' AND tb_komoditas.tahun = '$tahun'")->result();
        return $result;
    }

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

        $this->datatables->order_by('tb_kecamatan.nama');
        $this->datatables->from('tb_komoditas');

        return print_r($this->datatables->generate());
    }
}
