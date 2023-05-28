<?php

namespace App\Models;

use CodeIgniter\Model;

class TentangKamiModel extends Model
{
    protected $allowedFields = ['id_tentangkami', 'judul', 'gambar', 'deskripsi'];
    protected $table = 'tentangkami';
    protected $primaryKey = 'id_tentangkami';
}