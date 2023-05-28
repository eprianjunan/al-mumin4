<?php 
namespace App\Controllers;

use App\Models\KontakModel;

class Kontak extends BaseController
{
    protected $kontakModel;
    public function __construct()
    {
        // instansiasi file model
        $this->kontakModel = new KontakModel();
    }

    public function index(){
        $kontak = $this->kontakModel->findAll();
        $data = [
            'title' => 'Kontak',
            'kontak' => $kontak
        ];
        return view('admin_dashboard/kontak/index', $data);
    }

    public function ubah(){
        $data = [
            'title' => 'Form Ubah Data Kontak',
            'kontak' => $this->kontakModel->find(1)
        ];
        return view('admin_dashboard/kontak/ubah', $data);
    }

    public function update($id_kontak){
        $this->kontakModel->save([
            'id_kontak' => $id_kontak,
            'notelp' =>$this->request->getVar('notelp'),
            'email' =>$this->request->getVar('email'),
            'lokasi' =>$this->request->getVar('lokasi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/kontak');
    }
}
?>