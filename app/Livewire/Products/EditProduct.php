<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Http\Requests\UpdateProductRequest;
use Livewire\Attributes\On;

class EditProduct extends Component
{
    public $showModal = false;
    public $productId;
    public $nombre, $descripcion, $precio, $stock;
    public $showSuccess = false;

    #[On('open-edit-product-modal')]
    public function openModal($id = null)
    {

        $product = Product::find($id);
        if (! $product) {
            return;
        }

        $this->productId = $product->id;
        $this->nombre = $product->nombre;
        $this->descripcion = $product->descripcion;
        $this->precio = $product->precio;
        $this->stock = $product->stock;
        $this->showSuccess = false;
        $this->showModal = true;
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->reset(['showModal', 'productId', 'nombre', 'descripcion', 'precio', 'stock', 'showSuccess']);
        $this->resetValidation();
    }

    public function saveProduct()
    {
        $request = new UpdateProductRequest();

        $this->validate(
            $request->rules(),
            $request->messages()
        );

        $product = Product::find($this->productId);
        if (! $product) {
            $this->addError('general', 'Producto no encontrado.');
            return;
        }

        $product->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);

        $this->showSuccess = true;
        $this->dispatch('product-updated');
    }

    public function render()
    {
        return view('livewire.products.edit-product');
    }
}
