<div x-data="{
    modal: {
        open: false,
        mode: null,
        data: []
    }
}"
    @open-cliente-modal.window="
    modal.open = true;
    modal.mode = $event.detail.mode;
    modal.data = $event.detail.data ?? {};
    "
    @keydown.escape.window="modal.open = false">

    <!-- Overlay -->
    <div x-show="modal.open" x-transition class="fixed inset-0 flex items-center justify-center bg-black/50">
        <div @click.stop class="bg-white w-96 p-6 rounded-xl shadow-lg">

            <!-- Título Dinâmico -->
            <h2 class="text-lg font-bold mb-4"
                x-text="
                modal.mode === 'create' ? 'Novo Cliente' :
                modal.mode === 'edit' ? 'Editar Cliente' :
                modal.mode === 'view' ? 'Visualizar Cliente' :
                'Modal'
            ">
            </h2>

            <!-- Conteúdo -->
            <div class="space-y-3">
                <input type="text" x-model="modal.data.nome" :readonly="modal.mode === 'view'"
                    class="w-full border rounded px-3 py-2">

                <input type="text" x-model="modal.data.telefone" :readonly="modal.mode === 'view'"
                    class="w-full border rounded px-3 py-2">
            </div>

            <!-- Botões -->
            <div class="flex justify-end gap-2 mt-4">
                <button @click="modal.open = false" class="px-4 py-2 bg-gray-400 text-white rounded">
                    Cancelar
                </button>

                <button class="px-4 py-2 bg-green-600 text-white rounded"
                    x-text="modal.mode === 'create' ? 'Salvar' : 'Atualizar'">
                </button>
            </div>
        </div>
    </div>
