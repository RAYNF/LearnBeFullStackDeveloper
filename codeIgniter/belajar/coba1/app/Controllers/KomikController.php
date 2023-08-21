<?php

namespace App\Controllers;

use App\Models\KomikModel;
use Config\View;

class KomikController extends BaseController
{
    //di masukan ke contructor agar tidak perlu mengulang" pembagilan dalam setiap intruksi
   
    //supaya semua method bisa pakai
    protected $KomikModel;
    public function __construct()
    {
        //konek controler ke model
        $this->KomikModel = new KomikModel();
    }
    
    public function index(){

        //ambil data
        // $komik = $this->KomikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            // buat tamppilan awal makanya tidak usah diberi parameter
            'komik' => $this->KomikModel->getKomik()
        ];

        //cara konek db tanpa model (tidak direkomendasikan)
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // foreach($komik->getResultArray() as $row){
        //     d($row);
        // }

        //konek pakai model,butuh instansiasi model kita
        // $KomikModel = new KomikModel();
        // $komik = $KomikModel->findAll();
        // d($komik);

        //pakai kontruktor
        
        
        return view('komik\index',$data);
    }

    public function detail($slug){
      
       $data = [
        'title' => 'Detail Komik',
          //ambil dari model komik method get komik 
        'komik' => $this->KomikModel->getKomik($slug)
       ];

       //jika komik tidak ada di tabel maka codeigneter punya fitur
       if(empty($data['komik'])){
        throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik '.$slug.' tidak ditemukan.');
       }
       return view('komik/detail',$data);
    }
    
//mengantar ke halaman form
    public function create(){
        //fungsi session agar bisa mengambil validation
     
        $data = [
            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('/komik/create',$data);
    }

    //berfungsi untuk mengelola data yang dikirim dari create untuk di insert ke tabel
    public function save(){
        //tes
        //getVar berfungsi untuk mengambil request apapun bisa get bisa post
        // dd($this->request->getVar());

        //olah slug dengan fitur codeIgneter

        //validasi input
        //jika tidak tervalidasi 
        if(!$this->validate([
            // jika di form create tidak memenuhi syarat berikut maka
            'judul' => 'required|is_unique[komik.judul]'
        ])){
            //mengambil pesan kesalahan
            $validation = \Config\Services::validation();

            //tes menampilkan kesalahan validasi
            // dd($validation);



            //kembalikan ke halaman form 
            //kalau pake redirect kita bisa chaining dengan methode input, validasi juga di kirim ke session
            return redirect()->to('/komik/create')->withInput()->with('validation',$validation);
        }


        $slug = url_title($this->request->getVar('judul'),'-',true);

        //kalau sudah pakae model lebih gampang memasukan data ke database
        $this->KomikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        //cara bikin flash data
        session()->setFlashdata('pesan','Data berhasil ditambahkan');
        return redirect()->to('/komik/index');
        
    }
}