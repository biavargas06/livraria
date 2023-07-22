<div style="text-align: center; margin-top: 15%">



    <h2>Apagar Livro</h2>
    <p>Voce esta apagando o genero: {{ $book->nome}}.</p>

    <form action="{{route('book.deleteConfirm', $book->id)}}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Apagar">
    </form>
    <a href="{{route('book.view')}}">Voltar</a>
