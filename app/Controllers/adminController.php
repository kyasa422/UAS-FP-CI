<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KendaraanModel;

class adminController extends BaseController
{

    protected $kendaraanModel;

    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
    }

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
            $nama = 'admin';
            session()->set('account', $nama);
            session()->setFlashdata('login-true', 'Selamat datang Admin');
            return redirect()->to(base_url('/admin/dashboard'));
        }else{
            session()->setFlashdata('login-false', 'Email atau Password salah');
            return redirect()->to(base_url('/admin'));
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('/admin'));
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'sedan' => $this->kendaraanModel->getSedan(),
            'suv' => $this->kendaraanModel->getSUV(),
            'minibus' => $this->kendaraanModel->getMinibus()
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

        if(!$this->validate([
            "fotomobil" => [
                "rules" => "uploaded[fotomobil]|max_size[fotomobil,2048]|mime_in[fotomobil,image/png,image/jpg,image/jpeg]|is_image[fotomobil]",
                "errors" => [
                    "max_size" => "Ukuran maks. foto barang 2 MB",
                    "uploaded" => "Belum input gambar",
                    "mime_in" => "hanya menerima png, jpg, dan jpeg",
                ]
            ],

        ])){
            return redirect()->back()->withInput();
        }

        $fileFoto = $this->request->getFile('fotomobil');
        $extensi = $fileFoto->getClientExtension(); // Misalnya 'jpg', 'png', dll.
        $namaFileBaru = time() . '_' . uniqid() . '.' . $extensi;
        $fileFoto->move('product', $namaFileBaru);
        

        $this->kendaraanModel->save([
            'nama' => $this->request->getVar('nama'),
            'jenis' => $this->request->getVar('jenis'),
            'warna' => $this->request->getVar('warna'),
            'penumpang' => $this->request->getVar('penumpang'),
            'efisiensi' => $this->request->getVar('efisiensi'),
            'mesin' => $this->request->getVar('mesin'),
            'harga' => $this->request->getVar('harga'),
            'pajak' => $this->request->getVar('pajak'),
            'foto' => $namaFileBaru
        ]);



        session()->setFlashdata('insert-success', 'Mobil berhasil ditambahkan');
        return redirect()->to(base_url('/admin/dashboard')); 
    }

    public function updateView($id) {
        $data = [
            'title' => 'Update',
            'data' => $this->kendaraanModel->getMobil($id)
        ];

        return view('admin/update', $data);
    }

    public function update() {
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $warna = $this->request->getVar('warna');
        $penumpang = $this->request->getVar('penumpang');
        $efisiensi = $this->request->getVar('efisiensi');
        $mesin = $this->request->getVar('mesin');
        $harga = $this->request->getVar('harga');
        $pajak = $this->request->getVar('pajak');
        $foto = $this->request->getFile('fotomobil');
        $fotoLama = $this->request->getVar('fotoLama');
        $id = $this->request->getVar('id');


        if($foto->getError() == 4){
            $namaFoto = $fotoLama;
        }else{
            $extensi = $foto->getClientExtension(); // Misalnya 'jpg', 'png', dll.
            $namaFoto = time() . '_' . uniqid() . '.' . $extensi;
            $foto->move('product', $namaFoto);

            unlink('product/' . $fotoLama);
        }

        $this->kendaraanModel->save([
            'id' => $id,
            'nama' => $nama,
            'jenis' => $jenis,
            'warna' => $warna,
            'penumpang' => $penumpang,
            'efisiensi' => $efisiensi,
            'mesin' => $mesin,
            'harga' => $harga,
            'pajak' => $pajak,
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('update-success', 'mobil telah diupdate');
        return redirect()->to(base_url('/admin/dashboard'));
    }

    public function delete($id) {
        
        $mobil = $this->kendaraanModel->find($id);
        unlink('product/'. $mobil['foto']);
        
        $this->kendaraanModel->delete($id);

        session()->setFlashdata('delete-success', 'Mobil berhasil dihapus');

        return redirect()->to('/admin/dashboard');
    }
}
