<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    protected $primaryKey = 'id_tugas';
    protected $allowedFields = ['mapel_id','pengajar_id', 'kelas_id', 'judul', 'deskripsi', 'file', 'tgl_buat', 'durasi'];
    protected $table = 'tugas';
}