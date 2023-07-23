@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')

    <nav>
        @if (Auth::user())
            <a href="{{ route('book') }}">Adicionar Livro</a>
        @endif
    </nav>
    <form action="{{ url()->current() }}" method="POST">
        @csrf
        <input type="text" name="busca" placeholder="Nome do Livro">
        <input type="submit" value="Buscar">
    </form>
    <br>

    <table border="1">
        <tr>
            <th>Livros</th>
            <th>Generos</th>
        </tr>
        @foreach ($LivroGen as $LG)
        <tr>
            <td>{{ $LG->livro->nome}}</td>
            <td>{{ $LG->genero->nome }}</td>
        </tr>
        @endforeach
    </table>

@endsection
