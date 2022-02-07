<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Kontak_model;


class Contact extends BaseController
{
       public function __construct()
       {
              helper('form');
              $this->Konfigurasi_model = new Konfigurasi_model();
              $this->Biodata_model = new Biodata_model();
              $this->Kontak_model = new Kontak_model();
       }

       //Halaman utama dasbor
       public function index()
       {
              $biodata = $this->Biodata_model->listing();
              $konfigurasi = $this->Konfigurasi_model->listing();
              $kontak = $this->Kontak_model->listing();
              $data = array(
                     'title'         => 'Contact',
                     'web'           => 'PangestuJava',
                     'jenis'         => 'Table Contact',
                     'kontak'      => $kontak,
                     'konfigurasi'   => $konfigurasi,
                     'biodata'       => $biodata,
                     'isi'           => 'iyan/contact/list',
              );
              return view('iyan/layout/wrapper', $data);
       }

       public function delete($id_kontak)
       {
              $data = array(
                     'id_kontak'     => $id_kontak
              );
              $this->Kontak_model->hapus($data);
              session()->setflashdata('pesan', 'Successfully Delete Data');
              return redirect()->to(base_url('iyan/contact'));
       }
}
