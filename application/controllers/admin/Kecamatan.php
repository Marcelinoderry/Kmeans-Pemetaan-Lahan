<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk mengecek status login
        checking_session($this->session->userdata('username'));

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_kecamatan');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman' => 'Kecamatan',
            'content' => 'admin/kecamatan/view',
            'data'    => $this->m_kecamatan->getAll(),
            'css'     => 'admin/kecamatan/css/view',
            'js'      => 'admin/kecamatan/js/view'
        ];
        // untuk load view
        $this->load->view('admin/base', $data);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('tb_kecamatan', ['id_kecamatan' => $post['id']]);
        $data = [
            'id_kecamatan' => $result['id_kecamatan'],
            'kd_kecamatan' => $result['kd_kecamatan'],
            'nama'         => $result['nama'],
            'url'          => $result['url'],
            'luas_lahan'   => $result['luas_lahan'],
            'latitude'     => $result['latitude'],
            'longitude'    => $result['longitude'],
            'keterangan'   => $result['keterangan'],
        ];
        // untuk response json
        $this->_response($data);
    }

    // untuk ubah data
    public function upd()
    {
        $post = $this->input->post(NULL, TRUE);
        $data = [
            'nama'       => $post['inpnama'],
            'url'        => $post['inpurl'],
            'luas_lahan' => $post['inpluslan'],
            'latitude'   => $post['inplatitude'],
            'longitude'  => $post['inplongitude'],
            'keterangan' => $post['inpketerangan'],
        ];
        $this->db->trans_start();
        $this->crud->u('tb_kecamatan', $data, ['id_kecamatan' => $post['inpidkecamatan']]);
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
            'id_kecamatan' => acak_id('tb_kecamatan', 'id_kecamatan'),
            'kd_kecamatan' => $post['inpkode'],
            'nama'         => $post['inpnama'],
            'luas_lahan'   => $post['inpluslan'],
            'url'          => $post['inpurl'],
            'latitude'     => $post['inplatitude'],
            'longitude'    => $post['inplongitude'],
            'keterangan'   => $post['inpketerangan'],
        ];
        $this->db->trans_start();
        $this->crud->i('tb_kecamatan', $data);
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
        $this->crud->d('tb_kecamatan', $post['id'], 'id_kecamatan');
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
