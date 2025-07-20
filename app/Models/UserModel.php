<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $allowedFields = ['email','nama', 'password'];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
}