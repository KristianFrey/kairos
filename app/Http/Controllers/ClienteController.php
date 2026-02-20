<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return view('cliente.index', ['dados' => $clientes]);
    }

    public function create()
    {
        return view('cliente.create');
    }

    function store(StoreClienteRequest $request)
    {
        Cliente::create($request->validate());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validate());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente editado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente removido com sucesso!');
    }
}
