<div style="text-align: center; margin-top: 15%">

    <h1>Adicionar Um Livro</h1>

    @if (session('sucesso'))
    <div>{{session('sucesso')}}</div>
@endif

    @if ($errors)
    @foreach ($errors->all() as $erro)
        {{$erro}} <br>
        @endforeach
    @endif

    <form action="{{ url()->current()}}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Titulo do Livro"><br>
       <input type="number" name="pag" placeholder="N de paginas"> <br>
       <input type="text" name="autor" placeholder="Nome do Autor"> <br>
       <input type="text" name="editora" placeholder="Nome da Editora"> <br>
       <textarea name="sinopse" cols="40" rows="5" placeholder="Sinopse do livro"></textarea>

        <fieldset style="margin-left: 40%; margin-right: 40%">
            <legend style="text-align: left">Data de Publicacao:</legend>
            <input type="date" name="ano" > <br>
        </fieldset>
<br>
        <input type="submit" value="Adicionar">
    </form>

    Generos Disponiveis <a href="{{route('genre.view')}}">aqui</a> <br>
    <a href="{{route('home')}}">Voltar</a>
</div>
