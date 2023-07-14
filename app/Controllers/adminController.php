<?php

namespace App\Controllers;

class adminController extends BaseController
{
    public function login() {
        return view('admin/login');
    }

    public function auth() {

        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            return redirect()->back()->withInput();
        }

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        if($email == 'admin@gmail.com' && $password == 'admin'){
            session()->setFlashdata('login-true', 'Selamat datang Admin');
            return redirect()->to(base_url('/admin/dashboard'));
        }else{
            session()->setFlashdata('login-false', 'Email atau Password salah');
            return redirect()->to(base_url('/admin'));
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('admin/index', $data);
    }

    public function addViewMobil() {
        $data = [
            'title' => 'Tambah Mobil'
        ];

        return view('admin/create', $data);
    }
}
