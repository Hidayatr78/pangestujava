<?php

namespace App\Models;

use CodeIgniter\Model;

class Project_model extends Model
{
    protected $table = "project";
    protected $primaryKey = "id_project";

    public function __construct()
    {

        parent::__construct();
        // $db = \Config\Database::connect();
        $this->table = $this->db->table('project');
        $this->table = $this->db->table('gambar');
    }

    //Login user
    public function listing()
    {
        return $this->db->table('project')
            ->join('kategori_project', 'kategori_project.id_kategori = project.id_kategori', 'left')
            ->orderBy('id_project', 'DESC')
            ->get()->getResultArray();
    }

    public function listing2()
    {
        return $this->db->table('gambar')
            ->join('project', 'project.id_project = gambar.id_project', 'left')
            ->orderBy('id_gambar', 'DESC')
            ->get()->getResultArray();
    }

    public function edit($data)
    {
        $this->db->table('project')->where('id_project', $data['id_project'])->update($data);
    }

    public function detail_data($id_project)
    {
        return $this->db->table('project')
            ->join('kategori_project', 'kategori_project.id_kategori = project.id_kategori', 'left')
            ->where('id_project', $id_project)
            ->get()
            ->getRowArray();
    }

    public function detail_data2($id_gambar)
    {
        return $this->db->table('gambar')
            ->where('id_gambar', $id_gambar)
            ->get()
            ->getRowArray();
    }

    public function hapus($data)
    {
        $this->db->table('project')->where('id_project', $data['id_project'])->delete($data);
    }

    public function delete_gambar($data)
    {
        $this->db->table('gambar')->where('id_gambar', $data['id_gambar'])->delete($data);
    }

    public function tambah($data)
    {
        $this->db->table('project')->insert($data);
    }

    public function tambah_gambar($data)
    {
        $this->db->table('gambar')->insert($data);
    }

    public function gambar($id_project)
    {
        return $this->db->table('gambar')
            ->where('id_project', $id_project)
            ->get()
            ->getResultArray();
    }
}
