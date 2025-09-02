<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    protected $listeners = [
        'product-added' => '$refresh',
        'product-updated' => '$refresh',
    ];

    public $showSuccess = false;
    public $successMessage = null;

    public function deleteProduct($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            $product->delete();

            // mostrar mensaje tipo modal de éxito (similar a NewProduct)
            $this->successMessage = 'Producto eliminado correctamente.';
            $this->showSuccess = true;

            // asegurar paginación válida después de eliminar
            $this->resetPage();
        } else {
            $this->successMessage = 'Producto no encontrado.';
            $this->showSuccess = true;
        }
    }

    public function closeSuccess()
    {
        $this->showSuccess = false;
        $this->successMessage = null;
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.products.products', ['products' => $products]);
    }
}
