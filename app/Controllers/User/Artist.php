<?php

namespace App\Controllers\User;

use App\Models\AlbumsModel;
use App\Models\ArtistsModel;
use App\Models\SongsModel;
use App\Controllers\BaseController;

class Artist extends BaseController
{

    protected $albumsModel;
    protected $artistsModel;
    protected $songsModel;

    public function __construct(){
        $this -> albumsModel = new AlbumsModel();
        $this -> artistsModel = new ArtistsModel();
        $this -> songsModel = new SongsModel();
    }
        public function artist(){
        $artists = $this->artistsModel
            ->select('artists.*')
            ->findAll();

        foreach ($artists as $artist) {
            $songStats = $this->songsModel->getAlbumOrArtistRating($artist->id, 'id_artist');
            $artist->rating = number_format($songStats->avg_rating, 2);
            $artist->review = $songStats->total_reviews;
        }

        return view('/users/artist/artist', [
            'title' => 'TOP 10 ARTISTS',
            'items' => $artists
        ]);
    }
    public function focus_Artist($id)
    {
        $artist = $this->artistsModel->find($id);
        $artistRatingQuery = $this->songsModel-> getAlbumOrArtistRating($artist -> id, 'id_artist');
        $songs = $this->songsModel-> getSongsByAlbumOrArtist($artist -> id, 'id_artist');
        $albums = $this->albumsModel->getAlbumByArtist($artist -> id);
            

        return view('users/artist/singer', [
            'id'          => $artist->id,
            'title'       => $artist->nama,
            'img'         => $artist->img,
            'singer_type' => $artist->type, 
            'members'     => $artist->member, 
            'debut'       => $artist->debut,
            'bio'         => $artist->bio,
            'rating'      => number_format($artistRatingQuery->avg_rating, 2),
            'review'      => $artistRatingQuery->total_reviews,
            'songs' => array_map(function($song) {
                return (object)[
                    'id'     => $song->id,
                    'judul'  => $song->title,
                    'rating' => number_format($song->avg_rating, 2),
                    'review' => $song->total_reviews,
                    'img'    => $song -> img
                ];
            }, $songs),
            'album' => array_map(function($album) {
                return (object)[
                    'id'     => $album->id,
                    'judul'  => $album->title,
                    'rating' => number_format($album->avg_album_rating, 2),
                    'review' => $album->total_album_reviews,
                    'img'    => $album -> img
                ];
            }, $albums)
        ]);
    }
}

