<?php

namespace App\Http\Controllers;

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

    function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:120',
            'telefone' => 'required|max:20|regex:/^[0-9\-\(\)\s]+$/',
            'email' => 'nullable|max:150|email|unique:cliente,email',
            'cpf' => 'nullable|max:20|unique:cliente,cpf',
            'dt_nascimento' => 'nullable|date|before:today'
        ], [
            'nome.required' => 'O :attribute é obrigatório.',
            'nome.string' => 'O :attribute deve ser em formato de texto.',
            'nome.max' => 'O :attribute deve ter no máximo 120 caracteres.',
            'telefone.required' => 'O :attribute é obrigatório.',
            'telefone.max' => 'O :attribute deve ter no máximo 20 caracteres.',
            'telefone.regex' => 'O :attribute deve ter formato válido.',
            'email.max' => 'O :attribute deve ter no máximo 150 caracteres.',
            'email.email' => 'O :attribute deve ter formato válido.',
            'email.unique' => 'Este :attribute já foi cadastrado.',
            'cpf.max' => 'O CPF deve ter no máximo 20 caracteres.',
            'cpf.unique' => 'Este CPF já foi cadastrado.',
            'dt_nascimento.date' => 'A data de nascimento deve ter formato válido.',
            'dt_nascimento.before' => 'A data de nascimento não pode ser uma data futura.',
        ]);


        Cliente::create($validated);

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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
