<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    public function book()
    {
        $generos = Genero::all();
        return view('book.insert', compact('generos'));
    }

    public function newBook(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|min:3',
            'pag' => 'required',
            'autor' => 'string|required',
            'editora' => 'string|required',
            'ano' => 'required',
            'sinopse' => 'string|required',
        ]);

        $livro = Livro::create($dados);

        $generoIds = $request->input('generos');
        $livro->generos()->sync($generoIds);

        return redirect()->route('book')->with('sucesso', 'Livro adicionado com sucesso!');
    }
    public function searchBook(Request $request)
    {
        if ($request->isMethod('POST')) {
            $busca = $request->busca;

            $books = Livro::where('nome', 'LIKE', "%{$busca}%")
                ->orWhere('id', $busca)
                ->orderBy('id')
                ->get();
        } else {
            $books = Livro::all();
        }

        return view('book.book', [
            'book' => $books,
        ]);
    }

    public function editBook(Livro $books)
    {
        $generos = Genero::all();
        return view('book.insertCopy', [
            'book' => $books,
        ], compact('generos'));
    }
    public function editSaveBook(Request $request, Livro $books)
    {
        $dados = $request->validate([
            'nome' => [
                'required',
                Rule::unique('livros')->ignore($books->id)
            ],
            'pag' => 'required|numeric',
            'autor' => 'required',
            'editora' => 'required',
            'ano' => 'required',
            'sinopse' => 'required',
        ]);
        $books->fill($dados)->save();

        $generoIds = $request->input('generos');
        $books->generos()->sync($generoIds);

        return redirect()->route('book.view')->with('sucesso', 'Genero alterado com sucesso!');
    }

    public function deleteBook(Livro $books)
    {
        return view('book.deleteBook', [
            'book' => $books,
        ]);
    }
    public function deleteConfirmBook(Livro $books)
    {
        $books->generos()->detach();
        $books->delete();

        return redirect()->route('book.view')->with('sucesso', 'Livro apagado com sucesso!');
    }



    public function genre()
    {
        return view('book.insertG');
    }

    public function newGenre(Request $form)
    {
        $dados = $form->validate([
            'nome' => 'required|min:3',
        ]);

        Genero::create($dados);
        return redirect()->route('genre')->with('sucesso', 'Genero adicionado com sucesso!');

    }

    public function search(Request $request)
    {
        if ($request->isMethod('POST')) {
            $busca = $request->busca;

            $genero = Genero::where('nome', 'LIKE', "%{$busca}%")
                ->orWhere('id', $busca)
                ->orderBy('id')
                ->get();
        } else {
            $genero = Genero::all();
        }

        return view('book.genre', [
            'generos' => $genero,
        ]);
    }

    public function edit(Genero $genero)
    {
        return view('book.insertG', [
            'genre' => $genero,
        ]);
    }
    public function editSave(Request $form, Genero $genero)
    {
        $dados = $form->validate([
            'nome' => [
                'required',
                Rule::unique('generos')->ignore($genero->id)
            ],
        ]);
        $genero->fill($dados)->save();

        return redirect()->route('genre.view')->with('sucesso', 'Genero alterado com sucesso!');
    }


    public function delete(Genero $genero)
    {
        return view('book.delete', [
            'genre' => $genero,
        ]);
    }
    public function deleteConfirm(Genero $genero)
    {
        $genero->delete();

        return redirect()->route('genre.view')->with('sucesso', 'Genero apagado com sucesso!');
    }

}