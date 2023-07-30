@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

    <div>
        <h3>Selecione o Gênero:</h3>
        <ul>
            @foreach ($generos as $genero)
                <a href="{{ route('livros.genero', ['nome' => $genero->nome]) }}">{{ $genero->nome }}</a>
            @endforeach
        </ul>
    </div>

    @if ($generoSelecionado)
        <h2>Gênero selecionado: {{ $generoSelecionado->nome }}</h2>
    @endif

    @if ($books instanceof \Illuminate\Database\Eloquent\Collection && $books->count() > 0)
    <table border="1">
            <tr>
                <th>Imagem</th>
                <th>Livros</th>
                <th>Generos</th>
                <th>Preço</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>
                        @if ($book->imagem)
                            <img src="{{ asset('storage/' . $book->imagem) }}" alt="{{ $book->nome }}" width="100">
                        @else
                            Sem imagem
                        @endif
                    </td>
                    <td><a href="{{ route('book.bookPage', $book->id) }}">{{ $book->nome }}</a></td>
                    <td>
                        @if ($book->generos->count() > 0)
                            {{ $book->generos->pluck('nome')->implode(', ') }}
                        @else
                            Sem gêneros associados
                        @endif
                    </td>
                    <td>
                        @if ($book->preco)
                            R$ {{ number_format($book->preco, 2, ',', '.') }}
                        @else
                            Preço não definido
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('shop.checkout', ['id' => $book->id]) }}">Comprar</a>
                    </td>


                    <td>
                        <form action="{{ route('shop.cartAdd') }}" method="POST">
                            @csrf
                            <input type="hidden" name="livro_id" value="{{ $book->id }}">
                            <button type="submit">Adicionar ao Carrinho</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @elseif (is_string($books) && !empty($books))
        <p>Nenhum livro encontrado para o gênero: {{ $generoSelecionado->nome }}</p>
    @else
        <p>Nenhum livro encontrado.</p>
    @endif

@endsection
