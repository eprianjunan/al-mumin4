<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\UserModel;

class FilterGuru implements FilterInterface
{
    public function __construct()
    {
        $this->session = session();
        $this->UserModel = new UserModel();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if(session()->get('level') == '') {
            echo "anda belum login";
            return redirect()->to('auth/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if(session()->get('level') == 3 && session()->get('pengajar_id') != null) {
            return redirect()->to('guru/index');
        }
    }
}