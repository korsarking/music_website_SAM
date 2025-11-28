{{-- resources/views/livewire/product.blade.php --}}
<div class="group h-full">
    <div class="h-full bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl border border-gray-200 
                transition-all duration-300 flex flex-col">

        <!-- Изображение -->
        <a href="{{ route('show-product', $product->slug) }}"
           class="block p-5 bg-gray-50 hover:bg-gray-300 transition-colors">
            <img src="{{ asset('storage/products/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-40 object-contain mx-auto">
        </a>

        <!-- Контент -->
        <div class="p-4 flex flex-col flex-grow">
            <h2 class="text-base font-bold text-gray-900 mb-3 line-clamp-2 leading-tight">
                {{ $product->name }}
            </h2>

            <!-- Цена + Сток -->
            <div class="grid grid-cols-2 gap-2 mb-4 text-sm">
                <div class="bg-gray-100 rounded-lg px-3 py-2 text-center border border-gray-300">
                    <span class="text-gray-600 block text-xs">Price</span>
                    <span class="font-bold text-gray-900">{{ number_format($product->price, 2) }} MDL</span>
                </div>
                <div class="rounded-lg px-3 py-2 text-center border
                            @if($product->quantity > 0)
                                bg-emerald-50 border-emerald-300 text-emerald-700
                            @else
                                bg-red-50 border-red-300 text-red-700
                            @endif">
                    <span class="block text-xs">Stock</span>
                    <span class="font-bold">{{ $product->quantity }}</span>
                </div>
            </div>

            <!-- Кнопка -->
            <button wire:click="openModal({{ $product->id }})"
                    class="mt-auto w-full py-2.5 bg-neutral-900 hover:bg-gray-600 text-white text-sm font-semibold rounded-lg transition-colors cursor-pointer">
                View Details
            </button>
        </div>
    </div>
</div>