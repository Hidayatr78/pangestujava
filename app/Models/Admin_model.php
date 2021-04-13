<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id_admin";

    public function __construct()
    {
        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('admin');
    }

    public function tambah($data)
    {
        $this->db->table('admin')->insert($data);
    }

    public function login($username, $password)
    {
        return $this->db->table('admin')->where([
            'username' => $username,
            'password' => MD5($password)
        ])->get()->getRowArray();
    }
}
