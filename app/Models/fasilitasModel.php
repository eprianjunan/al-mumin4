<?php

namespace App\Models;

use CodeIgniter\Model;

class fasilitasModel extends Model
{
    protected $allowedFields = ['slug_fasilitas', 'judul_fasilitas', 'deskripsi', 'gambar'];
    protected $table = 'fasilitas';
    protected $primaryKey = 'id_fasilitas';
    
    public function fasilitas($slug_fasilitas)
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.judul_fasilitas, fasilitas.deskripsi, fasilitas.gambar, fasilitas.slug_fasilitas, fasilitas.id_fasilitas');
        $builder->where('fasilitas.slug_fasilitas',$slug_fasilitas);
        $query = $builder->get();
        return $query->getRowArray();
    }

}