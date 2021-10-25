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

    //Login user
    public function listing()
    {
        return $this->db->table('pengalaman')
            ->orderBy('id_pengalaman', 'DESC')
            ->get()->getResultArray();
    }
    public function listing2()
    {
        return $this->db->table('pengalaman')
            ->get()->getRowArray();
    }
    public function edit($data)
    {
        $this->db->table('pengalaman')->where('id_pengalaman', $data['id_pengalaman'])->update($data);
    }

    public function detail_data($deskripsi)
    {
        return $this->db->table('pengalaman')
            ->where('deskripsi', $deskripsi)
            ->get()
            ->getRowArray();
    }

    public function hapus($data)
    {
        $this->db->table('pengalaman')->where('deskripsi', $data['deskripsi'])->delete($data);
    }

    public function tambah($data)
    {
        $this->db->table('pengalaman')->insert($data);
    }
}
