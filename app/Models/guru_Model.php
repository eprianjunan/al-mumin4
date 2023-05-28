<?php

namespace App\Models;

use CodeIgniter\Model;

class guru_Model extends Model
{
    protected $primaryKey = 'guru_id';
    protected $allowedFields = ['guru_id', 'nama_guru', 'nip', 'matpel', 'level'];
    protected $table = 'akunguru';
    
    public function getAkun($nip=false)
    {
       if($nip==false){
           return $this->findAll();
       }
       return $this->where(['nip' => $nip])->first();
    }

    public function getGuru(){
        return $this->db->table('akunguru')
        ->join('user','user.pengajar_id=akunguru.guru_id')
        ->join('mapel_guru','mapel_guru.pengajar_id=akunguru.guru_id')
        ->join('mapel','mapel.id_mapel=mapel_guru.mapel_id')
        ->get()->getResultarray();
    }
    
    public function getAjar(){
        return $this->db->table('akunguru')
        ->join('user','user.pengajar_id=akunguru.guru_id')
        ->join('mapel_guru','mapel_guru.pengajar_id=akunguru.guru_id')
        ->get()->getRowArray();
    }

    public function updateGuru($id){
        return $this->db->table('akunguru')
        ->join('user','user.pengajar_id=akunguru.guru_id')
        ->where(['akunguru.guru_id=pengajar_id.id'=> $id])
        ->get();
    }
    
    public function getMapel()
    {
        return $this->db->table('mapel')
        ->get()->getResultArray();
    }

    public function DeleteAkun($id)
    {
        return $this->db->table('user')
        ->join('akunguru','akunguru.id_guru=user.pengajar_id')
        ->join('akunguru','akunguru.id=user.id')
        ->get()->getResultArray();
    }

    public function search($keyword)
    {
        return $this->table('akunguru')->like('nama_guru', $keyword);
    }
}