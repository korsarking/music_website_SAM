<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cart;

    protected $listeners = ["cartUpdated" => "refreshCart"];

    public function mount()
    {
        $this->refreshCart();
    }

    public function refreshCart()
    {
        $this->cart = Auth::user()
            ->getOrCreateActiveCart()
            ->load("items.product");
    }

    public function increase($itemId)
    {
        $item = CartItem::where("id", $itemId)
            ->whereHas("cart", fn($q) => $q->where("user_id", Auth::id()))
            ->firstOrFail();

        if ($item->product->is_digital) {
            return;
        }

        $item->increment("quantity");

        $this->refreshCart();
        $this->dispatch("cartUpdated");
    }

    public function decrease($itemId)
    {
        $item = CartItem::where("id", $itemId)
            ->whereHas("cart", fn($q) => $q->where("user_id", Auth::id()))
            ->firstOrFail();

        if ($item->product->is_digital) {
            return;
        }

        if ($item->quantity > 1) {
            $item->decrement("quantity");
        } else {
            $item->delete();
        }

        $this->refreshCart();
        $this->dispatch("cartUpdated");
    }

    public function remove($itemId)
    {
        CartItem::where("id", $itemId)
            ->whereHas("cart", fn($q) => $q->where("user_id", Auth::id()))
            ->firstOrFail()
            ->delete();

        $this->refreshCart();
        $this->dispatch("cartUpdated");
        $this->js("window.dispatchEvent(new CustomEvent('notify', { detail: { message: 'Deleted product from cart!', type: 'success' } }));");
    }

    public function render()
    {
        return view("livewire.cart-page");
    }
}
