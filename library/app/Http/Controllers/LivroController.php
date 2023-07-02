<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use App\Models\Livrogen;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function book(){
        return view('book.insert');
    }

    public function newBook(Request $form){
        $dados = $form->validate([
            'nome' => 'required|min:3',
            'pag' => 'required',
            'autor' => 'string|required',
            'editora' => 'string|required',
            'ano' => 'required',
            'sinopse' => 'string|required',
        ]);

        Livro::create($dados);
        return redirect()->route('book')->with('sucesso', 'Livro adicionado com sucesso!');
    }

    public function genre(){
        return view('book.insertG');
    }

    public function newGenre(Request $form){
        $dados = $form->validate([
            'nome' => 'required|min:3',
        ]);

        Genero::create($dados);
        return redirect()->route('genre')->with('sucesso', 'Genero adicionado com sucesso!');

    }

    public function index(Request $request){
        if($request->isMethod('POST')) {
            $busca = $request->busca;

            $genero = Genero::where('nome', 'LIKE', "%{$busca}%")
            ->orderBy('nome')
            ->get();
        }else{
            $genero = Genero::all();
        }

        return view('book.genre', [
            'generos' => $genero,
        ]);
}

}
