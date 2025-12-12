<div class="max-w-4xl mx-auto py-8 px-4">
    @if(!$cart || $cart->items->isEmpty())
        <p class="text-gray-400 text-center py-16 text-2xl">Your cart is empty</p>
    @else
        <div class="bg-white/5 backdrop-blur-xl rounded-2xl p-6 border border-white/10">

            @foreach($cart->items as $item)
                <div class="flex items-center gap-6 py-6 border-b border-white/10 last:border-0">

                    <a href="{{ $item->product->product_url }}">
                        <img src="{{ $item->product->image_path }}" class="w-24 h-24 object-cover rounded-xl">
                    </a>

                    <div class="flex-1">
                        <h3 class="text-xl font-bold text-white">{{ $item->product->name }}</h3>
                        <p class="text-gray-400 mt-2">{{ $item->price }} $ × {{ $item->quantity }}</p>

                        <div class="flex items-center gap-3 mt-3">

                            @if($item->product->is_digital)
                                <span class="text-indigo-400 text-xl font-semibold">Digital item</span>
                            @else
                                <button wire:click="decrease({{ $item->id }})" class="transition transform hover:scale-110 active:scale-95">
                                    <x-heroicon-o-minus-circle class="w-7 h-7 text-gray-400 hover:text-indigo-400 transition-colors duration-200 cursor-pointer"/>
                                </button>

                                <span class="text-xl text-white">{{ $item->quantity }}</span>

                                <button wire:click="increase({{ $item->id }})" class="transition transform hover:scale-110 active:scale-95">
                                    <x-heroicon-o-plus-circle class="w-7 h-7 text-gray-400 hover:text-indigo-400 transition-colors duration-200 cursor-pointer"/>
                                </button>
                            @endif

                            <button wire:click="remove({{ $item->id }})"
                                    class="text-red-400 hover:text-red-300 ml-8 cursor-pointer">
                                Remove
                            </button>
                        </div>
                    </div>

                    <div class="text-2xl font-bold text-indigo-400">
                        {{ number_format($item->subtotal, 2) }} $
                    </div>

                </div>
            @endforeach

            <div class="mt-8 pt-8 border-t border-white/20 text-right">
                <div class="text-3xl font-bold text-white">
                    Total: {{ number_format($cart->total_price, 2) }} $
                </div>

                <a href="{{ route("checkout") }}" class="inline-block mt-6 px-10 py-4 bg-indigo-600 hover:bg-indigo-500 rounded-xl text-white font-bold text-xl transition">
                    Checkout
                </a>
            </div>
        </div>
    @endif

</div>
