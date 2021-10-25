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

    //Login user
    public function listing()
    {
        return $this->db->table('sekolah')
            ->orderBy('id_sekolah', 'DESC')
            ->get()->getResultArray();
    }
    public function listing2()
    {
        return $this->db->table('sekolah')
            ->get()->getRowArray();
    }
    public function edit($data)
    {
        $this->db->table('sekolah')->where('id_sekolah', $data['id_sekolah'])->update($data);
    }

    public function detail_data($deskripsi)
    {
        return $this->db->table('sekolah')
            ->where('deskripsi', $deskripsi)
            ->get()
            ->getRowArray();
    }

    public function hapus($data)
    {
        $this->db->table('sekolah')->where('deskripsi', $data['deskripsi'])->delete($data);
    }

    public function tambah($data)
    {
        $this->db->table('sekolah')->insert($data);
    }
}
