<?php

namespace App\Controllers\User;

use App\Models\UserModel;
use App\Controllers\BaseController;

class Users extends BaseController
{
  protected $usersModel;

  public function __construct(){
    $this -> usersModel = new UserModel();
  }

    public function save(){
        $this -> usersModel -> save([
            'email' => $this -> request -> getVar('email'),
            'nama' => $this -> request -> getVar('nama'),
            'password' => $this -> request -> getVar('password'),
            'type' => $this -> request -> getVar('type')
        ]);

        return redirect()->to('/login');
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

    public function auth() {
        
        if($this -> usersModel -> loginProcess($this -> request-> getVar('email'), $this -> request-> getVar('password'))== true){
            $data = $this ->usersModel-> find($this -> request-> getVar('email'));
            session()->set
                ([
                    'email'=> $data -> email,
                    'type'=> $data -> type
                ]);
            return redirect()->to('/song');
        }else{
            return redirect()->to('/login');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('login');
    }
}

