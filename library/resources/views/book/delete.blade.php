<div style="text-align: center; margin-top: 15%">



    <h2>Apagar Genero</h2>
    <p>Voce esta apagando o genero: {{ $genre->nome}}.</p>

    <form action="{{route('genre.deleteConfirm', $genre->id)}}" method="post">
        @csrf
        @method('delete')

        <input type="submit" value="Apagar">
    </form>
