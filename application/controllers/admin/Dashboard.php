<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function __construct()
	{
        parent::__construct();
	}

    public function index()
    {
        $data = [
            'halaman' => 'Dashboard',
            'css'     => '',
            'content' => 'admin/dashboard/view',
            'js'      => ''
        ];

        $this->load->view('admin/base', $data);
    }
}
