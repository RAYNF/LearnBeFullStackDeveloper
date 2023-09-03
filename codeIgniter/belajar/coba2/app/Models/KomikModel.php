<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
    //konektor ke database
    protected $table      = 'komik';
    protected $useTimestamps = true;
    //table yang boleh diisi
    protected $allowedFields = ['judul','slug','penulis','penerbit','sampul'];
    

    public function getKomik($slug = false){
        //kalau tidak ada parameter kembalikan semua
        if($slug == false){
            return $this->findAll();
        }

        //jika ada parameter cari yang isinya sama dengan inputan
        return $this->where(['slug' => $slug])->first();
    }
}
