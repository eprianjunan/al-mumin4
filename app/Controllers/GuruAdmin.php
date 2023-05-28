<?php 
namespace App\Controllers;

use App\Models\GuruModel;

class GuruAdmin extends BaseController
{
    protected $guruModel;
    public function __construct()
    {
        // instansiasi file model
        $this->guruModel = new GuruModel();
    }

    public function index(){
        $currentPage = $this->request->getVar('page_guruadmin') ?  $this->request->getVar('page_guruadmin') : 1;
        $keyword = $this->request->getVar('keyword');
        if($keyword){
           $guruAdmin = $this->guruModel->search($keyword);
        }else{
          $guruAdmin = $this->guruModel;
        }
        $data = [
            'title' => 'guru',
            'guruadmin' => $guruAdmin->paginate(10, 'guruadmin'),
            'pager' => $guruAdmin->pager,
            'currentPage' => $currentPage
        ];
        return view('admin_dashboard/guru/index', $data);
    }

    public function create(){
        $data = [
            'title' => 'Form Tambah Data Guru'
        ];
        return view('admin_dashboard/guru/tambah', $data);
    }

    public function save(){
         // validasi data required
         if(!$this->validate([
            'id_nip' =>'required', 
            'nama' => 'required', 
            'gurumapel' => 'required', 
        ])) {
            session()->setFlashdata('tidaklengkap', 'Harap isi dengan benar dan lengkap');
            return redirect()->to('/guruadmin/create')->withInput();
        }

        $this->guruModel->save([
            'id_nip' =>$this->request->getVar('id_nip'),
            'nama' =>$this->request->getVar('nama'),
            'gurumapel' =>$this->request->getVar('gurumapel')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/guruadmin');
    }

    public function ubah($id_guru){
        $data = [
            'title' => 'Form Ubah Data Guru',
            'guru' => $this->guruModel->where(['id_guru' => $id_guru])->first()
        ];
        return view('admin_dashboard/guru/ubah', $data);
    }

    public function update($id_guru){
        $this->guruModel->save([
            'id_guru' => $id_guru,
            'id_nip' =>$this->request->getVar('id_nip'),
            'nama' =>$this->request->getVar('nama'),
            'gurumapel' =>$this->request->getVar('gurumapel')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/guruadmin');
    }

    public function delete($id)
    {
        $this->guruModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/guruadmin');
    }
}
?>