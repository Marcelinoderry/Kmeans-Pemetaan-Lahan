<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // untuk mengecek role user
        checking_role_session($this->session->userdata('role'));
    }

    public function index()
    {
        $data = [
            'css'     => '',
            'halaman' => 'Home',
            'content' => 'home/home/view',
            'js'      => ''
        ];

        $this->load->view('home/base', $data);
    }

    public function visimisi()
    {
        echo "visi & misi";
    }

    public function profil()
    {
        echo "profil";
    }

    public function contact()
    {
        echo "contact";
    }
}
