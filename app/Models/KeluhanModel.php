<?php namespace App\Models;

use CodeIgniter\Model;

class KeluhanModel extends Model
{
    protected $table = 'keluhan';   
    protected $primaryKey = 'id_keluhan';
    protected $allowedFields = ['npm', 'keluhan','deskripsi_keluhan','id_kategori'];

    public function getKeluhanUser($data)
    {
         $this->join('kategori_keluhan','kategori_keluhan.id_kategori=keluhan.id_kategori');
         $this->where($data);
         $this->orderBy('created_at', 'DESC');
         return $this->get()->getResultArray();  
    }

    public function getKeluhanUserAll()
    {
         $this->join('kategori_keluhan','kategori_keluhan.id_kategori=keluhan.id_kategori');
         $this->join('users','users.npm=keluhan.npm');
         $this->orderBy('created_at', 'DESC');
         return $this->get()->getResultArray();  
    }

    public function getKeluhan($data)
    {
         $this->join('kategori_keluhan','kategori_keluhan.id_kategori=keluhan.id_kategori');
         $this->join('users','users.npm=keluhan.npm');
         $this->where($data);
         $this->orderBy('created_at', 'DESC');
         return $this->get()->getRowArray();  
    }

    public function deleteKeluhanUser($data)
    {
         return $this->delete($data);
    }

    
}

