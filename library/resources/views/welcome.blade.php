@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')

<nav>
    @if (Auth::user() && Auth::user()->isAdmin)
        <a href="{{ route('book') }}">Gerenciar Livros</a>
    @endif
</nav>
<form action="{{ url('/') }}" method="POST">
    @csrf
    <input type="text" name="busca" placeholder="Nome do Livro">
    <input type="submit" value="Buscar">
</form>
<br>

@if($books->count() > 0)
<table border="1">
    <tr>
        <th>Livros</th>
        <th>Generos</th>
        <th>Preço</th>
        <th>Imagem</th>
    </tr>
    @foreach ($books as $book)
    <tr>
        <td>{{ $book->nome }}</td>
        <td>
            @if($book->generos->count() > 0)
                {{ $book->generos->pluck('nome')->implode(', ') }}
            @else
                Sem gêneros associados
            @endif
        </td>
        <td>
            @if($book->preco)
                R$ {{ number_format($book->preco, 2, ',', '.') }}
            @else
                Preço não definido
            @endif
        </td>
        <td>
            @if($book->imagem)
            <img src="{{ asset('storage/' . $book->imagem) }}" alt="{{ $book->nome }}" width="100">
            @else
            Sem imagem
            @endif
        </td>
    </tr>
    @endforeach
</table>
@else
<p>Nenhum livro encontrado.</p>
@endif

@endsection
