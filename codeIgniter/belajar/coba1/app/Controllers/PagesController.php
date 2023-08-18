<?php

namespace App\Controllers;

class PagesController extends BaseController
{
    public function index()
    {
        //yang tiap" key menjadi data di halaman view nya
        $data = [
            'title' => 'Home',
            'tes' => ['satu','dua']
        ];

        // //kirimkan variabel data diatas ke halaman header
        // echo view('layout/header',$data);
        // echo view('pages/home');
        // echo view('layout/footer');

        //view layout
        return view('pages/home',$data);
    }

    public function about(){

        //yang tiap" key menjadi data di halaman view nya
        $data = [
            'title' => 'About'
        ];
        
        // echo view('layout/header',$data);
        // echo view('pages/about');
        // echo view('layout/footer');

        //view layout
       return view('pages/about',$data);
    }

    public function contact(){
        $data=[
            'title' => 'Contact Us',
            'alamat' => [
                [
                   'tipe' => 'rumah',
                   'alamat' => 'Jln. kiai',
                   'kota' => 'bandung' 
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'jln. non',
                    'kota' => 'handung'
                ]
            ]
            
        ];

        return view('pages/contact',$data);
    }

    
}
