<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ArtistsModel;

class Artists extends BaseController
{
  protected $artistsModel;

  public function __construct(){
    $this -> artistsModel = new ArtistsModel();
  }
  public function index(){
    $artist = $this->artistsModel->findAll();
        $data = [
            'title' => 'MUSE MUSIC',
            'subject' => 'albums',
            'artists' => $artist
        ];

        return view('/admin/artists/artists', $data);
    }

    public function create(){
        $data = [
            'title' => 'INPUT ARTIST',
        ];

        return view('/admin/artists/artists_form', $data);
    }

    public function save(){
      $picture = $this->request->getFile('picture');
      $picture->move('assets/images');
      $namaPicture = $picture->getName();

      $this->artistsModel->save([
        'nama' => $this->request->getVar('nama'),
        'type' => $this->request->getVar('singer_type'),
        'member' => $this->request->getVar('members'),
        'debut' => $this->request->getVar('debut'),
        'bio' => $this->request->getVar('bio'),
        'img' => $namaPicture
      ]);

      return redirect()->to('/admin/artists');
      
    }

    public function update($id){
      $artist = $this->artistsModel->find($id);
      unlink('assets/images/'.$artist->img);

      $picture = $this->request->getFile('picture');
      $picture->move('assets/images');
      $namaPicture = $picture->getName();

      $this->artistsModel->save([
        'id' => $id,
        'nama' => $this->request->getVar('nama'),
        'type' => $this->request->getVar('singer_type'),
        'member' => $this->request->getVar('members'),
        'debut' => $this->request->getVar('debut'),
        'bio' => $this->request->getVar('bio'),
        'img' => $namaPicture
      ]);

      return redirect()->to('/admin/artists');
      
    }

    

    public function edit($id)
    {
        $artist = $this->artistsModel->where(['id' => $id])->first();

        return view('admin/artists/artists_edit', ['artist' => $artist, 'title' => 'ARTIST EDIT']);
    }

    public function delete($id){

      $artist = $this->artistsModel->find($id);
      unlink('assets/images/'.$artist->img);

      $this->artistsModel->delete($id);

      return redirect()->to('/admin/artists');
    }
}