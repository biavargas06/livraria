<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
            'preco' => 'required|numeric|min:0',
            'imagem' => [
                'image',
                Rule::dimensions()->maxWidth(2048)->maxHeight(2048),
                Rule::file()->max(2048),
            ],
        ]);
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('livros', 'public');
            $dados['imagem'] = $imagemPath;
        } else {
            $dados['imagem'] = '';
        }

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
        $rules = [
            'nome' => [
                'required',
                Rule::unique('livros')->ignore($books->id),
            ],
            'pag' => 'required|numeric',
            'autor' => 'required',
            'editora' => 'required',
            'ano' => 'required',
            'sinopse' => 'required',
            'preco' => 'required',
        ];

        // Verifica se foi enviada uma nova imagem
        if ($request->hasFile('imagem')) {
            // Se sim, adiciona as regras de validação da imagem
            $rules['imagem'] = [
                'image',
                Rule::dimensions()->maxWidth(2048)->maxHeight(2048),
                Rule::file()->max(2048),
            ];
        }

        $dados = $request->validate($rules);

        if ($request->hasFile('imagem')) {
            // Remove a imagem anterior, caso exista
            if ($books->imagem) {
                Storage::disk('public')->delete($books->imagem);
            }

            // Armazena a nova imagem e atualiza o campo no banco de dados
            $imagemPath = $request->file('imagem')->store('livros', 'public');
            $dados['imagem'] = $imagemPath;
        } else {
            // Caso não tenha sido enviada uma nova imagem, mantemos o valor atual
            $dados['imagem'] = $books->imagem;
        }

        $books->update($dados);

        // Atualize os gêneros associados ao livro
        $generoIds = $request->input('generos');
        $books->generos()->sync($generoIds);

        return redirect()->route('book.view')->with('sucesso', 'Livro alterado com sucesso!');
    }

    public function deleteBook(Livro $books)
    {
        return view('book.deleteBook', [
            'book' => $books,
        ]);
    }
    public function deleteConfirmBook(Livro $books)
    {
        if ($books->imagem) {
            // Obtém o caminho completo da imagem no storage
            $imagemPath = 'public/' . $books->imagem;

            // Verifica se o arquivo existe no storage antes de tentar excluí-lo
            if (Storage::exists($imagemPath)) {
                // Exclui a imagem do storage
                Storage::delete($imagemPath);
            }
        }

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