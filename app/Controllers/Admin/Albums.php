<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumsModel;
use App\Models\ArtistsModel;

class Albums extends BaseController
{

  protected $albumsModel;
  protected $artistsModel;

  public function __construct(){
    $this -> albumsModel = new AlbumsModel();
    $this -> artistsModel = new ArtistsModel();
  }
  public function index(){
        $data = [
            'title' => 'MUSE MUSIC',
            'subject' => 'albums',
            'albums' => $this -> albumsModel->getAlbumAndArtist()

        ];
        return view('/admin/albums/albums', $data);
    }

    public function create(){
      $artists = $this -> artistsModel->findAll();
      
        $data = [
            'title' => 'INPUT ALBUM',
            'artists' => $artists,
          ];
        return view('/admin/albums/albums_form', $data);
    }

    public function save(){
      $picture = $this->request->getFile('cover');
      $picture->move('assets/images');
      $namaPicture = $picture->getName();

      $this->albumsModel->save([
        'title' => $this->request->getVar('title'),
        'id_artists' => $this->request->getVar('artist_id'),
        'tgl_rilis' => $this->request->getVar('release'),
        'img' => $namaPicture
      ]);

      return redirect()->to('/admin/albums');
      
    }

    public function edit($id)
    {
        $album = $this->albumsModel->where(['id' => $id])->first();
        $artists = $this -> artistsModel->findAll();

        return view('admin/albums/albums_edit', [
            'album' => $album,
            'artists' => $artists,
            'title' => 'EDIT ALBUM'
        ]);
    }

    public function update($id){
      $album = $this->albumsModel->find($id);
      unlink('assets/images/'.$album->img);

      $picture = $this->request->getFile('cover');
      $picture->move('assets/images');
      $namaPicture = $picture->getName();

      $this->albumsModel->save([
        'id' => $id,
        'title' => $this->request->getVar('title'),
        'id_artists' => $this->request->getVar('artist_id'),
        'tgl_rilis' => $this->request->getVar('release'),
        'img' => $namaPicture
      ]);

      return redirect()->to('/admin/albums');
    }

    public function delete($id){
      $album = $this->albumsModel->find($id);
      unlink('assets/images/'.$album->img);

      $this->albumsModel->delete($id);

      return redirect()->to('/admin/albums');
    }

}