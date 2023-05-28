<?php

namespace App\Models;

use CodeIgniter\Model;

class KepalaSekolahModel extends Model
{
    protected $allowedFields = ['gambar', 'deskripsi'];
    protected $table = 'kepalasekolah';
    protected $primaryKey = 'id_kepsek';
}