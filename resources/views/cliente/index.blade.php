@extends('layout.layoutPage')
@section('conteudo');
<h1>Clientes</h1>

@foreach ($dados as $cliente)
    <p>{{ $cliente->nome }} - {{ $cliente->email }}</p>
@endforeach
@endsection