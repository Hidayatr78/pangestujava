<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Pengalaman_model;


class Experience extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
        $this->Pengalaman_model = new Pengalaman_model();
    }

    //Halaman utama Pengalaman
    public function index()
    {
        //load function model
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $pengalaman = $this->Pengalaman_model->listing();
        $data = array(
            'title'         => 'Experience',
            'web'           => 'PangestuJava',
            'jenis'         => 'Table Experience',
            'pengalaman'    => $pengalaman,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            // load view pengalaman
            'isi'           => 'iyan/experience/list',
        );
        //load view template
        return view('iyan/layout/wrapper', $data);
    }

    public function add()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $pengalaman = $this->Pengalaman_model->listing();
        if ($this->request->getMethod() == 'post') {
            $i              = $this->request;
            $data = array(
                'bidang'            => $i->getPost('bidang'),
                'institusi'         => $i->getPost('institusi'),
                'thn_masuk'         => $i->getPost('tahun'),
                'deskripsi'         => $i->getPost('deskripsi')
            );
            $this->Pengalaman_model->tambah($data);
            session()->setflashdata('pesan', 'Successfully Add Data');
            return redirect()->to(base_url('iyan/experience'));
        } else {
            $data['validation'] = $this->validator;
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Experience',
            'web'           => 'PangestuJava',
            'jenis'         => 'Add Experience',
            'pengalaman'       => $pengalaman,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/experience/add',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit($institusi)
    {
        $pengalaman = $this->Pengalaman_model->detail_data($institusi);
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        if ($this->request->getMethod() == 'post') {
            $i              = $this->request;
            $data = array(
                'id_pengalaman' => $i->getPost('id'),
                'bidang'        => $i->getPost('bidang'),
                'institusi'     => $i->getPost('institusi'),
                'thn_masuk'     => $i->getPost('tahun'),
                'deskripsi'     => $i->getPost('deskripsi')
            );
            $this->Pengalaman_model->edit($data);
            session()->setflashdata('pesan', 'Successfully Updated Data');
            return redirect()->to(base_url('iyan/experience'));
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Experience',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Experience: ' . $pengalaman['institusi'],
            'pengalaman'    => $pengalaman,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/experience/edit',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function delete($institusi)
    {
        $data = array(
            'institusi'     => $institusi
        );
        $this->Pengalaman_model->hapus($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/experience'));
    }
}
