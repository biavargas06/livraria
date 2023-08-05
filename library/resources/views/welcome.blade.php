@extends('!layout.layout')

@section('title', 'Livraria Amazing')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<head>
    <meta charset="utf-8">
    <title>Livraria Amazing</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center bg-primary text-white w-100" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categorias</h6>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        <div class="nav-item dropdown">
                        </div>
                        @foreach ($generos as $genero)
                <a href="{{ route('livros.genero', ['nome' => $genero->nome]) }}">{{ $genero->nome }}</a>
            @endforeach
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                </nav>
    
    <!-- Featured End -->

    <!-- Products Start -->
    <div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">MAIS VENDIDOS</span></h2>
    </div>
    @if ($books instanceof \Illuminate\Database\Eloquent\Collection && $books->count() > 0)
    <div class="row px-xl-5 pb-3">
        @foreach ($books as $book)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    @if ($book->imagem)
                    <a href="{{ route('book.bookPage', $book->id) }}">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $book->imagem) }}" alt="{{ $book->nome }}" style="width: 150px; height: 200px; object-fit: cover;">
                    </a>
                    @else
                    Sem imagem
                    @endif
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3" style="font-size: 14px; margin-left: 2px;"><a href="{{ route('book.bookPage', $book->id) }}">{{ $book->nome }}</a></h6>
                    <div class="d-flex"  style="margin-left: 8px;">
                        <h6>@if ($book->preco)
                            R$ {{ number_format($book->preco, 2, ',', '.') }}
                        @else
                            Preço não definido
                        @endif</h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <form action="{{ route('shop.cartAdd') }}" method="POST">
                        @csrf
                        <input type="hidden" name="livro_id" value="{{ $book->id }}">
                        <button type="submit" class="btn btn-sm text-dark p-0 d-flex justify-content-center align-items-center">Comprar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    <!-- Products End -->
    

    @if ($generoSelecionado)
        <h2>Gênero selecionado: {{ $generoSelecionado->nome }}</h2>
    @endif

   
    
    
    
    
           
                <!-- <tr>        
                    <td>
                       
                    </td>
                    <td></td>
                    <td>
                        @if ($book->generos->count() > 0)
                            {{ $book->generos->pluck('nome')->implode(', ') }}
                        @else
                            Sem gêneros associados
                        @endif
                    </td>
                    <td>
                        
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
                </tr> -->
            
        </table>
    @elseif (is_string($books) && !empty($books))
        <p>Nenhum livro encontrado para o gênero: {{ $generoSelecionado->nome }}</p>
    @else
        <p>Nenhum livro encontrado.</p>
    @endif

@endsection
