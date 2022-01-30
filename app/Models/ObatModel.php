<?php namespace App\Models;

use CodeIgniter\Model;

class ObatModel extends Model
{
    protected $table = 'obat';   
    protected $primaryKey = 'id_obat';
    protected $allowedFields = ['id_obat', 'nama_obat','keterangan_obat'];

    public function getObatPenanganan($id_penanganan)
    {
         $this->join('penanganan','penanganan.id_penanganan=obat.id_penanganan');
         $this->where('obat.id_penanganan',$id_penanganan);
         return $this->get()->getResultArray();  
    }

    
}
