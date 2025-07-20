<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumsModel;
use App\Models\ArtistsModel;
use App\Models\SongsModel;

class Songs extends BaseController
{
    protected $albumsModel;
  protected $artistsModel;
  protected $songsModel;

  public function __construct(){
    $this -> albumsModel = new AlbumsModel();
    $this -> artistsModel = new ArtistsModel();
    $this -> songsModel = new SongsModel();
  }

    public function index(){
        $db = \Config\Database::connect();

        $songs = $db->table('songs')
            ->select('songs.*, albums.title AS album, artists.nama AS singer')
            ->join('albums', 'albums.id = songs.id_album', 'left')
            ->join('artists', 'artists.id = songs.id_artist')
            ->get()
            ->getResult();

        $data = [
            'title' => 'MUSE MUSIC',
            'subject' => 'songs',
            'songs' => $songs
        ];

        return view('/admin/songs/songs', $data);
    }

    public function create(){
        $db = \Config\Database::connect();
        $albumsRaw = $db->table('albums')
            ->select('albums.id, albums.title, albums.id_artists')
            ->get()
            ->getResult();

        $albums = [];
        foreach ($albumsRaw as $album) {
            $albums[$album->id_artists][] = $album;
        }

        $data = [
            'title' => 'INPUT SONG',
            'artists' => $this->artistsModel->findAll(), // All artists
            'albums' => $albums // Grouped albums
        ];


        return view('/admin/songs/songs_form', $data);
    }

    public function edit($id)
{
    $db = \Config\Database::connect();

    // Get the song to edit
    $song = $db->table('songs')
        ->where('id', $id)
        ->get()
        ->getRow();

    if (!$song) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Song not found');
    }

    // Get all artists
    $artists = $db->table('artists')->get()->getResult();

    // Get albums grouped by artist
    $albumsQuery = $db->table('albums')->get()->getResult();
    $albums = [];
    foreach ($albumsQuery as $album) {
        $albums[$album->id_artists][] = $album;
    }

    return view('admin/songs/songs_edit', [
        'song'    => $song,
        'artists' => $artists,
        'albums'  => $albums,
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
}   