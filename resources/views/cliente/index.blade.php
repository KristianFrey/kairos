@extends('layout.layoutPage')

@section('title', 'Kairos - Clientes')

@section('page-title', 'Clientes')
@section('page-subtitle', 'Gerencie o cadastro de clientes')

@section('content')

    {{-- CABEÇALHO DA SEÇÃO: total + botão de cadastro --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-sm text-slate-500">
                Total: <span class="font-bold text-slate-700">{{ $dados->count() }}</span> cliente(s) cadastrado(s)
            </span>
        </div>
        <a href="{{ route('cliente.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-primary-600 text-white text-sm font-semibold hover:bg-primary-700 transition">
            ＋ Novo Cliente
        </a>
    </div>

    {{-- TABELA DE CLIENTES --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        {{-- Cabeçalho da tabela --}}
        <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-100">
            <span class="text-lg">👥</span>
            <h2 class="font-display font-bold text-sm text-slate-800">Lista de Clientes</h2>
        </div>

        @if($dados->isEmpty())
            {{-- Estado vazio --}}
            <div class="flex flex-col items-center justify-center py-16 text-slate-400">
                <span class="text-5xl mb-3">🙈</span>
                <p class="font-medium text-sm">Nenhum cliente cadastrado ainda.</p>
                <a href="{{ route('cliente.create') }}"
                   class="mt-4 text-sm text-primary-600 font-semibold hover:underline">
                    Cadastrar o primeiro cliente →
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50">
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">Cliente</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">Telefone</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">E-mail</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">CPF</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">Nascimento</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach ($dados as $cliente)
                            <tr class="hover:bg-slate-50 transition">

                                {{-- Nome com avatar de iniciais --}}
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-600 to-violet-500
                                                    flex items-center justify-center text-xs font-bold text-white flex-shrink-0">
                                            {{ strtoupper(substr($cliente->nome, 0, 2)) }}
                                        </div>
                                        <span class="text-sm font-semibold text-slate-800">{{ $cliente->nome }}</span>
                                    </div>
                                </td>

                                <td class="px-5 py-3.5 text-sm text-slate-600">
                                    {{ $cliente->telefone ?? '—' }}
                                </td>

                                <td class="px-5 py-3.5 text-sm text-slate-600">
                                    {{ $cliente->email ?? '—' }}
                                </td>

                                <td class="px-5 py-3.5 text-sm text-slate-600">
                                    {{ $cliente->cpf ?? '—' }}
                                </td>

                                <td class="px-5 py-3.5 text-sm text-slate-600">
                                    {{ $cliente->dt_nascimento
                                        ? \Carbon\Carbon::parse($cliente->dt_nascimento)->format('d/m/Y')
                                        : '—' }}
                                </td>

                                {{-- Ações: editar e excluir --}}
                                <td class="px-5 py-3.5">
                                    <div class="flex items-center gap-2">

                                        {{-- Botão Editar --}}
                                        <a href="{{ route('cliente.edit', $cliente) }}"
                                           class="inline-flex items-center gap-1 text-xs px-3 py-1.5 rounded-lg
                                                  border border-slate-200 text-slate-600
                                                  hover:border-primary-400 hover:text-primary-600 transition font-medium">
                                            ✏️ Editar
                                        </a>

                                        {{-- Botão Excluir --}}
                                        <form action="{{ route('cliente.destroy', $cliente) }}"
                                              method="POST"
                                              onsubmit="return confirm('Tem certeza que deseja excluir {{ addslashes($cliente->nome) }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center gap-1 text-xs px-3 py-1.5 rounded-lg
                                                           border border-slate-200 text-red-500
                                                           hover:border-red-300 hover:bg-red-50 transition font-medium">
                                                🗑️ Excluir
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

@endsection
