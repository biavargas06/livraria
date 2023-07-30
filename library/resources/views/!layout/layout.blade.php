<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <h1>
        <a href="{{route('home')}}">Livraria Goldenberg</a>
    </h1>

    @if (Auth::user())
            {{ Auth::user()->nome }} <br>
            <a href="{{ route('logout') }}">Logout</a> <br>

            @if (Auth::user() && Auth::user()->isAdmin)
            <a href="{{ route('book') }}">Gerenciar Livros</a>
        @endif
        @else
            <a href="{{ route('login') }}">Login</a>
        @endif

    </div> <br><br>

    <div class="content">
        <form action="{{ url('/') }}" method="POST">
            @csrf
            <input type="text" name="busca" placeholder="Nome do Livro">
            <input type="submit" value="Buscar">
        </form>

        <a href="{{route('shop.cart')}}">Carrinho de Compras</a>
    <hr>
    <div>


    @yield('content')

</body>
</html>
