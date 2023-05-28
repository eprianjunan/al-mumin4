<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $primaryKey = 'id_kelassiswa';
    protected $allowedFields = ['id_kelassiswa', 'kelas_id', 'siswa_id'];
    protected $table = 'kelas_siswa';
}