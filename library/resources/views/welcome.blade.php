@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')

<nav>
    {{-- @if (section('loginAdmin'))

    @endif --}}<a href="{{route('book')}}">Adicionar Livro</a>
</nav>







@endsection
