
@extends("layout")


@section("main")
    <div class="min-h-screen bg-gradient-to-b from-gray-900 via-black to-gray-900 text-gray-100 py-12 mt-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row gap-10 bg-gray-800/60 p-6 sm:p-8 rounded-2xl shadow-2xl backdrop-blur-md border border-gray-700/50">
                <div class="flex flex-col gap-8 items-center">
                    <img src="{{ asset('storage/albums/' . $album->path_image) }}"
                            class="w-48 h-48 sm:w-64 sm:h-64 object-cover rounded-xl shadow-xl border-4 border-gray-800 mx-auto md:mx-0">
                    <p class="text-4xl text-white font-bold px-4 py-1 rounded-lg text-center">
                        {{ $album->product->price }} $
                    </p>
                </div>    

                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-white drop-shadow-lg">
                            {{ $album->title }}
                        </h1>

                        <p class="text-xl sm:text-2xl font-bold text-indigo-400 mt-3">
                            {{ $album->released_at?->format('Y') }}
                        </p>

                        <p class="mt-6 text-gray-300 leading-relaxed text-base sm:text-lg">
                            {{ $album->description }}
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4 mt-8">
                        <livewire:add-to-cart :productId="$album->product->id" />
                    </div>
                </div>
            </div>

            <div class="mt-12 bg-gray-800/50 backdrop-blur-md p-6 sm:p-8 rounded-2xl shadow-2xl border border-gray-700/50">
                <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-white">Tracks</h2>

                @forelse($album->tracks as $index => $track)
                    @php
                        $minutes = floor($track->duration / 60);
                        $seconds = $track->duration % 60;
                    @endphp
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 py-5 border-b border-gray-700/50 last:border-0 hover:bg-white/5 rounded-lg transition">

                        <div class="flex items-center gap-6">
                            <span class="text-xl sm:text-2xl font-bold text-gray-500 w-8 sm:w-10 text-right">{{ $index + 1 }}</span>

                            <div>
                                <h3 class="text-lg sm:text-xl font-semibold text-white break-words">{{ $track->title }}</h3>

                                <div class="flex flex-wrap items-center gap-4 mt-1">
                                    <span class="text-sm text-gray-400">
                                        {{ $minutes }}:{{ str_pad($seconds, 2, '0',STR_PAD_LEFT) }}
                                    </span>
                                    <livewire:track-rating-component :track="$track" :key="$track->id" />
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-3 w-full md:w-auto">
                            <button 
                                x-data
                                @click="$dispatch('open-preview', { 
                                    title: '{{ addslashes($track->title) }}',
                                    url: '{{ asset('storage/tracks/' . $track->audio_url) }}'
                                })"
                                class="flex-1 md:flex-none px-8 py-3 mr-6 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-500 hover:to-indigo-500 
                                    rounded-lg font-bold text-white shadow-lg transition transform hover:scale-105 cursor-pointer text-center">
                                Play Preview
                            </button>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-10">No tracks available.</p>
                @endforelse
            </div>

            <div x-data="audioPreview()" x-show="open" x-transition
                class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90 backdrop-blur-xl"
                @open-preview.window="openModal($event.detail)"
                @keydown.escape.window="close()">
                
                <div @click.outside="close()" class="relative w-full max-w-xl sm:max-w-2xl bg-gray-900 rounded-3xl shadow-2xl overflow-hidden border border-gray-700">
                    <div class="p-6 sm:p-10 text-center">
                        <h3 class="text-2xl sm:text-3xl font-bold text-white mb-2" x-text="title"></h3>
                        <p class="text-gray-400 mb-6 sm:mb-8">30-second preview</p>

                        <audio x-ref="player" controls autoplay class="w-full h-12 sm:h-16 rounded-xl shadow-xl"></audio>

                        <button @click="close()" 
                                class="mt-6 sm:mt-8 px-8 sm:px-10 py-3 sm:py-4 bg-red-600 hover:bg-red-500 rounded-xl text-white font-bold transition cursor-pointer">
                            Close
                        </button>
                    </div>
                </div>
            </div>

            <script>
                function audioPreview() {
                    return {
                        open: false,
                        title: '',
                        url: '',

                        openModal(data) {
                            this.title = data.title;
                            this.url = data.url;
                            this.open = true;

                            this.$nextTick(() => {
                                const audio = this.$refs.player;
                                audio.src = this.url;
                                audio.play();

                                const stopAt30 = () => {
                                    if (audio.currentTime >= 30) {
                                        audio.pause();
                                        audio.currentTime = 30;
                                    } else if (!audio.paused) {
                                        requestAnimationFrame(stopAt30);
                                    }
                                };
                                audio.addEventListener('play', () => requestAnimationFrame(stopAt30));
                            });
                        },

                        close() {
                            this.open = false;
                            if (this.$refs.player) {
                                this.$refs.player.pause();
                                this.$refs.player.src = '';
                            }
                        }
                    }
                }
            </script>
        </div>
    </div>
@endsection
