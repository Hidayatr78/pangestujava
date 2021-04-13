<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;


class Filter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (!session('id_admin')) // saya hanya membuat sederhana saja. silahkan kembangkan di kemudian hari
        {
            session()->setflashdata('pesan', 'Oops, you are not logged in yet');
            return redirect()->to(base_url('iyan/login'));
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        // if (session()->get('id_admin') == true) {
        //     return redirect()->to(base_url('iyan/dasbor'));
        // }
    }
}
