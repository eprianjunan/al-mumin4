<?php 
namespace App\Controllers;

use App\Models\TenagaAdministrasiModel;

class TenagaAdministrasi extends BaseController
{
    protected $tenagaadministrasiModel;
    public function __construct()
    {
        // instansiasi file model
        $this->tenagaadministrasiModel = new TenagaAdministrasiModel();
    }

    public function index(){
        $tenagaadministrasi = $this->tenagaadministrasiModel->findAll();
        $data = [
            'title' => 'Tenaga Administrasi',
            'tenagaadministrasi' => $tenagaadministrasi
        ];
        return view('admin_dashboard/tenadm/index', $data);
    }

    public function create(){
        $data = [
            'title' => 'Form Tambah Data Tenaga Administrasi'
        ];
        return view('admin_dashboard/tenadm/tambah', $data);
    }

    public function save(){
         // validasi data required
         if(!$this->validate([
            'nama' =>'required', 
            'bagian' => 'required', 
        ])) {
            session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
            return redirect()->to('/tenagaadministrasi/create')->withInput();
        }
        $this->tenagaadministrasiModel->save([
            'nama' =>$this->request->getVar('nama'),
            'bagian' =>$this->request->getVar('bagian')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/tenagaadministrasi');
    }

    public function ubah($id_tenagaadministrasi){
        $data = [
            'title' => 'Form Tambah Data Tenaga Administrasi',
            'tenagaadministrasi' => $this->tenagaadministrasiModel->where(['id_tenagaadministrasi' => $id_tenagaadministrasi])->first()
        ];
        return view('admin_dashboard/tenadm/ubah', $data);
    }

    public function update($id_tenagaadministrasi){
        $this->tenagaadministrasiModel->save([
            'id_tenagaadministrasi' => $id_tenagaadministrasi,
            'nama' =>$this->request->getVar('nama'),
            'bagian' =>$this->request->getVar('bagian')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/tenagaadministrasi');
    }

    public function delete($id_tenagaadministrasi)
    {
        $this->tenagaadministrasiModel->delete($id_tenagaadministrasi);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/tenagaadministrasi');
    }
}
?>