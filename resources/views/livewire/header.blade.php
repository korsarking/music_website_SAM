<header class="fixed top-0 left-0 right-0 z-50">
    <div class="absolute inset-0 bg-gray-900/70 backdrop-blur-xl"></div>

    <div class="relative container mx-auto px-6 py-4 grid grid-cols-3 items-center">

        <div class="justify-self-start">
            <a href="{{ route('home') }}" wire:navigate>
                <img src="{{ asset('logo/text.png') }}" alt="Logo" class="h-8 md:h-10 drop-shadow-2xl">
            </a>
        </div>

        <div class="hidden md:flex justify-center">
            <div class="relative w-full max-w-lg">
                <input
                    id="search"
                    type="text"
                    placeholder="Search merch, albums, tracks..."
                    class="w-full bg-white/10 backdrop-blur-md border border-white/20 rounded-full py-3 px-12 text-white placeholder-gray-400 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/30 transition shadow-2xl">

                <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                    <x-bi-search class="w-5 h-5"/>
                </div>

                <div id="search-results"
                     class="hidden absolute z-50 left-0 top-full p-3 mt-2 bg-black/60 backdrop-blur-xl border border-white/20 rounded-xl">
                </div>
            </div>
        </div>

        <div class="justify-self-end flex items-center gap-8">
            <livewire:cart-icon />

            <livewire:user-menu />
        </div>
    </div>
</header>
