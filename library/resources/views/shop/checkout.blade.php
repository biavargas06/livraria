@extends('!layout.layout')

@section('title', 'Livraria Goldberg - Checkout')

@section('content')
    <h1>Checkout - Livraria Goldberg</h1>

    <h2>Detalhes da Compra:</h2>

    <table border="1">
        <tr>
            <th>Livro</th>
            <th>Preço Unitário</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>{{ $livro->nome }}</td>
            <td>R$ {{ number_format($livro->preco, 2, ',', '.') }}</td>
            <td>1</td> <!-- Considerando que é uma compra única, a quantidade é sempre 1 -->
            <td>R$ {{ number_format($livro->preco, 2, ',', '.') }}</td> <!-- Subtotal é igual ao preço unitário -->
        </tr>
        <tr>
            <td colspan="3">Total</td>
            <td>R$ {{ number_format($livro->preco, 2, ',', '.') }}</td>
        </tr>
    </table>

    <br>
    <div>
        <h3>Metodo de pagamento:</h3>
        <button>Pix</button>
        <button>Boleto Bancario</button>
        <button>Cartao de Credito</button>
    </div> <br>

    <form action="{{ route('shop.cancel') }}" method="POST">
        @csrf
        <button type="submit">Cancelar Compra</button>
    </form>
    <br>
    <form action="{{ route('shop.finalizarCompra', ['id' => $livro->id]) }}" method="POST">
        @csrf
        <button type="submit">Finalizar Compra</button>
    </form>


@endsection
