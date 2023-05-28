<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{   
    protected $userModel;
    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
    }
    
    //menampilkan halaman login
    public function login()
    {
        return view('Pages/login');
    }

    public function viewLPassword()
    {
        return view('forgot_password/index');
    }

    public function vReset($id)
    {
        $data = [
            'resetpassword' => $this->userModel->where(['id' => $id])->first()
        ];
        return view('forgot_password/reset_password', $data);
    }

    public function reset_password()
    {
            $this->userModel->save([
                'id'        => $this->request->getVar('id'),
                'username'  => $this->request->getVar('username'),
                'password'  => md5($this->request->getVar('password')),
                'level'     => 1
            ]);
            session()->setFlashdata('pesan', 'Data berhasil direset');
            return redirect()->to('Pages/login');
    }

    public function forgot_password()
    {
        $data     = $this->request->getVar('email', FILTER_SANITIZE_EMAIL);
        $userData = $this->userModel->where('email', $data)->first();
        if(!empty($userData)){
            $to      = $data;
            $subject = 'Reset Password Link';
            $token   = $userData['id'];
            $message = 'Hi ' .$userData['username']. ' your reset password request has been received plese click the bellow link to reset your password'
            . '<a href="'. base_url().'/auth/vReset/'.$token.'"> Click</a>';
            $email = \Config\Services::email();
            $email -> setTo($to);
            $email -> setFrom('eprianjunan.ej@gmail.com', 'eprian');
            $email -> setSubject($subject);
            $email -> setMessage($message);
            if($email->send())
            {
                session()->setTempdata('email','Verifikasi berhasil dikirimkan ke email tujuan');
                return redirect()->to('/auth/forgot_password/index/');
            }else
            {
                return redirect()->to('/auth/viewLPassword/');
            }
        }else{
            session()->setFlashdata('email','Email yang dimasukkan salah');
            return redirect()->to('auth/viewLPassword/');
        }
    }

    // validasi untuk login
    public function cek_login()
    {
        
        $data = $this->request->getPost();
        $user = $this->userModel->where('username', $data['username'])->first();
         if($user){
            if($user['password'] == md5($data['password'])){
                // jika datanya cocok
                session()->set([
                    'log'=> true,
                    'id'            => $user['id'], 
                    'username'      => $user['username'],
                    'level'         => $user['level'],
                    'pengajar_id'   => $user['pengajar_id'],
                    'siswa_id'      => $user['siswa_id']
                ]);
               
            }else{
                // jika datanya tidak cocok
                session()->setFlashdata('username', 'Username atau Password salah');
                return redirect()->to('auth/login');
            }
        }
        elseif($data['username'] & $data['password']){
            session()->setFlashdata('username','Username atau Password salah');
            return redirect()->to('auth/login');
        }
        elseif($data['username']){
            session()->setFlashdata('username','Password tidak boleh kosong');
            return redirect()->to('auth/login');
        }
        elseif($data['password']){
            session()->setFlashdata('username','Username tidak boleh kosong');
            return redirect()->to('auth/login');
        }
        else{
            session()->setFlashdata('username','Username dan Password tidak boleh kosong');
            return redirect()->to('auth/login');
        }
    }

    // logout dashboard
    public function logout()
    {
        session()->remove('log');
        session()->remove('level');
        return redirect()->to('/');
    }
}