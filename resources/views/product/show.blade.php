@extends("layout")

@section("main")
    <div class="max-w-7xl mx-auto p-6 md:p-10" x-data="{ open: false }">

        <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-8 md:p-10 border border-neutral-200">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

                <div class="relative group cursor-zoom-in" @click="open = true">
                    <img src="{{ asset('storage/products/' . $product->image) }}"
                        class="w-full h-[420px] object-contain rounded-xl shadow-inner bg-white"
                        alt="{{ $product->name }}">

                    <div class="absolute inset-0 rounded-xl opacity-0 group-hover:opacity-100 bg-black/5 transition-opacity"></div>
                </div>

                <div class="flex flex-col justify-between">
                    
                    <div>
                        <h1 class="text-4xl font-extrabold text-neutral-900 leading-tight">
                            {{ $product->name }}
                        </h1>

                        <div class="mt-5">
                            @if ($product->sale_price)
                                <div class="flex items-center gap-3">
                                    <span class="text-3xl font-bold text-red-600">
                                        {{ $product->sale_price }} MDL
                                    </span>
                                    <span class="line-through text-neutral-500 text-xl">
                                        {{ $product->price }} MDL
                                    </span>
                                </div>
                            @else
                                <span class="text-3xl font-bold text-neutral-800">
                                    {{ $product->price }} MDL
                                </span>
                            @endif
                        </div>

                        <p class="mt-6 text-neutral-700 text-lg leading-relaxed">
                            {{ $product->description }}
                        </p>

                        <div class="mt-10 flex gap-6">

                            <div class="px-5 py-3 bg-neutral-100 rounded-2xl shadow border border-neutral-200 min-w-[160px]">
                                <div class="text-sm text-neutral-500">Price:</div>
                                <div class="text-xl font-semibold">
                                    {{ number_format($product->price, 2) }} MDL
                                </div>
                            </div>

                            <div class="px-5 py-3 bg-neutral-100 rounded-2xl shadow border border-neutral-200 min-w-[160px]">
                                <div class="text-sm text-neutral-500">Stock:</div>
                                @if ($product->quantity > 0)
                                    <div class="text-xl font-semibold text-green-600">{{ $product->quantity }}</div>
                                @else
                                    <div class="text-xl font-semibold text-red-600">Out</div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mt-10">
                        <a href="#"
                        class="w-full block text-center py-3 bg-neutral-900 text-white text-xl rounded-xl shadow hover:bg-gray-700 hover:shadow-lg transition-all">
                            Add to Cart
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <template x-teleport="body">
            <div x-show="open"
                x-transition.opacity
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-md"
                @keydown.escape.window="open = false"
                @click="open = false">

                <img src="{{ asset('storage/products/' . $product->image) }}"
                    class="relative max-w-full max-h-full object-contain rounded-xl shadow-2xl"
                    @click.stop
                    alt="{{ $product->name }}">

                <button @click="open = false"
                        class="absolute top-6 right-6 text-white/90 hover:text-white text-4xl transition">
                        <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                </button>

            </div>
        </template>

    </div>
@endsection
