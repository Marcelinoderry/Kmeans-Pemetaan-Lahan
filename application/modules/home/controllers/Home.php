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
        echo "halaman home";
    }
}
