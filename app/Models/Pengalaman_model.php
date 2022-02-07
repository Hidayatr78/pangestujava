<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengalaman_model extends Model
{
    protected $table = "pengalaman";
    protected $primaryKey = "id_pengalaman";

    public function __construct()
    {

        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('pengalaman');
    }

    //Menampilkan Semua Isi Database
    public function listing()
    {
        return $this->db->table('pengalaman')
            ->orderBy('id_pengalaman', 'DESC')
            ->get()->getResultArray();
    }

    //Untuk mengubah data/edit
    public function edit($data)
    {
        $this->db->table('pengalaman')->where('id_pengalaman', $data['id_pengalaman'])->update($data);
    }

    public function detail_data($institusi)
    {
        return $this->db->table('pengalaman')
            ->where('institusi', $institusi)
            ->get()
            ->getRowArray();
    }

    public function hapus($data)
    {
        $this->db->table('pengalaman')->where('institusi', $data['institusi'])->delete($data);
    }

    public function tambah($data)
    {
        $this->db->table('pengalaman')->insert($data);
    }
}
