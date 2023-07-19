@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')

<nav>
    @if (section('admin'))
    <a href="{{route('book')}}">Adicionar Livro</a>
    @endif


</nav>







@endsection
