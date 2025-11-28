<footer class="relative mt-32">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-2xl"></div>

    <div class="relative container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12 text-white/80">

            <div class="space-y-6">
                <a href="{{ route('home') }}" wire:navigate>
                    <img src="{{ asset('logo/text.png') }}" alt="Logo"
                         class="h-10 drop-shadow-2xl brightness-150">
                </a>
            </div>

            <div>
                <h4 class="text-xl font-semibold text-white mb-5 tracking-wide">Navigation</h4>
                <ul class="space-y-3 text-base">
                    <li><a href="{{ route('album-list') }}" wire:navigate class="hover:text-cyan-400 transition">Music</a></li>
                    <li><a href="#" wire:navigate class="hover:text-cyan-400 transition">Tour</a></li>
                    <li><a href="{{ route('store') }}" wire:navigate class="hover:text-cyan-400 transition">Store</a></li>
                    <li><a href="{{ route('about') }}" wire:navigate class="hover:text-cyan-400 transition">About</a></li>
                    <li><a href="{{ route('contacts') }}" wire:navigate class="hover:text-cyan-400 transition">Contacts</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-semibold text-white mb-5 tracking-wide">Legal</h4>
                <ul class="space-y-3 text-base">
                    <li><a href="{{ route('home') }}" wire:navigate class="hover:text-cyan-400 transition">Privacy Policy</a></li>
                    <li><a href="{{ route('home') }}" wire:navigate class="hover:text-cyan-400 transition">Terms of Service</a></li>
                    <li><a href="{{ route('home') }}" wire:navigate class="hover:text-cyan-400 transition">Cookie Policy</a></li>
                    <li><a href="{{ route('home') }}" wire:navigate class="hover:text-cyan-400 transition">Refund Policy</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-semibold text-white mb-5 tracking-wide">Follow Us</h4>

                <div class="flex flex-wrap gap-5 text-2xl">
                    <a href="https://facebook.com"  target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-facebook class="w-7 h-7"/></a>
                    <a href="https://instagram.com" target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-instagram class="w-7 h-7"/></a>
                    <a href="https://tiktok.com"    target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-tiktok class="w-7 h-7"/></a>
                    <a href="https://youtube.com"   target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-youtube class="w-7 h-7"/></a>
                    <a href="https://spotify.com"   target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-spotify class="w-7 h-7"/></a>
                    <a href="https://music.apple.com" target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-apple class="w-7 h-7"/></a>
                    <a href="https://discord.com"   target="_blank" class="text-white/60 hover:text-indigo-400 transition"><x-bi-discord class="w-7 h-7"/></a>
                </div>

                <p class="mt-6">
                    <a href="mailto:sam@official.com"
                       class="text-white/70 hover:text-indigo-400 transition text-lg">
                        sam@official.com
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-white/10">
            <p class="text-center text-white/70 font-medium tracking-wider text-lg">
                © {{ date('Y') }} SAM — All rights reserved.
            </p>
        </div>
    </div>
</footer>
