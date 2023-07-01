@extends('include.index')

@section('title', 'Cadastro')

@section('content')
<form action="">
    @csrf
<div>
    <input type="text" name="name" placeholder="Nome">
</div>

<div>
    <input type="email" name="email" placeholder="E-mail">
</div>

<div>
    <input type="password" name="pass" placeholder="Senha">
</div>

<input type="submit" value="Cadastrar">
</form>
@endsection
