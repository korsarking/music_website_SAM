<div class="fixed top-14 md:top-16 left-0 right-0 z-40 flex justify-center">

    <div class="pointer-events-auto">
        <nav
            x-data="{
                left: 0,
                width: 0,
                maxWidth: 0,
                visible: false,
                move(e) {
                    const linkRect = e.target.getBoundingClientRect();
                    const navRect  = this.$refs.nav.getBoundingClientRect();
                    this.left  = linkRect.left - navRect.left + (linkRect.width - this.maxWidth) / 2;
                    this.width = this.maxWidth;
                    this.visible = true;
                },
                hide() {
                    this.visible = false;
                },

                init() {
                    const links = this.$refs.nav.querySelectorAll('a');
                    links.forEach(link => {
                        const w = link.getBoundingClientRect().width;
                        if (w > this.maxWidth) this.maxWidth = w;
                    });
                }
            }"
            x-ref="nav"
            class="relative bg-white/10 backdrop-blur-2xl rounded-2xl shadow-2xl border border-white/10 px-8 py-5 overflow-hidden">

        <div
            x-show="visible"
            x-transition.opacity
            class="absolute bottom-0 h-2 bg-white/30 rounded-full pointer-events-none transition-all duration-300"
            :style="`left:${left}px; width:${width}px;`">
        </div>

        <ul class="flex flex-wrap justify-center gap-8 md:gap-12 text-white/80 font-semibold text-sm uppercase tracking-widest">
                <li>
                    <a href="{{ route('album-list') }}"
                    wire:navigate
                    @mouseenter="move($event)"
                    @mouseleave="hide()"
                    class="block pt-2 transition hover:text-indigo-400">
                        Music
                    </a>
                </li>

                <li>
                    <a href="{{ route('tour') }}"
                    wire:navigate
                    @mouseenter="move($event)"
                    @mouseleave="hide()"
                    class="block pt-2 transition hover:text-indigo-400">
                        Tour
                    </a>
                </li>

                <li>
                    <a href="{{ route('store') }}"
                    wire:navigate
                    @mouseenter="move($event)"
                    @mouseleave="hide()"
                    class="block pt-2 transition hover:text-indigo-400">
                        Store
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}"
                    wire:navigate
                    @mouseenter="move($event)"
                    @mouseleave="hide()"
                    class="block pt-2 transition hover:text-indigo-400">
                        About
                    </a>
                </li>

                <li>
                    <a href="{{ route('contacts') }}"
                    wire:navigate
                    @mouseenter="move($event)"
                    @mouseleave="hide()"
                    class="block pt-2 transition hover:text-indigo-400">
                        Contacts
                    </a>
                </li>
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

        <a href="https://facebook.com" target="_blank" class="hover:text-indigo-500 transition cursor-pointer"><x-bi-facebook class="w-6 h-6" /></a>
        <a href="https://instagram.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-instagram class="w-6 h-6" /></a>
        <a href="https://tiktok.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-tiktok class="w-6 h-6" /></a>
        <a href="https://youtube.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-youtube class="w-6 h-6" /></a>
        <a href="https://spotify.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-spotify class="w-6 h-6" /></a>
        <a href="https://music.apple.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-apple class="w-6 h-6" /></a>
        <a href="https://discord.com" target="_blank" class="hover:text-indigo-500 transition"><x-bi-discord class="w-6 h-6" /></a>
    </div>
</div>
