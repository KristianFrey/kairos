@extends('layout.layoutPage')

@section('conteudo')
<div class="container mt-4">

    <h2>Editar Cliente</h2>

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

    <form method="POST" action="{{ route('cliente.update', $cliente) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" value="{{ $cliente->nome }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="telefone" value="{{ $cliente->telefone }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Atualizar
        </button>

    </form>

</div>
@endsection