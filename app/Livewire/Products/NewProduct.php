<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest; 
use Livewire\Attributes\On;

class NewProduct extends Component
{
    public $showModal = false;
    public $nombre, $descripcion, $precio, $stock;
    public $showSuccess = false;

    #[On('open-new-product-modal')]
    public function openModal()
    {
        $this->showModal = true;
        $this->showSuccess = false;
    }

    public function closeModal()
    {
        $this->reset(['showModal', 'nombre', 'descripcion', 'precio', 'stock', 'showSuccess']);
        $this->resetValidation();
    }

    public function saveProduct()
    {
        $request = new StoreProductRequest();

        $this->validate(
            $request->rules(),
            $request->messages()
        );

        Product::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);

        $this->showSuccess = true;
        $this->dispatch('product-added');
    }

    public function render()
    {
        return view('livewire.products.new-product');
    }
}