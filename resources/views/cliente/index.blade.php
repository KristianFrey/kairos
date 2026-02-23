@extends('layout.layoutPage')

@section('title', 'Kairos - Clientes')

@section('page-title', 'Clientes')
@section('page-subtitle', 'Gerencie o cadastro de clientes')

@section('content')

    {{-- ── CABEÇALHO ────────────────────────────────────────────── --}}
    <div class="flex items-center justify-between mb-6">
        {{-- dados Paginação --}}
        <p class="text-sm text-slate-500">
            @if ($dados->total() > 0)
                Exibindo <strong class="text-slate-700">{{ $dados->firstItem() }}–{{ $dados->lastItem() }}</strong>
                de <strong class="text-slate-700">{{ $dados->total() }}</strong> cliente(s)
            @else
                Nenhum resultado encontrado
            @endif
        </p>

        {{-- Botão criar --}}
        <a href="{{ route('cliente.create') }}"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl
              bg-primary-600 text-white text-sm font-semibold
              hover:bg-primary-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="currentColor"
                stroke-width="1" class="bi bi-plus" viewBox="0 0 16 16">
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
            </svg> Novo Cliente
        </a>
    </div>

    {{-- ── PAINEL PRINCIPAL ─────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">

        {{-- Título do painel + Limpa filtros --}}
        -<div class="flex items-center gap-3 px-5 py-4 border-b border-slate-100">
            <span class="text-lg"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#581c87"
                    class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path
                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                </svg></span>
            <h2 class="font-display font-bold text-sm text-slate-800">Lista de Clientes</h2>

            @if (request()->hasAny(['busca_id', 'busca_nome', 'busca_telefone', 'busca_email', 'busca_cpf', 'busca_nasc']))
                <a href="{{ route('cliente.index') }}" class="ml-auto text-xs text-slate-400 hover:text-red-500 transition">
                    ✕ Limpar filtros
                </a>
            @endif
        </div>

        {{-- ── TABELA ──────────────────────────────────────────────── --}}
        {{-- O <form> envolve toda a tabela para que o botão "Filtrar"  --}}
        {{-- possa submeter os inputs da linha de filtros do thead.      --}}
        <form method="GET" action="{{ route('cliente.index') }}">
            <div class="overflow-x-auto">
                <table class="w-full">

                    <thead>
                        {{-- Linha 1: títulos das colunas --}}
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th
                                class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-3 py-3 w-20 min-w-[80px]">
                                #</th>
                            <th
                                class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-4 py-3 w-full min-w-[200px]">
                                Nome</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-4 py-3">
                                Telefone</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-4 py-3">
                                E-mail</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-4 py-3">CPF
                            </th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-4 py-3">
                                Nascimento</th>
                            <th class="px-4 py-3 w-20"></th>
                        </tr>

                        {{-- Linha 2: inputs de filtro por coluna --}}
                        {{-- Cada input tem o mesmo position que a coluna correspondente --}}
                        <tr class="bg-white border-b border-slate-200">
                            <td class="px-2 py-2 w-20 min-w-[80px]">
                                <input type="text" name="busca_id" value="{{ request('busca_id') }}" placeholder="ID"
                                    class="w-full px-1.5 py-1.5 text-xs border border-slate-200 rounded-lg outline-none
                                      bg-slate-50 focus:borWder-primary-400 focus:bg-white focus:ring-1 focus:ring-primary-100 transition">
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="busca_nome" value="{{ request('busca_nome') }}"
                                    placeholder="Buscar nome..."
                                    class="w-full px-2 py-1.5 text-xs border border-slate-200 rounded-lg outline-none
                                      bg-slate-50 focus:border-primary-400 focus:bg-white focus:ring-1 focus:ring-primary-100 transition">
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="busca_telefone" value="{{ request('busca_telefone') }}"
                                    placeholder="Buscar..."
                                    class="w-full px-2 py-1.5 text-xs border border-slate-200 rounded-lg outline-none
                                      bg-slate-50 focus:border-primary-400 focus:bg-white focus:ring-1 focus:ring-primary-100 transition">
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="busca_email" value="{{ request('busca_email') }}"
                                    placeholder="Buscar..."
                                    class="w-full px-2 py-1.5 text-xs border border-slate-200 rounded-lg outline-none
                                      bg-slate-50 focus:border-primary-400 focus:bg-white focus:ring-1 focus:ring-primary-100 transition">
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="busca_cpf" value="{{ request('busca_cpf') }}"
                                    placeholder="Buscar..."
                                    class="w-full px-2 py-1.5 text-xs border border-slate-200 rounded-lg outline-none
                                      bg-slate-50 focus:border-primary-400 focus:bg-white focus:ring-1 focus:ring-primary-100 transition">
                            </td>
                            <td class="px-2 py-2">
                                <input type="text" name="busca_nasc" value="{{ request('busca_nasc') }}"
                                    placeholder="dd/mm/aaaa"
                                    class="w-full px-2 py-1.5 text-xs border border-slate-200 rounded-lg outline-none
                                      bg-slate-50 focus:border-primary-400 focus:bg-white focus:ring-1 focus:ring-primary-100 transition">
                            </td>
                            <td class="px-2 py-2 text-center align-middle">
                                {{-- O Enter em qualquer input também dispara esse botão --}}
                                <button type="submit"
                                    class="w-full px-2 py-1.5 text-xs font-semibold rounded-lg
                   bg-primary-600 text-white hover:bg-primary-700 transition
                   flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse($dados as $cliente)
                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-3 py-3.5 text-xs font-mono text-slate-400">#{{ $cliente->id }}</td>
                                <td class="px-4 py-3.5 text-sm font-semibold text-slate-800">{{ $cliente->nome }}</td>

                                <td class="px-4 py-3.5 text-sm text-slate-600">{{ $cliente->telefone ?? '—' }}</td>
                                <td class="px-4 py-3.5 text-sm text-slate-600">{{ $cliente->email ?? '—' }}</td>
                                <td class="px-4 py-3.5 text-sm text-slate-600">{{ $cliente->cpf ?? '—' }}</td>

                                <td class="px-4 py-3.5 text-sm text-slate-600">
                                    {{ $cliente->dt_nascimento ? \Carbon\Carbon::parse($cliente->dt_nascimento)->format('d/m/Y') : '—' }}
                                </td>

                                {{-- ── AÇÕES ── --}}
                                <td class="px-4 py-3.5">
                                    <div class="flex items-center gap-1.5">

                                        {{-- Editar --}}
                                        <div class="relative group">
                                            <a href="{{ route('cliente.show', $cliente) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg
                                              border border-slate-200 text-slate-400
                                              hover:border-primary-300 hover:text-primary-600 hover:bg-primary-50 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                </svg>

                                            </a>
                                            <span
                                                class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5
                                                 whitespace-nowrap text-[10px] font-semibold
                                                 bg-slate-800 text-white px-2 py-0.5 rounded-md
                                                 opacity-0 group-hover:opacity-100 transition-opacity">
                                                Ver detalhes do cliente
                                            </span>
                                        </div>


                                        <div class="relative group">
                                            <a href="{{ route('cliente.edit', $cliente) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg
                                              border border-slate-200 text-slate-400
                                              hover:border-primary-300 hover:text-primary-600 hover:bg-primary-50 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </a>
                                            <span
                                                class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5
                                                 whitespace-nowrap text-[10px] font-semibold
                                                 bg-slate-800 text-white px-2 py-0.5 rounded-md
                                                 opacity-0 group-hover:opacity-100 transition-opacity">
                                                Editar
                                            </span>
                                        </div>

                                        {{-- Excluir --}}
                                        <div class="relative group">
                                            <form action="{{ route('cliente.destroy', $cliente) }}" method="POST"
                                                onsubmit="return confirm('Excluir {{ addslashes($cliente->nome) }}?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="w-8 h-8 flex items-center justify-center rounded-lg
                                                       border border-slate-200 text-slate-400
                                                       hover:border-red-300 hover:text-red-500 hover:bg-red-50 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            <span
                                                class="pointer-events-none absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5
                                                 whitespace-nowrap text-[10px] font-semibold
                                                 bg-slate-800 text-white px-2 py-0.5 rounded-md
                                                 opacity-0 group-hover:opacity-100 transition-opacity">
                                                Excluir
                                            </span>
                                        </div>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="7" class="px-5 py-14 text-center text-slate-400">
                                    <span class="text-4xl block mb-3">🙈</span>
                                    <p class="text-sm font-medium">
                                        @if (request()->hasAny(['busca_id', 'busca_nome', 'busca_telefone', 'busca_email', 'busca_cpf', 'busca_nasc']))
                                            Nenhum cliente encontrado com esses filtros.
                                        @else
                                            Nenhum cliente cadastrado ainda.
                                        @endif
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </form>

        {{-- ── PAGINAÇÃO ────────────────────────────────────────────── --}}
        @if ($dados->hasPages())
            <div
                class="flex flex-col sm:flex-row items-center justify-between gap-3
                    px-5 py-4 border-t border-slate-100 bg-slate-50">

                <p class="text-xs text-slate-400">
                    Página <strong class="text-slate-600">{{ $dados->currentPage() }}</strong>
                    de <strong class="text-slate-600">{{ $dados->lastPage() }}</strong>
                    &nbsp;·&nbsp;
                    Registros <strong class="text-slate-600">{{ $dados->firstItem() }}–{{ $dados->lastItem() }}</strong>
                    de <strong class="text-slate-600">{{ $dados->total() }}</strong>
                </p>

                <div class="flex items-center gap-1">

                    @if ($dados->onFirstPage())
                        <span
                            class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-300 cursor-not-allowed">←
                            Anterior</span>
                    @else
                        <a href="{{ $dados->previousPageUrl() }}"
                            class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-500 font-medium
                              hover:bg-primary-50 hover:border-primary-300 hover:text-primary-600 transition">
                            ← Anterior
                        </a>
                    @endif

                    @foreach ($dados->getUrlRange(1, $dados->lastPage()) as $page => $url)
                        @if ($page == $dados->currentPage())
                            <span
                                class="px-3 py-1.5 text-xs rounded-lg bg-primary-600 text-white font-bold">{{ $page }}</span>
                        @elseif($page == 1 || $page == $dados->lastPage() || abs($page - $dados->currentPage()) <= 2)
                            <a href="{{ $url }}"
                                class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-500 font-medium
                                  hover:bg-primary-50 hover:border-primary-300 hover:text-primary-600 transition">
                                {{ $page }}
                            </a>
                        @elseif(abs($page - $dados->currentPage()) == 3)
                            <span class="px-1 text-xs text-slate-300">…</span>
                        @endif
                    @endforeach

                    @if ($dados->hasMorePages())
                        <a href="{{ $dados->nextPageUrl() }}"
                            class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-500 font-medium
                              hover:bg-primary-50 hover:border-primary-300 hover:text-primary-600 transition">
                            Próxima →
                        </a>
                    @else
                        <span
                            class="px-3 py-1.5 text-xs rounded-lg border border-slate-200 text-slate-300 cursor-not-allowed">Próxima
                            →</span>
                    @endif

                </div>
            </div>
        @endif

    </div>{{-- fim do painel --}}

@endsection
