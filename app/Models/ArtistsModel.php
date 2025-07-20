<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtistsModel extends Model
{
    protected $table      = 'artists';
    protected $allowedFields = ['nama', 'type', 'member', 'debut', 'img', 'bio'];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
}