<?php

namespace App\Models;

use CodeIgniter\Model;

class Keahlian_model extends Model
{
    protected $table = "keahlian";
    protected $primaryKey = "id_keahlian";
    public function __construct()
    {
        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('keahlian');
    }

    //Menampilkan Semua Isi Database
    public function listing()
    {
        return $this->db->table('keahlian')
            ->orderBy('id_keahlian', 'DESC')
            ->get()->getResultArray();
    }

    //Untuk mengubah data/edit
    public function edit($data)
    {
        $this->db->table('keahlian')->where('id_keahlian', $data['id_keahlian'])->update($data);
    }

    //Menampilkan detail keahlian
    public function detail_data($nama_keahlian)
    {
        return $this->db->table('keahlian')
            ->where('nama_keahlian', $nama_keahlian)
            ->get()
            ->getRowArray();
    }

    //Hapus field database
    public function hapus($data)
    {
        $this->db->table('keahlian')->where('nama_keahlian', $data['nama_keahlian'])->delete($data);
    }

    //Menambah field database
    public function tambah($data)
    {
        $this->db->table('keahlian')->insert($data);
    }
}
