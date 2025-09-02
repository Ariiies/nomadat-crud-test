<div class="flex flex-col items-center justify-center min-h-screen bg-gray-800">
    <div class="w-full max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6 mt-8">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 rounded-md px-2 py-1 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>

                <h1 class="text-2xl font-bold text-blue-400">Listado de Productos</h1>
            </div>

            <button 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out"
                wire:click="$dispatch('open-new-product-modal')">
                Agregar nuevo producto
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase">Nombre</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase">Descripción</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase">Precio</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase">Stock</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($products as $product)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->nombre }}</td>
                            <td class="px-4 py-2 max-w-xs truncate">{{ \Illuminate\Support\Str::limit($product->descripcion, 30, '...') }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">${{ number_format($product->precio, 2) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $product->stock }}</td>
                            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium">
                                <button wire:click="$dispatch('open-detail-product-modal', { id: {{ $product->id }} })" class="text-blue-600 hover:text-blue-900 mr-2">
                                    Ver
                                </button>
                                <button wire:click="$dispatch('open-edit-product-modal', { id: {{ $product->id }} })" class="text-indigo-600 hover:text-indigo-900 mr-2">
                                    Editar
                                </button>
                                <div x-data="{ open: false }" class="inline-block">
                                    <button 
                                        class="text-red-600 hover:text-red-800 mr-2"
                                        @click="open = true">
                                        Eliminar
                                    </button>
                                    <div 
                                        x-show="open" 
                                        @click.away="open = false"
                                        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40"
                                        x-transition>
                                        <div class="bg-white border border-gray-300 rounded shadow-lg p-6 w-80">
                                            <p class="text-gray-800 mb-4">¿Seguro que quieres eliminar este producto? </p>
                                            <div class="flex justify-end space-x-2">
                                                <button 
                                                    class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700"
                                                    @click="open = false; $wire.deleteProduct({{ $product->id }})">
                                                    Confirmar
                                                </button>
                                                <button 
                                                    class="bg-gray-300 text-gray-800 px-3 py-1 rounded hover:bg-gray-400"
                                                    @click="open = false">
                                                    Cancelar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">No hay productos registrados todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>

    <!-- mensaje de producto eliminado -->
    @if($showSuccess)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md border-t-4 border-red-500">
                <div class="flex items-center mb-4">
                    <svg class="w-8 h-8 text-red-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m2 7a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v11a2 2 0 002 2h10z" />
                    </svg>
                    <span class="text-lg font-semibold text-red-600">Producto eliminado</span>
                </div>
                <div class="mb-4 p-3 bg-red-50 border border-red-200 text-red-700 rounded">
                    {{ $successMessage }}
                </div>
                <div class="flex justify-end">
                    <button wire:click="closeSuccess" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- incluir modales hijos -->
    <livewire:products.new-product />
    <livewire:products.edit-product />
    <livewire:products.detail-product />
</div>
