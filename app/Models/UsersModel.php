<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username', 'email', 'password', 'level'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    function get_data_login($email,$tbl){
        $builder = $this->db->table($tbl);
        $builder->where('email',$email);
        $log = $builder->get()->getRow();
        return $log;
    }
}
