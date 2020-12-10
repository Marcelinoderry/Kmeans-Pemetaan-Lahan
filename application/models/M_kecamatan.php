<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kecamatan extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM tb_kecamatan ORDER BY kd_kecamatan")->result();
        return $result;
    }

    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM tb_kecamatan WHERE id_kecamatan = '$id'")->row();
        return $result;
    }
}
