<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'email';
    protected $allowedFields = ['email','nama', 'password','type'];
    protected $returnType     = 'object';
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = false;

    public function loginProcess($email, $password) {
        $data = $this -> findAll();

        foreach($data as $dt){
            if($dt -> email == $email && $dt -> password == $password ){
                
                return true;
            } 

        }
        return false;
    }

}