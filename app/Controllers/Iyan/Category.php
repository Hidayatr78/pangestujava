<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Kategori_model;


class Category extends BaseController
{
       public function __construct()
       {
              helper('form');
              $this->Konfigurasi_model = new Konfigurasi_model();
              $this->Biodata_model = new Biodata_model();
              $this->Kategori_model = new Kategori_model();
       }

       //Halaman utama dasbor
       public function index()
       {
              $biodata = $this->Biodata_model->listing();
              $konfigurasi = $this->Konfigurasi_model->listing();
              $kategori = $this->Kategori_model->listing();
              $data = array(
                     'title'         => 'Category',
                     'web'           => 'PangestuJava',
                     'jenis'         => 'Table Category',
                     'kategori'      => $kategori,
                     'konfigurasi'   => $konfigurasi,
                     'biodata'       => $biodata,
                     'isi'           => 'iyan/category/list',
              );
              return view('iyan/layout/wrapper', $data);
       }

       public function add()
       {
              $biodata = $this->Biodata_model->listing();
              $konfigurasi = $this->Konfigurasi_model->listing();
              $kategori = $this->Kategori_model->listing();
              if ($this->request->getMethod() == 'post') {
                     $rules = [
                            'urutan' => [
                                   'urutan'  => 'is_unique[kategori_project.urutan]',
                                   'errors' => [
                                          'is_unique'  => 'Order already exists !!!',
                                   ]
                            ]
                     ];
                     if ($this->validate($rules)) {
                            $i              = $this->request;
                            $data = array(
                                   'nama_kategori' => $i->getPost('nama_kategori'),
                                   'urutan'        => $i->getPost('urutan'),
                            );
                            $this->Kategori_model->tambah($data);
                            session()->setflashdata('pesan', 'Successfully Add Data');
                            return redirect()->to(base_url('iyan/category'));
                     } else {
                            $data['validation'] = $this->validator;
                     }
              }
              //Jika tidak valid
              $data = array(
                     'title'         => 'Category',
                     'web'           => 'PangestuJava',
                     'jenis'         => 'Add Category',
                     'kategori'      => $kategori,
                     'konfigurasi'   => $konfigurasi,
                     'biodata'       => $biodata,
                     'isi'           => 'iyan/category/add',
                     'validation'    => $this->validator
              );
              return view('iyan/layout/wrapper', $data);
       }

       public function edit($nama_kategori)
       {
              $kategori = $this->Kategori_model->detail_data($nama_kategori);
              $biodata = $this->Biodata_model->listing();
              $konfigurasi = $this->Konfigurasi_model->listing();
              if ($this->request->getMethod() == 'post') {
                     $i              = $this->request;
                     $data = array(
                            'id_kategori'   => $i->getPost('id'),
                            'nama_kategori' => $i->getPost('nama_kategori'),
                            'urutan'        => $i->getPost('urutan')
                     );
                     $this->Kategori_model->edit($data);
                     session()->setflashdata('pesan', 'Successfully Updated Data');
                     return redirect()->to(base_url('iyan/category'));
              }
              //Jika tidak valid
              $data = array(
                     'title'         => 'Skill',
                     'web'           => 'PangestuJava',
                     'jenis'         => 'Edit Skill: ' . $kategori['nama_kategori'],
                     'kategori'      => $kategori,
                     'konfigurasi'   => $konfigurasi,
                     'biodata'       => $biodata,
                     'isi'           => 'iyan/category/edit',
                     'validation'    => $this->validator
              );
              return view('iyan/layout/wrapper', $data);
       }

       public function delete($nama_kategori)
       {
              $data = array(
                     // 'kategori'       => $kategori,
                     'nama_kategori'     => $nama_kategori
              );
              $this->Kategori_model->hapus($data);
              session()->setflashdata('pesan', 'Successfully Delete Data');
              return redirect()->to(base_url('iyan/category'));
       }
}
