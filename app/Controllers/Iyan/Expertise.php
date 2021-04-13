<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Keahlian_model;


class Expertise extends BaseController
{
    public function __construct()
    {
        helper('form', 'image');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
        $this->Keahlian_model = new Keahlian_model();
    }

    //Halaman utama dasbor
    public function index()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $keahlian = $this->Keahlian_model->listing();
        $data = array(
            'title'         => 'Expertise',
            'web'           => 'PangestuJava',
            'jenis'         => 'Table Expertise',
            'keahlian'      => $keahlian,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/expertise/list',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit($deskripsi_keahlian)
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $keahlian = $this->Keahlian_model->detail_data($deskripsi_keahlian);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar_keahlian' => [
                    'rules'  => 'mime_in[gambar_keahlian,image/jpg,image/jpeg,image/png]|max_size[gambar_keahlian,2000]|is_image[gambar_keahlian]|max_dims[gambar_keahlian,250,250]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 250x250'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $files = $this->request->getFiles();
                $path = "./upload/image/expertise/";
                $file = $this->request->getFile('gambar_keahlian');
                if (!empty($files['gambar_keahlian'])) {
                    if ($keahlian['gambar_keahlian'] != "") {
                        unlink('upload/image/expertise/' . $keahlian['gambar_keahlian']);
                    }
                    foreach ($files['gambar_keahlian'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file->move($path);
                            $fileName = $file->getName();
                            $data['gambar_keahlian'] = $fileName;
                        }
                    }
                    $i              = $this->request;
                    $data = array(
                        'id_keahlian'           => $i->getPost('id'),
                        'nama_keahlian'         => $i->getPost('nama_keahlian'),
                        'deskripsi_keahlian'    => $i->getPost('deskripsi'),
                        'gambar_keahlian'      => $file->getName()
                    );
                } else {
                    $i              = $this->request;
                    $data = array(
                        'id_keahlian'          => $i->getPost('id'),
                        'nama_keahlian'        => $i->getPost('nama_keahlian'),
                        'deskripsi_keahlian'   => $i->getPost('deskripsi'),
                        'gambar_keahlian'      => $i->getPost('2')
                    );
                }
                $this->Keahlian_model->edit($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/expertise'));
            } else {
                $data['validation'] = $this->validator;
            }
        }     //Jika tidak valid
        $data = array(
            'title'         => 'Expertise',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Expertise: ' . $keahlian['nama_keahlian'],
            'keahlian'      => $keahlian,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/expertise/edit',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function delete($deskripsi_keahlian)
    {
        $user = $this->Keahlian_model->detail_data($deskripsi_keahlian);
        if ($user['gambar_keahlian'] != "") {
            unlink('upload/image/expertise/' . $user['gambar_keahlian']);
        }
        $data = array(
            // 'keahlian'       => $keahlian,
            'deskripsi_keahlian'     => $deskripsi_keahlian
        );
        $this->Keahlian_model->hapus($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/expertise'));
    }

    public function add()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $keahlian = $this->Keahlian_model->listing();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar_keahlian' => [
                    'rules'  => 'mime_in[gambar_keahlian,image/jpg,image/jpeg,image/png]|max_size[gambar_keahlian,2000]|is_image[gambar_keahlian]|max_dims[gambar_keahlian,250,250]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 250x250'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $files = $this->request->getFiles();
                $path = "./upload/image/expertise/";
                $file = $this->request->getFile('gambar_keahlian');
                if (!empty($files['gambar_keahlian'])) {
                    foreach ($files['gambar_keahlian'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file->move($path);
                            $fileName = $file->getName();
                            $data['gambar_keahlian'] = $fileName;
                        }
                    }
                    $i              = $this->request;
                    $data = array(
                        'nama_keahlian'         => $i->getPost('nama_keahlian'),
                        'deskripsi_keahlian'    => $i->getPost('deskripsi'),
                        'gambar_keahlian'      => $file->getName()
                    );
                } else {
                    $i              = $this->request;
                    $data = array(
                        'nama_keahlian'        => $i->getPost('nama_keahlian'),
                        'deskripsi_keahlian'   => $i->getPost('deskripsi'),
                        'gambar_keahlian'      => $i->getPost('2')
                    );
                }
                $this->Keahlian_model->tambah($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/expertise'));
            } else {
                $data['validation'] = $this->validator;
            }
        }     //Jika tidak valid
        $data = array(
            'title'         => 'Expertise',
            'web'           => 'PangestuJava',
            'jenis'         => 'Add Expertise',
            'keahlian'      => $keahlian,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/expertise/add',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }
}
