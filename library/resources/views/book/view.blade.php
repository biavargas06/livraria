@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')


    <h1>{{ $books->nome }}</h1>
    @if($books->imagem)
            <img src="{{ asset('storage/' . $books->imagem) }}" alt="{{ $books->nome }}" width="100">
            @else
            Sem imagem
            @endif
    <p>Autor: {{ $books->autor }}</p>
    <p>Editora: {{ $books->editora }}</p>
    <p>Ano de Publicacao: {{ date('Y', strtotime($books->ano)) }}</p>
    <p>Preço: R$ {{ $books->preco }}</p>
    <p>Gênero(s):
        @if ($books->generos->count() > 0)
            {{ $books->generos->pluck('nome')->implode(', ') }}
        @else
            Nenhum gênero associado
        @endif
    </p>
    <fieldset>
        <legend>Sinopse:</legend>
        {{ $books->sinopse }}
    </fieldset>

    <td>
        <a href="{{ route('shop.checkout', ['id' => $books->id]) }}">Comprar</a>
    </td>
    <td>
        <form action="{{ route('shop.cartAdd') }}" method="POST">
            @csrf
            <input type="hidden" name="livro_id" value="{{ $books->id }}">
            <button type="submit">Adicionar ao Carrinho</button>
        </form>
    </td>

@endsection
