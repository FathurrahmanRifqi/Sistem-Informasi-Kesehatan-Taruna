<?php namespace App\Models;

use CodeIgniter\Model;

class PenangananModel extends Model
{
    protected $table = 'penanganan';   
    protected $primaryKey = 'id_penanganan';
    protected $allowedFields = ['npm', 'id_keluhan','keterangan','tindak_lanjut'];

    public function getPenangananUser($id_keluhan)
    {
         $this->join('keluhan','keluhan.id_keluhan=penanganan.id_keluhan');
         $this->where('penanganan.id_keluhan',$id_keluhan);
         return $this->get()->getRowArray();  
    }

    
}

