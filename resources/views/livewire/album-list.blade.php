@extends('layout')

@section('main')
    <div class="relative min-h-screen py-16 sm:py-20 lg:py-24 px-4 sm:px-6 lg:px-8">
        <div class="absolute inset-0 bg-linear-to-br from-purple-900/20 via-black to-blue-900/20"></div>
        <div class="absolute inset-0 backdrop-blur-3xl"></div>

        <div class="relative container mx-auto max-w-7xl">
            <div class="text-center mb-12 sm:mb-14 md:mb-16">
                <h1 class="text-6xl md:text-7xl font-bold mb-8 tracking-tight">
                    <span class="bg-clip-text text-transparent bg-linear-to-r from-pink-400 to-indigo-400">Albums</span>
                </h1>
                <p class="text-base sm:text-lg md:text-xl text-white/60">
                    All releases in one place
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8 mt-4">
                @forelse($albums as $album)
                    <a href="{{ route('album-viewer', $album->slug_album) }}"
                       wire:navigate
                       class="group relative block overflow-hidden rounded-2xl bg-white/5 backdrop-blur-xl border border-white/10
                              shadow-2xl transition-all duration-500 md:group-hover:-translate-y-3 md:hover:border-indigo-500/50 md:focus-within:ring-4">
                        <div class="aspect-square overflow-hidden">
                            <img src="{{ $album->path_image ? asset('storage/albums/' . $album->path_image) : asset('images/placeholder-album.jpg') }}"
                                 alt="{{ $album->title }}"
                                 class="w-full h-full object-cover transition-transform duration-700 md:group-hover:scale-110">
                            <div class="absolute inset-0 bg-linear-to-t from-black/80 via-transparent to-transparent opacity-0 md:group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <div class="p-5 flex flex-col justify-between h-28 sm:h-32 md:h-36 bg-white/80">
                            <div>
                                <h3 class="font-bold text-base sm:text-lg md:text-xl text-gray-900 line-clamp-2 leading-tight">
                                    {{ $album->title }}
                                </h3>
                            </div>

                            <p class="text-indigo-600 font-bold text-xl sm:text-2xl mt-auto">
                                {{ $album->released_at?->format('Y') ?? 'Soon' }}
                            </p>
                        </div>

                        <div class="absolute inset-0 rounded-2xl ring-0 md:group-hover:ring-8 md:group-hover:ring-indigo-500/30 transition-all duration-500 pointer-events-none"></div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-16 sm:py-20">
                        <p class="text-2xl sm:text-3xl text-white/50">No albums yet.</p>
                    </div>
                @endforelse
            </div>

            @if(method_exists($albums, 'links'))
                <div class="mt-12 sm:mt-16 flex justify-center">
                    {{ $albums->links('components.pagination') }}
                </div>
            @endif
        </div>
    </div>
@endsection
