<?php 
namespace App\Controllers;

use App\Models\TentangKamiModel;

class TentangKami extends BaseController
{
    protected $tentangkamiModel;
    public function __construct()
    {
        // instansiasi file model
        $this->tentangkamiModel = new TentangKamiModel();
    }

    public function index(){
        $tentangkami = $this->tentangkamiModel->findAll();
        $data = [
            'title' => 'Tentang Kami',
            'tentangkami' => $tentangkami
        ];
        return view('admin_dashboard/tentangkami/index', $data);
    }
    
    public function ubah()
    {
        session();
        $data = [
            'title' => 'Form Ubah Data',
            'tentangkami' => $this->tentangkamiModel->find(1),
            'validation' => \Config\Services::validation()
        ];
        return view('admin_dashboard/tentangkami/ubah', $data);
    }

    public function update($id_tentangkami){
        //validasi gambar 
        if(!$this->validate([
            'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
        ])){
            session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
            return redirect()->to('/tentangkami/ubah');
        }

        $data = $this->tentangkamiModel->find($id_tentangkami);
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
            $imageName = $old_img_name;
        }

        $this->tentangkamiModel->save([
            'id_tentangkami' =>$id_tentangkami,
            'judul' =>$this->request->getVar('judul'),
            'gambar' =>$this->request->getVar('gambar'),
            'deskripsi' =>$this->request->getVar('deskripsi'),
            'gambar' => $imageName
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/tentangkami');
    }
}
?>