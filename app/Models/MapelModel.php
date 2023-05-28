<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelModel extends Model
{
    protected $primaryKey = 'id_mapelguru';
    protected $allowedFields = ['id_mapelguru','mapel_id','pengajar_id'];
    protected $table = 'mapel_guru';

    public function getKelas(){
        return $this->db->table('mapel_kelas')
        ->join('mapel', 'mapel.id=mapel_kelas.mapel_id')
        ->join('kelas', 'kelas.id=mapel_kelas.kelas_id')
        ->get()->getResultArray();
    }

    public function getMapel(){
        return $this ->db->table('mapel_kelas')
        ->join('mapel', 'mapel.id_mapel=mapel_kelas.mapel_id')
        ->join('kelas', 'kelas.id_kelas=mapel_kelas.kelas_id')
        ->get()->getResultArray();
    }
}