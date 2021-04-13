<?php

namespace App\Models;

use CodeIgniter\Model;

class Biodata_model extends Model
{
    protected $table = "biodata";
    protected $primaryKey = "id_biodata";

    public function __construct()
    {

        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('biodata');
    }

    //Login user
    public function listing()
    {
        return $this->db->table('biodata')
            ->get()->getRowArray();
    }

    public function detail_data($id_biodata)
    {
        return $this->db->table('biodata')
            ->where('id_biodata', $id_biodata)
            ->get()->getRowArray();
    }

    public function edit($data)
    {
        $this->db->table('biodata')->where('id_biodata', $data['id_biodata'])->update($data);
    }
}
