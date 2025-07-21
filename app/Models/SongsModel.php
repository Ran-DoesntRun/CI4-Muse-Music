<?php

namespace App\Models;

use CodeIgniter\Model;

class SongsModel extends Model
{
    protected $table      = 'songs';
    protected $allowedFields = ['title', 'lyricist', 'composer', 'producer', 'tgl_rilis', 'img', 'id_artist', 'id_album' ];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    public function getAlbumOrArtistRating($id, $field) {
        return $this->select('IFNULL(AVG(review.rating), 0) as avg_rating, COUNT(review.id) as total_reviews')
                ->join('review', 'review.id_songs = songs.id', 'left')
                ->where('songs.'.$field, $id)
                ->first();
    }

    public function getSongsByAlbumOrArtist($id, $field)
    {
        return $this->select('songs.*, 
                    IFNULL(AVG(review.rating), 0) as avg_rating, 
                    COUNT(review.id) as total_reviews')
            ->join('review', 'review.id_songs = songs.id', 'left')
            ->where('songs.'.$field, $id)
            ->groupBy('songs.id')
            ->findAll();
    }

    public function getAllSongs($limit) {
        return $this ->select('songs.*, artists.nama as artist, 
                IFNULL(AVG(review.rating), 0) as rating,
                COUNT(review.id) as review')
            ->join('artists', 'artists.id = songs.id_artist', 'left')
            ->join('review', 'review.id_songs = songs.id', 'left')
            ->groupBy('songs.id')
            ->orderBy('rating', 'DESC')
            ->limit($limit)
            ->findAll();
        
    }

    public function getArtistSong($id) {
        return $this->select('songs.*, artists.nama as artist')
        ->join('artists', 'artists.id = songs.id_artist', 'left')
        ->where('songs.id', $id)
        ->first();
    }

    public function getAllSongWthReview() {
        return $this ->select('songs.*, albums.title AS album, artists.nama AS singer')
            ->join('albums', 'albums.id = songs.id_album', 'left')
            ->join('artists', 'artists.id = songs.id_artist')
            ->get()
            ->getResult();
    }
}