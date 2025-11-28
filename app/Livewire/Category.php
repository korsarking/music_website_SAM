<?php

namespace App\Livewire;

use Livewire\Component;

class Category extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = $category->load('products');
    }

    public function render()
    {
        return view("livewire.category", [
            'products' => $this->category->products,
        ]);
    }
}
