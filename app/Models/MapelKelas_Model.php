<?php

namespace App\Models;

use CodeIgniter\Model;

class MapelKelas_Model extends Model
{
    protected $primaryKey = 'id_mapelkelas';
    protected $allowedFields = ['id_mapelkelas','mapel_id','kelas_id'];
    protected $table = 'mapel_kelas';

    public function getKelas(){
        return $this->db->table('mapel_kelas')
        ->join('mapel', 'mapel.id_mapel=mapel_kelas.mapel_id')
        ->join('kelas', 'kelas.id_kelas=mapel_kelas.kelas_id')
        // ->join('mapel_guru','mapel_guru.mapel_id=mapel_kelas.mapel_id')
        // ->join('akunguru','akunguru.guru_id=mapel_guru.pengajar_id')
        ->get()->getResultArray();
    }
    
    public function kelas()
    {
        return $this->db->table('kelas')
        ->get()->getResultArray();
    }
    
    public function mapel()
    {
        return $this->db->table('mapel')
        ->get()->getResultArray();
    }
}