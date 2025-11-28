<div x-data="{ open: false }" class="relative">
    @auth
        <div class="hidden sm:flex items-center">
            <button
                @click="open = !open"
                class="flex items-center space-x-3 text-sm font-medium text-white hover:text-indigo-400 transition cursor-pointer">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->username }}" class="w-9 h-9 rounded-full ring-2 ring-indigo-500">
                <span>{{ $user->username }}</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        </div>

        <div class="flex sm:hidden items-center">
            <button
                @click="open = !open"
                class="flex items-center space-x-3 text-sm font-medium text-white hover:text-indigo-400 transition cursor-pointer">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->username }}" class="w-9 h-9 rounded-full ring-2 ring-indigo-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div
            x-show="open"
            x-transition
            @click.away="open = false"
            class="hidden sm:block absolute right-0 mt-2 w-56 rounded-lg shadow-2xl bg-gray-900 border border-white/10 z-50"
        >
            <div class="py-2">
                <a href="{{ route('profile.index') }}" wire:navigate class="block px-4 py-3 text-white/90 hover:bg-white/10 transition">
                    My Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" wire:click.prevent="logout"
                        class="w-full text-left px-4 py-3 text-white/90 hover:bg-white/10 transition cursor-pointer">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>

        <div
            x-show="open"
            x-transition
            @click.away="open = false"
            class="sm:hidden absolute right-0 mt-2 w-56 rounded-lg shadow-2xl bg-gray-900 border border-white/10 z-50"
        >
            <div class="py-2">
                <a href="{{ route('profile.index') }}" wire:navigate class="block px-4 py-3 text-white/90 hover:bg-white/10 transition">
                    My Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" wire:click.prevent="logout"
                        class="w-full text-left px-4 py-3 text-white/90 hover:bg-white/10 transition cursor-pointer">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    @endauth

    @guest
        <div class="space-x-4 text-white">
            <a href="{{ route('login') }}" wire:navigate class="hover:text-indigo-400 transition">Sign In</a>
            <a href="{{ route('register') }}" wire:navigate
                class="px-7 py-2.5 bg-indigo-500 hover:bg-indigo-400 rounded-full transition font-semibold shadow-lg">
                Register
            </a>
        </div>
    @endguest
</div>
