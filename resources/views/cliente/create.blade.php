<!-- Backdrop -->
<div x-show="showModal" x-cloak @click="showModal = false" @keydown.escape.window="showModal = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
    x-transition:enter="ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

    <!-- Modal -->
    <div @click.stop class="bg-white rounded-lg shadow-lg w-full max-w-md" x-transition:enter="ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">

        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf

            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Novo Cliente</h3>
                <button type="button" @click="showModal = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="px-6 py-4 space-y-4">

                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">
                        Nome *
                    </label>
                    <input type="text" id="nome" name="nome" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email *
                    </label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                </div>

                <div>
                    <label for="telefone" class="block text-sm font-medium text-gray-700 mb-1">
                        Telefone
                    </label>
                    <input type="text" id="telefone" name="telefone"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 px-6 py-4 border-t bg-gray-50">
                <button type="button" @click="showModal = false"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancelar
                </button>
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>
