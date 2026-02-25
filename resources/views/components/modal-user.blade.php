<div x-data="{
    modal: {
        open: false,
        mode: null,
        data: {}
    }
}"
    @open-cliente-modal.window="
        modal.open = true;
        modal.mode = $event.detail.mode;
        modal.data = $event.detail.data ?? {};
    ">

    <!-- Overlay -->
    <div x-show="modal.open" x-transition.opacity x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-4">

        <!-- Modal -->
        <div @click.stop class="bg-slate-50 rounded-2xl shadow-xl border-2 border-primary-400 p-6 sm:p-7"
            style="width: 500px; max-width: 95vw;">

            <!-- Cabeçalho -->
            <div class="mb-5">
                <h2 class="text-lg font-semibold text-gray-900"
                    x-text="
                        modal.mode === 'create' ? 'Novo Cliente' :
                        modal.mode === 'edit' ? 'Editar Cliente' :
                        modal.mode === 'view' ? 'Visualizar Cliente' :
                        'Cliente'
                    ">
                </h2>
            </div>

            <!-- Conteúdo -->
            <div class="space-y-4">

                <!-- Dados principais -->
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5">Nome completo</label>
                        <input type="text" x-model="modal.data.nome" :readonly="modal.mode === 'view'"
                            placeholder="Digite o nome do cliente"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 disabled:bg-gray-50 disabled:text-gray-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5">Telefone</label>
                        <input type="text" x-model="modal.data.telefone" :readonly="modal.mode === 'view'"
                            placeholder="(00) 00000-0000"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 disabled:bg-gray-50 disabled:text-gray-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5">CPF</label>
                        <input type="text" x-model="modal.data.cpf" :readonly="modal.mode === 'view'"
                            placeholder="000.000.000-00"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 disabled:bg-gray-50 disabled:text-gray-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5">E-mail</label>
                        <input type="text" x-model="modal.data.email" :readonly="modal.mode === 'view'"
                            placeholder="cliente@exemplo.com"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 disabled:bg-gray-50 disabled:text-gray-500">
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1.5">Data de Nascimento</label>
                        <div class="relative">
                            <span
                                class="pointer-events-none absolute inset-y-0 left-3 inline-flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M8 7V4m8 3V4M6 11h12M6 5h12a2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                </svg>
                            </span>
                            <input type="text" x-model="modal.data.dt_nascimento"
                                :readonly="modal.mode === 'view'" placeholder="dd/mm/aaaa"
                                class="w-full border border-gray-200 rounded-lg pl-9 pr-3 py-2.5 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 disabled:bg-gray-50 disabled:text-gray-500">
                        </div>
                    </div>
                </div>

                <!-- Metadados (apenas visualização) -->
                <div x-show="modal.mode === 'view'" x-cloak class="space-y-3 border-t border-gray-100 pt-4">
                    <h3>
                        Informações do Registro
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Data de Inclusão</label>
                            <input type="text" x-model="modal.data.created_at" readonly
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm bg-gray-50 text-gray-600">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-600 mb-1">Data de Alteração</label>
                            <input type="text" x-model="modal.data.updated_at" readonly
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm bg-gray-50 text-gray-600">
                        </div>
                    </div>
                </div>


            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-2 mt-8 pt-1">

                <button @click="modal.open = false"
                    class="px-4 py-2.5 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    Cancelar
                </button>

                <button x-show="modal.mode !== 'view'"
                    class="px-4 py-2.5 text-sm font-medium bg-primary-600 text-white rounded-lg shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-1 transition"
                    x-text="modal.mode === 'create' ? 'Salvar' : 'Atualizar'"></button>

            </div>

        </div>
    </div>
