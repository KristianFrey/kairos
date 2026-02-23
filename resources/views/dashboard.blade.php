{{--
    @extends diz: "essa página usa o layout app.blade.php"
    Tudo que estiver fora dos @section não aparece.
--}}
@extends('layout.layoutPage')

{{-- Define o título da aba do navegador --}}
@section('title', 'Dashboard')

{{-- Define o título que aparece no topbar --}}
@section('page-title', 'Dashboard')
@section('page-subtitle')

    {{-- CONTEÚDO PRINCIPAL DA PÁGINA --}}
@section('content')

    {{-- CARDS DE ESTATÍSTICAS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        {{-- Card: Agendamentos Hoje --}}
        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:-translate-y-1 transition-transform duration-200">
            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-lg mb-4">📅</div>
            <div class="font-display font-bold text-3xl text-primary-600 leading-none mb-1">
                {{-- Aqui você vai colocar dados reais vindos do controller --}}
                {{ $totalHoje ?? 24 }}
            </div>
            <div class="text-xs text-slate-400 font-medium">Agendamentos Hoje</div>
            <div class="text-xs text-emerald-500 font-semibold mt-2">↑ 8% vs ontem</div>
        </div>

        {{-- Card: Confirmados --}}
        <div class="bg-white rounded-2xl p-5 border border-slate-200 hover:-translate-y-1 transition-transform duration-200">
            <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-lg mb-4">✅</div>
            <div class="font-display font-bold text-3xl text-emerald-500 leading-none mb-1">{{--  --}}</div>
            <div class="text-xs text-slate-400 font-medium">Confirmados</div>
            <div class="text-xs text-emerald-500 font-semibold mt-2">↑ 12% essa semana</div>
        </div>

        {{-- Card: Aguardando --}}
        <div
            class="bg-white rounded-2xl p-5 border border-slate-200 hover:-translate-y-1 transition-transform duration-200">
            <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-lg mb-4">⏳</div>
            <div class="font-display font-bold text-3xl text-amber-500 leading-none mb-1">{{--  --}}</div>
            <div class="text-xs text-slate-400 font-medium">Aguardando</div>
            <div class="text-xs text-red-400 font-semibold mt-2">2 pendentes de confirmação</div>
        </div>

        {{-- Card: Cancelados --}}
        <div
            class="bg-white rounded-2xl p-5 border border-slate-200 hover:-translate-y-1 transition-transform duration-200">
            <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center text-lg mb-4">❌</div>
            <div class="font-display font-bold text-3xl text-red-400 leading-none mb-1">{{--  --}}</div>
            <div class="text-xs text-slate-400 font-medium">Cancelados</div>
            <div class="text-xs text-emerald-500 font-semibold mt-2">↓ 5% esse mês</div>
        </div>
    </div>

    {{-- GRID PRINCIPAL --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

        {{-- TABELA DE AGENDAMENTOS (ocupa 2/3 da largura) --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 overflow-hidden">
            <div class="flex items-center gap-3 px-5 py-4 border-b border-slate-100">
                <span class="text-lg">📋</span>
                <h2 class="font-display font-bold text-sm text-slate-800">Agendamentos do Dia</h2>
                <div class="ml-auto flex gap-2">
                    <button
                        class="text-xs px-3 py-1.5 rounded-lg border border-slate-200 text-slate-500 hover:border-primary-400 hover:text-primary-600 transition">
                        Filtrar
                    </button>
                    {{--
                        @click="$dispatch('open-modal', 'novo-agendamento')"
                        Esse é o Alpine.js disparando um evento para abrir o modal.
                        Vamos ver isso mais pra frente!
                    --}}
                    <button
                        class="text-xs px-3 py-1.5 rounded-lg bg-primary-600 text-white hover:bg-primary-700 transition font-semibold">
                        + Novo
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-slate-50">
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">
                                Paciente</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">
                                Horário</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">
                                Serviço</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">
                                Status</th>
                            <th class="text-left text-[11px] font-bold text-slate-400 uppercase tracking-wide px-5 py-3">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">

                        {{--
                            Aqui você vai colocar um @foreach com dados reais.
                            Por enquanto, são linhas de exemplo estáticas.

                            Quando tiver o controller, ficará assim:
                            @foreach ($agendamentos as $ag)
                                <tr>
                                    <td>{{ $ag->cliente->nome }}</td>
                                    ...
                                </tr>
                            @endforeach
                        --}}

                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-violet-500 to-indigo-500 flex items-center justify-center text-xs font-bold text-white flex-shrink-0">
                                        AM</div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-800">Ana Martins</div>
                                        <div class="text-xs text-slate-400">(51) 9 9999-1234</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-sm font-bold text-slate-700">08:00</td>
                            <td class="px-5 py-3.5 text-sm text-slate-600">Consulta Geral</td>
                            <td class="px-5 py-3.5">
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-100 text-emerald-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Confirmado
                                </span>
                            </td>
                            <td class="px-5 py-3.5">
                                <button
                                    class="text-sm px-2 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 transition mr-1">✏️</button>
                                <button
                                    class="text-sm px-2 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 transition">👁️</button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center text-xs font-bold text-white flex-shrink-0">
                                        JS</div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-800">João Santos</div>
                                        <div class="text-xs text-slate-400">(51) 9 8888-5678</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-sm font-bold text-slate-700">09:30</td>
                            <td class="px-5 py-3.5 text-sm text-slate-600">Retorno</td>
                            <td class="px-5 py-3.5">
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full bg-amber-100 text-amber-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Aguardando
                                </span>
                            </td>
                            <td class="px-5 py-3.5">
                                <button
                                    class="text-sm px-2 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 transition mr-1">✏️</button>
                                <button
                                    class="text-sm px-2 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 transition">👁️</button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-5 py-3.5">
                                <div class="flex items-center gap-2.5">
                                    <div
                                        class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-400 to-cyan-500 flex items-center justify-center text-xs font-bold text-white flex-shrink-0">
                                        LC</div>
                                    <div>
                                        <div class="text-sm font-semibold text-slate-800">Luiza Costa</div>
                                        <div class="text-xs text-slate-400">(51) 9 7777-9012</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3.5 text-sm font-bold text-slate-700">10:00</td>
                            <td class="px-5 py-3.5 text-sm text-slate-600">Exame</td>
                            <td class="px-5 py-3.5">
                                <span
                                    class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full bg-blue-100 text-blue-700">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Em atendimento
                                </span>
                            </td>
                            <td class="px-5 py-3.5">
                                <button
                                    class="text-sm px-2 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 transition mr-1">✏️</button>
                                <button
                                    class="text-sm px-2 py-1 rounded-lg border border-slate-200 hover:bg-slate-50 transition">👁️</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        {{-- SIDEBAR DIREITA: calendário + próximos --}}
        <div class="flex flex-col gap-4">

            {{-- MINI CALENDÁRIO --}}
            <div class="bg-white rounded-2xl border border-slate-200 p-5">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-base">📆</span>
                    <h3 class="font-display font-bold text-sm text-slate-800">Fevereiro 2026</h3>
                </div>
                <div class="grid grid-cols-7 gap-1 text-center">
                    {{-- Cabeçalho dos dias --}}
                    @foreach (['D', 'S', 'T', 'Q', 'Q', 'S', 'S'] as $d)
                        <div class="text-[10px] font-bold text-slate-400 py-1">{{ $d }}</div>
                    @endforeach
                    {{-- Dias do mês --}}
                    @foreach ([26, 27, 28, 29, 30, 31, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28] as $i => $dia)
                        <div
                            class="aspect-square flex items-center justify-center text-xs rounded-lg cursor-pointer transition
                            {{ $i < 6 ? 'text-slate-300' : '' }}
                            {{ $dia == 19 && $i >= 6 ? 'bg-primary-600 text-white font-bold shadow-md' : 'hover:bg-primary-100 hover:text-primary-600 text-slate-600' }}">
                            {{ $dia }}
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- PRÓXIMOS AGENDAMENTOS --}}
            <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
                <div class="flex items-center gap-2 px-5 py-4 border-b border-slate-100">
                    <span class="text-base">⏰</span>
                    <h3 class="font-display font-bold text-sm text-slate-800">Próximos Hoje</h3>
                </div>
                <div class="divide-y divide-slate-100">
                    <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-slate-50 transition cursor-pointer">
                        <div
                            class="text-center min-w-[44px] bg-blue-100 text-primary-600 rounded-lg py-1.5 text-xs font-bold">
                            12h<br>30</div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-slate-800">Beatriz Ferreira</div>
                            <div class="text-xs text-slate-400">Consulta · Dr. Rafael</div>
                        </div>
                        <div class="w-2 h-2 rounded-full bg-amber-400"></div>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-slate-50 transition cursor-pointer">
                        <div
                            class="text-center min-w-[44px] bg-blue-100 text-primary-600 rounded-lg py-1.5 text-xs font-bold">
                            14h<br>00</div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-slate-800">Carlos Pereira</div>
                            <div class="text-xs text-slate-400">Retorno · Dra. Paula</div>
                        </div>
                        <div class="w-2 h-2 rounded-full bg-emerald-400"></div>
                    </div>
                    <div class="flex items-center gap-3 px-5 py-3.5 hover:bg-slate-50 transition cursor-pointer">
                        <div
                            class="text-center min-w-[44px] bg-blue-100 text-primary-600 rounded-lg py-1.5 text-xs font-bold">
                            15h<br>30</div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-slate-800">Fernanda Lima</div>
                            <div class="text-xs text-slate-400">Exame · Dr. Rafael</div>
                        </div>
                        <div class="w-2 h-2 rounded-full bg-emerald-400"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

{{-- Scripts específicos desta página --}}
@push('scripts')
    <script>
        // Exemplo: quando tiver campos de telefone na página, você ativa a máscara assim:
        // document.querySelectorAll('.phone-mask').forEach(el => {
        //     IMask(el, { mask: '(00) 0 0000-0000' });
        // });
        console.log('Dashboard carregado!');
    </script>
@endpush
