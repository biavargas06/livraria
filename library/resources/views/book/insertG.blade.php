<div style="text-align: center; margin-top: 15%">

    <h1>Adicionar Um Genero</h1>

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
        <input type="text" name="nome" placeholder="Genero" value="{{old('nome', $genre->nome ?? '')}}"><br>
<br>
        <input type="submit" value="Adicionar">
    </form>

    <a href="{{route('genre.view')}}">Voltar</a>
</div>
