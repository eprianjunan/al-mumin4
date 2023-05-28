<?php 
namespace App\Controllers;

use App\Models\KepalaSekolahModel;

class KepalaSekolah extends BaseController
{
    protected $kepalasekolahModel;
    public function __construct()
    {
        // instansiasi file model
        $this->kepalasekolahModel = new KepalaSekolahModel();
    }

    public function index(){
        $kepalasekolah = $this->kepalasekolahModel->findAll();
        $data = [
            'title' => 'kepalasekolah',
            'kepalasekolah' => $kepalasekolah
        ];
        return view('admin_dashboard/kepalasekolah/index', $data);
    }

    public function ubah(){
        $data = [
            'title' => 'Form Ubah Data Kepala Sekolah',
            'kepalasekolah' => $this->kepalasekolahModel->find(1)
        ];
        return view('admin_dashboard/kepalasekolah/ubah', $data);
    }

    public function update($id_kepsek){
        //validasi gambar 
        if(!$this->validate([
            'gambar' => 'ext_in[gambar,png,jpg,jpeg]'
        ])){
            session()->setFlashdata('gagal', 'Gambar tidak sesuai dengan format yang ditentukan (contoh : .png, .jpg, .jpeg)');
            return redirect()->to('/kepalasekolah/ubah');
        }

        // Ambil gambar 
        $fileGambar = $this->request->getFile('gambar');
        // Pindahkan gambar
        $fileGambar->move('image');
        // Ambil nama gambar 
        $namaGambar = $fileGambar->getName();
        
        $this->kepalasekolahModel->save([
            'id_kepsek' => $id_kepsek,
            'gambar' =>$this->request->getVar('gambar'),
            'deskripsi' =>$this->request->getVar('deskripsi'),
            'gambar' => $namaGambar
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/kepalasekolah');
    }

}
?>