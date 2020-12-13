<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perkebunan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_perkebunan');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Perkebunan',
            'content' => 'admin/perkebunan/view',
            'data'    => $this->m_perkebunan->getAll(),
            'css'     => 'admin/perkebunan/css/view',
            'js'      => 'admin/perkebunan/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('tb_perkebunan', ['id_perkebunan' => $post['id']]);
        $data = [
            'id_perkebunan' => $result['id_perkebunan'],
            'kd_perkebunan' => $result['kd_perkebunan'],
            'nama'          => $result['nama'],
        ];
        // untuk response json
        $this->_response($data);
    }

    // untuk ubah data
    public function upd()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'nama' => $post['inpnama'],
        ];
        $this->db->trans_start();
        $this->crud->u('tb_perkebunan', $data, ['id_perkebunan' => $post['inpidperkebunan']]);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk tambah data
    public function add()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'id_perkebunan' => acak_id('tb_perkebunan', 'id_perkebunan'),
            'kd_perkebunan' => $post['inpkode'],
            'nama'          => $post['inpnama'],
        ];
        $this->db->trans_start();
        $this->crud->i('tb_perkebunan', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Simpan!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }

    // untuk hapus data
    public function del()
    {
        $post = $this->input->post(NULL, TRUE);
        $this->db->trans_start();
        $this->crud->d('tb_perkebunan', $post['id'], 'id_perkebunan');
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE) {
            $response = ['title' => 'Gagal!', 'text' => 'Gagal Hapus!', 'type' => 'error', 'button' => 'Ok!'];
        } else {
            $response = ['title' => 'Berhasil!', 'text' => 'Berhasil Hapus!', 'type' => 'success', 'button' => 'Ok!'];
        }
        // untuk response json
        $this->_response($response);
    }
}
