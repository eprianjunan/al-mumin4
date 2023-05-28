<?php

namespace App\Controllers;
use App\Models\Siswa_Model;
use App\Models\UserModel;
use App\Models\KelasModel;
use App\Models\MapelModel;
use App\Models\KelasSiswa_Model;
use App\Models\MateriModel;
use App\Models\TugasModel;
use App\Models\Pel_Model;
use App\Models\HasilTugas_Model;

class siswa extends BaseController
{
    protected $siswa_Model;
    public function __construct()
    {
        $this->session = session();
        $this->siswa_Model = new Siswa_Model();
        $this->UserModel = new UserModel();
        $this->kelas_model = new KelasModel();
        $this->kelassiswa_model = new KelasSiswa_Model();
        $this->materimodel = new MateriModel();
        $this->mapelModel = new MapelModel();
        $this->tugasmodel = new TugasModel();
        $this->pelmodel = new Pel_Model();
        $this->hasiltugas_model = new HasilTugas_Model();
    }
    
    // Beranda
    public function index()
    {
        $session = \Config\Services::session();
        $id=$session->get('siswa_id');
        $ajar = $this->kelas_model->where(['siswa_id'=>$id])->first();
        $kelas = $this->kelassiswa_model->where(['id_kelas'=>$ajar['kelas_id']])->first();
        $data = [
            'siswa' => $this->siswa_Model->where(['id_siswa' => $id])->first(),
            'akun'  => $this->UserModel->where(['siswa_id' => $id])->first(),
            'kelas' => $kelas
        ];
        return view('siswa/beranda', $data);
    }
    
    public function beranda()
    {
        $session = \Config\Services::session();
        $id    = $session->get('siswa_id');
        $ajar  = $this->kelas_model->where(['siswa_id'=>$id])->first();
        $kelas = $this->kelassiswa_model->where(['id_kelas'=>$ajar['kelas_id']])->first();
        $data = [
            'siswa' => $this->siswa_Model->where(['id_siswa' => $id])->first(),
            'akun'  => $this->UserModel->where(['siswa_id' => $id])->first(),
            'kelas' => $kelas
        ];
        return view('siswa/beranda', $data);
    }

    public function resetpassword($id){
        $this->UserModel->save([
            'id'        => $id,
            'username'  => $this->request->getVar('username'),
            'password'  => md5($this->request->getVar('password')),
            'siswa_id'  => $this->request->getVar('siswa_id'),
            'level'     => 2   
        ]);
        return redirect()->to('siswa/beranda');
    }
    // dashboard admin - Tampilan Siswa (Management user)
    public function siswa()
	{
        $currentPage = $this->request->getVar('page_siswa') ?  $this->request->getVar('page_siswa') : 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $siswa = $this->siswa_Model->search($keyword);
        }else{
            $siswa = $this->siswa_Model;
        }
        
        $data = [
            'siswa' => $siswa->join('kelas_siswa', 'kelas_siswa.siswa_id=akunsiswa.id_siswa')
            ->join('user', 'user.siswa_id=akunsiswa.id_siswa')
            ->join('kelas', 'kelas.id_kelas=kelas_siswa.kelas_id')
            ->paginate(10, 'siswa'),
            'pager' => $this->siswa_Model->pager,
            'currentPage' => $currentPage
        ];
		return view('admin_dashboard/management_user/siswa', $data);
	}
    public function create(){
        $siswamodel	= new Siswa_Model();
		$kelas		= $siswamodel->getKelas();
		
		$data = [	
                    'title' => 'Form Tambah Data siswa',
					'kelas'	=> $kelas
				];
        return view('admin_dashboard/management_user/tambah_siswa', $data);
    }

    public function save(){
            // validasi data required
            if(!$this->validate([
                'username' =>'required', 
                'nama_siswa' => 'required', 
                'nis' => 'required', 
                'kelas' => 'required'
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/siswa/create')->withInput();
            }
        // input data kedalam tabel siswa
        $nis = $this->request->getVar('nis'); 
        $parent_id = $this->request->getVar('parent_id');
        $this->siswa_Model->save([
            'id_siswa'   => $this->request->getVar('id'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'nis'        => $nis,
            'kelas'      => $this->request->getVar('kelas'),
            'level'      => 2
        ]);

        $niss = $this->siswa_Model->getAkun($nis);
        $this->kelas_model->save([
            'kelas_id' => $this->request->getVar('kelas'),
            'siswa_id' => $niss['id_siswa']
        ]);
        
        // tambah data kedalam tabel user 
        $this->UserModel->save([
            'siswa_id' => $niss['id_siswa'],
            'username'   => $this->request->getVar('username'),
            'password'   => md5("siswa123"),
            'created_at'   => $this->request->getVar('created_at'),
            'deadline_at'  => $this->request->getVar('deadline_at'),
            'level'      => 2,

        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/siswa/siswa');
    }

    public function ubah($id)
    {
        $siswamodel	= new Siswa_Model();
		$kelas		= $siswamodel->getKelas();
        $data = [
            'title' => 'Form Ubah Data',
            'siswa' => $this->siswa_Model->where(['id_siswa' => $id])->first(),
            'akun'  => $this->UserModel->where(['siswa_id' => $id])->first(),
            'kelas'	=> $kelas,
            'kelas_siswa' => $this->kelas_model->where(['siswa_id'=>$id])->first()
        ];
        return view('admin_dashboard/management_user/ubah_siswa', $data);
    }

    public function update($id){
        $nis = $this->request->getVar('nis');
        $this->siswa_Model->save([
            'id_siswa'    => $id,
            'nama_siswa'  => $this->request->getVar('nama_siswa'),
            'nis'         => $this->request->getVar('nis'),
            'kelas'       => $this->request->getVar('kelas')
        ]);
        $this->UserModel->save([
            'id'       => $this->request->getVar('id'),
            'siswa_id' => $id,
            'level'    => 2
        ]);
        $this->kelas_model->save([
            'id_kelassiswa' => $this->request->getVar('id_kelas'),
            'siswa_id' => $id,
            'kelas_id' => $this->request->getVar('kelas')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/siswa/siswa');
    }

    public function ubahDefault($id){
        $data = [
            'title' => 'Form Ubah Data',
            'siswa'  => $this->siswa_Model->where(['id_siswa' => $id])->first(),
            'akun'  => $this->UserModel->where(['siswa_id' => $id])->first()
        ];
        return view('admin_dashboard/management_user/reset_siswa', $data);
    }

    public function reset($id)
    {
        $this->UserModel->save([
            'id'    => $this->request->getVar('id'),
            'siswa_id'  => $id,
            'username'  => $this->request->getVar('username'),
            'password'  => md5("siswa123"),
            'level'     => 2
        ]);
        session()->setFlashdata('pesan', 'Data berhasil direset');
        return redirect()->to('/siswa/siswa');
    }
    public function delete($id_siswa)
    {
        $akun = new UserModel();
        $kelas = new KelasModel();
        $akun->where('siswa_id', $id_siswa)->delete();
        $kelas->where('siswa_id', $id_siswa)->delete();
        $this->siswa_Model->delete($id_siswa);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/siswa/siswa');
    }

  // MATERI DASHBOARD SISWA
  public function materi(){
        
    $session = \Config\Services::session();
    $id = $session->get('siswa_id');
    $siswa = $this->siswa_Model->where(['id_siswa'=>$id])->first();
    $final2 = $this->kelas_model->where(['siswa_id'=>$siswa['id_siswa']])->first();
        
    $kelas = $this->kelassiswa_model->findAll();
    $mapel = $this->mapelModel->getMapel();
        $data = [
            'title' => 'materi',
            'mapel' => $mapel,
            'kelas' => $kelas,
            'kelassiswa' => $final2
        ];
        return view('siswa/materi/materi', $data);
}

public function listmateri($kelas_id,$mapel_id){
    $session = \Config\Services::session();
    $akun = $session->get('siswa_id');
    $list = $this->kelas_model->where(['siswa_id' => $akun])->first();
    $materi  = $this->materimodel->where(['kelas_id'=>$list['kelas_id'],'mapel_id'=>$mapel_id])->findAll();
     
    $data = [
        'title' =>  'materi',
        'materi'  => $materi,
        'idkelas' => $this->kelassiswa_model->where(['id_kelas'=> $kelas_id])->first(),
        'mapelid' => $this->mapelModel->where(['mapel_id'=> $mapel_id])->first(),
        'mapel' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first()
    ];
    return view('siswa/materi/listmateri', $data);
}

public function detailmateri($id_materi,  $mapel_id, $kelas_id)
    {
        $data = [
            'title' =>  'Detail Materi',
            'materi'  =>  $this->materimodel
            ->join('akunguru','akunguru.guru_id=materi.pengajar_id')
            ->join('mapel','mapel.id_mapel=materi.mapel_id')
            ->join('kelas','kelas.id_kelas=materi.kelas_id')
            ->where(['id_materi' => $id_materi, 'mapel_id'=>$mapel_id, 'kelas_id'=>$kelas_id])->findAll(),
            'kelas' => $this->kelassiswa_model->where(['id_kelas'=> $kelas_id])->first()
        ];
        return view('siswa/materi/detailmateri', $data);
    }
// TUGAS DASHBOARD SISWA
public function tugas(){
    {
        $session = \Config\Services::session();
        $id = $session->get('siswa_id');
        $siswa = $this->siswa_Model->where(['id_siswa'=>$id])->first();
        $final2 = $this->kelas_model->where(['siswa_id'=>$siswa['id_siswa']])->first();

        $kelas = $this->kelassiswa_model->findAll();
        $mapel = $this->mapelModel->getMapel();
        $data = [
            'title' =>  'tugas',
            'mapel' => $mapel,
            'kelas' => $kelas,
            'kelassiswa' => $final2
        ];
        return view('siswa/tugas/tugas', $data);
    }
}

public function listtugas($kelas_id, $mapel_id){
    $session = \Config\Services::session();
    $akun = $session->get('siswa_id');
    $list = $this->kelas_model->where(['siswa_id' => $akun])->first();
    $tugas  = $this->tugasmodel->where(['kelas_id'=>$list['kelas_id'],'mapel_id'=>$mapel_id])->findAll();

    $data = [
        'title' =>  'materi',
        'tugas'  => $tugas,
        'idkelas' => $this->kelassiswa_model->where(['id_kelas'=> $kelas_id])->first(),
        'mapelid' => $this->mapelModel->where(['mapel_id'=> $mapel_id])->first(),
        'mapel' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first()
    ];
    return view('siswa/tugas/listtugas', $data);
}   

public function detailTugas($id_tugas, $mapel_id, $id_kelas)
{
   
    $session = \Config\Services::session();
    $akun = $session->get('siswa_id');
    $list  = $this->tugasmodel->where(['id_tugas' => $id_tugas])->findAll();
    $list1 = $this->hasiltugas_model->where(['tugas_id' => $id_tugas, 'siswa_id'=>$akun])->first();
    $data = [
        'tugas'      => $list,
        'hasiltugas' => $list1,
        'akun'       => $akun,
        'idkelas'    => $this->kelassiswa_model->where(['id_kelas'=> $id_kelas])->first(),
        'mapelid'    => $this->mapelModel->where(['mapel_id'=> $mapel_id])->first(),
        'mapel'      => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first()
    ];
    return view('siswa/tugas/detailtugas', $data);
}

public function uploadTugas($id_tugas, $id_kelas, $mapel_id)
{
     //validasi gambar 
    //  if(!$this->validate([
    //     'files' => 'ext_in[files,png,jpg,jpeg,pdf,doc,docx,ppt,xlsx,mp4,mkv,mov]'
    // ])){
    //     session()->setFlashdata('gagal', 'File tidak sesuai dengan format yang ditentukan');
    //     return redirect()->to('/siswa/detailTugas/'.$id_tugas.'/'. $id_kelas. '/' . $mapel_id);
    // }
    // if(!$this->validate([
    //     'files'     =>'required' 
    // ])) {
    //     session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
    //     return redirect()->to('/siswa/detailTugas/'. $id_tugas .'/'. $id_kelas. '/' . $mapel_id)->withInput();
    // }
    $file = $this->request->getFile('files');
    // Pindahkan file
    $file->move('assets/hasiltugas');
    // Ambil nama file 
    $namafile = $file->getName();
    // variabel
    $id_kelas = $this->request->getVar('id_kelas');
    $mapel_id = $this->request->getVar('mapel_id');
    $id_tugas = $this->request->getVar('id_tugas');
    $this->hasiltugas_model->save([
        'siswa_id'   => $this->request->getVar('akun'),
        'kelas_id'   => $id_kelas,
        'pengajar_id'   => $this->request->getVar('pengajar_id'),
        'mapel_id'   => $mapel_id,
        'tugas_id'   => $id_tugas,
        'nama_file'  => $namafile,
        'tgl_pengumpulan' => $this->request->getVar('tgl_pengumpulan')
    ]);
    session()->setFlashdata('pesan', 'Data berhasil ditambah');
    return redirect()->to('/siswa/detailTugas/'.$id_tugas. "/" .$mapel_id. "/" .$id_kelas);
}

public function deleteTugas($id_hasiltugas)
{
    $id_kelas = $this->request->getVar('id_kelas');
    $mapel_id = $this->request->getVar('mapel_id');
    $id_tugas = $this->request->getVar('id_tugas');
    // hapus file
    $data = $this->hasiltugas_model->find($id_hasiltugas);
    $file = $data['nama_file'];
    if(file_exists("assets/hasiltugas/".$file))
    {
        unlink("assets/hasiltugas/".$file);
    }
    $this->hasiltugas_model->delete($id_hasiltugas);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/siswa/detailTugas/'.$id_tugas. "/" .$mapel_id. "/" .$id_kelas);
}
}