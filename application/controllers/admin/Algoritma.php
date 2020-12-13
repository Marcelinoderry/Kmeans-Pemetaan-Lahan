<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Algoritma extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'halaman' => 'Algoritma',
            'css'     => '',
            'content' => 'admin/algoritma/view',
            'js'      => ''
        ];
        $this->load->view('admin/base', $data);
    }
}
