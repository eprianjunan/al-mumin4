<?php 
namespace App\Controllers;

use App\Models\VisiMisiModel;

class VisiMisi extends BaseController
{
    protected $visimisiModel;
    public function __construct()
    {
        // instansiasi file model
        $this->visimisiModel = new VisiMisiModel();
    }

    public function index(){
        $visimisi = $this->visimisiModel->findAll();
        $data = [
            'title' => 'visimisi',
            'visimisi' => $visimisi
        ];
        return view('admin_dashboard/visimisi/index', $data);
    }

    public function ubah(){
        $data = [
            'title' => 'Form Ubah Data Visi Misi',
            'visimisi' => $this->visimisiModel->find(1)
        ];
        return view('admin_dashboard/visimisi/ubah', $data);
    }

    public function update($id_visimisi){
        $this->visimisiModel->save([
            'id_visimisi' => $id_visimisi,
            'visi' =>$this->request->getVar('visi'),
            'misi' =>$this->request->getVar('misi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/visimisi');
    }

}
?>