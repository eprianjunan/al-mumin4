<?php

namespace App\Models;

use CodeIgniter\Model;

class Siswa_Model extends Model
{
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['id_siswa','nama_siswa', 'nis', 'kelas', 'level'];
    protected $table = 'akunsiswa';
    
    public function getAkun($nis=false)
    {
       if($nis==false){
           return $this->findAll();
       }
       return $this->where(['nis' => $nis])->first();
    }
    
    public function getSiswa()
    {
        return $this->db->table('akunsiswa')
        ->join('kelas_siswa', 'kelas_siswa.siswa_id=akunsiswa.id_siswa')
        ->join('user', 'user.siswa_id=akunsiswa.id_siswa')
        ->join('kelas', 'kelas.id_kelas=kelas_siswa.kelas_id')
        ->get()->getResultArray();
    }

    public function getKelas()
    {
        return $this->db->table('kelas')
        ->get()->getResultArray();
    }

    public function getAllKelas(){
        return $this->db->table('kelas_siswa')
         ->join('kelas','kelas.id=kelas_siswa.kelas_id')
         ->join('akunsiswa', 'akunsiswa.id=kelas_siswa.siswa_id')
         ->get()->getResultArray();
    }

    public function search($keyword)
    {
        return $this->table('akunsiswa')->like('nama_siswa', $keyword);
    }
}