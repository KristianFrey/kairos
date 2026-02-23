<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Lista todos os clientes com filtros opcionais e paginação.
     * Os filtros vêm da URL como query string: ?busca_nome=João&busca_email=...
     */
    public function index()
    {
        $dados = Cliente::query()
            // Cada when() só aplica o filtro se o campo vier preenchido na URL
            ->when(request('busca_id'),       fn($cliente) => $cliente->where('id', request('busca_id')))
            ->when(request('busca_nome'),     fn($cliente) => $cliente->where('nome',          'like', '%' . request('busca_nome') . '%'))
            ->when(request('busca_telefone'), fn($cliente) => $cliente->where('telefone',      'like', '%' . request('busca_telefone') . '%'))
            ->when(request('busca_email'),    fn($cliente) => $cliente->where('email',         'like', '%' . request('busca_email') . '%'))
            ->when(request('busca_cpf'),      fn($cliente) => $cliente->where('cpf',           'like', '%' . request('busca_cpf') . '%'))
            ->when(request('busca_nasc'),     fn($cliente) => $cliente->where('dt_nascimento', 'like', '%' . request('busca_nasc') . '%'))
            ->orderBy('id')
            ->paginate(10) //usado para paginas apenas 10
            ->withQueryString(); // mantém os filtros nos links de paginação

        return view('cliente.index', compact('dados'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Salva um novo cliente no banco.
     * StoreClienteRequest já faz a validação dos campos.
     */
    function store(StoreClienteRequest $request)
    {
        Cliente::create($request->validated());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index')
            ->with('success', 'Cliente removido com sucesso!');
    }

    public function show(Cliente $cliente) {}
}
