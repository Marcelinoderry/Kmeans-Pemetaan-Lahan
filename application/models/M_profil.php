<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{
    public function getWhere($id)
    {
        $result = $this->db->query("SELECT * FROM tb_users WHERE id = '$id'")->row();
        return $result;
    }
}
