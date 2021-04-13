<?php

namespace App\Models;

use CodeIgniter\Model;

class Konfigurasi_model extends Model
{
    protected $table = "konfigurasi";
    protected $primaryKey = "id_konfigurasi";

    public function __construct()
    {

        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('konfigurasi');
    }

    //Login user
    public function listing()
    {
        return $this->db->table('konfigurasi')
            ->get()->getRowArray();
    }

    public function detail_data($id_konfigurasi)
    {
        return $this->db->table('konfigurasi')
            ->where('id_konfigurasi', $id_konfigurasi)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('konfigurasi')->where('id_konfigurasi', $data['id_konfigurasi'])->update($data);
    }
}
