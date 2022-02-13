<?php

namespace App\Controllers;

use App\Models\KeluhanModel;
use App\Models\PenangananModel;
use App\Models\ObatModel;
use App\Models\UsersModel;

class Keluhan extends BaseController
{   
    private $keluhanmodel = '' ;
    public function __construct(){
        $this->keluhanmodel = new KeluhanModel();  
        $this->penangananmodel = new PenangananModel();   
        $this->obatmodel = new ObatModel();   
        $this->usermodel = new UsersModel(); 
    }

    // Input Keluhan Page
    public function index(){  
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/login');            
        }else{        
            $npm = session('npm'); 
            $where = array('users.npm'=>$npm);

            $getUser = $this->usermodel->getUserRole($where);  

            $data = [
                'users' => $getUser,
                'master' => view('templates/master'),
                'footer' => view('templates/footer'),
                'sidebar' => view('templates/sidebar',array('page' => 'Keluhan','users' => $getUser)),
                'navbar' => view('templates/navbar',array('users' => $getUser)),
            ];

            return view('input_keluhan',$data);
        }
    }

    // Data Keluhan Page
    public function data_keluhan(){  
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/login');            
        }else{        
            $npm = session('npm'); 
            $where = array('users.npm'=>$npm);

            $getUser = $this->usermodel->getUserRole($where); 
            $getKeluhanUser = $this->keluhanmodel->getKeluhanUserAll(); 

            $data = [
                'users' => $getUser,
                'keluhan' => $getKeluhanUser,
                'penangananmodel' => $this->penangananmodel,
                'master' => view('templates/master'),
                'footer' => view('templates/footer'),
                'sidebar' => view('templates/sidebar',array('page' => 'Data Keluhan','users' => $getUser)),
                'navbar' => view('templates/navbar',array('users' => $getUser)),
            ];

            return view('data_keluhan',$data);
        }
    }

    // Input Keluhan Proses
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

    // Data Keluhan Modal per Taruna
    public function modal_beri_penanganan($id_keluhan = null){  
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/login');            
        }else{        
            $whereKeluhan = array('id_keluhan'=>$id_keluhan);

            $getKeluhan = $this->keluhanmodel->getKeluhan($whereKeluhan); 
            $getUser = $this->usermodel->getUserRole(array('users.npm'=> $getKeluhan['npm'])); 

            $getPenanganan = $this->penangananmodel->getPenangananUser($id_keluhan); 
           
            if(!empty($getPenanganan)){
                $getObat = $this->obatmodel->getObatPenanganan($getPenanganan['id_penanganan']); 

                $data = [
                    'users' => $getUser,
                    'keluhan' => $getKeluhan,
                    'penanganan' => $getPenanganan,
                    'obat' => $getObat,

                ];    
            }else{
                $data = [
                    'users' => $getUser,
                    'keluhan' => $getKeluhan,
                    'penanganan' => $getPenanganan,
                ];

            }
            
            
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($data);
        }
    }
    
}
