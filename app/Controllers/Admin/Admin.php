<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $usersModel;

    public function __construct() {
        $this -> usersModel = new UserModel();
    }

    public function index()
    {
        return view('/admin/login');
    }

    public function register()
    {
        return view('/admin/register', ['title' => 'REGISTER']);
    }

    public function auth() {
        
        if($this -> usersModel -> loginProcess($this -> request-> getVar('email'), $this -> request-> getVar('password'))== true){
            $data = $this ->usersModel-> find($this -> request-> getVar('email'));
            session()->set
                ([
                    'email'=> $data -> email,
                    'type'=> $data -> type
                ]);
            return redirect()->to('/admin/songs');
        }else{
            return redirect()->to('/admin');
        }
    }

    public function save(){
        $this -> usersModel -> save([
            'email' => $this -> request -> getVar('email'),
            'nama' => $this -> request -> getVar('nama'),
            'password' => $this -> request -> getVar('password'),
            'type' => $this -> request -> getVar('type')
        ]);

        return redirect()->to('/admin/songs');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin');
    }
}

