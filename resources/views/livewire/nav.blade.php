<div class="fixed top-14 md:top-16 left-0 right-0 z-40 flex justify-center pointer-events-none">

    <div class="pointer-events-auto">
        <nav class="bg-black/40 backdrop-blur-2xl rounded-2xl shadow-2xl border border-white/10 px-8 py-5">
            <ul class="flex flex-wrap justify-center gap-8 md:gap-12 text-white/80 font-semibold text-sm uppercase tracking-widest">
                <li><a href="{{ route('album-list') }}" wire:navigate class="hover:text-indigo-400 transition">Music</a></li>
                <li><a href="{{ route('tour') }}" wire:navigate class="hover:text-indigo-400 transition">Tour</a></li>
                <li><a href="{{ route('store') }}" wire:navigate class="hover:text-indigo-400 transition">Store</a></li>
                <li><a href="{{ route('about') }}" wire:navigate class="hover:text-indigo-400 transition">About</a></li>
                <li><a href="{{ route('contacts') }}" wire:navigate class="hover:text-indigo-400 transition">Contacts</a></li>
            </ul>
        </nav>
    </div>

    <div 
        x-data="{ scrolled: false }"
        x-init="if (!document.body.classList.contains('is-home')) return; const handleScroll = () => { scrolled = window.scrollY > 100 }; window.addEventListener('scroll', handleScroll); handleScroll();"
        x-show="document.body.classList.contains('is-home')"
        class="fixed left-6 top-1/2 -translate-y-1/2 z-30 flex flex-col gap-5 text-white/60"
        :class="{
            '-translate-x-32 opacity-0': scrolled,
            'translate-x-0 opacity-60': !scrolled
        }"
        style="transition: all 0.55s cubic-bezier(0.4, 0, 0.2, 1);"
        x-cloak>

        <a href="https://facebook.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-facebook class="w-6 h-6" /></a>
        <a href="https://instagram.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-instagram class="w-6 h-6" /></a>
        <a href="https://tiktok.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-tiktok class="w-6 h-6" /></a>
        <a href="https://youtube.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-youtube class="w-6 h-6" /></a>
        <a href="https://spotify.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-spotify class="w-6 h-6" /></a>
        <a href="https://music.apple.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-apple class="w-6 h-6" /></a>
        <a href="https://discord.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-discord class="w-6 h-6" /></a>
    </div>
</div>
