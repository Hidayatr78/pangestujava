<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Keahlian_model;


class Skill extends BaseController
{
    public function __construct()
    {
        helper('form');
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
            'title'         => 'Skill',
            'web'           => 'PangestuJava',
            'jenis'         => 'Table Skill',
            'keahlian'      => $keahlian,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/skill/list',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function add()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $keahlian = $this->Keahlian_model->listing();
        if ($this->request->getMethod() == 'post') {
            $i              = $this->request;
            $data = array(
                'nama_keahlian' => $i->getPost('nama_keahlian'),
                'ahli'          => $i->getPost('ahli'),
                'skor'          => $i->getPost('skor')
            );
            $this->Keahlian_model->tambah($data);
            session()->setflashdata('pesan', 'Successfully Add Data');
            return redirect()->to(base_url('iyan/skill'));
        } else {
            $data['validation'] = $this->validator;
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Skill',
            'web'           => 'PangestuJava',
            'jenis'         => 'Add Skill',
            'keahlian'       => $keahlian,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/skill/add',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit($deskripsi)
    {
        $keahlian = $this->Keahlian_model->detail_data($deskripsi);
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        if ($this->request->getMethod() == 'post') {
            $i              = $this->request;
            $data = array(
                'id_keahlian'     => $i->getPost('id_keahlian'),
                'bidang'            => $i->getPost('bidang'),
                'institusi'         => $i->getPost('institusi'),
                'thn_masuk'         => $i->getPost('tahun'),
                'deskripsi'         => $i->getPost('deskripsi')
            );
            $this->Keahlian_model->edit($data);
            session()->setflashdata('pesan', 'Successfully Updated Data');
            return redirect()->to(base_url('iyan/skill'));
        } else {
            $data['validation'] = $this->validator;
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Skill',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Skill: ' . $keahlian['institusi'],
            'keahlian'       => $keahlian,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/skill/edit',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function delete($nama_keahlian)
    {
        $data = array(
            // 'keahlian'       => $keahlian,
            'nama_keahlian'     => $nama_keahlian
        );
        $this->Keahlian_model->hapus($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/skill'));
    }
}
