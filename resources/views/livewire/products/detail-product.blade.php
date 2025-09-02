<div>
    @if($showModal && $product)
        <div x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg">
                <h2 class="text-xl font-bold mb-4 text-blue-500">Detalle del producto</h2>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <span class="font-semibold">ID:</span>
                        <div class="mt-1 text-gray-700">{{ $product->id }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Fecha de creación:</span>
                        <div class="mt-1 text-gray-700">{{ $product->created_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Nombre:</span>
                        <div class="mt-1 text-gray-700">{{ $product->nombre }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Ult. actualización:</span>
                        <div class="mt-1 text-gray-700">{{ $product->updated_at->format('d/m/Y H:i') }}</div>
                    </div>
                    <div class="col-span-2">
                        <span class="font-semibold">Descripción:</span>
                        <div class="mt-1 text-gray-700">{{ $product->descripcion }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Precio:</span>
                        <div class="mt-1 text-gray-700">${{ number_format($product->precio, 2) }}</div>
                    </div>
                    <div>
                        <span class="font-semibold">Stock:</span>
                        <div class="mt-1 text-gray-700">{{ $product->stock }}</div>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button wire:click="closeModal" class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-4 rounded">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
