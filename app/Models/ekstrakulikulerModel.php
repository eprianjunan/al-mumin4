<?php

namespace App\Models;

use CodeIgniter\Model;

class ekstrakulikulerModel extends Model
{
    protected $allowedFields = ['id_ekstrakulikuler','judul', 'slug_ekstrakulikuler', 'gambar', 'deskripsi'];
    protected $table = 'ekstrakulikuler';
    protected $primaryKey = 'id_ekstrakulikuler';
    
    public function ekstrakulikuler($slug_ekstrakulikuler)
    {
        $builder = $this->db->table('ekstrakulikuler');
        $builder->select('ekstrakulikuler.judul, ekstrakulikuler.deskripsi, ekstrakulikuler.gambar, ekstrakulikuler.slug_ekstrakulikuler, ekstrakulikuler.id_ekstrakulikuler');
        $builder->where('ekstrakulikuler.slug_ekstrakulikuler',$slug_ekstrakulikuler);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function search($keyword)
    {
        return $this->table('ekstrakulikuler')->like('judul', $keyword);
    }
}