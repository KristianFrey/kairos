@extends('layout.layoutPage')
@section('conteudo');

<h1>Novo Cliente</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ops! Algo deu errado:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cliente.store') }}" method="POST">
    @csrf

    <label>Nome:</label><br>
    <input type="text" name="nome" value='{{ old('nome') }}'><br><br>

    <label>Telefone:</label><br>
    <input type="text" name="telefone" value='{{ old('telefone') }}'><br><br>
    
    <label>Email:</label><br>
    <input type="email" name="email" value='{{ old('email') }}'><br><br>

    <label>Cpf:</label><br>
    <input type="text" name="cpf" value='{{ old('cpf') }}'><br><br>

    <label>Data Nascimento:</label><br>
    <input type="date" name="dt_nascimento" value="{{ old('dt_nascimento') }}"><br><br>

    <button type="submit">Salvar</button>
</form>


@endsection