<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Konfigurasi_model;
use App\Models\Biodata_model;
use App\Models\Project_model;
use App\Models\Kategori_model;


class Project extends BaseController
{
    public function __construct()
    {
        helper('form', 'image');
        $this->Konfigurasi_model = new Konfigurasi_model();
        $this->Biodata_model = new Biodata_model();
        $this->Project_model = new Project_model();
        $this->Kategori_model = new kategori_model();
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

    public function add()
    {
        $biodata = $this->Biodata_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $kategori = $this->Kategori_model->listing();
        $project = $this->Project_model->listing();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'gambar_project' => [
                    'rules'  => 'mime_in[gambar_project,image/jpg,image/jpeg,image/png]|max_size[gambar_project,2000]|is_image[gambar_project]',
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
                foreach ($files['gambar_project'] as $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move($path);
                        $fileName = $file->getName();
                        $data['gambar_project'] = $fileName;
                    }
                }
                $i              = $this->request;
                $data = array(
                    'id_kategori'          => $i->getPost('id_kategori'),
                    'nama_project'         => $i->getPost('nama_project'),
                    'link_project'         => $i->getPost('link_project'),
                    'gambar_project'       => $file->getName()
                );
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
            'project'       => $project,
            'kategori'      => $kategori,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/project/add',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function edit($id_project)
    {
        $project     = $this->Project_model->detail_data($id_project);
        $biodata     = $this->Biodata_model->listing();
        $kategori    = $this->Kategori_model->listing();
        $konfigurasi = $this->Konfigurasi_model->listing();
        $i           = $this->request;
        if ($this->request->getMethod() == 'post') {
            //validasion
            $rules = [
                'gambar' => [
                    'label'  => 'gambar',
                    'rules'  => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,40000]|is_image[gambar]|max_dims[gambar,2000,2000]',
                    'errors' => [
                        'mime_in'  => 'Not a Picture !!!',
                        'max_size' => 'Oversize !!!',
                        'is_image' => 'Not a Picture !!!',
                        'max_dims' => 'Height and Width Exceeding 1000 X 1000'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                //penyimpanan file gambar
                $path = "./upload/image/bio/";
                $file = $this->request->getFile('gambar');
                if ($file->getError() == 4) {
                    $data = array(
                        'id_project'    => $i->getPost('id'),
                        'id_kategori'   => $i->getPost('id_kategori'),
                        'nama_project'  => $i->getPost('nama_project'),
                        'link_project'  => $i->getPost('link_project')
                    );
                } else {
                    //memasukan data ke database dengan gambar
                    $file = $this->request->getFile('gambar');
                    $user = $this->Biodata_model->detail_data($i->getPost('id'));
                    if ($user['gambar'] != "") {
                        //hapus gambar sebelumnya
                        unlink('upload/image/bio/' . $user['gambar']);
                    }
                    $file->move($path);
                    $fileName = $file->getName();
                    $data['gambar'] = $fileName;
                    $data = array(
                        'id_kategori'   => $i->getPost('id_kategori'),
                        'nama_project'  => $i->getPost('nama_project'),
                        'link_project'  => $i->getPost('link_project'),
                        'gambar'        => $file->getName()
                    );
                }
                $this->Project_model->edit($data);
                session()->setflashdata('pesan', 'Successfully Updated Data');
                return redirect()->to(base_url('iyan/project'));
            } else {
                $data['validation'] = $this->validator;
            }
        }
        //Jika tidak valid
        $data = array(
            'title'         => 'Skill',
            'web'           => 'PangestuJava',
            'jenis'         => 'Edit Skill: ' . $project['nama_project'],
            'project'       => $project,
            'kategori'      => $kategori,
            'konfigurasi'   => $konfigurasi,
            'biodata'       => $biodata,
            'isi'           => 'iyan/project/edit',
            'validation'    => $this->validator
        );
        return view('iyan/layout/wrapper', $data);
    }

    public function delete($id_project)
    {
        $user = $this->Project_model->detail_data($id_project);
        if ($user['gambar_project'] != "") {
            unlink('upload/image/project/' . $user['gambar_project']);
        }
        $data = array(
            'id_project'     => $id_project
        );
        $this->Project_model->hapus($data);
        session()->setflashdata('pesan', 'Successfully Delete Data');
        return redirect()->to(base_url('iyan/project'));
    }

    // public function image($id_project)
    // {
    //     $biodata = $this->Biodata_model->listing();
    //     $konfigurasi = $this->Konfigurasi_model->listing();
    //     $project     = $this->Project_model->detail_data($id_project);
    //     $gambar = $this->Project_model->gambar($id_project);
    //     if ($this->request->getMethod() == 'post') {
    //         $rules = [
    //             'gambar_project' => [
    //                 'rules'  => 'mime_in[gambar_project,image/jpg,image/jpeg,image/png]|max_size[gambar_project,2000]|is_image[gambar_project]|max_dims[gambar_project,10000,10000]',
    //                 'errors' => [
    //                     'mime_in'  => 'Not a Picture !!!',
    //                     'max_size' => 'Oversize !!!',
    //                     'is_image' => 'Not a Picture !!!',
    //                     'max_dims' => 'Height and Width Exceeding 250x250'
    //                 ]
    //             ]
    //         ];
    //         if ($this->validate($rules)) {
    //             $files = $this->request->getFiles();
    //             $path = "./upload/image/project/thumbs/";
    //             $file = $this->request->getFile('gambar_project');
    //             foreach ($files['gambar_project'] as $file) {
    //                 if ($file->isValid() && !$file->hasMoved()) {
    //                     $file->move($path);
    //                     $fileName = $file->getName();
    //                     $data['gambar_project'] = $fileName;
    //                 }
    //             }
    //             $i              = $this->request;
    //             $data = array(
    //                 'id_project'           => $i->getPost('id'),
    //                 'judul_gambar'         => $i->getPost('judul_gambar'),
    //                 'gambar'               => $file->getName()
    //             );
    //             $this->Project_model->tambah_gambar($data);
    //             session()->setflashdata('pesan', 'Successfully Updated Data');
    //             return redirect()->to(base_url('iyan/project/image/' . $id_project));
    //         } else {
    //             $data['validation'] = $this->validator;
    //         }
    //     }     //Jika tidak valid
    //     $data = array(
    //         'title'         => 'Project',
    //         'web'           => 'PangestuJava',
    //         'jenis'         => 'Edit Image: ' . $project['nama_project'],
    //         'gambar'        => $gambar,
    //         'project'       => $project,
    //         'konfigurasi'   => $konfigurasi,
    //         'biodata'       => $biodata,
    //         'isi'           => 'iyan/project/image',
    //         'validation'    => $this->validator
    //     );
    //     return view('iyan/layout/wrapper', $data);
    // }

    // public function delete_gambar($id_project, $id_gambar)
    // {
    //     $user = $this->Project_model->detail_data2($id_gambar);
    //     if ($user['gambar'] != "") {
    //         unlink('upload/image/project/thumbs/' . $user['gambar']);
    //     }
    //     $data = array(
    //         'id_gambar'     => $id_gambar
    //     );
    //     $this->Project_model->delete_gambar($data);
    //     session()->setflashdata('pesan', 'Successfully Delete Data');
    //     return redirect()->to(base_url('iyan/project/image/' . $id_project));
    // }
}
