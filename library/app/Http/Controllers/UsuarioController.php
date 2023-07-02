<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function regSuccess(Request $form){
        $dados = $form->validate([
            'nome' => 'required|min:3',
            'email' => 'required',
            'password' => 'string|required',
        ]);
        $dados['password'] = Hash::make($dados['password']);

        Usuario::create($dados);
        return redirect()->route('login')->with('sucesso', 'Conta Criada com sucesso!');
    }
}
