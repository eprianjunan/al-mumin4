<?php

namespace App\Models;

use CodeIgniter\Model;

class Materikelas_Model extends Model
{
    protected $primaryKey = 'id_materikelas';
    protected $allowedFields = ['id_materikelas','materi_id','kelas_id'];
    protected $table = 'materi_kelas';

}