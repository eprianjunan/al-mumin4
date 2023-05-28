<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
    protected $allowedFields = ['id_visimisi', 'visi', 'misi'];
    protected $table = 'visimisi';
    protected $primaryKey = 'id_visimisi';
}