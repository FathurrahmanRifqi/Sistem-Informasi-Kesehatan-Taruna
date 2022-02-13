<?php

namespace App\Controllers;

use App\Models\KeluhanModel;
use App\Models\PenangananModel;
use App\Models\UsersModel;
use App\Models\ObatModel;


class Penanganan extends BaseController
{   
    private $keluhanmodel = '' ;
    public function __construct(){
        $this->keluhanmodel = new KeluhanModel();   
        $this->penangananmodel = new PenangananModel();  
        $this->obatmodel = new ObatModel();   
        $this->usermodel = new UsersModel(); 
    }

    // Input Penanganan Proses
    public function add_penanganan()    {  
        $npm = $this->request->getVar('npm');
        $tindak_lanjut = $this->request->getVar('tindak_lanjut');
        $keterangan = $this->request->getVar('keterangan');
        $id_keluhan = $this->request->getVar('id_keluhan');
        

        $data = array(
            'npm'=>$npm,
            'id_keluhan'=> $id_keluhan,
            'tindak_lanjut'=>$tindak_lanjut,
            'keterangan'=>$keterangan
        );  
        

        
        $tambah =  $this->penangananmodel->insert($data);

        $id_penanganan = $this->penangananmodel->insertID(); // id_last_insert penanganan
        $obat = $this->request->getVar('obat');
        $keterangan_obat = $this->request->getVar('keterangan_obat');
        
        $filtered = array_filter($obat);
  
    
        $data_obat = array();
        foreach( $obat as $k => $v){
            $data_obat[$k]['id_penanganan'] = $id_penanganan;            
            $data_obat[$k]['nama_obat'] = $v;            
        }

        foreach( $keterangan_obat as $l => $m){
            $data_obat[$l]['keterangan_obat'] = $m;            
        }

        $session = session();
        if ($tambah) {
            if(!empty($filtered) ){
           
                $tambah_obat =  $this->obatmodel->insertBatch($data_obat);
                if ($tambah_obat) {
                    $session->setFlashdata('msg', 'Penanganan berhasil di tambah');
                }else{
                    $session->setFlashdata('msg', 'Gagal input obat');
                    
                }
                
            } 
        }else{
            $session->setFlashdata('msg', 'Gagal input penanganan');
            
        }
        
        return redirect()->to('data_keluhan_page'); //redirect data keluhan

    }

     // Update Penanganan Proses
     public function update_penanganan()    {  
        $npm = $this->request->getVar('npm');
        $id_penanganan = $this->request->getVar('id_penanganan');
        $tindak_lanjut = $this->request->getVar('tindak_lanjut');
        $keterangan = $this->request->getVar('keterangan');
        $id_keluhan = $this->request->getVar('id_keluhan');
        

        $data = array(
            'npm'=>$npm,
            'id_keluhan'=> $id_keluhan,
            'keterangan'=>$keterangan,
            'tindak_lanjut'=>$tindak_lanjut,
        );  
        
        
        $update =  $this->penangananmodel->updatePenanganan($data,$id_penanganan);
        
        
        $id_obat = $this->request->getVar('id_obat');
        $obat = $this->request->getVar('obat');
        $keterangan_obat = $this->request->getVar('keterangan_obat');
        
        if(is_array($obat)){
            $filtered = array_filter($obat);
            $filtereds = array_filter($id_obat);
                
            $data_obat = array();
            $ceko = $this->obatmodel->getObatPenanganan($id_penanganan);
        
            foreach($id_obat as $k => $v){
                if(!empty($data_obat[$k]['id_obat'])){
                    $data_obat[$k]['id_obat'] = $ceko[$k]['id_obat'];
                }else{
                    $data_obat[$k]['id_obat'] = $v;
                }
            }
            
            foreach( $keterangan_obat as $l => $m){
                $data_obat[$l]['keterangan_obat'] = $m;            
            }

            foreach( $obat as $o => $p){
                $data_obat[$o]['id_penanganan'] = $id_penanganan;           
                $data_obat[$o]['nama_obat'] = $p;     
                
                
                // insert obat if null
                $cek = $this->obatmodel->cekObatPenanganan($data_obat[$o]['id_obat']);

                if($cek == 0){
                    
                    $datas = array(
                        'id_penanganan' => $data_obat[$o]['id_penanganan'],
                        'nama_obat' => $data_obat[$o]['nama_obat'],
                        'keterangan_obat' => $data_obat[$o]['keterangan_obat'],
                    );

                    if(!empty($datas['nama_obat'])){
                        $tambah_obat =  $this->obatmodel->insert($datas);
                    }
                }


            }

        }


    
        

        $session = session();
        if ($update) {
            if(!empty($filtered) ){
            
                $update_obat =  $this->obatmodel->updateBatch($data_obat,'id_obat');

                if ($update_obat) {
                
                    $session->setFlashdata('msg', 'Penanganan berhasil di update');
                }else{
                    $session->setFlashdata('msg', 'Gagal input obat');
                    
                }
                
            } 
        }else{
            $session->setFlashdata('msg', 'Gagal input penanganan');
            
        }
        
        return redirect()->to('data_keluhan_page'); //redirect data keluhan

    }


    // Hapus obat proses
    public function hapus_obat($id_obat){
        $session = session();  
        if(session('npm') == ""){
            return redirect()->to('/auth');            
        }else{
            $whereObat = array('id_obat'=>$id_obat);
        
            $deleteObat = $this->obatmodel->deleteObat($whereObat);
            if($deleteObat){
                $session->setFlashdata('msg', 'hapus obat berhasil');
            }else{
                $session->setFlashdata('msg', 'Gagal proses data');
            }

        }
    }

}

