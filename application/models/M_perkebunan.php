<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_perkebunan extends CI_Model
{
    public function getAll()
    {
        $result = $this->db->query("SELECT * FROM tb_perkebunan")->result();
        return $result;
    }
}
