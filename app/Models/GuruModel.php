<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $primaryKey = 'id_guru';
    protected $allowedFields = ['id_nip', 'nama', 'gurumapel'];
    protected $table = 'guru';

    public function search($keyword)
    {
        return $this->table('guru')->like('nama', $keyword);
    }
}