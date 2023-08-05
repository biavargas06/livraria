<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

    </div> <br><br>

    <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{route('home')}}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                    <img src="{{ asset('imagens/amazing.png') }}"  style="width: 250px;">        
                </h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">

                <form action="{{ url('/') }}" method="POST">
                @csrf
                    <div class="input-group">
                        <input type="text" name="busca" class="form-control" placeholder="Buscar livro">
                        <div class="input-group-append">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="{{route('shop.cart')}}" class="btn border">
                    <i class="fas fas fa-shopping-cart text-primary"></i>
                    <span class="badge">{{$cartItemCount}}</span>
                </a>
                @if (Auth::user())
            {{ Auth::user()->nome }} <br>
            <a href="{{ route('logout') }}">Logout</a> <br>

            @if (Auth::user() && Auth::user()->isAdmin)
            <a href="{{ route('book') }}">Gerenciar Livros</a>
        @endif
        @else

            <a href="{{ route('login') }}"><i class="fas fas fa-user-circle text-primary"></i></a>
        @endif


            </div>
        </div>
    </div>

    <!-- <div class="content">
        <form action="{{ url('/') }}" method="POST">
            @csrf
            <input type="text" name="busca" placeholder="Nome do Livro">
            <input type="submit" value="Buscar">
        </form>

        <a href="{{route('shop.cart')}}">Carrinho de Compras</a>
    <hr>
    <div> -->


    @yield('content')

</body>
</html>
