<?php 
namespace App\Controllers;

use App\Models\MapelKelas_Model;
use App\Models\KelasSiswa_Model;
use App\Models\MapelModel;
use App\Models\guru_Model;
class MapelKelas extends BaseController
{
    protected $mapelkelas_Model;
    public function __construct()
    {
        $this->mapelkelas_Model = new MapelKelas_Model();
        $this->kelassiswa_Model = new KelasSiswa_Model();
        $this->guru_Model = new guru_Model();
        $this->mapelModel = new MapelModel();
    }

    public function mapel_kelas()
    {
        $kelas = $this->kelassiswa_Model->findAll();
        $mapel = $this->mapelkelas_Model->getKelas();
        $guru = $this->mapelModel
                        ->join('akunguru','akunguru.guru_id=mapel_guru.pengajar_id')
                        ->findAll();
        $data = [
            'title' => 'Mapel Kelas',
            'mapel' => $mapel,
            'kelas' => $kelas,
            'guru' => $guru
        ];
        // dd($data);
        return view('admin_dashboard/jadwal_kelas/mapelkelas', $data);
  
    }

    public function create(){
        $data = [
            'title' => 'Form Tambah Data Mata Pelajaran kelas'
        ];
        return view('admin_dashboard/jadwal_kelas/tambahmapelkelas', $data);
    }
}
?>