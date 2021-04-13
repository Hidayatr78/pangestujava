<?php

namespace App\Controllers\Iyan;

use App\Controllers\BaseController;

use App\Models\Admin_model;

class Login extends BaseController
{
    // <?= ($validation->hasError('logo')) ? 'is-invalid' : '';

    public function __construct()
    {
        helper('form');
        $this->Admin_model = new Admin_model();
    }

    //Halaman utama dasbor
    public function index()
    {
        $data = array(
            'title'         => 'Login',
            'jenis'           => 'PangestuJava',
            'web'            => 'Pangestu',
            'web2'            => 'Java'
        );
        return view('iyan/login/list', $data);
    }

    public function cek_login()
    {
        //validasi
        if ($this->validate([
            'username' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Required !!!'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Required !!!'
                ]
            ]
        ])) {
            //Jika Valid
            // $enkripsi = \config\Services::encrypter();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek_login = $this->Admin_model->login($username, $password);
            if ($cek_login) {
                session()->set('log', true);
                session()->set('id_admin', $cek_login['id_admin'], true);
                session()->set('nama', $cek_login['nama']);
                session()->set('email', $cek_login['email']);
                session()->set('akses_level', $cek_login['akses_level']);
                session()->set('username', $cek_login['username']);
                session()->set('gambar', $cek_login['gambar']);
                //login
                return redirect()->to(base_url('iyan/dashboard'));
            } else {
                //Jika gagal
                session()->setflashdata('pesan', 'Login Failed, Incorrect Username or Password');
                return redirect()->to(base_url('iyan/login'));
            }
        } else {
            //Jika tidak valid
            session()->setflashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('iyan/login'));
        }
    }

    public function logout()
    {

        // session()->destroy();
        session()->remove('log');
        session()->remove('id_admin');
        session()->remove('nama');
        session()->remove('email');
        session()->remove('username');
        session()->remove('gambar');
        session()->remove('akses_level');
        session()->setflashdata('sukses', 'Logout Success');
        return redirect()->to(base_url('iyan/login'));
    }
}
