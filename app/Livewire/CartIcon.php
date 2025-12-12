<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartIcon extends Component
{
    public $count = 0;

    protected $listeners = ['cartUpdated' => 'updateCount'];

    public function mount()
    {
        $this->updateCount();
    }

    public function updateCount()
    {
        if (Auth::check()) {
            $cart = Auth::user()->activeCart()->first();
            $this->count = $cart?->items->sum('quantity') ?? 0;
        } else {
            $this->count = 0;
        }
    }

    public function render()
    {
        return view('livewire.cart-icon');
    }
}
