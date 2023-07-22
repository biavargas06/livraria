<div style=" margin-top: 15%">

    @if (session('sucesso'))
    <div>{{session('sucesso')}}</div>
@endif


    <form action="{{ url()->current()}}" method="POST">
        @csrf
        <input type="text" name="busca" placeholder="Nome do Livro">
        <input type="submit" value="Buscar">
    </form>

    <table border="1">
        <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Paginas</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano</th>

    </tr>

    @foreach ($book as $books)


    <tr>
        <td>{{$books->id}}</td>
        <td>{{$books->nome}}</td>
        <td>{{$books->pag}}</td>
        <td>{{$books->autor}}</td>
        <td>{{$books->editora}}</td>
        <td>{{$books->ano}}</td>
        <td><a href="{{route('book.edit',$books->id)}}">Editar</a></td>
        <td><a href="{{route('book.delete', $books->id)}}">Excluir</a></td>
    </tr>
@endforeach
</table>

    </table>

    <a href="{{route('book')}}">Voltar</a>
</div>

