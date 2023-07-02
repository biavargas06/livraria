<div style="text-align: center; margin-top: 15%">

    <h1>Register</h1>

    @if ($errors)
    @foreach ($errors->all() as $erro)
        {{$erro}} <br>
        @endforeach
    @endif

    <form action="{{ url()->current()}}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome"><br>
        <input type="email" name="email" placeholder="Email"> <br>
        <input type="password" name="password" placeholder="Senha">
<br><br>
        <input type="submit" value="Cadastrar">
    </form>

    Já possui uma conta? <a href="{{route('login')}}">Logue aqui</a> <br>
    <a href="{{route('home')}}">Voltar</a>
</div>
