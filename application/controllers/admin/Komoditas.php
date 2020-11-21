<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Komoditas extends MY_Controller
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
            'halaman' => 'Komoditas',
            'content' => 'admin/komoditas/view',
            'data'    => $this->m_perkebunan->getAll(),
            'css'     => 'admin/komoditas/css/view',
            'js'      => 'admin/komoditas/js/view'
        ];

        $this->load->view('admin/base', $data);
    }
    
    // untuk tampilan unggah
    public function unggah()
    {
        $data = [
            'halaman' => 'Unggah',
            'content' => 'admin/komoditas/unggah',
            'css'     => 'admin/komoditas/css/unggah',
            'js'      => 'admin/komoditas/js/unggah'
        ];

        $this->load->view('admin/base', $data);
    }

    // untuk proses upload
    public function upload()
    {
        $filePath    = $_FILES['inpfile']['tmp_name'];
        $excel       = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $excel->load($filePath);
        $sheetData   = $spreadsheet->getActiveSheet()->toArray();

        for ($i = 1; $i < count($sheetData); $i++) {
            $kecamatan  = $sheetData[$i][0];
            $perkebunan = $sheetData[$i][1];
            $bulan      = $sheetData[$i][2];
            $tahun      = $sheetData[$i][3];
            $hasil      = $sheetData[$i][4];

            $data[] = [
                'kecamatan'  => $kecamatan,
                'perkebunan' => $perkebunan,
                'bulan'      => $bulan,
                'tahun'      => $tahun,
                'hasil'      => $hasil
            ];
        }

        $response = ['data' => $data];
        
        $this->_response($response);
    }

    // untuk get data by id
    public function get()
    {
        $post   = $this->input->post(NULL, TRUE);
        $result = $this->crud->gda('tb_perkebunan', ['id_perkebunan' => $post['id']]);

        $data = [
            'id_perkebunan' => $result['id_perkebunan'],
            'nama'          => $result['nama'],
        ];

        // untuk reponse
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

        // untuk reponse
        $this->_response($response);
    }

    // untuk tambah data
    public function add()
    {
        $post = $this->input->post(NULL, TRUE);

        $data = [
            'id_perkebunan' => acak_id('tb_perkebunan', 'id_perkebunan'),
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

        // untuk reponse
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

        // untuk reponse
        $this->_response($response);
    }
}
