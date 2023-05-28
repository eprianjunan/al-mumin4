<?php

namespace App\Controllers;
use App\Models\MapelKelas_Model;
use App\Models\guru_Model;
use App\Models\UserModel;
use App\Models\MapelModel;
use App\Models\MateriModel;
use App\Models\KelasSiswa_Model;
use App\Models\TugasModel;
use App\Models\Pel_Model;
use App\Models\HasilTugas_Model;
use App\Models\Siswa_Model;

class admin extends BaseController
{
	public function __construct()
    {
		$this->session = session();
        $this->guru_Model = new guru_Model();
        $this->UserModel = new UserModel();
        $this->Materi_Model = new MateriModel();
        $this->mapelModel = new MapelModel();
        $this->kelassiswa_Model = new KelasSiswa_Model();
        $this->tugasmodel = new TugasModel();
        $this->pelmodel = new Pel_Model();
        $this->MapelKelas_Model = new MapelKelas_Model();
        $this->hasiltugas_model = new HasilTugas_Model();
        $this->siswa_Model = new Siswa_Model();
        $this->validation = \Config\Services::validation();
    }
    
    public function index()
    {
        //cek apakah ada session bernama isLogin
        if(!$this->session->has('isLogin')){
            return redirect()->to('/Pages/login');
        }
        
        //cek role dari session
        if($this->session->get('role') != 1){
            return redirect()->to('/guru');
        }
        
        return view('admin_dashboard/dashboard');
        
    }
	public function Dashboard()
	{
		$data = [
            'guru'  => $this->guru_Model->countAll(),
            'siswa'  => $this->siswa_Model->countAll(),
			'kelas' => $this->kelassiswa_Model->countAll(),
            'mapel' => $this->pelmodel->countAll()
        ];
		// dd($data);
		return view('admin_dashboard/dashboard', $data);
	}
	public function profile(){
		$data = [
			'admin' => $this->UserModel->where(['level'=>1])->first()
		];
		return view('admin_dashboard/profile', $data);
	}
	public function resetpassword($id){
        $this->UserModel->save([
            'id'        => $id,
            'username'  => $this->request->getVar('username'),
            'password'  => md5($this->request->getVar('password')),
            'level'     => 1   
        ]);
		session()->setFlashdata('pesan', 'Username atau Password berhasil diubah');
        return redirect()->to('admin/profile');
	}
	public function fasilitas()
	{
		$data = [
			'title' => 'fasilitas'
		];
		return view('admin_dashboard/fasilitas', $data);
	}
	
	public function ekstrakulikuler()
	{
		$data = [
			'title' => 'ekstrakuliker'
		];
		return view('admin_dashboard/ekstrakulikuler', $data);
	}
	public function kontak()
	{
		$data = [
			'title' => 'kontak'
		];
		return view('admin_dashboard/kontak', $data);
	}
	public function management_user()
	{
		$data = [
			'title' => 'Management User'
		];
		return view('admin_dashboard/management_user', $data);
	}
	
	// Mata Pelajaran Kelas
	public function tambahmapelkelas(){
		$mapel = $this->MapelKelas_Model->mapel();
		$kelas	= $this->MapelKelas_Model->kelas();
		$data = [
            'title' => 'Mapel Kelas',
            'mapel' => $mapel,
			'kelas'	=> $kelas
        ];
        return view('admin_dashboard/jadwal_kelas/tambahmapelkelas', $data);
	}
	 
	public function savemapel(){
		// $mapel=$this->request->getVar('mapel');
        // echo "<pre>";
        // print_r($daftarMapel);
        // echo "</pre>";
        // for ($i=0; $i <count($mapel) ; $i++) { 
        //     $data=[
        //         'kelas_id'=>$id,
        //         'mapel_id'=>$mapel[$i],
        //         'aktif'=>1
		// 	];
		// }
		$this->MapelKelas_Model->save([
			'id_mapelkelas'  => $this->request->getVar('id_mapelkelas'),
            'mapel_id'  => $this->request->getVar('id_mapel'),
            'kelas_id'  => $this->request->getVar('id_kelas')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/MapelKelas/mapel_kelas');
	}

	public function deletemapelkelas($id_mapelkelas)
	{
		$this->mapelModel->delete($id_mapelkelas);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to('/MapelKelas/mapel_kelas');
	}

	// Manajamen MAPEL
	public function manajemenmapel()
	{
		$data = [
			'title' => 'Manajemen mapel',
			'mapel' => $this->pelmodel->findAll()
		];
		return view('admin_dashboard/jadwal_kelas/mapel', $data);
	}

	public function vtambahmapel()
	{
		return view('admin_dashboard/jadwal_kelas/tambahmapel');
	}

	public function tambahmapel()
	{
		$this->pelmodel->save([
			'nama_mapel' => $this->request->getVar('nama_mapel')
		]);
		return redirect()->to('/admin/manajemenmapel');
	}

	public function delete($id_mapel)
	{
		$this->pelmodel->delete($id_mapel);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to('/admin/manajemenmapel');
	}
	
}