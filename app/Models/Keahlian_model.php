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

    //Login user
    public function listing()
    {
        return $this->db->table('keahlian')
            ->orderBy('id_keahlian', 'DESC')
            ->get()->getResultArray();
    }
    public function listing2()
    {
        return $this->db->table('keahlian')
            ->get()->getRowArray();
    }
    public function edit($data)
    {
        $this->db->table('keahlian')->where('id_keahlian', $data['id_keahlian'])->update($data);
    }

    public function detail_data($deskripsi)
    {
        return $this->db->table('keahlian')
            ->where('deskripsi', $deskripsi)
            ->get()
            ->getRowArray();
    }

    public function hapus($data)
    {
        $this->db->table('keahlian')->where('nama_keahlian', $data['nama_keahlian'])->delete($data);
    }

    public function tambah($data)
    {
        $this->db->table('keahlian')->insert($data);
    }
}
