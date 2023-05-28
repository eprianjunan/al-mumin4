<?php

namespace App\Models;

use CodeIgniter\Model;

class SambutanModel extends Model
{
    protected $allowedFields = ['id_sambutan', 'judul', 'gambar', 'deskripsi'];
    protected $table = 'sambutan';
    protected $primaryKey = 'id_sambutan';
}