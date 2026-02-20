<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Título dinâmico: cada página pode definir o próprio título --}}
    <title>@yield('title', 'AgendaPro') — Sistema de Agendamentos</title>

    {{-- Google Fonts: DM Sans e Sora --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Vite: carrega o CSS (Tailwind v4) e JS compilados --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Alpine.js: vai controlar modais, dropdowns, etc --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- IMask: máscaras de telefone, CPF, data --}}
    <script src="https://cdn.jsdelivr.net/npm/imask"></script>

    {{-- Estilos globais que o Tailwind não cobre sozinho --}}
    <style>
        body { font-family: 'DM Sans', sans-serif; }

        /* Scrollbar personalizada */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 3px; }

        /* Transição suave nos itens do menu */
        .nav-item { transition: all 0.18s ease; }

        /* Animação do modal */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .modal-enter { animation: slideUp 0.22s ease forwards; }
    </style>

    {{-- Espaço para cada página adicionar seus próprios estilos --}}
    @stack('styles')
</head>

{{--
    x-data="{ sidebarOpen: true }"
    Isso é Alpine.js. Estamos dizendo que existe uma variável chamada
    "sidebarOpen" que começa como true (sidebar aberta).
    Qualquer elemento dentro do <body> pode usar essa variável.
--}}
<body class="bg-slate-100 text-slate-900" x-data="{ sidebarOpen: true }">

    <div class="flex h-screen overflow-hidden">

        {{-- ============================================================ --}}
        {{--  SIDEBAR                                                      --}}
        {{-- ============================================================ --}}
        {{--
            :class faz a sidebar sumir/aparecer com base na variável sidebarOpen.
            No mobile ela fica escondida por padrão.
        --}}
        <aside
            class="flex flex-col bg-sidebar text-white flex-shrink-0 overflow-hidden transition-all duration-300"
            :class="sidebarOpen ? 'w-64' : 'w-0'"
        >
            {{-- LOGO --}}
            <div class="flex items-center gap-3 px-5 py-6 border-b border-white/10 flex-shrink-0">
                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary-600 to-sky-400 flex items-center justify-center text-lg flex-shrink-0">
                    📅
                </div>
                <div>
                    <div class="font-display font-bold text-base text-white leading-none">AgendaPro</div>
                    <div class="text-xs text-slate-500 mt-0.5">Sistema de Agendamentos</div>
                </div>
            </div>

            {{-- MENU PRINCIPAL --}}
            <nav class="flex-1 overflow-y-auto py-4 px-3">

                {{-- Seção Principal --}}
                <div class="mb-2">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-600 px-3 mb-2">Principal</p>

                    {{--
                        request()->routeIs('dashboard') verifica se a rota atual
                        é o dashboard. Se for, aplica as classes de "ativo".
                        Troque 'dashboard' pelo nome da sua rota em routes/web.php
                    --}}
                    <a href="{{ route('dashboard') }}"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              {{ request()->routeIs('dashboard') ? 'bg-primary-600/20 text-blue-300' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        🏠 <span>Dashboard</span>
                        {{-- Badge de notificação (opcional) --}}
                        {{-- <span class="ml-auto bg-primary-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">5</span> --}}
                    </a>

                   <a href="#"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              {{ request()->routeIs('cliente.*') ? 'bg-primary-600/20 text-blue-300' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        📋 <span>Agendamentos</span>
                        {{-- Exemplo de badge com contador dinâmico do banco --}}
                        {{-- @if($pendentes > 0)
                            <span class="ml-auto bg-primary-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">{{ $pendentes }}</span>
                        @endif --}}
                    </a>

                    <a href="{{ route('cliente.index') }}"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              {{ request()->routeIs('cliente.*') ? 'bg-primary-600/20 text-blue-300' : 'text-slate-400 hover:bg-white/5 hover:text-slate-200' }}">
                        👥 <span>Clientes</span>
                    </a>

                    <a href="#"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              text-slate-400 hover:bg-white/5 hover:text-slate-200">
                        🏥 <span>Serviços</span>
                    </a>
                </div>

                {{-- Seção Gestão --}}
                <div class="mb-2 mt-4">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-600 px-3 mb-2">Gestão</p>

                    <a href="#"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              text-slate-400 hover:bg-white/5 hover:text-slate-200">
                        👨‍⚕️ <span>Profissionais</span>
                    </a>

                    <a href="#"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              text-slate-400 hover:bg-white/5 hover:text-slate-200">
                        📊 <span>Relatórios</span>
                    </a>

                    <a href="#"
                       class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium mb-0.5
                              text-slate-400 hover:bg-white/5 hover:text-slate-200">
                        ⚙️ <span>Configurações</span>
                    </a>
                </div>
            </nav>

            {{-- USUÁRIO LOGADO no rodapé da sidebar --}}
            <div class="p-3 border-t border-white/10 flex-shrink-0">
                {{--
                    auth()->user() pega o usuário autenticado do Laravel.
                    Funciona automaticamente depois que o login estiver feito.
                --}}
                <div class="flex items-center gap-2.5 p-2.5 rounded-xl hover:bg-white/5 cursor-pointer transition">
                    {{-- Avatar com as iniciais do nome --}}
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-primary-600 to-violet-500 flex items-center justify-center text-xs font-bold flex-shrink-0">
                        {{/*strtoupper(substr(auth()->user()->name ??*/'U'}}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-sm font-semibold text-slate-200 truncate">
                            {{'Usuário' }}
                        </div>
                        <div class="text-xs text-slate-500 truncate">
                            {{'kristian' }}
                        </div>
                    </div>
                    <span class="text-slate-500 text-xs">⌄</span>
                </div>
            </div>
        </aside>

        {{-- ============================================================ --}}
        {{--  ÁREA PRINCIPAL (topbar + conteúdo)                          --}}
        {{-- ============================================================ --}}
        <div class="flex flex-col flex-1 overflow-hidden">

            {{-- TOPBAR --}}
            <header class="bg-white border-b border-slate-200 px-6 h-16 flex items-center gap-4 flex-shrink-0">

                {{-- Botão para abrir/fechar a sidebar --}}
                {{-- @click="sidebarOpen = !sidebarOpen" alterna o valor da variável --}}
                <button @click="sidebarOpen = !sidebarOpen"
                        class="text-slate-400 hover:text-slate-700 transition p-1.5 rounded-lg hover:bg-slate-100">
                    ☰
                </button>

                {{-- Título e breadcrumb da página atual --}}
                <div>
                    <h1 class="font-display font-bold text-base text-slate-900 leading-none">
                        @yield('page-title', 'Dashboard')
                    </h1>
                    <p class="text-xs text-slate-400 mt-0.5">
                        @yield('page-subtitle', 'Bem-vindo de volta 👋')
                    </p>
                </div>

                <div class="flex-1"></div>

                {{-- BUSCA GLOBAL --}}
                <div class="flex items-center gap-2 bg-slate-100 border border-slate-200 rounded-xl px-3 py-2 w-64
                            focus-within:border-primary-500 focus-within:bg-white focus-within:ring-2 focus-within:ring-primary-100 transition">
                    <span class="text-slate-400">🔍</span>
                    <input type="text"
                           placeholder="Buscar clientes..."
                           class="bg-transparent text-sm text-slate-700 outline-none w-full placeholder:text-slate-400">
                </div>

                {{-- NOTIFICAÇÕES --}}
                <div class="relative">
                    <button class="w-9 h-9 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center
                                   hover:bg-primary-50 hover:border-primary-300 transition text-base">
                        🔔
                    </button>
                    {{-- Ponto vermelho de notificação --}}
                    <div class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></div>
                </div>

                {{-- USUÁRIO no topbar com dropdown --}}
                {{--
                    x-data="{ open: false }" cria um estado local só pra esse dropdown.
                    @click.outside="open = false" fecha quando clicar fora.
                --}}
                <div class="relative" x-data="{ open: false }" @click.outside="open = false">
                    <button @click="open = !open"
                            class="flex items-center gap-2 px-3 py-1.5 rounded-xl border border-slate-200 hover:bg-slate-50 transition">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-primary-600 to-violet-500 flex items-center justify-center text-xs font-bold text-white">
                            {{/*strtoupper(substr(auth()->user()->name ??*/'U'}}
                        </div>
                        <span class="text-sm font-semibold text-slate-700">
                            {{'Usuário' }}
                        </span>
                        <span class="text-slate-400 text-xs">⌄</span>
                    </button>

                    {{-- DROPDOWN do usuário --}}
                    {{-- x-show="open" mostra/esconde com base na variável --}}
                    <div x-show="open"
                         x-transition
                         class="absolute right-0 top-12 w-48 bg-white border border-slate-200 rounded-xl shadow-lg py-1 z-50">
                        <div class="px-4 py-2 border-b border-slate-100">
                            <p class="text-xs font-semibold text-slate-700">{{ 'Usuário' }}</p>
                            <p class="text-xs text-slate-400">{{ 'kristianfrey11@gmail.com' }}</p>
                        </div>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                            👤 Meu Perfil
                        </a>
                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 hover:bg-slate-50">
                            ⚙️ Configurações
                        </a>
                        <div class="border-t border-slate-100 mt-1 pt-1">
                            {{-- Logout do Laravel --}}
                            <form method="POST" action="{{--  --}}">
                                @csrf
                                <button type="submit"
                                        class="w-full flex items-center gap-2 px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                                    🚪 Sair
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            {{-- CONTEÚDO DA PÁGINA --}}
            {{--
                Aqui é onde cada página vai renderizar seu conteúdo.
                O @yield('content') é substituído pelo @section('content') de cada view.
            --}}
            <main class="flex-1 overflow-y-auto p-6">

                {{-- Mensagens de sucesso (ex: "Cliente cadastrado com sucesso!") --}}
                @if(session('success'))
                    <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                        ✅ {{ session('success') }}
                    </div>
                @endif

                {{-- Mensagens de erro --}}
                @if(session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">
                        ❌ {{ session('error') }}
                    </div>
                @endif

                {{-- Erros de validação de formulário --}}
                @if($errors->any())
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">
                        <p class="font-semibold mb-1">⚠️ Corrija os erros abaixo:</p>
                        <ul class="list-disc list-inside space-y-0.5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    {{-- Espaço para cada página adicionar seus próprios scripts --}}
    @stack('scripts')

</body>
</html>