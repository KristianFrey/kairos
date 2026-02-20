@extends('layout.layoutPage')
@section('conteudo');
<h1>Clientes</h1>

<a
    href="{{ route('cliente.create') }}" class="btn btn-primary btn-sm">
    Novo Cliente
</a>

@foreach ($dados as $cliente)
    <p>{{ $cliente->nome }} - {{ $cliente->email }}</p>
    <td>
    <a href="{{ route('cliente.edit', $cliente) }}" class="btn btn-warning btn-sm">
        Editar
    </a>

    <form action="{{ route('cliente.destroy', $cliente) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger btn-sm">
            Excluir
        </button>
    </form>
</td>
@endforeach
@endsection