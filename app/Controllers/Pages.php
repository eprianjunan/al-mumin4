<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\GuruModel;
use App\Models\KepalaSekolahModel;
use App\Models\KontakModel;
use App\Models\SambutanModel;
use App\Models\TenagaAdministrasiModel;
use App\Models\TentangKamiModel;
use App\Models\VisiMisiModel;
use App\Models\fasilitasModel;
use App\Models\ekstrakulikulerModel;

class Pages extends BaseController
{
	protected $tentangkamiModel,
				$sambutanModel,
				$visimisiModel,
				$kepalasekolahModel,
				$guruModel,
				$tenagaadministrasiModel,
				$beritaModel,
				$FasilitasModel,
				$ekstrakulikulerModel,
				$kontakModel;
    public function __construct()
    {
        // instansiasi file model
        $this->tentangkamiModel = new TentangKamiModel();
		$this->sambutanModel = new SambutanModel();
		$this->visimisiModel = new VisiMisiModel();
		$this->kepalasekolahModel = new KepalaSekolahModel();
		$this->guruModel = new GuruModel();
		$this->tenagaadministrasiModel = new TenagaAdministrasiModel();
		$this->beritaModel = new BeritaModel();
		$this->kontakModel = new KontakModel();
		$this->FasilitasModel = new fasilitasModel();
		$this->ekstrakulikulerModel = new ekstrakulikulerModel();
    }

	public function Beranda()
	{
		$data = [
			'title' => 'Beranda',
			'tentangkami' => $this->tentangkamiModel->find(1),
			'sambutan' => $this->sambutanModel->find(1),
			'berita' => $this->beritaModel->paginate(4),
			'kontak' => $this->kontakModel->findAll()
		];
		return view('pages/beranda', $data);
	}

	public function PPDB()
	{
		$data = [
			'title' => 'PPDB'
		];
		return view('pages/ppdb', $data);
	}

	public function Berita()
		{
			$data = [
				'title' => 'Berita',
				'berita' => $this->beritaModel->paginate(8, 'berita'),
				'pager' => $this->beritaModel->pager
			];
		return view('pages/berita', $data);
		}

	public function Profil()
		{
			$data = [
				'title' => 'Profil',
				'visimisi' => $this->visimisiModel->find(1),
				'kepalasekolah' => $this->kepalasekolahModel->find(1),
				'guru' => $this->guruModel->findAll(),
				'tenadm' => $this->tenagaadministrasiModel->findAll()
			];
		return view('pages/profil', $data);
		}
		
	public function beritaRead($slug_berita)
	{
		$b_read	= new BeritaModel();
		$beritaRead = $b_read->readBerita($slug_berita);
		$data = [
			'title'			=> $beritaRead['judul'],
			'beritaRead'	=> $beritaRead
		];
		return view('pages/berita_read', $data);
	}

	public function Fasilitas($slug_fasilitas)
	{
		$m_fasilitas	= new fasilitasModel();
		$fasilitas 		= $m_fasilitas->fasilitas($slug_fasilitas);
		
		$data = [	'title'			=> $fasilitas['judul_fasilitas'],
					'description'	=> $fasilitas['judul_fasilitas'],
					'fasilitas'		=> $fasilitas,
				];
		echo view('Pages/Fasilitas',$data);
	}
	
	public function Ekstrakulikuler($slug_ekstrakulikuler)
	{
		$m_ekstrakulikuler	= new ekstrakulikulerModel();
		$ekstrakulikuler 		= $m_ekstrakulikuler->ekstrakulikuler($slug_ekstrakulikuler);
		
		$data = [	'title'			=> $ekstrakulikuler['judul'],
					'description'	=> $ekstrakulikuler['judul'],
					'ekstrakulikuler'		=> $ekstrakulikuler,
				];
		echo view('Pages/Ekstrakulikuler',$data);
	}
	public function login()
	{
		$data = [
			'title' => 'Login'
		];
	return view('pages/login', $data);
	}
}