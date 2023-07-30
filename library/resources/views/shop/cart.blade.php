@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')
    <h1>Carrinho de Compras</h1>

    @if ($carrinhoItems->count() > 0)
        <table border="1">
            <tr>
                <th></th>
                <th>Livro</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th>Ações</th>
            </tr>
            @foreach ($carrinhoItems as $item)
                <tr>
                    <td>
                        @if ($item->livro->imagem)
                        <img src="{{ asset('storage/' . $item->livro->imagem) }}" alt="{{ $item->livro->nome }}" width="100">
                    @else
                        Sem imagem
                    @endif
                </td>
                    <td>{{ $item->livro->nome }}</td>
                    <td>R$ {{ number_format($item->livro->preco, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('shop.cartUpdate', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <input type="number" name="quantidade" value="{{ $item->quantidade }}" min="1">
                            <input type="submit" value="Atualizar">
                        </form>
                    </td>
                    <td>R$ {{ number_format($item->livro->preco * $item->quantidade, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('shop.cartRemove', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td colspan="3">Total</td>
                <td>R$ {{ number_format($carrinhoItems->sum(function ($item) {
                    return $item->livro->preco * $item->quantidade;
                }), 2, ',', '.') }}</td>

            </tr>
        </table>

        <!-- Acessando o primeiro item do carrinho para passar o ID do livro para a rota do Checkout -->
        <td>
            <a href="{{ route('shop.checkoutFromCart', ['id' => $carrinhoItems[0]->livro->id]) }}">Finalizar Compra</a>
        </td>

    @else
        <p>Nenhum item no carrinho.</p>
    @endif
@endsection
