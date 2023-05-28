<?php 
namespace App\Controllers;

use App\Models\BeritaModel;

class Berita extends BaseController
{
    protected $beritaModel;
    public function __construct()
    {
        // instansiasi file model
        $this->beritaModel = new BeritaModel();
    }

    public function index(){
        $currentPage = $this->request->getVar('page_berita') ?  $this->request->getVar('page_berita') : 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $berita = $this->beritaModel->search($keyword);
        }else{
            $berita = $this->beritaModel;
        }
        
        $data = [
            'title' => 'Berita',
            'berita' => $berita->paginate(10, 'berita'),
            'pager' => $this->beritaModel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin_dashboard/berita/index', $data);
    }

    public function create(){
        session();
        $data = [
            'title' => 'Form Tambah Data Berita',
            'validation' => \Config\Services::validation()
        ];
        return view('admin_dashboard/berita/tambah', $data);
    }

    public function save(){
        //validasi gambar 
        if(!$this->validate([
            'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
        ])){
            session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
            return redirect()->to('/berita/create');
        }
         // validasi data required
        if(!$this->validate([
                'judul' =>'required',
                'deskripsi' => 'required' 
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/berita/create')->withInput();
            }
            
        // Ambil gambar 
        $fileGambar = $this->request->getFile('gambar');
        // Pindahkan gambar
        $fileGambar->move('image/berita');
        // Ambil nama gambar 
        $namaGambar = $fileGambar->getName();
        $this->beritaModel->save([
            'slug_berita'	=> strtolower(url_title($this->request->getVar('judul'))),
            'judul' =>$this->request->getVar('judul'),
            'gambar' =>$this->request->getVar('gambar'),
            'deskripsi' =>$this->request->getVar('deskripsi'),
            'gambar' => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/berita');
    }
    
    public function ubah($id_berita)
    {
        session();
        $data = [
            'title' => 'Form Ubah Data',
            'berita' => $this->beritaModel->where(['id_berita' => $id_berita])->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin_dashboard/berita/ubah', $data);
    }

    public function update($id_berita){
          //validasi gambar 
        if(!$this->validate([
            'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
        ])){
            session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
            return redirect()->to('/berita/ubah');
        }

        $data = $this->beritaModel->find($id_berita);
        $old_img_name = $data['gambar'];

        $imagefile = $this->request->getFile('gambar');
        if($imagefile->isValid() && !$imagefile->hasMoved())
        {
            $old_img_name = $data['gambar'];
            if(file_exists('image/berita/'.$old_img_name)){
                unlink('image/berita/'.$old_img_name);
            }
            $imageName = $imagefile->getRandomName();
            $imagefile->move('image/berita/', $imageName);
        }
        else
        {
            $imageName = $old_img_name;
        }

        $this->beritaModel->save([
            'slug_berita'	=> strtolower(url_title($this->request->getVar('judul'))),
            'id_berita'=>$id_berita,
            'judul' =>$this->request->getVar('judul'),
            'gambar' =>$this->request->getVar('gambar'),
            'deskripsi' =>$this->request->getVar('deskripsi'),
            'gambar' => $imageName
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/berita');
    }

    public function delete($id_berita)
    {
        $data = $this->beritaModel->find($id_berita);
        $imagefile = $data['gambar'];
        if(file_exists("image/berita/".$imagefile))
        {
            unlink("image/berita/".$imagefile);
        }
         $this->beritaModel->delete($id_berita);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/berita');
    }
}
?>