<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_kecamatan extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM tb_kecamatan")->result();
        return $result;
    }
}
