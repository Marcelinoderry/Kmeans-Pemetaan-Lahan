<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));
	}

    public function index()
    {
        $data = [
            'halaman' => 'Dashboard',
            'css'     => '',
            'content' => 'admin/dashboard/view',
            'js'      => ''
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }
}
