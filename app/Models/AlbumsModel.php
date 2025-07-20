<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table      = 'albums';
    protected $allowedFields = ['title','tgl_rilis', 'id_artists', 'img'];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
}