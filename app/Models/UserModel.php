<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $allowedFields = ["username", "password", "level", "siswa_id","pengajar_id", "created_at", "deadline_at"];

    public function login($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function getPass($password=false)
    {
        if($password==false){
            return $this->findAll();
        }
        return $this->where(['password' => $password])->first();
    }

    public function DeleteAkun()
    {
        return $this->db->table('user')
        ->join('akunsiswa', 'akunguru.id=user.pengajar_id')
        ->get()->getResultArray();
    }
    
    public function getGuru($id){
        return $this->db->table('user')
        ->join('akunguru','akunguru.guru_id=user.pengajar_id')
        ->join('mapel_guru','mapel_guru.pengajar_id=akunguru.guru_id')
        ->join('mapel','mapel.id_mapel=mapel_guru.mapel_id')
        ->get()->getRowArray();
    }   
}