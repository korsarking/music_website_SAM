@extends("layout")

@section("main")
    <h2 class="text-5xl md:text-6xl font-bold tracking-tight text-center px-2 mt-12 py-4">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400">
            Your Cart
        </span>
    </h2>
    <livewire:cart-page />
@endsection