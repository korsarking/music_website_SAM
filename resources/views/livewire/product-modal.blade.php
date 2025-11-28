<div x-data="{ open: @entangle('open') }">

    <div x-show="open"
         x-transition.opacity
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

                <h2 class="text-3xl font-bold mt-5">{{ $product->name }}</h2>

                <p class="text-neutral-400 mt-3 leading-relaxed">
                    {{ $product->description }}
                </p>

                <div class="flex items-center justify-between mt-6">

                    <div class="px-4 py-2 bg-neutral-800 rounded-2xl border border-neutral-700 flex justify-between gap-3 min-w-[140px]">
                        <span class="font-bold text-neutral-300">Price:</span>
                        <span class="font-semibold">
                            {{ number_format($product->price, 2) }} MDL
                        </span>
                    </div>

                    <div class="px-4 py-2 bg-neutral-800 rounded-2xl border border-neutral-700 flex justify-between gap-3 min-w-[140px]">
                        <span class="font-bold text-neutral-300">Stock:</span>
                        @if ($product->quantity > 0)
                            <span class="text-green-400 font-semibold">{{ $product->quantity }}</span>
                        @else
                            <span class="text-red-400 font-semibold">0</span>
                        @endif
                    </div>

                </div>

                <button
                    class="w-full flex items-center justify-center gap-2 mt-8 py-3 bg-blue-400 hover:bg-blue-500 text-black font-semibold rounded-xl cursor-pointer text-3xl">
                    <x-bi-plus-square class="h-5 w-5 text-3xl" />
                    Add to Cart
                </button>

            @endif
        </div>
    </div>
</div>
