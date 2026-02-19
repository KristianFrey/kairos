@extends('layout.layoutPage')
@section('conteudo');

<h1>Novo Cliente</h1>

<form action="{{ route('cliente.store') }}" method="POST">
    @csrf

    <label>Nome:</label><br>
    <input type="text" name="nome"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email"><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone"><br><br>

    <button type="submit">Salvar</button>
</form>


@endsection