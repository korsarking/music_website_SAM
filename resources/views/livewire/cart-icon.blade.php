<a href="{{ route('cart.show') }}" 
   class="relative group flex items-center justify-center text-white hover:text-indigo-400 transition">
    <x-heroicon-c-shopping-cart class="w-7 h-7" />
    @if($count > 0)
        <span class="absolute -top-2 -right-2 bg-indigo-600 text-white text-xs font-bold 
                     rounded-full w-5 h-5 flex items-center justify-center shadow-lg">
            {{ $count }}
        </span>
    @endif
</a>