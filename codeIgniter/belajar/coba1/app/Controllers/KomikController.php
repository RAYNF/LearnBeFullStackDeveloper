<?php

namespace App\Controllers;

use App\Models\KomikModel;

class KomikController extends BaseController
{
    //di masukan ke contructor agar tidak perlu mengulang" pembagilan dalam setiap intruksi
   
    //supaya semua method bisa pakai
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    
    public function index(){

        $data = [
            'title' => 'Daftar Komik'
        ];

        //cara konek db tanpa model (tidak direkomendasikan)
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach($komik->getResultArray() as $row){
        //     d($row);
        // }

        //konek pakai model,butuh instansiasi model kita
        // $komikModel = new KomikModel();
        // $komik = $komikModel->findAll();
        // d($komik);

        //pakai kontruktor
        $komik = $this->komikModel->findAll();
        d($komik);
        
        return view('komik\index',$data);
    }
}