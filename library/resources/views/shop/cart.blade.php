@extends('!layout.layout')

@section('title', 'Livraria Goldberg')

@section('content')
    <h1>Carrinho de Compras</h1>

    @if ($carrinhoItems->count() > 0)
        <table border="1">
            <tr>
                <th>Livro</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th>Ações</th>
            </tr>
            @foreach ($carrinhoItems as $item)
                <tr>
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
                <td colspan="3">Total</td>
                <td>R$ {{ number_format($carrinhoItems->sum(function ($item) {
                    return $item->livro->preco * $item->quantidade;
                }), 2, ',', '.') }}</td>
                <td></td> <!-- Coluna vazia para alinhar com a última coluna de ações -->
            </tr>
        </table>
    @else
        <p>Nenhum item no carrinho.</p>
    @endif
@endsection
