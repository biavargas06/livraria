<div style="text-align: center; margin-top: 5%">

    <h1>Adicionar Um Livro</h1>

    @if (session('sucesso'))
    <div>{{session('sucesso')}}</div>
@endif

    @if ($errors)
    @foreach ($errors->all() as $erro)
        {{$erro}} <br>
        @endforeach
    @endif

    <form action="{{ url()->current()}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nome" placeholder="Titulo do Livro" value="{{old('nome', $book->nome ?? '')}}"><br>
       <input type="number" name="pag" min="5" placeholder="N de paginas" value="{{old('pag', $book->pag ?? '')}}"> <br>
       <input type="text" name="autor" placeholder="Nome do Autor" value="{{old('autor', $book->autor ?? '')}}"> <br>
       <input type="text" name="editora" placeholder="Nome da Editora" value="{{old('editora', $book->editora ?? '')}}"> <br>
       <textarea name="sinopse" cols="40" rows="5" placeholder="Sinopse do livro">{{old('sinopse', $book->sinopse ?? '')}}</textarea>

       <div>
        <label for="preco">Preço:</label><br>
        <input type="number" name="preco" step="0.01" placeholder="Preço do Livro" value="{{old('preco', $book->preco ?? '')}}">
    </div><br>

        <fieldset style="margin-left: 40%; margin-right: 40%">
            <legend style="text-align: left">Data de Publicacao:</legend>
            <input type="date" name="ano" value="{{old('ano', $book->ano ?? '')}}"> <br>
        </fieldset>

        @if($book->imagem)
        <label for="imagem">Imagem atual do Livro:</label> <br>
        <img src="{{ asset('storage/' . $book->imagem) }}" alt="Imagem antiga do livro" width="200">

        <br>
    @endif

    <div>
        <label for="imagem">Nova imagem do Livro:</label> <br>
        <input type="file" name="imagem">
    </div> <br>

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
