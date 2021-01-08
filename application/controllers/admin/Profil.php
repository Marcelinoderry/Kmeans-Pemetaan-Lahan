<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('m_profil');
        $this->load->model('crud');
    }

    // fungsi default
    public function index()
    {
        $data = [
            'halaman' => 'Profil',
            'content' => 'admin/profil/view',
            'data'    => $this->m_profil->getWhere($this->session->userdata('id')),
            'css'     => 'admin/profil/css/view',
            'js'      => 'admin/profil/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk update profil user
    public function upd()
    {
        $post = $this->input->post(NULL, TRUE);
        if (isset($post['inppassword1']) || isset($post['inppassword2'])) {
            $p2 = $post['inppassword2'];
            $ph = password_hash($p2, PASSWORD_DEFAULT);
            $data = [
                'name'     => $post['inpnama'],
                'email'    => $post['inpemail'],
                'username' => $post['inpusername'],
                'password' => $ph,
            ];
        } else {
            $data = [
                'name'     => $post['inpnama'],
                'email'    => $post['inpemail'],
                'username' => $post['inpusername'],
            ];
        }
        $this->db->trans_start();
        $this->crud->u('tb_users', $data, ['id' => $post['inpidusers']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Data diubah.', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Data tidak diubah.', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }
}
