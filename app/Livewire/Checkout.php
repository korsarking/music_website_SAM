<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Checkout extends Component
{
    public float $total = 0;

    public function mount()
    {
        $cart = Auth::user()
            ->getOrCreateActiveCart()
            ->load("items");

        if (!$cart || $cart->items->isEmpty()) {
            Redirect::route("cart.show")->send();
            return;
        }

        $this->total = $cart->total_price;
    }

    public function pay()
    {
        $cart = Auth::user()
            ->getOrCreateActiveCart()
            ->load("items");

        if ($cart->items->isEmpty()) {
            redirect()->route("cart.show")->send();
            return;
        }

        $cart->update([
            "status" => "completed",
        ]);

        $cart->items()->delete();

        $this->js("window.dispatchEvent(new CustomEvent('notify', { detail: { message: 'Payment completed successfully!', type: 'success' } }));");

        return redirect()->route("cart.show");
    }

    public function render()
    {
        return view("livewire.checkout")->layout("layout");
    }
}
