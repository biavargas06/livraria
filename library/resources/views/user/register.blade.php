<div style="text-align: center; margin-top: 15%">

    <h1>Register</h1>

    <form action="" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome"><br>
        <input type="email" name="email" placeholder="Email"> <br>
        <input type="password" name="senha" placeholder="Senha">
<br><br>
        <input type="submit" value="Cadastrar">
    </form>

    Já possui uma conta? <a href="{{route('login')}}">Logue aqui</a>
</div>
