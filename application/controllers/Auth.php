<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // untuk login
    public function login()
    {
        if (empty($this->session->userdata('username'))) {
            $this->load->view('home/login/view');
        } else {
            $this->auth($this->session->userdata('username'), $this->session->userdata('password'));
        }
    }

    // untuk mengecek data login
    public function check_validation()
    {
        $input = $this->input->post(NULL, TRUE);

        if (isset($input['login'])) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('home/login/view');
            } else {
                $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
                $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

                $this->auth($username, $password);
            }
        } else {
            echo "tidak ada";
        }
    }

    // untuk mengecek data username dan password
    public function auth($username, $password)
    {
        $user = $this->db->get_where('tb_users', ['username' => $username]);

        $count = $user->result();

        if (count($count) >= 1) {
            $row = $user->row_array();

            if (password_verify($password, $row['password'])) {
                if ($row['role'] == 'admin') {
                    $data = [
                        'id'       => $row['id'],
                        'username' => $row['username'],
                        'password' => $password,
                        'role'     => $row['role'],
                    ];

                    $this->session->set_userdata($data);

                    redirect(admin_url(). 'dashboard?&berhasil');
                }
            } else {
                echo "username atau password Anda salah!";
            }
        } else {
            echo "tidak ada";
        }
    }

    // untuk logout
    public function logout()
    {
        $session_data = [
            'id'       => '',
            'username' => '',
            'password' => '',
            'role'     => '',
        ];
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();
        redirect('home');
    }
}
