<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'review';
    protected $allowedFields = ['rating','comment', 'id_user', 'id_songs'];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
}