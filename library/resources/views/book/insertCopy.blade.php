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
        <input type="text" name="nome" placeholder="Titulo do Livro" value="{{old('nome', $book->nome ?? '')}}"><br>
       <input type="number" name="pag" placeholder="N de paginas" value="{{old('pag', $book->pag ?? '')}}"> <br>
       <input type="text" name="autor" placeholder="Nome do Autor" value="{{old('autor', $book->autor ?? '')}}"> <br>
       <input type="text" name="editora" placeholder="Nome da Editora" value="{{old('editora', $book->editora ?? '')}}"> <br>
       <textarea name="sinopse" cols="40" rows="5" placeholder="Sinopse do livro">{{old('sinopse', $book->sinopse ?? '')}}</textarea>

        <fieldset style="margin-left: 40%; margin-right: 40%">
            <legend style="text-align: left">Data de Publicacao:</legend>
            <input type="date" name="ano" value="{{old('ano', $book->ano ?? '')}}"> <br>
        </fieldset>

        <label for="generos">Selecione os gêneros:</label> <br>
<select name="generos[]" multiple>
    @foreach ($generos as $genero)
        <option value="{{ $genero->id }}" @if(in_array($genero->id, $book->generos->pluck('id')->toArray())) selected @endif>
            {{ $genero->nome }}
        </option>
    @endforeach
</select>
<br>
        <input type="submit" value="Salvar">
    </form>

    <a href="{{route('book.view')}}">Voltar</a>
</div>
