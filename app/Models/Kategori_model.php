<?php

namespace App\Models;

use CodeIgniter\Model;

class Kategori_model extends Model
{
    public function __construct()
    {
        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('kategori_project');
    }

    //Menampilkan Semua Isi Database
    public function listing()
    {
        return $this->db->table('kategori_project')
            ->get()->getResultArray();
    }

    //Untuk mengubah data/edit
    public function edit($data)
    {
        $this->db->table('kategori_project')->where('id_kategori', $data['id_kategori'])->update($data);
    }

    //Menampilkan detail kategori
    public function detail_data($nama_kategori)
    {
        return $this->db->table('kategori_project')
            ->where('nama_kategori', $nama_kategori)
            ->get()
            ->getRowArray();
    }

    //Hapus field database
    public function hapus($data)
    {
        $this->db->table('kategori_project')->where('nama_kategori', $data['nama_kategori'])->delete($data);
    }

    //Menambah field database
    public function tambah($data)
    {
        $this->db->table('kategori_project')->insert($data);
    }
}
