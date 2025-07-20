<?php

namespace App\Controllers;

use App\Models\AlbumsModel;
use App\Models\ArtistsModel;
use App\Models\ReviewModel;
use App\Models\SongsModel;
use App\Models\UserModel;

class Users extends BaseController
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
    public function songs()
    {
        $songs = $this->songsModel
            ->select('songs.*, artists.nama as artist, 
                IFNULL(AVG(review.rating), 0) as rating,
                COUNT(review.id) as review')
            ->join('artists', 'artists.id = songs.id_artist', 'left')
            ->join('review', 'review.id_songs = songs.id', 'left')
            ->groupBy('songs.id')
            ->orderBy('rating', 'DESC')
            ->limit(10)
            ->findAll();

       $data = [
        'title' => 'MUSE MUSIC',
        'items' => $songs
        
       ];

        return view('/users/musics', $data);
    }

    public function albums()
    {
        $albums = $this->albumsModel
            ->select('albums.*, artists.nama as artist')
            ->join('artists', 'artists.id = albums.id_artists', 'left')
            ->findAll();

        // Calculate album ratings
        foreach ($albums as $album) {
            $songStats = $this->songsModel
                ->select('IFNULL(AVG(review.rating), 0) as avg_rating, COUNT(review.id) as total_reviews')
                ->join('review', 'review.id_songs = songs.id', 'left')
                ->where('songs.id_album', $album->id)
                ->first();

            $album->rating = number_format($songStats->avg_rating, 2);
            $album->review = $songStats->total_reviews;
        }

        return view('/users/albums', [
            'title' => 'POPULAR ALBUMS',
            'items' => $albums
        ]);
    }

    public function artist(){
        $artists = $this->artistsModel
            ->select('artists.*')
            ->findAll();

        foreach ($artists as $artist) {
            $songStats = $this->songsModel
                ->select('IFNULL(AVG(review.rating), 0) as avg_rating, COUNT(review.id) as total_reviews')
                ->join('review', 'review.id_songs = songs.id', 'left')
                ->where('songs.id_artist', $artist->id)
                ->first();

            $artist->rating = number_format($songStats->avg_rating, 2);
            $artist->review = $songStats->total_reviews;
        }

        return view('/users/artist', [
            'title' => 'TOP 10 ARTISTS',
            'items' => $artists
        ]);
    }

    public function focus_Music($id){
        $song = $this->songsModel
        ->select('songs.*, artists.nama as artist')
        ->join('artists', 'artists.id = songs.id_artist', 'left')
        ->where('songs.id', $id)
        ->first();

         $songStats = $this->reviewModel
        ->select('IFNULL(AVG(rating), 0) as avg_rating, COUNT(id) as total_reviews')
        ->where('id_songs', $id)
        ->first();

    // Get all comments for the song
    $comments = $this->reviewModel
        ->select('review.*, user.nama as nama')
        ->join('user', 'user.email = review.id_user', 'left')
        ->where('id_songs', $id)
        ->orderBy('review.id', 'DESC')
        ->findAll();

    return view('/users/music', [
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

    public function save(){
        $this -> usersModel -> save([
            'email' => $this -> request -> getVar('email'),
            'nama' => $this -> request -> getVar('nama'),
            'password' => $this -> request -> getVar('password')
        ]);

        return redirect()->to('/login');
    }

    public function focus_Album($id)
{
    // Get album detail with artist name
    $album = $this->albumsModel
        ->select('albums.*, artists.nama as singer')
        ->join('artists', 'artists.id = albums.id_artists', 'left')
        ->where('albums.id', $id)
        ->first();

    if (!$album) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Album not found');
    }

    // Get all songs in this album with their individual ratings & reviews
    $songs = $this->songsModel
        ->select('songs.*, 
            IFNULL(AVG(review.rating), 0) as avg_rating, 
            COUNT(review.id) as total_reviews')
        ->join('review', 'review.id_songs = songs.id', 'left')
        ->where('songs.id_album', $id)
        ->groupBy('songs.id')
        ->findAll();

    // Calculate album rating as the average of all songs' ratings
    $albumRatingQuery = $this->songsModel
        ->select('IFNULL(AVG(review.rating), 0) as avg_album_rating, COUNT(review.id) as total_album_reviews')
        ->join('review', 'review.id_songs = songs.id', 'left')
        ->where('songs.id_album', $id)
        ->first();

    return view('users/album', [
        'id'      => $album->id,
        'title'   => $album->title,
        'singer'  => $album->singer,
        'release' => $album->tgl_rilis,
        'img'     => $album->img,
        'rating'  => number_format($albumRatingQuery->avg_album_rating, 2),
        'review'  => $albumRatingQuery->total_album_reviews,
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


    public function focus_Artist($id)
{
    // Get artist detail
    $artist = $this->artistsModel->find($id);

    if (!$artist) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Artist not found');
    }

    // Calculate artist rating based on all their songs
    $artistRatingQuery = $this->songsModel
        ->select('IFNULL(AVG(review.rating), 0) as avg_artist_rating, COUNT(review.id) as total_artist_reviews')
        ->join('review', 'review.id_songs = songs.id', 'left')
        ->where('songs.id_artist', $id)
        ->first();

    // Get all songs for this artist with their individual ratings
    $songs = $this->songsModel
        ->select('songs.*, 
            IFNULL(AVG(review.rating), 0) as avg_rating, 
            COUNT(review.id) as total_reviews')
        ->join('review', 'review.id_songs = songs.id', 'left')
        ->where('songs.id_artist', $id)
        ->groupBy('songs.id')
        ->findAll();

    // Get all albums for this artist with their ratings
    $albums = $this->albumsModel
        ->select('albums.*, 
            IFNULL(AVG(review.rating), 0) as avg_album_rating, 
            COUNT(review.id) as total_album_reviews')
        ->join('songs', 'songs.id_album = albums.id', 'left')
        ->join('review', 'review.id_songs = songs.id', 'left')
        ->where('albums.id_artists', $id)
        ->groupBy('albums.id')
        ->findAll();

    return view('users/singer', [
        'id'          => $artist->id,
        'title'       => $artist->nama,
        'img'         => $artist->img,
        'singer_type' => $artist->type, // e.g., 'Group' or 'Soloist'
        'members'     => $artist->member, // comma-separated names
        'debut'       => $artist->debut,
        'bio'         => $artist->bio,
        'rating'      => number_format($artistRatingQuery->avg_artist_rating, 2),
        'review'      => $artistRatingQuery->total_artist_reviews,
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


    public function login(){
        $data = [
            'title' => 'login',
        ];
        return view('users/login', $data);
    }

    public function signup(){
        $data = [
            'title' => 'SIGN UP',
        ];
        return view('users/register', $data);
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

    public function auth() {
        $data = $this -> usersModel -> findAll();

        foreach($data as $dt){
            if($dt -> email === $this -> request-> getVar('email') && $dt -> password === $this -> request-> getVar('password')){
                session()->set('email', $dt -> email);
                return redirect()->to('/song');
            } else {
                return redirect()->to('/login');
            }
        }
        
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('login');
    }
}

