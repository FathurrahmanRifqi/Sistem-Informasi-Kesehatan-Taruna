<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';  
    protected $primaryKey = 'id_users';
    protected $allowedFields = ['npm', 'nama','username','password','id_status','id_kelas','id_role','isoman'];

    public function getUserRole($data)
    {
         $this->join('roles','roles.id_role=users.id_role');
         $this->join('status_taruna','status_taruna.id_status=users.id_status');
         $this->where($data);
         return $this->get()->getRowArray();  
    }

    public function countUserKondisi($data)
    {
         $this->join('roles','roles.id_role=users.id_role');
         $this->join('status_taruna','status_taruna.id_status=users.id_status');
         $this->select('status');
         $this->where($data);
         return $this->countAllResults(); 
    }

    public function countUserAll()
    {
         $this->join('roles','roles.id_role=users.id_role');
         $this->join('status_taruna','status_taruna.id_status=users.id_status');
         return $this->countAllResults();  
    }

    public function updateIsoman($data,$where)
    {
        $this->set($data);
        $this->where($where);
        return $this->update();
    }
}

