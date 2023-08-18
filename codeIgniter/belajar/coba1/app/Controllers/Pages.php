<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        //yang tiap" key menjadi data di halaman view nya
        $data = [
            'title' => 'Home',
            'tes' => ['satu','dua']
        ];

        //kirimkan variabel data diatas ke halaman header
        echo view('layout/header',$data);
        echo view('pages/home');
        echo view('layout/footer');

    }

    public function about(){

        //yang tiap" key menjadi data di halaman view nya
        $data = [
            'title' => 'About'
        ];
        
        echo view('layout/header',$data);
        echo view('pages/about');
        echo view('layout/footer');
    }

    
}
