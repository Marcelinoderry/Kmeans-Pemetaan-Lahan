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
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function about()
    {
        $data = [
            'css'     => '',
            'halaman' => 'Tentang',
            'content' => 'home/about/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function contact()
    {
         $data = [
            'css'     => '',
            'halaman' => 'Tentang',
            'content' => 'home/contact/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function maps()
    {
         $data = [
            'css'     => '',
            'halaman' => 'Tentang',
            'content' => 'home/maps/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }

    public function maps_detail()
    {
         $data = [
            'css'     => '',
            'halaman' => 'Tentang',
            'content' => 'home/maps/detail',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('home/base', $data);
    }
}
