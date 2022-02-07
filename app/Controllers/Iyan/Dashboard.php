<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;

use App\Models\Biodata_model;


class Dashboard extends BaseController
{
    public function __construct()
    {
        helper('form', 'image');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
    }

    //Halaman utama dasbor
    public function index()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $data = array(
            'title'             => 'Dashboard',
            'web'               => 'PangestuJava',
            'jenis'             => 'Dashboard',
            'konfigurasi'       => $konfigurasi,
            'biodata'           => $biodata,
            'isi'               => 'iyan/dasbor/list'
        );
        return view('iyan/layout/wrapper', $data);
    }
}
