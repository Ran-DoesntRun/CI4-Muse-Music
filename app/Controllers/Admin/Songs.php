<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumsModel;
use App\Models\ArtistsModel;
use App\Models\ReviewModel;
use App\Models\SongsModel;

class Songs extends BaseController
{
    protected $albumsModel;
  protected $artistsModel;
  protected $songsModel;
  protected $reviewModel;

  public function __construct(){
    $this -> albumsModel = new AlbumsModel();
    $this -> artistsModel = new ArtistsModel();
    $this -> songsModel = new SongsModel();
    $this -> reviewModel = new ReviewModel();
  }

    public function index(){

        $songs = $this -> songsModel -> getAllSongWthReview();
            

        $data = [
            'title' => 'MUSE MUSIC',
            'subject' => 'songs',
            'songs' => $songs
        ];

        return view('/admin/songs/songs', $data);
    }

    public function create(){
        

        $data = [
            'title' => 'INPUT SONG',
            'artists' => $this->artistsModel->findAll(), // All artists
            'albums' => $this->albumsModel->getAlbums() // Grouped albums
        ];


        return view('/admin/songs/songs_form', $data);
    }

    public function edit($id)
{
    $song = $this -> songsModel
        ->where('id', $id)
        ->get()
        ->getRow();

    $artists = $this -> artistsModel ->get()->getResult();

    return view('admin/songs/songs_edit', [
        'song'    => $song,
        'artists' => $artists,
        'albums'  => $this -> albumsModel ->getAlbums(),
        'title'   => 'EDIT SONG'
    ]);
}


    public function save(){
      $picture = $this->request->getFile('img');
      $picture->move('assets/images');
      $namaPicture = $picture->getName();

      $this->songsModel->save([
        'title' => $this->request->getVar('title'),
        'lyricist' => $this->request->getVar('lyricist'),
        'composer' => $this->request->getVar('composer'),
        'producer' => $this->request->getVar('producer'),
        'tgl_rilis' => $this->request->getVar('tgl_rilis'),
        'id_artist' => $this->request->getVar('id_artist'),
        'id_album' => $this->request->getVar('id_album'),
        'img' => $namaPicture
      ]);

      return redirect()->to('/admin/songs');
      
    }

    public function update($id){
        $song = $this->songsModel->find($id);
        unlink('assets/images/'.$song->img);

        $picture = $this->request->getFile('img');
        $picture->move('assets/images');
        $namaPicture = $picture->getName();

        $this->songsModel->save([
            'id' => $id,
            'title' => $this->request->getVar('title'),
            'lyricist' => $this->request->getVar('lyricist'),
            'composer' => $this->request->getVar('composer'),
            'producer' => $this->request->getVar('producer'),
            'tgl_rilis' => $this->request->getVar('tgl_rilis'),
            'id_artist' => $this->request->getVar('id_artist'),
            'id_album' => $this->request->getVar('id_album'),
            'img' => $namaPicture
        ]);

        return redirect()->to('/admin/songs');
      
    }

    public function delete($id){
      $song = $this->songsModel->find($id);
      unlink('assets/images/'.$song->img);

      $this->songsModel->delete($id);

      return redirect()->to('/admin/songs');
    }

    public function review($id) {
        $song = $this->songsModel -> getArtistSong($id);
        $review = $this->reviewModel->getSongReview($id);
        return view('/admin/songs/review', [
            'id'        => $song->id,
            'title'     => $song->title,
            'singer'    => $song->artist,
            'comments'  => $review
        ]);
    }

    public function delrev($id){

      $this->reviewModel->delete($id);

      return redirect()->to('/admin/songs');
    }
}   