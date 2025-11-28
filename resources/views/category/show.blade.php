@extends("layout")

@section("main")
    <div class="max-w-7xl mx-auto px-6 py-12">

        <h1 class="text-5xl md:text-7xl font-extrabold mb-12 pt-20 text-center tracking-tight">
            <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-indigo-400">
                {{ $category["name"] }}
            </span>
        </h1>

        <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach ($category->products as $product)
                <li class="transition-transform duration-200 hover:-translate-y-1">
                    @livewire("product", ["product" => $product], key($product->id))
                </li>
            @endforeach
        </ul>

    </div>
@endsection
