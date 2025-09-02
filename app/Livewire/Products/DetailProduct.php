<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;

class DetailProduct extends Component
{
    public $showModal = false;
    public $product;

    #[On('open-detail-product-modal')]
    public function openModal($id= null)
    {

        if (! $id) {
            return;
        }

        $this->product = Product::find($id);
        if (! $this->product) {
            $this->product = null;
            return;
        }

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->reset(['showModal', 'product']);
    }

    public function render()
    {
        return view('livewire.products.detail-product');
    }
}
