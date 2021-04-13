<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;
use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;


class Biodata extends BaseController
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
        $konfigurasi = $this->Konfigurasi_model->listing();
        $biodata = $this->Biodata_model->listing();
        $id_biodata = $this->request->getPost('id');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar' => [
                    'rules'  => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,2000]|is_image[gambar]|max_dims[gambar,500,500]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 240x240'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $files = $this->request->getFiles();
                $path = "./upload/image/bio/";
                // $imageservice = \Config\Services::image();
                $file = $this->request->getFile('gambar');
                if (!empty($files['gambar'])) {
                    $user = $this->Biodata_model->detail_data($id_biodata);
                    if ($user['gambar'] != "") {
                        unlink('upload/image/bio/' . $user['gambar']);
                    }
                    foreach ($files['gambar'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file->move($path);
                            $fileName = $file->getName();
                            $data['gambar'] = $fileName;
                        }
                    }
                    $i              = $this->request;
                    $data = array(
                        'id_biodata'                    => $id_biodata,
                        'nama'                          => $i->getPost('nama'),
                        'panggilan'                     => $i->getPost('panggilan'),
                        'saya'                          => $i->getPost('about'),
                        'ahli'                          => $i->getPost('ahli'),
                        'alamat'                        => $i->getPost('alamat'),
                        'email'                         => $i->getPost('email'),
                        'telpon'                        => $i->getPost('telpon'),
                        'fb'                            => $i->getPost('fb'),
                        'ig'                            => $i->getPost('ig'),
                        'linked'                        => $i->getPost('linked'),
                        'github'                        => $i->getPost('github'),
                        'gambar'                        => $file->getName()
                    );
                } else {
                    $i              = $this->request;
                    $data = array(
                        'id_biodata'                    => $id_biodata,
                        'nama'                          => $i->getPost('nama'),
                        'panggilan'                     => $i->getPost('panggilan'),
                        'saya'                          => $i->getPost('about'),
                        'ahli'                          => $i->getPost('ahli'),
                        'alamat'                        => $i->getPost('alamat'),
                        'email'                         => $i->getPost('email'),
                        'telpon'                        => $i->getPost('telpon'),
                        'fb'                            => $i->getPost('fb'),
                        'ig'                            => $i->getPost('ig'),
                        'linked'                        => $i->getPost('linked'),
                        'github'                        => $i->getPost('github')
                    );
                }
                $this->Biodata_model->edit($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/biodata'));
            } else {
                $data['validation'] = $this->validator;
            }
        }
        $data = array(
            'title'         => 'Biodata',
            'web'           => 'PangestuJava',
            'jenis'         => 'Form Biodata',
            'biodata'       => $biodata,
            'konfigurasi'   => $konfigurasi,
            'isi'           => 'iyan/biodata/list'
        );
        return view('iyan/layout/wrapper', $data);
    }
}
