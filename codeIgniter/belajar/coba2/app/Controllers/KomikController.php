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
        
        return redirect()->to('/');
    }

    public function edit($slug){
        $data = [
            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            // dan ambil data komik yang hendak di edit
            'komik' => $this->KomikModel->getKomik($slug)
        ];

        return view('/komik/edit',$data);
    }
    
    public function update($id){

        //nampilin data 
        $KomikLama = $this->KomikModel->getKomik($this->request->getVar('slug'));
        if($KomikLama['judul'] == $this->request->getVar('judul')){
            $rule_judul = 'required';
        }
        else{
            $rule_judul = 'required|is_unique[komik.judul]';
        }
        
        //validasi
        if(!$this->validate([
            // jika di form create tidak memenuhi syarat berikut maka
            'judul' => $rule_judul,
            

        ])){
            //mengambil pesan kesalahan
            $validation = \Config\Services::validation();

            //tes menampilkan kesalahan validasi
            // dd($validation);



            //kembalikan ke halaman form 
            //kalau pake redirect kita bisa chaining dengan methode input, validasi juga di kirim ke session
            return redirect()->to('/komik/edit/'. $this->request->getVar('slug'))->withInput()->with('validation',$validation);
            
        }
        $slug = url_title($this->request->getVar('judul'),'-',true);

        //kalau sudah pakae model lebih gampang memasukan data ke database
        $this->KomikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);
        
        return redirect()->to('/');
    }

    
    
}
