<?php

namespace App\Controllers;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Keahlian_model;
use App\Models\Project_model;
use App\Models\Kontak_model;
use App\Models\Sekolah_model;
use App\Models\Pengalaman_model;
use App\Models\Kategori_model;


class Home extends BaseController
{
	public function __construct()
	{
		helper('form', 'image');
		$this->Konfigurasi_model = new Konfigurasi_model();
		$this->Biodata_model = new Biodata_model();
		$this->Kontak_model = new Kontak_model();
		$this->Project_model = new Project_model();
		$this->Keahlian_model = new Keahlian_model();
		$this->Sekolah_model = new Sekolah_model();
		$this->Pengalaman_model = new Pengalaman_model();
		$this->Kategori_model = new Kategori_model();
	}

	public function index()
	{
		$biodata = $this->Biodata_model->listing();
		$kategori = $this->Kategori_model->listing();
		$sekolah = $this->Sekolah_model->listing();
		$pengalaman = $this->Pengalaman_model->listing();
		// $project2 = $this->Project_model->listing2();
		$project = $this->Project_model->listing();
		$konfigurasi = $this->Konfigurasi_model->listing();
		$keahlian = $this->Keahlian_model->listing();

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'email' => [
					'email'  => 'required',
					'errors' => [
						'required'  => 'Not Null !!!',
					]
				]
			];
			if ($this->validate($rules)) {
				$i              = $this->request;
				$data = array(
					'nama' => $i->getPost('name'),
					'email'          => $i->getPost('email'),
					'subyek'         => $i->getPost('subject'),
					'pesan'          => $i->getPost('message')
				);
				$this->Kontak_model->tambah($data);
				session()->setflashdata('pesan', 'Successfully Sending Message');
				return redirect()->to(base_url('home'));
			} else {
				$data['validation'] = $this->validator;
			}
		}
		$data = array(
			'title'		=> $biodata['nama'] . ' | ' . $konfigurasi['tagline'],
			'web'          	=> 'Pangestu',
			'web2'			=> 'Java',
			'keywords'   		=> $konfigurasi['keywords'],
			'deskripsi'  		=> $konfigurasi['deskripsi'],
			'isi'        		=> 'home/list',
			// 'project2'		=> $project2,
			'project'		=> $project,
			'kategori'		=> $kategori,
			'keahlian'		=> $keahlian,
			'konfigurasi'        => $konfigurasi,
			'biodata'            => $biodata,
			'validation'    => $this->validator,
			'sekolah'            => $sekolah,
			'pengalaman'		=> $pengalaman
		);
		return view('layout/wrapper', $data);
	}
}
