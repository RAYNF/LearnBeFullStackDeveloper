<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KomikModel;

class KomikController extends BaseController
{
    protected $KomikModel;

    public function __construct()
    {
        $this->KomikModel = new KomikModel();
    }

    public function index()
    {
       $data = [
        'title' => 'Daftar Komik',
        'komik' => $this->KomikModel->getKomik()
       ];
        
       return view('komik\index',$data);
    }

    public function detail($slug){
        $data = [
        'title' => 'Detail Komik',
        'komik' => $this->KomikModel->getKomik($slug)
        ];

        if(empty($data['komik'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik '.$slug.' tidak ditemukan.');
        }
        return view('komik/detail',$data);

    }

    public function create(){
        $data =[
            'title' => 'form tambah data',
            'validation' => \Config\Services::validation()
        ];

        return view('/komik/create',$data);
    }

    public function save(){

        if(!$this->validate([
            
            // jika di form create tidak memenuhi syarat berikut maka
            'judul' => 'required|is_unique[komik.judul]'
        ])){
            
            //mengambil pesan kesalahan
            $validation = \Config\Services::validation();

            return redirect()->to('/komik/create')->withInput()->with('validation',$validation);
        }

        $slug = url_title($this->request->getVar('judul'),'-',true);
        $this->KomikModel->save([
            'judul'=> $this->request->getVar('judul'),
             'slug' => $slug,
             'penulis' => $this->request->getVar('penulis'),
             'penerbit' => $this->request->getVar('penerbit'),
             

        ]);
        return redirect()->to('/');
    }

    public function delete($id){
        //fungsi bawaan ci4 yaitu fungsi delete
        $this->KomikModel->delete($id);
        
        return redirect()->to('/komik/index');
    }
    

    
}
