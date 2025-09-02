<div>
    @if($showModal)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                @if($showSuccess)
                    <div class="mb-6 flex items-center justify-center flex-col">
                        <div class="flex items-center bg-gradient-to-r from-green-400 to-green-600 text-white px-5 py-4 rounded-lg shadow-md mb-3">
                            <svg class="w-6 h-6 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            <span class="font-semibold text-lg">¡Producto agregado exitosamente!</span>
                        </div>
                        <button wire:click="closeModal" class="mt-2 bg-white text-green-700 border border-green-500 hover:bg-green-50 font-bold py-2 px-6 rounded transition duration-150">
                            Cerrar
                        </button>
                    </div>
                @else
                    <h2 class="text-xl font-bold mb-4 text-blue-500">Agregar nuevo producto</h2>
                    <form wire:submit.prevent="saveProduct">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nombre</label>
                            <input type="text" wire:model="nombre" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" required>
                            @error('nombre')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Descripción</label>
                            <textarea wire:model="descripcion" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" rows="2" required></textarea>
                            @error('descripcion')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Precio</label>
                            <input type="number" wire:model="precio" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" step="0.01" required>
                            @error('precio')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Stock</label>
                            <input type="number" wire:model="stock" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring" required>
                            @error('stock')
                                <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="button" wire:click="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded">
                                Cancelar
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Guardar
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endif
</div>
