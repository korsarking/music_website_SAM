@extends("layout")

@section("main")
    <div class="max-w-7xl mx-auto px-6 py-8">

        <h1 class="text-5xl md:text-7xl font-extrabold pt-16 mb-4 text-center tracking-tight">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-indigo-400">
                {{ $category["name"] }} Category
            </span>
        </h1>

        <a href="{{ url()->previous() }}" class="inline-flex items-center gap-3 px-6 sm:px-8 py-3 sm:py-4 mb-8 bg-white hover:bg-gray-300 text-black font-bold text-lg sm:text-xl rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto max-w-full">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Back
        </a>

        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($category->products as $product)
                <li class="transition-transform duration-200 hover:-translate-y-1">
                    @livewire("product", ["product" => $product], key($product->id))
                </li>
            @endforeach
        </ul>

    </div>
@endsection
