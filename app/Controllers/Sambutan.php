<?php 
namespace App\Controllers;

use App\Models\SambutanModel;

class Sambutan extends BaseController
{
    protected $sambutanModel;
    public function __construct()
    {
        // instansiasi file model
        $this->sambutanModel = new SambutanModel();
    }

    public function index(){
        $sambutan = $this->sambutanModel->findAll();
        $data = [
            'title' => 'Sambutan',
            'sambutan' => $sambutan
        ];
        return view('admin_dashboard/sambutan/index', $data);
    }

    public function ubah(){
        session();
        $data = [
            'title' => 'Form Ubah Data Sambutan',
            'sambutan' => $this->sambutanModel->find(1),
            'validation' => \Config\Services::validation()
        ];
        return view('admin_dashboard/sambutan/ubah', $data);
    }

    public function update($id_sambutan){
        //validasi gambar 
        if(!$this->validate([
            'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
        ])){
            session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
            return redirect()->to('/sambutan/ubah');
        }

        $data = $this->sambutanModel->find($id_sambutan);
        $old_img_name = $data['gambar'];

        $imagefile = $this->request->getFile('gambar');
        if($imagefile->isValid() && !$imagefile->hasMoved())
        {
            $old_img_name = $data['gambar'];
            if(file_exists('image/'.$old_img_name)){
                unlink('image/'.$old_img_name);
            }
            $imageName = $imagefile->getRandomName();
            $imagefile->move('image/', $imageName);
        }
        else
        {
            // ketika tidak ada perubahan pada gambar 
            $imageName = $old_img_name;
        }

        $this->sambutanModel->save([
            'id_sambutan' =>$id_sambutan,
            'judul' =>$this->request->getVar('judul'),
            'gambar' =>$this->request->getVar('gambar'),
            'deskripsi' =>$this->request->getVar('deskripsi'),
            'gambar' => $imageName
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/sambutan');
    }
}
?>