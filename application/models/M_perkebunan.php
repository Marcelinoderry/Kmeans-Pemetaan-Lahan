<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_perkebunan extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM tb_perkebunan ORDER BY kd_perkebunan")->result();
        return $result;
    }

    public function getWhere($kd)
    {
        $result = $this->db->query("SELECT * FROM tb_perkebunan WHERE kd_perkebunan = '$kd'")->row();
        return $result;
    }
}
