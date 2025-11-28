<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Album;

class Store extends Component
{
    public $recommendedProducts;

    public function mount()
    {
        $this->recommendedProducts = Product::inRandomOrder()->limit(9)->get();
    }

    public function render()
    {
        $categories = Category::with("products")->get();
        $albums = Album::with("tracks")->get();

        return view("livewire.store", [
            "categories" => $categories,
            "recommendedProducts" => $this->recommendedProducts,
            "albums" => $albums
        ]);
    }
}
