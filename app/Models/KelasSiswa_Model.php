<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasSiswa_Model extends Model
{
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['id_kelas','nama_kelas', 'parent_id'];
    protected $table = 'kelas';

    public function getKelas($parent_id)
    {
       if($parent_id=true){
           return $this->findAll();
       }
       return $this->where(['parent_id' => $parent_id])->first();
    }
}