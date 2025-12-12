<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route("login");
        }

        $user = Auth::user();

        $cart = $user->getOrCreateActiveCart();

        $product = Product::findOrFail($this->productId);

        $price = $product->sale_price ?? $product->price;

        if ($product->is_digital && $cart->items()->where("product_id", $product->id)->exists()) {
            $this->dispatch("cartUpdated");
            return;
        }

        $item = CartItem::where("cart_id", $cart->id)
            ->where("product_id", $product->id)
            ->first();

        if ($item) {
            $item->increment("quantity");
        } else {
            CartItem::create([
                "cart_id"     => $cart->id,
                "product_id"  => $product->id,
                "price"       => $price,
                "quantity"    => 1,
            ]);
        }

        $this->dispatch("cartUpdated");
        $this->js("window.dispatchEvent(new CustomEvent('notify', { detail: { message: 'Added to cart!', type: 'success' } }));");
    }

    public function render()
    {
        return view("livewire.add-to-cart");
    }
}
