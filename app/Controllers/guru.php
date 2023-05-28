<?php

namespace App\Controllers;
use App\Models\guru_Model;
use App\Models\UserModel;
use App\Models\MapelModel;
use App\Models\MateriModel;
use App\Models\KelasSiswa_Model;
use App\Models\TugasModel;
use App\Models\Pel_Model;
use App\Models\MapelKelas_Model;
use App\Models\HasilTugas_Model;
use App\Models\Siswa_Model;

class guru extends BaseController
{
    protected $guru_Model;
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
        $session = \Config\Services::session();
        //$user = $this->UserModel->getGuru(session()->get('pengajar_id'));
        $id=$session->get('pengajar_id');
        $ajar = $this->mapelModel->where(['pengajar_id'=>$id])->first();
        $mapel = $this->pelmodel->where(['id_mapel'=>$ajar['mapel_id']])->first();
        $data = [
            'guru'  => $this->guru_Model->where(['guru_id' => $id])->first(),
            'akun'  => $this->UserModel->where(['pengajar_id' => $id])->first(),
            'mapel' => $mapel
        ];
        return view('guru/beranda',$data);
    }
    
    public function beranda()
    {
        $session = \Config\Services::session();
        $id=$session->get('pengajar_id');
        $ajar = $this->mapelModel->where(['pengajar_id'=>$id])->first();
        $mapel = $this->pelmodel->where(['id_mapel'=>$ajar['mapel_id']])->first();
        $data = [
            'guru'  => $this->guru_Model->where(['guru_id' => $id])->first(),
            'akun'  => $this->UserModel->where(['pengajar_id' => $id])->first(),
            'mapel' => $mapel,
        ];
        return view('guru/beranda',$data);
    }

    public function resetpassword($id){
        $this->UserModel->save([
            'id'        => $id,
            'username'  => $this->request->getVar('username'),
            'password'  => md5($this->request->getVar('password')),
            'pengajar_id'  => $this->request->getVar('pengajar_id'),
            'level'     => 3   
        ]);
        return redirect()->to('guru/beranda');
    }
    // dashboard admin -  Tampilan Guru (management user)
    public function guru()
	{
        $currentPage = $this->request->getVar('page_guru') ?  $this->request->getVar('page_guru') : 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $guru = $this->guru_Model->search($keyword);
        }else{
            $guru = $this->guru_Model;
        }
      
        $data = [
            'guru' => $guru->join('user','user.pengajar_id=akunguru.guru_id')
            ->join('mapel_guru','mapel_guru.pengajar_id=akunguru.guru_id')
            ->join('mapel','mapel.id_mapel=mapel_guru.mapel_id')
            ->paginate(10,'guru'),
            'pager' => $this->guru_Model->pager,
            'currentPage' => $currentPage
        ];
		return view('admin_dashboard/management_user/guru', $data);
	}

    public function create(){
        $mapelmodel	= new guru_Model();
		$mapel		= $mapelmodel->getMapel();
        $data = [
            'title' => 'Form Tambah Data guru',
            'mapel'	=> $mapel
        ];
        return view('admin_dashboard/management_user/tambah_guru', $data);
    }

    public function save(){
        // validasi data required
        if(!$this->validate([
            'username' =>'required', 
            'nama_guru' => 'required', 
            'nip' => 'required', 
            'id_mapel' => 'required'
        ])) {
            session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
            return redirect()->to('/guru/create')->withInput();
        }

        // input data kedalam tabel akunguru
        $nip = $this->request->getVar('nip');
        $this->guru_Model->save([
            'guru_id'    => $this->request->getVar('guru_id'),
            'nama_guru'  => $this->request->getVar('nama_guru'),
            'nip'        => $nip,
            'matpel'     => $this->request->getVar('id_mapel'),
            'level'      => 3
        ]);
        
        $nipp = $this->guru_Model->getAkun($nip);
        $this->mapelModel->save([
            'mapel_id'  => $this->request->getVar('id_mapel'),
            'pengajar_id'  => $nipp['guru_id'],
            'kelas_id' => $this->request->getVar('kelas')
        ]);


        // tambah data kedalam tabel user
        $this->UserModel->save([
            'pengajar_id'  => $nipp['guru_id'],
            'username'     => $this->request->getVar('username'),
            'password'     => md5("guru123"),
            'created_at'   => $this->request->getVar('created_at'),
            'deadline_at'  => $this->request->getVar('deadline_at'),
            'level'        => 3
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/guru/guru');
    }
    
    public function ubah($id)
    {
        $mapelmodel	= new guru_Model();
		$mapel		= $mapelmodel->getMapel();
         $data = [
            'title' => 'Form Ubah Data',
            'guru'  => $this->guru_Model->where(['guru_id' => $id])->first(),
            'akun'  => $this->UserModel->where(['pengajar_id' => $id])->first(),
            'mapel' => $this->mapelModel->where(['pengajar_id'=>$id])->first(),
            'matpel' => $mapel
        ];
        return view('admin_dashboard/management_user/ubah_guru', $data);
    }

    public function update($id){
        $this->guru_Model->save([
            'guru_id'    => $id,
            'nama_guru'  => $this->request->getVar('nama_guru'),
            'nip'        => $this->request->getVar('nip'),
            'matpel'     => $this->request->getVar('id_mapel'),
        ]);
        // update pada bagian table user
        $this->mapelModel->save([
            'id_mapelguru' => $this->request->getVar('id_mapelguru'),
            'mapel_id'  => $this->request->getVar('id_mapel'),
            'pengajar_id'  => $id,
            'kelas_id' => $this->request->getVar('kelas')
        ]);
        $username = $this->request->getVar('username');
        $this->UserModel->save([
            'id' => $this->request->getVar('id'),
            'pengajar_id' => $id,
            'username'  => $username,
            'password'  => $this->request->getVar('password'),
            'level'     => 3
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/guru/guru');
    }

    public function ubahDefault($id){
        $data = [
            'title' => 'Form Ubah Data',
            'guru'  => $this->guru_Model->where(['guru_id' => $id])->first(),
            'akun'  => $this->UserModel->where(['pengajar_id' => $id])->first()
        ];
        return view('admin_dashboard/management_user/reset_guru', $data);
    }

    public function reset($id)
    {
        $this->UserModel->save([
            'id'    => $this->request->getVar('id'),
            'pengajar_id'  => $id,
            'username'  => $this->request->getVar('username'),
            'password'  => md5("guru123"),
            'level'     => 3
        ]);
        session()->setFlashdata('pesan', 'Data berhasil direset');
        return redirect()->to('/guru/guru');
    }
    public function delete($guru_id)
    {
        $akun = new UserModel();
        $mapel = new MapelModel();
        $akun->where('pengajar_id', $guru_id)->delete();
        $mapel->where('pengajar_id', $guru_id)->delete();
        $data = $this->guru_Model->find($guru_id);
        $this->guru_Model->delete($guru_id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/guru/guru');
    }

    // MATERI DASHBOARD GURU
    public function materi(){
        $session = \Config\Services::session();
        $id = $session->get('pengajar_id');
     
        $guru = $this->guru_Model->where(['guru_id'=>$id])->first();
        $user = $this->UserModel->where(['pengajar_id'=>$guru['guru_id']])->first();
        $final2 = $this->mapelModel->where(['pengajar_id'=>$user['pengajar_id']])->first();

        $kelas = $this->kelassiswa_Model->findAll();
        $mapel = $this->mapelModel->getMapel();
        $data = [
            'title' => 'materi',
            'mapel' => $mapel,
            'kelas' => $kelas,
            'guru' => $final2
        ];
        return view('guru/materi/materi', $data);
    }
    
    public function listmateri($kelas_id,$mapel_id){
        {
            $session = \Config\Services::session();
            $akun = $session->get('pengajar_id');
            $list = $this->mapelModel->where(['pengajar_id' => $akun])->first();
            $materi  = $this->Materi_Model->where(['pengajar_id'=>$list['pengajar_id'],'kelas_id'=>$kelas_id])->findAll();
            
            $data = [
                'title' =>  'materi',
                'materi'  =>  $materi,
                'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $kelas_id])->first(),
                'mapelid' => $this->mapelModel->where(['mapel_id'=> $mapel_id])->first()
            ];
            return view('guru/materi/listmateri', $data);
        }
    }

    public function createMateri($id_kelas,$mapel_id){
        helper('form');
        $kelas = $this->kelassiswa_Model->findAll();
        $session = \Config\Services::session();
        $akun = $session->get('pengajar_id');
        $data = [
            'title' => 'Form Tambah Materi',
            'kelas'  =>  $kelas,
            'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $id_kelas])->first(),
            'mapelid' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first(),
            'guru' => $akun
        ];
        return view('guru/materi/tambah_materi', $data);
    }

    public function saveMateri($id_kelas, $mapel_id){
        
        //validasi gambar 
          if(!$this->validate([
            'files[]' => 'ext_in[files,png,jpg,jpeg,pdf,doc,docx,ppt,xlsx,mp4,mkv,mov]'
        ])){
            session()->setFlashdata('gagal', 'File tidak sesuai dengan format yang ditentukan');
            return redirect()->to('/guru/createmateri/'. $id_kelas. '/' . $mapel_id);
        }
         // validasi data required
        if(!$this->validate([
                'judul' =>'required',
                'deskripsi' => 'required' 
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/guru/createmateri/'. $id_kelas. '/' . $mapel_id)->withInput();
            }

        $file = $this->request->getFileMultiple('files');
         // validasi ketika file lebih dari 3 
          $jmlfile = count($file);
          if ($jmlfile > 3){
            session()->setFlashdata('gagal', 'Anda hanya boleh upload maksimal 3 file');
            return redirect()->to('/guru/createmateri/'. $id_kelas. '/' . $mapel_id);
          } 
        $id = $this->request->getVar('id');
        $tgl = $this->request->getVar('tanggal');
        foreach ($file as $i => $img){
            if($img->isValid() && !$img->hasMoved()){
               $files[$i] = $img->getName();
               $img->move('assets/materi/', $files[$i]);
            }
        }
        $img_dua = (array_key_exists(1, $files) ? $files[1] : null);
        $img_tiga = (array_key_exists(2,$files) ? $files[2] : null); 

        $this->Materi_Model->save([
            'id_materi'    => $id,
            'mapel_id'     => $this->request->getVar('idmapel'),
            'pengajar_id'  => $this->request->getVar('idguru'),
            'kelas_id'     => $this->request->getVar('idkelas'),
            'judul'        => $this->request->getVar('judul'),
            'deskripsi'    => $this->request->getVar('deskripsi'),
            'files'        => $files[0],
            'files1'       => $img_dua,
            'files2'       => $img_tiga,
            'tgl_posting'  => $tgl
        ]);
        session()->setFlashdata('pesan', 'Data Materi berhasil ditambah');
        return redirect()->to('/guru/listmateri'. '/'. $id_kelas.'/'.$mapel_id);
    }

    public function ubahMateri($id_materi)
    {
        $materi = $this->Materi_Model->where(['id_materi' => $id_materi])->first();
        $mapel = $this->pelmodel->where(['id_mapel'=> $materi['mapel_id']])->first();
        $idkelas = $this->kelassiswa_Model->where(['id_kelas' => $materi['kelas_id']])->first();
        $data = [
            'title' => 'Form Ubah Data',
            'materi'  => $materi,
            'idkelas' => $idkelas,
            'mapel' => $mapel
        ];
        return view('guru/materi/ubah_materi', $data);
    }

    public function updateMateri($id_materi, $id_kelas, $mapel_id){
        //validasi gambar 
           if(!$this->validate([
            'file' => 'ext_in[file,png,jpg,jpeg,pdf,doc,docx,ppt,xlsx,mp4,mkv,mov]'
        ])){
            session()->setFlashdata('gagal', 'File tidak sesuai dengan format yang ditentukan');
            return redirect()->to('/guru/ubahmateri/'. $id_materi .'/'. $id_kelas. '/' . $mapel_id);
        }
         // validasi data required
        if(!$this->validate([
                'judul' =>'required',
                'deskripsi' => 'required' 
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/guru/ubahmateri/'. $id_materi .'/'. $id_kelas. '/' . $mapel_id)->withInput();
            }

        $data = $this->Materi_Model->find($id_materi);
        $old_file_name = $data['files'];

        $materifile = $this->request->getFile('files');
        if($materifile->isValid() && !$materifile->hasMoved())
        {
            $old_file_name = $data['files'];
            if(file_exists('assets/materi/'.$old_file_name)){
                unlink('assets/materi/'.$old_file_name);
            }
            $materiName = $materifile->getRandomName();
            $materifile->move('assets/materi/', $materiName);
        }
        else
        {
            $materiName = $old_file_name;
        }
        $this->Materi_Model->save([
            'id_materi'    => $this->request->getVar('id'),
            'mapel_id'     => $this->request->getVar('mapel_id'),
            'pengajar_id'  => $this->request->getVar('pengajar_id'),
            'kelas_id'     => $this->request->getVar('idkelas'),
            'judul'        => $this->request->getVar('judul'),
            'deskripsi'    => $this->request->getVar('deskripsi'),
            'files'         => $materiName,
            'tgl_posting'    => $this->request->getVar('tanggal')
        ]);
        session()->setFlashdata('pesan', 'Data Materi berhasil diubah');
        return redirect()->to('/guru/listmateri'. '/'. $id_kelas.'/'.$mapel_id);
    }

    public function deleteMateri($id, $id_kelas, $mapel_id)
    {
        $data = $this->Materi_Model->find($id);
        $file = $data['files'];
        if(file_exists("assets/materi/".$file))
        {
            unlink("assets/materi/".$file);
        }
        $this->Materi_Model->delete($id);
        session()->setFlashdata('pesan', 'Data Materi berhasil dihapus');
        return redirect()->to('/guru/listmateri'. '/'. $id_kelas.'/'.$mapel_id);
    }
    
    function download($id)
    {
        $files = new MateriModel();
        $data = $files->find($id);
        return $this->response->download('assets/materi/' .$data);
    }

    // TUGAS DASHBOARD GURU
    public function tugas(){
        {
            $session = \Config\Services::session();
            $id = $session->get('pengajar_id');
     
            $guru = $this->guru_Model->where(['guru_id'=>$id])->first();
            $user = $this->UserModel->where(['pengajar_id'=>$guru['guru_id']])->first();
            $final2 = $this->mapelModel->where(['pengajar_id'=>$user['pengajar_id']])->first();

            $kelas = $this->kelassiswa_Model->findAll();
            $mapel = $this->mapelModel->getMapel();
            $data = [
                'title' => 'tugas',
                'mapel' => $mapel,
                'kelas' => $kelas,
                'guru'  => $final2
            ];
            return view('guru/tugas/tugas', $data);
        }
    }

    public function listtugas($kelas_id, $mapel_id){
        $session = \Config\Services::session();
        $akun  = $session->get('pengajar_id');
        $list  = $this->mapelModel->where(['pengajar_id' => $akun])->first();
        $tugas  = $this->tugasmodel->where(['pengajar_id'=>$list['pengajar_id'],'kelas_id'=>$kelas_id])->findAll();

        $data = [
            'title' => 'tugas',
            'tugas' => $tugas,
            'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $kelas_id])->first(),
            'mapelid' => $this->mapelModel->where(['mapel_id'=> $mapel_id])->first()
        ];
        return view('guru/tugas/listtugas', $data);
    }

    public function createTugas($id_kelas, $mapel_id){
        $kelas   = $this->kelassiswa_Model->findAll();
        $session = \Config\Services::session();
        $akun    = $session->get('pengajar_id');
        $data = [
            'title' => 'Form Tambah Tugas',
            'kelas' => $kelas,
            'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $id_kelas])->first(),
            'mapelid' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first(),
            'guru' => $akun
        ];
        return view('guru/tugas/tambah_tugas', $data);
    }

    public function saveTugas($id_kelas, $mapel_id){
        //validasi gambar 
        if(!$this->validate([
            'file' => 'ext_in[file,png,jpg,jpeg,pdf,doc,docx,ppt,xlsx,mp4,mkv,mov]'
        ])){
            session()->setFlashdata('gagal', 'File tidak sesuai dengan format yang ditentukan');
            return redirect()->to('/guru/createTugas/'. $id_kelas. '/' . $mapel_id);
        }
         // validasi data required
        if(!$this->validate([
                'judul'     =>'required',
                'deskripsi' => 'required',
                'durasi'    => 'required'
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/guru/createTugas/'. $id_kelas. '/' . $mapel_id)->withInput();
            }
            
        $file = $this->request->getFile('file');
        $id = $this->request->getVar('id_tugas');
        $tgl = $this->request->getVar('tgl_buat');
        // Pindahkan file
        $file->move('assets/tugas');
        // Ambil nama file 
        $namafile = $file->getName();
        $this->tugasmodel->save([
            'id_tugas'     => $id,
            'mapel_id'     => $this->request->getVar('idmapel'),
            'pengajar_id'  => $this->request->getVar('idguru'),
            'judul'        => $this->request->getVar('judul'),
            'deskripsi'    => $this->request->getVar('deskripsi'),
            'kelas_id'     => $this->request->getVar('idkelas'),
            'file'         => $namafile,
            'tgl_buat'     => $tgl,
            'durasi'       => $this->request->getVar('durasi')
        ]);
        session()->setFlashdata('pesan', 'Data Tugas berhasil ditambah');
        return redirect()->to('/guru/listtugas'. '/' . $id_kelas . '/' . $mapel_id);
    }

    public function ubahTugas($id_tugas)
    {
        $tugas = $this->tugasmodel->where(['id_tugas' => $id_tugas])->first();
        $mapel = $this->pelmodel->where(['id_mapel'=> $tugas['mapel_id']])->first();
        $idkelas = $this->kelassiswa_Model->where(['id_kelas' => $tugas['kelas_id']])->first();
        $data = [
            'title' => 'Form Ubah Data',
            'tugas' => $tugas,
            'idkelas' => $idkelas,
            'mapel' => $mapel
        ];
        return view('guru/tugas/ubah_tugas', $data);
    }

    public function updateTugas($id_tugas, $id_kelas, $mapel_id){
        //validasi gambar 
        if(!$this->validate([
            'file' => 'ext_in[file,png,jpg,jpeg,pdf,doc,docx,ppt,xlsx,mp4,mkv,mov]'
        ])){
            session()->setFlashdata('gagal', 'File tidak sesuai dengan format yang ditentukan');
            return redirect()->to('/guru/ubahtugas/'. $id_tugas .'/' . $id_kelas. '/' . $mapel_id);
        }
         // validasi data required
        if(!$this->validate([
                'judul'     =>'required',
                'deskripsi' => 'required',
                'durasi'    => 'required' 
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/guru/ubahtugas/'. $id_tugas .'/'. $id_kelas. '/' . $mapel_id)->withInput();
            }

        $data = $this->tugasmodel->find($id_tugas);
        $old_file_name = $data['file'];

        $tugasfile = $this->request->getFile('file');
        if($tugasfile->isValid() && !$tugasfile->hasMoved())
        {
            $old_file_name = $data['file'];
            if(file_exists("assets/tugas/".$old_file_name)){
                unlink("assets/tugas/".$old_file_name);
            }
            $tugasName = $tugasfile->getRandomName();
            $tugasfile->move("assets/tugas/", $tugasName);
        }
        else
        {
            $tugasName = $old_file_name;
        }
        $this->tugasmodel->save([
            'id_tugas'           => $this->request->getVar('id_tugas'),
            'mapel_id'     => $this->request->getVar('mapel_id'),
            'pengajar_id'  => $this->request->getVar('pengajar_id'),
            'judul'        => $this->request->getVar('judul'),
            'deskripsi'    => $this->request->getVar('deskripsi'),
            'file'         => $tugasName,
            'tgl_buat'     => $this->request->getVar('tgl_buat'),
            'durasi'       => $this->request->getVar('durasi')
        ]);
        session()->setFlashdata('pesan', 'Data Tugas berhasil diubah');
        return redirect()->to('guru/listtugas/' . $id_kelas.'/'.$mapel_id);
    }

    public function deleteTugas($id, $id_kelas, $mapel_id)
    {
        $data = $this->tugasmodel->find($id);
        $file = $data['file'];
        if(file_exists("assets/tugas/".$file))
        {
            unlink("assets/tugas/".$file);
        }
        $this->tugasmodel->delete($id);
        session()->setFlashdata('pesan', 'Data Tugas berhasil dihapus');
        return redirect()->to('guru/listtugas/' . $id_kelas.'/'.$mapel_id);
    }

    public function hasil_tugas($id_tugas,$id_kelas,$mapel_id)
    {
        $tugas = $this->tugasmodel->where(['id_tugas'=>$id_tugas])->first();
        $hasil = $this->hasiltugas_model
        // ->join('tugas','tugas.id_tugas = hasil_tugas.tugas_id')
        ->join('akunsiswa', 'akunsiswa.id_siswa = hasil_tugas.siswa_id')
        ->join('mapel', 'mapel.id_mapel = hasil_tugas.mapel_id')
        ->where(['tugas_id'=>$id_tugas, 'mapel_id'=>$mapel_id])->findAll();
        $data = [
            'title' => 'Hasil Tugas',
            'hasil' => $hasil,
            'tugas' => $tugas,
            'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $id_kelas])->first(),
            'mapelid' => $this->mapelModel->where(['mapel_id'=> $mapel_id])->first(),
            'mapel' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first(),
            
        ];
        return view('guru/tugas/hasil_tugas', $data);
    }

    public function updateNilai($id_hasiltugas, $tugas_id, $kelas_id, $mapel_id)
    {
        $this->hasiltugas_model->save([
            'id_hasiltugas'=> $id_hasiltugas,
            'tugas_id'     => $tugas_id,
            'mapel_id'     => $mapel_id,
            'nilai'        => $this->request->getVar('nilai'),
            'kelas_id'     => $kelas_id,
            'deadline_at'  => $this->request->getVar('deadline_at')
        ]);
        session()->setFlashdata('pesan', 'Data Nilai Tugas berhasil diubah');
        return redirect()->to('guru/hasil_tugas/'.$tugas_id. "/" .$kelas_id. "/" .$mapel_id);
    }

    // Cetak Laporan
    public function cetaklaporan(){
        $session = \Config\Services::session();
        $id = $session->get('pengajar_id');
        $final2 = $this->mapelModel->where(['pengajar_id'=>$id])->first();

        $kelas = $this->kelassiswa_Model->findAll();
        $mapel = $this->mapelModel->getMapel();
        $data = [
            'title' => 'Cetak Laporan',
            'mapel' => $mapel,
            'kelas' => $kelas,
            'guru'  => $final2
        ];
        return view('guru/cetak_laporan/cetak_laporan', $data);
    }

    public function list_cetaklaporan($kelas_id,$mapel_id){
        $session = \Config\Services::session();
        $id = $session->get('pengajar_id');
        // $laporan = $this->hasiltugas_model
        // ->join('akunsiswa','akunsiswa.id_siswa=hasil_tugas.siswa_id')
        // ->where(['pengajar_id'=>$id,'kelas_id'=>$kelas_id,'mapel_id'=>$mapel_id])->findAll();
        $laporan = $this->siswa_Model
        ->join('kelas_siswa','kelas_siswa.siswa_id=akunsiswa.id_siswa')
        ->join('mapel_kelas','mapel_kelas.kelas_id=akunsiswa.kelas')->where(['kelas'=>$kelas_id,'mapel_id'=>$mapel_id])
        ->findAll();
        $nilai = $this->hasiltugas_model->where(['kelas_id'=>$kelas_id,'mapel_id'=>$mapel_id])->findAll();
        $data = [
            'title' => 'Cetak Laporan',
            'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $kelas_id])->first(),
            'mapelid' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first(),
            'laporan'  => $laporan,
            'nilai' => $nilai,
            'tugas' => $this->tugasmodel->where(['kelas_id'=>$kelas_id,'mapel_id'=>$mapel_id])->countAll()
        ];
        return view('guru/cetak_laporan/list_cetaklaporan', $data);
    }
        public function hasil_cetaklaporan($kelas_id,$mapel_id){
            $session = \Config\Services::session();
        $id = $session->get('pengajar_id');
        // $laporan = $this->hasiltugas_model
        // ->join('akunsiswa','akunsiswa.id_siswa=hasil_tugas.siswa_id')
        // ->where(['pengajar_id'=>$id,'kelas_id'=>$kelas_id,'mapel_id'=>$mapel_id])->findAll();
        $laporan = $this->siswa_Model
        ->join('kelas_siswa','kelas_siswa.siswa_id=akunsiswa.id_siswa')
        ->join('mapel_kelas','mapel_kelas.kelas_id=akunsiswa.kelas')->where(['kelas'=>$kelas_id,'mapel_id'=>$mapel_id])
        ->findAll();
        $nilai = $this->hasiltugas_model->where(['kelas_id'=>$kelas_id,'mapel_id'=>$mapel_id])->findAll();
        $data = [
            'title' => 'Cetak Laporan',
            'idkelas' => $this->kelassiswa_Model->where(['id_kelas'=> $kelas_id])->first(),
            'mapelid' => $this->pelmodel->where(['id_mapel'=> $mapel_id])->first(),
            'laporan'  => $laporan,
            'nilai' => $nilai,
            'tugas' => $this->tugasmodel->where(['kelas_id'=>$kelas_id,'mapel_id'=>$mapel_id])->countAll()
        ];
            return view('guru/cetak_laporan/hasil_cetaklaporan', $data);
        }
}