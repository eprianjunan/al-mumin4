<?php namespace App\Models;

use CodeIgniter\Model;

class Menu_model extends Model
{
    // Menu fasilitas
    public function fasilitas()
    {
        $builder = $this->db->table('fasilitas');
        $builder->select('fasilitas.judul_fasilitas, fasilitas.deskripsi, fasilitas.gambar, fasilitas.slug_fasilitas, fasilitas.id_fasilitas');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function ekstrakulikuler()
    {
        $builder = $this->db->table('ekstrakulikuler');
        $builder->select('ekstrakulikuler.judul, ekstrakulikuler.deskripsi, ekstrakulikuler.gambar, ekstrakulikuler.slug_ekstrakulikuler, ekstrakulikuler.id_ekstrakulikuler');
        $query = $builder->get();
        return $query->getResultArray();
    }
}