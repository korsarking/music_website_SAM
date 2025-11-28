<div class="px-5 space-y-14" x-data="{ tab: '' }">

    <div class="relative -mx-5 md:-mx-8 lg:-mx-12">
        <div class="max-w-7xl mx-auto px-5 md:px-8 lg:px-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-10 text-center">
                Recommended Products
            </h2>

            <div class="swiper recommendedSwiper">
                <div class="swiper-wrapper">
                    @foreach($recommendedProducts as $product)
                        <div class="swiper-slide">
                            <a href="{{ route('show-product', $product->slug) }}"
                               class="group block bg-white rounded-2xl shadow-2xl hover:shadow-3xl overflow-hidden border border-white/20 transition-all duration-500">

                                <div class="relative aspect-square bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                                    <img src="{{ asset('storage/products/' . $product->image) }}"
                                         alt="{{ $product->name }}"
                                         class="absolute inset-0 w-full h-full object-contain p-8 transition-transform duration-700 group-hover:scale-110">
                                </div>

                                <div class="p-8 bg-white/80 text-center flex flex-col items-center">
                                    <h3 class="font-bold text-lg text-gray-900 leading-tight line-clamp-2">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="text-2xl font-bold text-gray-900 mt-4">
                                        {{ $product->price }} MDL
                                    </p>
                                </div>

                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-prev !text-indigo-500 !w-12 !h-12 !left-4"></div>
                <div class="swiper-button-next !text-indigo-500 !w-12 !h-12 !right-4"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <div class="flex gap-5 mt-10">
        <button
            @click="tab = 'merch'"
            :class="tab === 'merch' ? 'ring-4 ring-cyan-400' : ''"
            class="flex-1 p-5 bg-neutral-900 text-white rounded-xl shadow-xl hover:bg-neutral-700 transition cursor-pointer">

            <img src="{{ asset('storage/products/cap.webp') }}"
                 class="w-full h-40 object-cover rounded-lg mb-3">

            <div class="text-center font-bold text-xl">MERCH</div>
        </button>

        <button
            @click="tab = 'music'"
            :class="tab === 'music' ? 'ring-4 ring-cyan-400' : ''"
            class="flex-1 p-5 bg-neutral-900 text-white rounded-xl shadow-xl hover:bg-neutral-700 transition cursor-pointer">

            <img src="{{ asset('storage/albums/album_1.webp') }}"
                 class="w-full h-40 object-cover rounded-lg mb-3">

            <div class="text-center font-bold text-xl">MUSIC</div>
        </button>
    </div>

    <div x-show="tab === 'merch'" x-transition>
        <div class="text-center mb-16">
            <h2 class="text-5xl md:text-6xl font-bold tracking-tight">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400">
                    Merch Categories
                </span>
            </h2>
            <p class="text-xl text-white/60 mt-4">All merch product in one place</p>
        </div>

        <div class="space-y-6 mt-6">
            @foreach($categories as $category)
                <livewire:category :category="$category" :key="$category->id" />
            @endforeach
        </div>
    </div>

    <div x-show="tab === 'music'" x-transition x-cloak>
        <div class="relative py-12">
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-bold tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400">
                        Music Releases
                    </span>
                </h2>
                <p class="text-xl text-white/60 mt-4">All albums & singles in one place</p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 md:gap-8">
                @forelse($albums as $album)
                    <a href="{{ route('album-viewer', $album->slug_album) }}"
                       wire:navigate
                       class="group relative block rounded-2xl overflow-hidden bg-white/5 backdrop-blur-xl 
                              border border-white/10 shadow-2xl transition-all duration-500 
                              hover:border-indigo-500/50 hover:shadow-indigo-500/20 hover:-translate-y-3">

                        <div class="aspect-square overflow-hidden bg-black/20 relative">
                            <img src="{{ $album->path_image ? asset('storage/albums/' . $album->path_image) : asset('images/placeholder-album.jpg') }}"
                                 alt="{{ $album->title }}"
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <div class="p-5 bg-white/80 flex flex-col justify-between">
                            <h3 class="font-bold text-lg text-gray-900 line-clamp-2 leading-tight">
                                {{ $album->title }}
                            </h3>

                            <p class="text-indigo-600 font-bold text-2xl mt-4">
                                {{ $album->released_at?->format('Y') ?? 'Soon' }}
                            </p>
                        </div>

                        <div class="absolute inset-0 rounded-2xl ring-0 ring-indigo-500/0
                                    group-hover:ring-8 group-hover:ring-indigo-500/30
                                    transition-all duration-500 pointer-events-none"></div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-20">
                        <p class="text-3xl text-white/40">No music releases yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new Swiper(".recommendedSwiper", {
                slidesPerView: 1.1,
                effect: 'slide',
                loop: true,
                centeredSlides: true,
                autoplay: { delay: 5000 },
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 30 },
                    1024: { slidesPerView: 3, spaceBetween: 40 },
                    1280: { slidesPerView: 3, spaceBetween: 50 }
                }
            });
        });
    </script>

</div>
