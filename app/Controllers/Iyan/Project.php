<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Project_model;


class Project extends BaseController
{
    public function __construct()
    {
        helper('form', 'image');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
        $this->Project_model = new Project_model();
    }

    //Halaman utama dasbor
    public function index()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $project = $this->Project_model->listing();
        $data = array(
            'title'         => 'Project',
            'web'           => 'PangestuJava',
            'jenis'         => 'Table Project',
            'project'       => $project,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/project/list'
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit($deskripsi_project)
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $project = $this->Project_model->detail_data2($deskripsi_project);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar_project' => [
                    'rules'  => 'mime_in[gambar_project,image/jpg,image/jpeg,image/png]|max_size[gambar_project,2000]|is_image[gambar_project]|max_dims[gambar_project,250,250]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 250x250'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $files = $this->request->getFiles();
                $path = "./upload/image/project/";
                $file = $this->request->getFile('gambar_project');
                if (!empty($files['gambar_project'])) {
                    $user = $this->Project_model->detail_data2($deskripsi_project);
                    if ($user['gambar_project'] != "") {
                        unlink('upload/image/project/' . $user['gambar_project']);
                    }
                    foreach ($files['gambar_project'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file->move($path);
                            $fileName = $file->getName();
                            $data['gambar_project'] = $fileName;
                        }
                    }
                    $i              = $this->request;
                    $data = array(
                        'id_project'           => $i->getPost('id'),
                        'nama_project'         => $i->getPost('nama_project'),
                        'deskripsi_project'    => $i->getPost('deskripsi'),
                        'gambar_project'      => $file->getName()
                    );
                } else {
                    $i              = $this->request;
                    $data = array(
                        'id_project'          => $i->getPost('id'),
                        'nama_project'        => $i->getPost('nama_project'),
                        'deskripsi_project'   => $i->getPost('deskripsi'),
                        'gambar_project'      => $i->getPost('2')
                    );
                }
                $this->Project_model->edit($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/project'));
            } else {
                $data['validation'] = $this->validator;
            }
        }     //Jika tidak valid
        $data = array(
            'title'         => 'Project',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Project: ' . $project['nama_project'],
            'project'      =>   $project,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/project/edit',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function image($id_project)
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $project = $this->Project_model->detail_data($id_project);
        $gambar = $this->Project_model->gambar($id_project);
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar_project' => [
                    'rules'  => 'mime_in[gambar_project,image/jpg,image/jpeg,image/png]|max_size[gambar_project,2000]|is_image[gambar_project]|max_dims[gambar_project,250,250]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 250x250'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $files = $this->request->getFiles();
                $path = "./upload/image/project/thumbs/";
                $file = $this->request->getFile('gambar_project');
                foreach ($files['gambar_project'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move($path);
                        $fileName = $file->getName();
                        $data['gambar_project'] = $fileName;
                    }
                }
                $i              = $this->request;
                $data = array(
                    'id_project'           => $id_project,
                    'judul_gambar'         => $i->getPost('judul_gambar'),
                    'gambar'               => $file->getName()
                );
                $this->Project_model->tambah_gambar($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/project/image/' . $id_project));
            } else {
                $data['validation'] = $this->validator;
            }
        }     //Jika tidak valid
        $data = array(
            'title'         => 'Project',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Image: ' . $project['nama_project'],
            'gambar'        => $gambar,
            'project'       => $project,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/project/image',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function delete($deskripsi_project, $id_project)
    {
        $user = $this->Project_model->detail_data2($deskripsi_project);
        $gambar = $this->Project_model->detail_data4($id_project);
        if ($user['gambar_project'] != "" && $gambar['gambar'] != "") {
            unlink('upload/image/project/' . $user['gambar_project']);
            unlink('upload/image/project/thumbs/' . $gambar['gambar']);
        }
        $data = array(
            // 'project'       => $project,
            'deskripsi_project'     => $deskripsi_project,
            'id_project'            => $id_project
        );
        $this->Project_model->hapus($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/project'));
    }

    public function delete_gambar($id_project, $id_gambar)
    {
        $user = $this->Project_model->detail_data3($id_gambar);
        if ($user['gambar'] != "") {
            unlink('upload/image/project/thumbs/' . $user['gambar']);
        }
        $data = array(
            // 'project'       => $project,
            'id_gambar'     => $id_gambar
        );
        $this->Project_model->delete_gambar($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/project/image/' . $id_project));
    }

    public function add()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $project = $this->Project_model->listing();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar_project' => [
                    'rules'  => 'mime_in[gambar_project,image/jpg,image/jpeg,image/png]|max_size[gambar_project,2000]|is_image[gambar_project]|max_dims[gambar_project,250,250]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 250x250'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $files = $this->request->getFiles();
                $path = "./upload/image/project/";
                $file = $this->request->getFile('gambar_project');
                if (!empty($files['gambar_project'])) {
                    foreach ($files['gambar_project'] as $file) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            $file->move($path);
                            $fileName = $file->getName();
                            $data['gambar_project'] = $fileName;
                        }
                    }
                    $i              = $this->request;
                    $data = array(
                        'nama_project'         => $i->getPost('nama_project'),
                        'deskripsi_project'    => $i->getPost('deskripsi'),
                        'gambar_project'      => $file->getName()
                    );
                } else {
                    $i              = $this->request;
                    $data = array(
                        'nama_project'        => $i->getPost('nama_project'),
                        'deskripsi_project'   => $i->getPost('deskripsi'),
                        'gambar_project'      => $i->getPost('2')
                    );
                }
                $this->Project_model->tambah($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/project'));
            } else {
                $data['validation'] = $this->validator;
            }
        }     //Jika tidak valid
        $data = array(
            'title'         => 'Project',
            'web'           => 'PangestuJava',
            'jenis'         => 'Add Project',
            'project'      => $project,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/project/add',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }
}
