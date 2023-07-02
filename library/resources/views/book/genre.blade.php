<div style=" margin-top: 15%">
    <form action="{{ url()->current()}}" method="POST">
        @csrf
        <input type="text" name="busca">
        <input type="submit" value="Buscar">
    </form>

    <table border="1">
        <tr>
        <th>Id</th>
        <th>Genero</th>

    </tr>

    @foreach ($generos as $genero)


    <tr>
        <td>{{$genero->idgenero}}</td>
        <td>{{$genero->nome}}</td>
        <td><a href="">Editar</a></td>
        <td><a href="">Excluir</a></td>
    </tr>
@endforeach
</table>

    </table>

    Adicione um genero <a href="{{route('genre')}}">clicando aqui</a> <br>
    <a href="{{route('book')}}">Voltar</a>
</div>

