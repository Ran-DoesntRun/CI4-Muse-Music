<?php

namespace App\Models;

use CodeIgniter\Model;

class SongsModel extends Model
{
    protected $table      = 'songs';
    protected $allowedFields = ['title', 'lyricist', 'composer', 'producer', 'tgl_rilis', 'img', 'id_artist', 'id_album' ];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;
}