<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kendaraan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'jenis', 'warna', 'foto', 'harga', 'penumpang', 'efisiensi', 'pajak', 'mesin'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getSedan(){
        return $this->select('kendaraan.id as id, nama, jenis, warna, foto, harga, penumpang, efisiensi, pajak, mesin')->orderBy('id', 'desc')->where(['jenis'=>'Sedan'])->findAll();
    }

    public function getSUV(){
        return $this->select('kendaraan.id as id, nama, jenis, warna, foto, harga, penumpang, efisiensi, pajak, mesin')->orderBy('id', 'desc')->where(['jenis'=>'SUV'])->findAll();
    }

    public function getMinibus(){
        return $this->select('kendaraan.id as id, nama, jenis, warna, foto, harga, penumpang, efisiensi, pajak, mesin')->orderBy('id', 'desc')->where(['jenis'=>'Minibus'])->findAll();
    }

    public function getMobil($id = false){
        if($id == false){
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
