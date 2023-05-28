<?php 
namespace App\Controllers;

use App\Models\ekstrakulikulerModel;

class Ekstrakulikuler extends BaseController
{
    protected $ekstrakulikulerModel;
    public function __construct()
    {
        // instansiasi file model
        $this->ekstrakulikulerModel = new ekstrakulikulerModel();
    }

    public function index(){
        $ekstrakulikuler = $this->ekstrakulikulerModel->findAll();
        $data = [
            'title'     => 'ekstrakulikuler',
            'ekstrakulikuler' => $ekstrakulikuler,
            'content'	=> 'admin_dashboard/ekstrakulikuler/index'
        ];
        return view('admin_dashboard/ekstrakulikuler/index', $data);
    }

    public function create(){
        $data = [
            'title' => 'Form Tambah Data ekstrakulikuler'
        ];
        return view('admin_dashboard/ekstrakulikuler/tambah', $data);
    }

    public function save(){
        //validasi gambar 
        if(!$this->validate([
            'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
        ])){
            session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
            return redirect()->to('/ekstrakulikuler/create');
        }
        // validasi data required
        if(!$this->validate([
                'judul' =>'required',
                'deskripsi' => 'required' 
        ])) {
            session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
            return redirect()->to('/ekstrakulikuler/create')->withInput();
        }

        // Ambil gambar 
        $fileGambar = $this->request->getFile('gambar');
        // Pindahkan gambar
        $fileGambar->move('image/ekstrakulikuler');
        // Ambil nama gambar 
        $namaGambar = $fileGambar->getName();
        $this->ekstrakulikulerModel->save([
            'slug_ekstrakulikuler'	    => strtolower(url_title($this->request->getVar('judul'))),
            'judul'     => $this->request->getVar('judul'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'gambar'    => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/ekstrakulikuler');
    }
    
    public function ubah($id_ekstrakulikuler)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'ekstrakulikuler' => $this->ekstrakulikulerModel->where(['id_ekstrakulikuler' => $id_ekstrakulikuler])->first()
        ];
        return view('admin_dashboard/ekstrakulikuler/ubah', $data);
    }

    public function update($id_ekstrakulikuler){
        $data = $this->ekstrakulikulerModel->find($id_ekstrakulikuler);
        $old_img_name = $data['gambar'];

        $imagefile = $this->request->getFile('gambar');
        if($imagefile->isValid() && !$imagefile->hasMoved())
        {
            $old_img_name = $data['gambar'];
            if(file_exists('image/ekstrakulikuler/'.$old_img_name)){
                unlink('image/ekstrakulikuler/'.$old_img_name);
            }
            $imageName = $imagefile->getRandomName();
            $imagefile->move('image/ekstrakulikuler/', $imageName);
        }
        else
        {
            $imageName = $old_img_name;
        }
        $this->ekstrakulikulerModel->save([
            'id_ekstrakulikuler'            =>$id_ekstrakulikuler,
            'slug_ekstrakulikuler'	        => strtolower(url_title($this->request->getVar('judul'))),
            'judul'         =>$this->request->getVar('judul'),
            'deskripsi'     =>$this->request->getVar('deskripsi'),
            'gambar'        =>$this->request->getVar('gambar'),
            'gambar'        => $imageName
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/ekstrakulikuler');
    }

    public function delete($id_ekstrakulikuler)
    {
        $data = $this->ekstrakulikulerModel->find($id_ekstrakulikuler);
        $imagefile = $data['gambar'];
        if(file_exists("image/ekstrakulikuler/".$imagefile))
        {
            unlink("image/ekstrakulikuler/".$imagefile);
        }
         $this->ekstrakulikulerModel->delete($id_ekstrakulikuler);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/ekstrakulikuler');
    }
}
?>