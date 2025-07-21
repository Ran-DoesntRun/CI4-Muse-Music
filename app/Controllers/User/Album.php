<?php

namespace App\Controllers\User;

use App\Models\AlbumsModel;
use App\Models\ArtistsModel;
use App\Models\ReviewModel;
use App\Models\SongsModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class Album extends BaseController
{

    protected $albumsModel;
    protected $artistsModel;
    protected $songsModel;
    protected $reviewModel;
    protected $usersModel;

    public function __construct(){
        $this -> albumsModel = new AlbumsModel();
        $this -> artistsModel = new ArtistsModel();
        $this -> songsModel = new SongsModel();
        $this -> reviewModel = new ReviewModel();
        $this -> usersModel = new UserModel();
    }
    public function albums()
    {
        $albums = $this->albumsModel->getAlbumAndArtist();
            

        foreach ($albums as $album) {
            $songStats = $this->songsModel->getAlbumOrArtistRating($album->id, 'id_album');
            $album->rating = number_format($songStats->avg_rating, 2);
            $album->review = $songStats->total_reviews;
        }

        return view('/users/album/albums', [
            'title' => 'POPULAR ALBUMS',
            'items' => $albums
        ]);
    }
    public function focus_Album($id)
    {
        $album = $this->albumsModel->getOneArtistAndAlbum($id);
        $songs = $this->songsModel->getSongsByAlbumOrArtist($id,'id_album');
        $albumRatingQuery = $this->songsModel->getAlbumOrArtistRating($id,'id_album');

        return view('users/album/album', [
            'id'      => $album->id,
            'title'   => $album->title,
            'singer'  => $album->singer,
            'release' => $album->tgl_rilis,
            'img'     => $album->img,
            'rating'  => number_format($albumRatingQuery->avg_rating, 2),
            'review'  => $albumRatingQuery->total_reviews,
            'subject' => 'song',
            'items'   => array_map(function($song) {
                return (object)[
                    'id'     => $song->id,
                    'judul'  => $song->title,
                    'rating' => number_format($song->avg_rating, 2),
                    'review' => $song->total_reviews
                ];
            }, $songs)
        ]);
    }
}