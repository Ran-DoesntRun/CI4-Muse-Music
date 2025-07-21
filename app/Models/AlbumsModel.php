<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsModel extends Model
{
    protected $table      = 'albums';
    protected $allowedFields = ['title','tgl_rilis', 'id_artists', 'img'];
    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    public function getAlbumByArtist($id){
        return $this->select('albums.*, 
                IFNULL(AVG(review.rating), 0) as avg_album_rating, 
                COUNT(review.id) as total_album_reviews')
            ->join('songs', 'songs.id_album = albums.id', 'left')
            ->join('review', 'review.id_songs = songs.id', 'left')
            ->where('albums.id_artists', $id)
            ->groupBy('albums.id')
            ->findAll();
    }

    public function getAlbumAndArtist()  {
        return $this->select('albums.*, artists.nama as artist')
            ->join('artists', 'artists.id = albums.id_artists', 'left')
            ->findAll();
    }

    public function getOneArtistAndAlbum($id) {
        return $this->select('albums.*, artists.nama as singer')
            ->join('artists', 'artists.id = albums.id_artists', 'left')
            ->where('albums.id', $id)
            ->first();
    }

    public function getAlbums() {
        $albumsRaw = $this ->select('albums.id, albums.title, albums.id_artists')
            ->get()
            ->getResult();

        $albums = [];
        foreach ($albumsRaw as $album) {
            $albums[$album->id_artists][] = $album;
        }

        return $albums;
    }
}