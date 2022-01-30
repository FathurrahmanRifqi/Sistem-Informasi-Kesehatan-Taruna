<?php

namespace App\Controllers;

use App\Models\KeluhanModel;

class Keluhan extends BaseController
{   
    private $keluhanmodel = '' ;
    public function __construct(){
        $this->keluhanmodel = new KeluhanModel();   
    }

    public function index(){  
        
    }

    public function add_keluhan()    {  
        $npm = session('npm');
        $keluhan = $this->request->getVar('keluhan');
        $deskripsi_keluhan = $this->request->getVar('deskripsi_keluhan');
        $kategori_keluhan = $this->request->getVar('kategori_keluhan');

        $data = array(
            'npm'=>$npm,
            'keluhan'=>$keluhan,
            'deskripsi_keluhan'=>$deskripsi_keluhan,
            'id_kategori' => $kategori_keluhan
        );  
        var_dump($data);
        $tambah =  $this->keluhanmodel->insert($data);
        $session = session();

        if ($tambah) {
            $session->setFlashdata('msg', 'Keluhan berhasil di laporkan ke ASKES');
        }else{
            $session->setFlashdata('msg', 'Gagal laporkan keluhan');
            
        }
        
        return redirect()->to('/'); //redirect dashboard

    }
    
}
