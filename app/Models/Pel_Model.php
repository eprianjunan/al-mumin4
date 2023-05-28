<?php

namespace App\Models;

use CodeIgniter\Model;

class Pel_Model extends Model
{
    protected $primaryKey = 'id_mapel';
    protected $allowedFields = ['id_mapel','nama_mapel'];
    protected $table = 'mapel';
}