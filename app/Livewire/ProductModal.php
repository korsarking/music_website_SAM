<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductModal extends Component
{
    public $open = false;
    public $product;

    protected $listeners = ["productSelected" => "openModal"];

    public function openModal($id)
    {
        $this->product = Product::find($id);
        $this->open = true;
    }

    public function closeModal()
    {
        $this->open = false;
    }

    public function render()
    {
        return view("livewire.product-modal");
    }
}


