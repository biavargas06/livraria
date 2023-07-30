@extends('!layout.layout')

@section('title', 'Livraria Goldberg - Checkout')

@section('content')
    <h1>Checkout - Livraria Goldberg</h1>

    <h2>Detalhes da Compra:</h2>

    @if ($carrinhoItems->count() > 0)
        <table border="1">
            <tr>
                <th>Livro</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
            @foreach ($carrinhoItems as $item)
                <tr>
                    <td>{{ $item->livro->nome }}</td>
                    <td>R$ {{ number_format($item->livro->preco, 2, ',', '.') }}</td>
                    <td>{{ $item->quantidade }}</td>
                    <td>R$ {{ number_format($item->livro->preco * $item->quantidade, 2, ',', '.') }}</td>
                </tr>
            @endforeach
        </table>

        <h3 colspan="3">Total</h3>
        <p>R$ {{ number_format($total, 2, ',', '.') }}</p>
    @else
        <p>Nenhum item no carrinho.</p>
    @endif
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
    <form action="{{ route('shop.finalizarCompra', ['id' => $item->livro->id]) }}" method="POST">
        @csrf
        <button type="submit">Finalizar Compra</button>
    </form>
@endsection
