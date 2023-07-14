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

    public function addMobil() {
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $warna = $this->request->getVar('warna');
        $penumpang = $this->request->getVar('penumpang');
        $efisiensi = $this->request->getVar('efisiensi');
        $mesin = $this->request->getVar('mesin');
        $harga = $this->request->getVar('harga');
        $pajak = $this->request->getVar('pajak');
        $foto = $this->request->getFile('foto');
    }
}
