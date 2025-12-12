<div x-data="{ open: @entangle('open') }">

    <div x-show="open"
         x-transition.opacity
         @click.self="open = false"
         class="fixed inset-0 bg-black/70 backdrop-blur-sm z-9999 flex items-center justify-center">

        <div x-show="open"
             x-transition
             class="bg-neutral-900 text-white w-full max-w-md rounded-2xl p-8 shadow-2xl relative z-10000">

            <button @click="open = false"
                    class="absolute top-4 right-4 text-neutral-400 hover:text-white text-3xl cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
            </button>

            @if($product)

                <div class="w-full h-56 bg-neutral-800 rounded-xl flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('storage/products/' . $product->image) }}"
                         class="max-h-full max-w-full object-contain">
                </div>

                <h2 class="text-3xl font-bold mt-5 flex items-center justify-center">{{ $product->name }}</h2>

                <p class="text-neutral-400 mt-3 leading-relaxed flex items-center justify-center">
                    {{ $product->description }}
                </p>

                <div class="space-y-4 mt-8">
                    <div class="flex items-center justify-between px-6 py-5 bg-neutral-800/80 backdrop-blur-sm rounded-2xl border border-neutral-700">
                        <span class="text-neutral-400 font-medium text-lg flex gap-2 justify-center items-center">
                            <x-heroicon-o-banknotes class="w-6 h-6 text-neutral-500" />
                            Price
                        </span>
                        <span class="text-xl font-bold text-white">
                            {{ number_format($product->price, 2) }} $
                        </span>
                    </div>

                    <div class="flex items-center justify-between px-6 py-5 bg-neutral-800/80 backdrop-blur-sm rounded-2xl border border-neutral-700">
                        <span class="text-neutral-400 font-medium text-lg flex gap-2 justify-center items-center">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-neutral-500" />
                            Availability
                        </span>
                        <span class="@if($product->quantity > 0) text-emerald-400 @else text-red-400 @endif font-bold text-xl">
                            @if($product->quantity > 0)
                                In Stock
                            @else
                                Out of Stock
                            @endif
                        </span>
                    </div>
                </div>
                <div class="mt-5 flex items-center justify-center">
                    <livewire:add-to-cart :productId="$product->id" />
                </div>
            @endif
        </div>
    </div>
</div>
