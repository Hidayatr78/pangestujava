<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;
use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;


class Configuration extends BaseController
{
    public function __construct()
    {
        helper('form', 'image_helper');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
    }

    //Halaman utama dasbor
    public function index()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $data = array(
            'web'           => 'PangestuJava',
            'jenis'         => 'Form Configuration',
            'title'         => 'Website Configuration',
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            // 'data'          => $this->Konfigurasi_model->listing(),
            'validation'    => $this->validator,
            'isi'           => 'iyan/configuration/list'
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit()
    {
        $id_konfigurasi = $this->request->getPost('id');
        $i              = $this->request;
        $data = array(
            'id_konfigurasi'             => $id_konfigurasi,
            'namaweb'                    => $i->getPost('namaweb'),
            'tagline'                    => $i->getPost('tagline'),
            'deskripsi'                  => $i->getPost('deskripsi'),
            'website'                    => $i->getPost('website'),
            'keywords'                   => $i->getPost('keywords'),
            'metatext'                   => $i->getPost('metatext'),
            'deskripsi'                  => $i->getPost('deskripsi')
        );
        $this->Konfigurasi_model->edit($data);
        session()->setflashdata('pesan', 'Successfully Updated Data');
        return redirect()->to(base_url('iyan/configuration'));
    }

    public function logo()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $data = array(
            'web'           => 'PangestuJava',
            'jenis'         => 'Form Configuration',
            'title'         => 'Logo Configuration',
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/configuration/logo',
            // 'validation'    => $this->validator,
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function ubah()
    {
        $id_konfigurasi = $this->request->getPost('id');
        $logo = $this->request->getPost('logo');
        //validasi
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'logo' => [
                    'label'  => 'Logo',
                    'rules'  => 'mime_in[logo,image/jpg,image/jpeg,image/png]|max_size[logo,2000]|is_image[logo]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 250x250'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $path = './upload/image/config/';
                $file = $this->request->getFile('logo');
                $i = $this->request;
                if ($file->getError()  == 4) {
                    $data = [
                        'id_konfigurasi'        => $id_konfigurasi,
                        'namaweb'               => $i->getPost('namaweb')
                    ];
                } else {
                    $user = $this->Konfigurasi_model->detail_data($id_konfigurasi);
                    if ($user['logo'] != "") {
                        unlink('upload/image/config/' . $user['logo']);
                    }
                    $file->move($path);
                    $data = [
                        'id_konfigurasi'        => $id_konfigurasi,
                        'namaweb'               => $i->getPost('namaweb'),
                        'logo'                  => $file->getName()
                    ];
                }
                $this->Konfigurasi_model->edit($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/configuration/logo'));
            } else {
                session()->setflashdata('errors', \config\Services::validation()->getErrors());
                return redirect()->to(base_url('iyan/configuration/logo'));
                //Jika tidak valid
            }
        }
    }
}
