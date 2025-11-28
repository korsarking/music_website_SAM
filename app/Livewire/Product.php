<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view("livewire.product", ["product" => $this->product]);
    }
    
    public function openModal()
    {
        $this->dispatch("productSelected", id: $this->product->id);
    }
}
