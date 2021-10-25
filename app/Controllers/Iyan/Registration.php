<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Admin_model;

class Registration extends BaseController
{
	public function __construct()
	{
		helper('form', 'image');
		$this->Admin_model = new Admin_model();
	}

	public function index()
	{
		if ($this->request->getMethod() == 'post') {
			$files = $this->request->getFiles();
			$path = "./upload/image/";
			// $imageservice = \Config\Services::image();
			$file = $this->request->getFile('gambar');
			$rules = [
				'username' => [
					'rules'  => 'is_unique[admin.username]|required',
					'errors' => [
						'is_unique'		=> 'Already Used !!!',
						'required'		=> 'Must Be Filled !!!'
					]
				],
				'password' => [
					'rules'  => 'required',
					'errors' => [
						'required'		=> 'Must Be Filled !!!'
					]
				],
				'nama' => [
					'rules'  => 'required',
					'errors' => [
						'required'		=> 'Must Be Filled !!!'
					]
				],
				'lahir' => [
					'rules'  => 'required',
					'errors' => [
						'required'		=> 'Must Be Filled !!!'
					]
				],
				'gambar' => [
					'rules'  => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1000]|is_image[gambar]',
					'errors' => [
						'mime_in'  => 'Not a Picture !!!',
						'max_size' => 'Oversize, Max 1 Mb!!!',
						'is_image' => 'Not a Picture !!!'
					]
				]
			];
			if ($this->validate($rules)) {
				foreach ($files['gambar'] as $file) {
					if ($file->isValid() && !$file->hasMoved()) {
						$file->move($path);
						$fileName = $file->getName();
						$data['gambar'] = $fileName;
					}
				}
				$i              = $this->request;
				$data = array(
					'nama'                    => $i->getPost('nama'),
					'email'                   => $i->getPost('email'),
					'username'                => $i->getPost('username'),
					'password'                => MD5($i->getPost('password')),
					'tanggal_lahir'           => $i->getPost('lahir'),
					'gambar'                  => $file->getName()
				);
				$this->Admin_model->tambah($data);
				session()->setflashdata('pesan', 'Successfully Registered');
				return redirect()->to(base_url('iyan/login'));
			} else {
				$data['validation'] = $this->validator;
			}
		}
		$data = array(
			'title'   		=> 'Registration',
			'jenis'   		=> 'Admin Registration',
			'validation'    => $this->validator,
			'nama'    		=> 'Pangestu',
			'nama2'   		=> 'Java'
		);
		return view('iyan/daftar/wrapper', $data);
	}
}
