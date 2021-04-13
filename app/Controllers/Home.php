<?php

namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Keahlian_model;
use App\Models\Project_model;
use App\Models\Kontak_model;



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
	}

	public function index()
	{
		$biodata = $this->Biodata_model->listing();
		$project = $this->Project_model->listing();
		$konfigurasi = $this->Konfigurasi_model->listing();
		$keahlian = $this->Keahlian_model->listing();
		$data = array(
			'title'				=> $biodata['nama'] . ' | ' . $konfigurasi['tagline'],
			'web'          		=> 'Pangestu',
			'web2'				=> 'Java',
			'keywords'   		=> $konfigurasi['keywords'],
			'deskripsi'  		=> $konfigurasi['deskripsi'],
			'isi'        		=> 'home/list',
			'project'			=> $project,
			'keahlian'			=> $keahlian,
			'konfigurasi'       => $konfigurasi,
			'biodata'           => $biodata,
		);
		return view('layout/wrapper', $data);
	}

	// public function add()
	// {
	// 	$i              = $this->request;
	// 	$data = array(
	// 		// 'id_konfigurasi'             => $id_konfigurasi,
	// 		'nama'                    => $i->getPost('nama'),
	// 		'email'                   => $i->getPost('email'),
	// 		'pesan'                  => $i->getPost('kontak')
	// 	);
	// 	$this->Kontak_model->tambah($data);
	// 	session()->setflashdata('pesan', 'Successfully Submit Data');
	// 	return redirect()->to(base_url('/'));
	// }
}
