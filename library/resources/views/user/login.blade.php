<div style="text-align: center; margin-top: 15%">

    <h1>Login</h1>

    @if (session('sucesso'))
    <div>{{session('sucesso')}}</div>
@endif

@if (session('erro'))
    <div>{{session('erro')}}</div>
@endif

@if ($errors)
    @foreach ($errors->all() as $erro)
        {{$erro}} <br>
        @endforeach
    @endif

    <form action="" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email"> <br>
        <input type="password" name="password" placeholder="Senha">
<br><br>
        <input type="submit" value="Entrar">
    </form>

    Não tem uma conta? <a href="{{route('register')}}">Cadastre-se</a> <br>
    <a href="{{route('home')}}">Voltar</a>
</div>
