<?php

namespace App\Controllers;

use App\Models\KendaraanModel;
use Kint\Zval\Value;

class UserController extends BaseController
{
    protected $kendaraanModel;

    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
    }


    // fungsi hitung
    public function normHarga($data) {
        if($data <= 250000000){
            $value = 5;
        }elseif($data > 250000000 && $data <= 500000000){
            $value = 4;
        }elseif($data > 500000000 && $data <= 750000000){
            $value = 3;
        }elseif($data > 750000000 && $data <= 1000000000){
            $value = 2;
        }else{
            $value = 1;
        }

        return $value;
    }

    public function normPenumpang($data) {
        if($data == 1 || $data == 2){
            $value = 1;
        }elseif($data == 3 || $data == 4){
            $value = 2;
        }elseif($data == 5 || $data == 6){
            $value = 3;
        }elseif($data == 7 || $data == 8){
            $value = 4;
        }elseif($data > 8){
            $value = 5;
        }

        return $value;
    }

    public function normMesin($data) {
        if($data <= 100){
            $value = 1;
        }elseif($data > 100 && $data <=130){
            $value = 2;
        }elseif($data > 130 && $data <=160){
            $value = 3;
        }elseif($data > 160 && $data <=200){
            $value = 4;
        }elseif($data > 200){
            $value = 5;
        }

        return $value;
    }

    public function normEfisiensi($data) {
        if($data < 6) {
            $value = 1;
        }elseif($data > 6 && $data <= 9){
            $value = 2;
        }elseif($data > 9 && $data <= 12){
            $value = 3;
        }elseif($data > 12 && $data <= 15){
            $value = 4;
        }elseif($data > 15){
            $value = 5;
        }

        return $value;
    }

    public function normPajak($data) {
        if($data < 2400000) {
            $value = 5;
        }elseif($data > 2400000 && $data <= 4900000){
            $value = 4;
        }elseif($data > 4900000 && $data <= 7500000){
            $value = 3;
        }elseif($data > 7500000 && $data <= 10000000){
            $value = 2;
        }elseif($data > 10000000){
            $value = 1;
        }

        return $value;
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'sedan' => $this->kendaraanModel->getSedan(),
            'suv' => $this->kendaraanModel->getSUV(),
            'minibus' => $this->kendaraanModel->getMinibus(),
            'namaMobil' => $this->kendaraanModel->getNameMobil(),
            'data' => $this->kendaraanModel->findAll()
        ];

        // dd($this->kendaraanModel->getNameMobil());

        return view('users/index', $data);
    }

    public function namaMobil() {
        
        echo json_encode($this->kendaraanModel->getNameMobil());
    }

    public function compare() {
        $jumlahHarga = 0;
        $jumlahPenumpang = 0;
        $jumlahMesin = 0;
        $jumlahEfisiensi = 0;
        $jumlahPajak = 0;
        $jumBenefit = [];
        $jumCost = [];
        $index = 1;
        $totalCost = 0;
        $totalCostInv = 0;
        $jumCost2 = [];
        $detr = [];
        $ranking = [];
        $final = [];
        $matriks = [];
        $alternatif = $this->request->getVar('alternatif');
        
        
        // Fuzifikasi
        foreach ($alternatif as $data){
            $matriks[] = [
                'harga' => $this->normHarga($this->kendaraanModel->getMobil($data)['harga']),
                'penumpang' => $this->normPenumpang($this->kendaraanModel->getMobil($data)['penumpang']),
                'mesin' => $this->normMesin($this->kendaraanModel->getMobil($data)['mesin']),
                'efisiensi' => $this->normEfisiensi($this->kendaraanModel->getMobil($data)['efisiensi']),                
                'pajak' => $this->normPajak($this->kendaraanModel->getMobil($data)['pajak']),
            ];
        };

        // Penjumlahan nilai pada kriteria yang sama
        foreach ($matriks as $data){
            $jumlahHarga += $data['harga'];
            $jumlahPenumpang += $data['penumpang'];
            $jumlahMesin += $data['mesin'];
            $jumlahEfisiensi += $data['efisiensi'];
            $jumlahPajak += $data['pajak'];
        }

        // Normalisasi
        foreach ($matriks as &$data) {
            $data['harga'] /= $jumlahHarga;
            $data['penumpang'] /= $jumlahPenumpang;
            $data['mesin'] /= $jumlahMesin;
            $data['efisiensi'] /= $jumlahEfisiensi;
            $data['pajak'] /= $jumlahPajak;
        }

        // perkalian bobot
        foreach ($matriks as &$data){
            $data['harga'] *= 0.3;
            $data['penumpang'] *= 0.1;
            $data['mesin'] *= 0.2;
            $data['efisiensi'] *= 0.3;
            $data['pajak'] *= 0.1;
        }

        // penjumlahan benefit
        foreach ($matriks as &$data){
            $jumBenefit[] = [
                'benefit'. $index => $data['penumpang'] + $data['mesin'] + $data['efisiensi']
            ];
            $index++;
        };        

        $index = 1;
        // penjumlahan cost
        foreach ($matriks as &$data){
            $jumCost[] = [
                'cost'. $index => $data['harga'] + $data['pajak']
            ];

            $jumCost2[] = [
                'cost'. $index => $data['harga'] + $data['pajak']
            ];
            $index++;
        };

        $index = 1;
        //total jumlah cost
        foreach ($jumCost as &$data){
            $totalCost += $data['cost'. $index];
            $index++;
        }

        $index = 1;
        //cos/inv
        foreach ($jumCost as &$data){
            $data['cost'.$index] = 1/$data['cost'.$index];
            $index++;
        }

        //total jumlah cost/inv
        $index = 1;
        foreach ($jumCost as &$data){
            $totalCostInv += $data['cost'. $index];
            $index++;
        }


        //detr
        $index = 1;
        foreach ($jumCost2 as &$data){
            $detr[] = [
                'detr'. $index => $data['cost'. $index] * $totalCostInv
            ];
            $index++;
        }

        // perangkingan
        $index = 1;
        foreach ($jumBenefit as &$data){
            $ranking[] = [
                'rank'. $index => $data['benefit'. $index]+($totalCost/$detr[$index-1]['detr'. $index])
            ];

            $index++;
        }

        $index = 1;
        foreach ($alternatif as &$data){
            $final[] = [
                'nama' => $this->kendaraanModel->getMobil($data)['nama'],
                'jenis' => $this->kendaraanModel->getMobil($data)['jenis'],
                'warna' => $this->kendaraanModel->getMobil($data)['warna'],
                'foto' => $this->kendaraanModel->getMobil($data)['foto'],
                'harga' => $this->kendaraanModel->getMobil($data)['harga'],
                'penumpang' => $this->kendaraanModel->getMobil($data)['penumpang'],
                'efisiensi' => $this->kendaraanModel->getMobil($data)['efisiensi'],
                'pajak' => $this->kendaraanModel->getMobil($data)['pajak'],
                'mesin' => $this->kendaraanModel->getMobil($data)['mesin'],
                'rangking' => $ranking[$index-1]['rank'. $index],
                'hargaFuz' => $this->normHarga($this->kendaraanModel->getMobil($data)['harga']),
                'penumpangFuz' => $this->normPenumpang($this->kendaraanModel->getMobil($data)['penumpang']),
                'efisiensiFuz' => $this->normEfisiensi($this->kendaraanModel->getMobil($data)['efisiensi']),
                'pajakFuz' => $this->normPajak($this->kendaraanModel->getMobil($data)['pajak']),
                'mesinFuz' => $this->normMesin($this->kendaraanModel->getMobil($data)['mesin']),
            ];

            $index++;
        }

        $barStyle = [
            'info',
            'success',
            'warning',
            'error'
        ];

        $data = [
            'title' => 'komparasi',
            'data' => $final,
            'bar' => $barStyle
        ];

        return view('users/komparasi', $data);
    }


}
