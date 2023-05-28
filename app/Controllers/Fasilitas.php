<?php 
namespace App\Controllers;

use App\Models\fasilitasModel;

class Fasilitas extends BaseController
{
    protected $fasilitasModel;
    public function __construct()
    {
        // instansiasi file model
        $this->FasilitasModel = new fasilitasModel();
    }

    public function index(){
        $fasilitas = $this->FasilitasModel->findAll();
        $data = [
            'title'     => 'fasilitas ',
            'fasilitas' => $fasilitas,
        ];
        return view('admin_dashboard/fasilitas/index', $data);
    }

    public function create(){
        $data = [
            'title' => 'Form Tambah Data fasilitas'
        ];
        return view('admin_dashboard/fasilitas/tambah', $data);
    }

    public function save(){
             //validasi gambar 
            if(!$this->validate([
                'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
            ])){
                session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
                return redirect()->to('/fasilitas/create');
            }

            // validasi data required
            if(!$this->validate([
                'judul_fasilitas' =>'required', 
                'deskripsi' => 'required'
            ])) {
                session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
                return redirect()->to('/fasilitas/create')->withInput();
            }
            
              // Ambil gambar 
              $fileGambar = $this->request->getFile('gambar');
              // Pindahkan gambar
              $fileGambar->move('image/fasilitas');
              // Ambil nama gambar 
              $namaGambar = $fileGambar->getName();
        $this->FasilitasModel->save([
            'slug_fasilitas'	=> strtolower(url_title($this->request->getVar('judul_fasilitas'))),
            'judul_fasilitas'   => $this->request->getVar('judul_fasilitas'),
            'deskripsi'         => $this->request->getVar('deskripsi'),
            'gambar'            => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/fasilitas');
    }
    
    public function ubah($id_fasilitas)
    {
        $data = [
            'title' => 'Form Ubah Data',
            'fasilitas' => $this->FasilitasModel->where(['id_fasilitas' => $id_fasilitas])->first()
        ];
        return view('admin_dashboard/fasilitas/ubah', $data);
    }

    public function update($id_fasilitas){

        $data = $this->FasilitasModel->find($id_fasilitas);
        $old_img_name = $data['gambar'];

        $imagefile = $this->request->getFile('gambar');
        if($imagefile->isValid() && !$imagefile->hasMoved())
        {
            $old_img_name = $data['gambar'];
            if(file_exists('image/fasilitas/'.$old_img_name)){
                unlink('image/fasilitas/'.$old_img_name);
            }
            $imageName = $imagefile->getRandomName();
            $imagefile->move('image/fasilitas/', $imageName);
        }
        else
        {
            $imageName = $old_img_name;
        }

        $this->FasilitasModel->save([
            'id_fasilitas'      =>$id_fasilitas,
            'slug_fasilitas'	=> strtolower(url_title($this->request->getVar('judul_fasilitas'))),
            'judul_fasilitas'   =>$this->request->getVar('judul_fasilitas'),
            'gambar'            =>$this->request->getVar('gambar'),
            'deskripsi'         =>$this->request->getVar('deskripsi'),
            'gambar'            => $imageName
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/fasilitas');
    }

    public function delete($id_fasilitas)
    {
        $data = $this->FasilitasModel->find($id_fasilitas);
        $imagefile = $data['gambar'];
        if(file_exists("image/fasilitas/".$imagefile))
        {
            unlink("image/fasilitas/".$imagefile);
        }
         $this->FasilitasModel->delete($id_fasilitas);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/fasilitas');
    }
}
?>