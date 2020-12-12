<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kecamatan extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM tb_kecamatan ORDER BY kd_kecamatan")->result();
        return $result;
    }

    public function getWhere($kd)
    {
        $result = $this->db->query("SELECT * FROM tb_kecamatan WHERE kd_kecamatan = '$kd'")->row();
        return $result;
    }
}
