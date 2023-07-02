<div style="text-align: center; margin-top: 15%">

    <h1>Login</h1>

    <form action="" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email"> <br>
        <input type="password" name="senha" placeholder="Senha">
<br><br>
        <input type="submit" value="Entrar">
    </form>

    Não tem uma conta? <a href="{{route('register')}}">Cadastre-se</a>
</div>
