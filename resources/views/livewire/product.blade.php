<div class="group h-full">
    <div class="h-full bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl border border-gray-200 
                transition-all duration-300 flex flex-col @if($product->quantity <= 0) opacity-60 pointer-events-none select-none @else hover:shadow-xl @endif">

        <a href="{{ route('show-product', $product->slug) }}"
           class="block p-5 bg-gray-50 hover:bg-gray-300 transition-colors @if($product->quantity <= 0) pointer-events-none @endif">
            <img src="{{ asset('storage/products/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-40 object-contain mx-auto rounded-2xl">
        </a>

        <div class="p-4 flex flex-col flex-grow">
            <h2 class="flex justify-center items-center text-base font-bold text-gray-900 mb-3 line-clamp-2 leading-tight">
                {{ $product->name }}
            </h2>

            <div class="grid grid-cols-2 gap-2 mb-4 text-sm">
                <div class="bg-gray-100 rounded-lg px-3 py-2 text-center border border-gray-300">
                    <span class="text-gray-600 block text-xs">Price</span>
                    <span class="font-bold text-gray-900">{{ number_format($product->price, 2) }} $</span>
                </div>
                <div>
                    @if ($product->quantity > 0)
                    <div class="rounded-lg px-3 py-2 flex flex-col items-center justify-center border bg-emerald-50 border-emerald-300 text-emerald-700">
                            <span class="text-gray-600 block text-xs">Availability</span>
                            <span class="font-bold">In stock</span>
                        </div>
                    @else
                        <div class="rounded-lg px-3 py-2 flex flex-col items-center justify-center border bg-red-50 border-red-300 text-red-700">
                            <span class="text-gray-600 block text-xs">Availability</span>
                            <span class="font-bold">Out of stock</span>
                        </div>
                    @endif
                </div>
            </div>

            <button wire:click="openModal({{ $product->id }})"
                @if($product->quantity <= 0)
                    disabled
                    class="mt-auto w-full py-2.5 bg-gray-400 text-white text-sm font-semibold rounded-lg cursor-not-allowed"
                @else
                    class="mt-auto w-full py-2.5 bg-neutral-900 hover:bg-gray-600 text-white text-sm font-semibold rounded-lg transition-colors cursor-pointer"
                    @endif>
                View Details
            </button>
        </div>
    </div>
</div>