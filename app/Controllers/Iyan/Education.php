<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Sekolah_model;


class Education extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
        $this->Sekolah_model = new Sekolah_model();
    }

    //Halaman utama dasbor
    public function index()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $sekolah = $this->Sekolah_model->listing();
        $data = array(
            'title'         => 'Education',
            'web'           => 'PangestuJava',
            'jenis'         => 'Table Education',
            'sekolah'       => $sekolah,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/education/list',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function add()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $sekolah = $this->Sekolah_model->listing();
        if ($this->request->getMethod() == 'post') {
            $i              = $this->request;
            $data = $this->request->getPost('id_sekolah');
            $data = array(
                'nama_sekolah'        => $i->getPost('nama_sekolah'),
                'jurusan'             => $i->getPost('jurusan'),
                'rata'                => $i->getPost('rata'),
                'tahun'               => $i->getPost('tahun'),
                'deskripsi'           => $i->getPost('deskripsi')
            );
            $this->Sekolah_model->tambah($data);
            session()->setflashdata('pesan', 'Successfully Add Data');
            return redirect()->to(base_url('iyan/education'));
        } else {
            $data['validation'] = $this->validator;
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Education',
            'web'           => 'PangestuJava',
            'jenis'         => 'Add Education',
            'sekolah'       => $sekolah,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/education/add',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit($nama_sekolah)
    {
        $sekolah = $this->Sekolah_model->detail_data($nama_sekolah);
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        if ($this->request->getMethod() == 'post') {
            $i              = $this->request;
            $data = array(
                'id_sekolah'    => $i->getPost('id'),
                'nama_sekolah'  => $i->getPost('nama_sekolah'),
                'jurusan'       => $i->getPost('jurusan'),
                'rata'          => $i->getPost('rata'),
                'tahun'         => $i->getPost('tahun'),
                'deskripsi'     => $i->getPost('deskripsi')
            );
            $this->Sekolah_model->edit($data);
            session()->setflashdata('pesan', 'Successfully Updated Data');
            return redirect()->to(base_url('iyan/education'));
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Education',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Education: ' . $sekolah['nama_sekolah'],
            'sekolah'       => $sekolah,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/education/edit',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function delete($nama_sekolah)
    {
        $data = array(
            // 'sekolah'       => $sekolah,
            'nama_sekolah'     => $nama_sekolah
        );
        $this->Sekolah_model->hapus($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/education'));
    }
}
