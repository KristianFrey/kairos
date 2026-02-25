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
    <div x-show="modal.open" x-transition x-cloak class="fixed inset-0 flex items-center justify-center bg-black/50 p-4">

        <!-- Modal -->
        <div @click.stop class="bg-white p-6 rounded-xl shadow-lg" style="width: 500px; max-width: 95vw;">

            <!-- Título -->
            <h2 class="text-lg font-semibold mb-4"
                x-text="
                modal.mode === 'create' ? 'Novo Cliente' :
                modal.mode === 'edit' ? 'Editar Cliente' :
                modal.mode === 'view' ? 'Visualizar Cliente' :
                'Modal'
            ">
            </h2>

            <!-- Campos -->
            <div class="space-y-3">

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Nome</label>
                    <input type="text" x-model="modal.data.nome" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Telefone</label>
                    <input type="text" x-model="modal.data.telefone" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">e-mail</label>
                    <input type="text" x-model="modal.data.email" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">CPF</label>
                    <input type="text" x-model="modal.data.cpf" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-xs text-gray-500 mb-1">Data de Nascimento</label>
                    <input type="text" x-model="modal.data.dt_nascimento" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">
                </div>

                <div x-show="modal.mode === 'view'">
                    <label class="block text-xs text-gray-500 mb-1">Data Inclusão</label>
                    <input type="text" x-model="modal.data.created_at" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">
                </div>
                <div x-show="modal.mode === 'view'">
                    <label class="block text-xs text-gray-500 mb-1">Data Alteração</label>
                    <input type="text" x-model="modal.data.updated_at" :readonly="modal.mode === 'view'"
                        class="w-full border rounded px-3 py-2 text-sm">

                </div>


            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-2 mt-5">

                <button @click="modal.open = false" class="px-4 py-2 text-sm bg-gray-200 rounded hover:bg-gray-300">
                    Cancelar
                </button>

                <button x-show="modal.mode !== 'view'"
                    class="px-4 py-2 text-sm bg-primary-600 text-white rounded hover:bg-primary-700"
                    x-text="modal.mode === 'create' ? 'Salvar' : 'Atualizar'"></button>

            </div>

        </div>
    </div>
