<?php

namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Keahlian_model;
use App\Models\Project_model;
use App\Models\Kontak_model;
use App\Models\Sekolah_model;
use App\Models\Pengalaman_model;



class Home extends BaseController
{
	public function __construct()
	{
		helper('form', 'image');
		$this->Konfigurasi_model = new Konfigurasi_model();
		$this->Biodata_model = new Biodata_model();
		$this->Keahlian_model = new Keahlian_model();
		$this->Project_model = new Project_model();
		$this->Kontak_model = new Kontak_model();
		$this->Sekolah_model = new Sekolah_model();
		$this->Pengalaman_model = new Pengalaman_model();
	}

	public function index()
	{
		$biodata = $this->Biodata_model->listing();
		$sekolah = $this->Sekolah_model->listing();
		$pengalaman = $this->Pengalaman_model->listing();
		// $project = $this->Project_model->listing();
		$konfigurasi = $this->Konfigurasi_model->listing();
		$keahlian = $this->Keahlian_model->listing();
		$data = array(
			'title'		=> $biodata['nama'] . ' | ' . $konfigurasi['tagline'],
			'web'          	=> 'Pangestu',
			'web2'			=> 'Java',
			'keywords'   		=> $konfigurasi['keywords'],
			'deskripsi'  		=> $konfigurasi['deskripsi'],
			'isi'        		=> 'home/list',
			// 'project'		=> $project,
			'keahlian'		=> $keahlian,
			'konfigurasi'        => $konfigurasi,
			'biodata'            => $biodata,
			'sekolah'            => $sekolah,
			'pengalaman'		=> $pengalaman
		);
		return view('layout/wrapper', $data);
	}
}
