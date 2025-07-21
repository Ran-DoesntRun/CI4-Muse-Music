<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'review';
    protected $allowedFields = ['rating','comment', 'id_user', 'id_songs'];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    public function getSongRating($id) {
        return $this->select('IFNULL(AVG(rating), 0) as avg_rating, COUNT(id) as total_reviews')
        ->where('id_songs', $id)
        ->first();
    }

    public function getSongReview($id) {
        return $this ->select('review.*, user.nama as nama')
        ->join('user', 'user.email = review.id_user', 'left')
        ->where('id_songs', $id)
        ->orderBy('review.id', 'DESC')
        ->findAll();
    }
}