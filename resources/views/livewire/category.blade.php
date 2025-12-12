<div>
    @if ($category->slug !== "music")
        <div class="bg-white/20 rounded-2xl shadow-xl p-4 sm:p-6 mb-12 ring-1 ring-gray-200/50">
            <a href="{{ route('show-category', $category->slug) }}" class="inline-flex items-center gap-3 px-6 sm:px-8 py-3 sm:py-4 mb-8 bg-white hover:bg-gray-300
                    text-black font-bold text-lg sm:text-xl rounded-2xl shadow-lg hover:shadow-xl
                    transform hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto max-w-full">
                {{ $category->name }}
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>

            <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($products as $product)
                    <livewire:product :product="$product" :key="$product->id" />
                @endforeach
            </div>
        </div>
    @endif
</div>