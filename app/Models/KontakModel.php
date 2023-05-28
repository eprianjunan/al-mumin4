<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $allowedFields = ['id_kontak', 'notelp', 'email', 'lokasi'];
    protected $table = 'kontak';
    protected $primaryKey = 'id_kontak';
}