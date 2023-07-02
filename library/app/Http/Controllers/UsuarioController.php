<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }
}
