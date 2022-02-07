<?php

namespace App\Models;

use CodeIgniter\Model;

class Sekolah_model extends Model
{
    protected $table = "sekolah";
    protected $primaryKey = "id_sekolah";

    public function __construct()
    {

        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('sekolah');
    }

    //Menampilkan Semua Isi Database
    public function listing()
    {
        return $this->db->table('sekolah')
            ->orderBy('id_sekolah', 'DESC')
            ->get()->getResultArray();
    }

    //Untuk mengubah data/edit
    public function edit($data)
    {
        $this->db->table('sekolah')->where('id_sekolah', $data['id_sekolah'])->update($data);
    }

    public function detail_data($nama_sekolah)
    {
        return $this->db->table('sekolah')
            ->where('nama_sekolah', $nama_sekolah)
            ->get()
            ->getRowArray();
    }

    public function hapus($data)
    {
        $this->db->table('sekolah')->where('nama_sekolah', $data['nama_sekolah'])->delete($data);
    }

    public function tambah($data)
    {
        $this->db->table('sekolah')->insert($data);
    }
}
