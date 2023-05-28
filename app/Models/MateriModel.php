<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $primaryKey = 'id_materi';
    protected $allowedFields = ['id_materi','mapel_id','pengajar_id','kelas_id','judul','deskripsi','files', 'files1', 'files2', 'tgl_posting'];
    protected $table = 'materi';

    public function getMateri($tgl=false){
       if($tgl==false){
           return $this->findAll();
       }
       return $this->where(['tgl_posting' => $tgl])->first();
    }
}