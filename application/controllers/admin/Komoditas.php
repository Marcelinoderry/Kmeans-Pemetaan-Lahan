<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Komoditas extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        // untuk load model
        $this->load->model('crud');
        $this->load->model('m_perkebunan');
        $this->load->model('m_kecamatan');
        $this->load->model('m_komoditas');
    }

    // untuk default
    public function index()
    {
        $data = [
            'halaman'    => 'Komoditas',
            'content'    => 'admin/komoditas/view',
            'css'        => 'admin/komoditas/css/view',
            'js'         => 'admin/komoditas/js/view',
            'kecamatan'  => $this->m_kecamatan->getAll(),
            'perkebunan' => $this->m_perkebunan->getAll(),
            'tahun'      => $this->m_komoditas->getYear(),
        ];

        $this->load->view('admin/base', $data);
    }

    // untuk get data serverside
    public function get_data_dt()
    {
        return $this->m_komoditas->getDataDt();
    }

    // untuk download format excel
    public function unduh()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $kolom = [
            'Id Kecamatan',
            'Kecamatan',
            'Kode Perkebunan',
            'Jenis Komoditi',
            'Tahun',
            'Jumlah (Ton)',
        ];

        $kode = [
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
        ];

        // begin:: head
        for ($i = 0; $i < count($kode); $i++) {
            $sheet->setCellValue("$kode[$i]1", $kolom[$i]);
            $sheet->getColumnDimension($kode[$i])->setAutoSize(true);
        }
        // end:: head

        // begin:: body
        $getKecamatan  = $this->m_kecamatan->getAll();   // untuk mengambil kecamatan
        $getPerkebunan = $this->m_perkebunan->getAll();  // untuk mengambil perkebunan

        for ($j = 0; $j < count($getKecamatan); $j++) {
            for ($k = 0; $k < count($getPerkebunan); $k++) {
                $results[] = [
                    'kd_kecamatan'  => $getKecamatan[$j]->kd_kecamatan,
                    'kecamatan'     => $getKecamatan[$j]->nama,
                    'kd_perkebunan' => $getPerkebunan[$k]->kd_perkebunan,
                    'perkebunan'    => $getPerkebunan[$k]->nama,
                ];
            }
        }

        $baris = 2;
        foreach ($results as $key => $value) {
            $sheet->setCellValue('A' . $baris, $value['kd_kecamatan']);
            $sheet->setCellValue('B' . $baris, $value['kecamatan']);
            $sheet->setCellValue('C' . $baris, $value['kd_perkebunan']);
            $sheet->setCellValue('D' . $baris, $value['perkebunan']);

            $baris++;
        }
        // end:: body

        $writer = new Xlsx($spreadsheet);
        $filename = 'format-laporan';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
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
            $kecamatan     = $sheetData[$i][0];
            $perkebunan    = $sheetData[$i][2];
            $tahun         = $sheetData[$i][4];
            $jumlah        = $sheetData[$i][5];

            $rKecamatan = $this->m_kecamatan->getWhere($kecamatan)->nama;
            $rPerkebunan = $this->m_perkebunan->getWhere($perkebunan)->nama;

            $data[] = [
                'kecamatan'     => $rKecamatan,
                'kd_kecamatan'  => $kecamatan,
                'perkebunan'    => $rPerkebunan,
                'kd_perkebunan' => $perkebunan,
                'tahun'         => $tahun,
                'jumlah'        => $jumlah
            ];
        }

        $response = ['data' => $data];

        // untuk response
        $this->_response($response);
    }

    // untuk simpan upload
    public function simpan()
    {
        $data = json_decode(stripslashes($_POST['data']));

        $this->db->trans_start();
        for ($i = 0; $i < count($data); $i++) {
            $kd_kecamatan  = $data[$i][0];
            $kd_perusahaan = $data[$i][1];
            $tahun         = $data[$i][2];
            $jumlah        = $data[$i][3];

            $insert = [
                'kd_kecamatan'  => $kd_kecamatan,
                'kd_perkebunan' => $kd_perusahaan,
                'tahun'         => $tahun,
                'jumlah'        => $jumlah
            ];

            // untuk simpan data
            $this->db->insert('tb_komoditas', $insert);
        }
        $this->db->trans_complete();

        if ($this->db->trans_status() === TRUE) {
            $response = ['status' => true, 'title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Ok!'];
        } else {
            $response = ['status' => false, 'title' => 'Gagal!', 'text' => 'Gagal Simpan!', 'type' => 'error', 'button' => 'Ok!'];
        }

        // untuk response
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
