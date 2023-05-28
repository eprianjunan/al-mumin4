<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $primaryKey = 'id_berita';
    protected $allowedFields = ['judul', 'gambar', 'deskripsi', 'slug_berita'];
    protected $table = 'berita';

    public function readBerita($slug_berita)
    {
        $builder = $this->db->table('berita');
        $builder->select('berita.id_berita, berita.judul, berita.gambar, berita.deskripsi, berita.slug_berita');
        $builder->where('berita.slug_berita',$slug_berita);
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function search($keyword)
    {
        return $this->table('berita')->like('judul', $keyword);
    }
}