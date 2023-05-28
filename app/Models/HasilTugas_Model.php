<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilTugas_Model extends Model
{
    protected $primaryKey = 'id_hasiltugas';
    protected $allowedFields = ['tugas_id','mapel_id','pengajar_id', 'kelas_id','siswa_id', 'nama_file', 'nilai', 'tgl_pengumpulan', 'deadline_at'];
    protected $table = 'hasil_tugas';

    public function nilai(){
        return $this->db->table('tugas')
        ->join('kelas','kelas.id_kelas=tugas.kelas_id')
        ->join('mapel','mapel.id_mapel=tugas.mapel_id')
        // ->join('hasil_tugas','hasil_tugas.tugas_id=tugas.id_tugas')
        ->get()->getResultArray();
    }
}