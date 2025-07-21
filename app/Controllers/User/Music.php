<?php

namespace App\Controllers\User;

use App\Models\ReviewModel;
use App\Models\SongsModel;
use App\Controllers\BaseController;

class Music extends BaseController
{
    protected $songsModel;
    protected $reviewModel;

    public function __construct()
    {
        $this -> songsModel = new SongsModel();
        $this -> reviewModel = new ReviewModel();
    }

    public function songs()
    {
        $songs = $this->songsModel->getAllSongs(10);
        $data = [
            'title' => 'MUSE MUSIC',
            'items' => $songs
        ];

        return view('/users/music/musics', $data);
    }

    public function focus_Music($id){
        $song = $this->songsModel -> getArtistSong($id);
        $songStats = $this->reviewModel -> getSongRating($id);
        $comments = $this->reviewModel->getSongReview($id);

        return view('/users/music/music', [
            'id'        => $song->id,
            'title'     => $song->title,
            'singer'    => $song->artist,
            'lyricist'  => $song->lyricist,
            'composer'  => $song->composer,
            'producer'  => $song->producer,
            'tgl_rilis' => $song->tgl_rilis,
            'img'       => $song->img,
            'rating'    => number_format($songStats->avg_rating, 2),
            'review'    => $songStats->total_reviews,
            'comments'  => $comments
        ]);
    }

    public function add_review($id) {
        $this -> reviewModel -> save([
            'comment' => $this -> request -> getVar('comment'),
            'rating' => $this -> request -> getVar('rating'),
            'id_user' => $this -> request -> getVar('id'),
            'id_songs' => $id
        ]);
        return redirect()->to('/song/'.$id);
    }
}

