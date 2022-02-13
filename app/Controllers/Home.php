<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\KeluhanModel;
use App\Models\PenangananModel;
use App\Models\ObatModel;

class Home extends BaseController
{   
    # INDEX
    #===================================

    private $keluhanmodel = '' ;
    private $penangananmodel = '' ;
    public function __construct(){
        $this->keluhanmodel = new KeluhanModel();   
        $this->penangananmodel = new PenangananModel();   
        $this->obatmodel = new ObatModel();   
        $this->usermodel = new UsersModel();      

    }


    public function index() {  
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/login');            
        }else{
        
            $npm = session('npm');
            $where = array('users.npm'=>$npm);
            $whereSehat = array('users.id_status'=> '1');
            $whereSakit = array('users.id_status'=> '2');
            $whereIsoman = array('users.isoman'=> '1');
            $whereUser = array('keluhan.npm'=>$npm);

            $countUserAll = $this->usermodel->countUserAll();
            $getUser = $this->usermodel->getUserRole($where);  
            $countUserKondisiSehat = $this->usermodel->countUserKondisi($whereSehat);
            $countUserKondisiSakit = $this->usermodel->countUserKondisi($whereSakit);
            $countUserKondisiIsoman = $this->usermodel->countUserKondisi($whereIsoman);
            $getKeluhanUser = $this->keluhanmodel->getKeluhanUser($whereUser);
            $data = [
                'total_taruna' => $countUserAll,
                'total_sehat' => $countUserKondisiSehat,
                'total_sakit' => $countUserKondisiSakit,
                'total_isoman' => $countUserKondisiIsoman,
                'users' => $getUser,
                'keluhan' => $getKeluhanUser,
                'penangananmodel' => $this->penangananmodel,
                'obatmodel' => $this->obatmodel,
                'master' => view('templates/master'),
                'footer' => view('templates/footer'),
                'sidebar' => view('templates/sidebar',array('page' => 'Dashboard','users' => $getUser)),
                'navbar' => view('templates/navbar',array('users' => $getUser)),
            ];


            return view('signin',$data);
        }
    } 

    public function already_healthy($id_keluhan = null){
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/auth');            
        }else{
        
            $npm = session('npm');
            $whereUser = array('keluhan.npm'=>$npm,'id_keluhan'=>$id_keluhan);

            $deleteKeluhanUser = $this->keluhanmodel->deleteKeluhanUser($whereUser);
            if($deleteKeluhanUser){
                $session->setFlashdata('msg', 'Selamat anda sudah sembuh');
            }else{
                $session->setFlashdata('msg', 'Gagal proses data');
            }

            
            return redirect()->to('/'); //redirect dashboard

        }
    }

    public function already_healthy_by_askes($id_keluhan = null){
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/auth');            
        }else{
        
            $npm = session('npm');
            $whereUser = array('keluhan.npm'=>$npm,'id_keluhan'=>$id_keluhan);

            $deleteKeluhanUser = $this->keluhanmodel->deleteKeluhanUser($whereUser);
            if($deleteKeluhanUser){
                $session->setFlashdata('msg', 'Diagnosa sembuh berhasil');
            }else{
                $session->setFlashdata('msg', 'Gagal proses data');
            }

            
            return redirect()->to('data_keluhan_page'); //redirect dashboard

        }
    }

    public function choose_isoman(){
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/auth');            
        }else{
            $npm = session('npm');
            $isoman = $this->request->getVar('isoman');

            $where = array('npm'=>$npm); 
            $data = array('isoman'=>$isoman); 

            $chooseIsoman= $this->usermodel->updateIsoman($data,$where);
            if($chooseIsoman){
                $session->setFlashdata('msg', 'Edit kondisi berhasi');
            }else{
                $session->setFlashdata('msg', 'Gagal edit kondisi');
            }

            return redirect()->to('/'); //redirect dashboard

        }
    }


}
