<?php

namespace App\Models;

use CodeIgniter\Model;

class Kontak_model extends Model
{
    protected $table = "kontak";
    protected $primaryKey = "id_kontak";

    public function __construct()
    {

        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('kontak');
    }

    //Login user
    public function listing()
    {
        return $this->db->table('kontak')
            ->get()->getResultArray();
    }

    public function tambah($data)
    {
        $this->db->table('kontak')->insert($data);
    }

    //Hapus field database
    public function hapus($data)
    {
        $this->db->table('kontak')->where('id_kontak', $data['id_kontak'])->delete($data);
    }
}
