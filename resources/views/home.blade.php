@extends("layout")

@section("main")
    <div 
        x-data="carousel({
            intervalTime: 4000,
            slides: [
                {
                    imgSrc: '{{ asset("storage/hero-banner/1.jpg") }}',
                    imgAlt: 'artist images',
                    title: 'Choose your destiny',
                    description: 'Here and now.',
                },
                {
                    imgSrc: '{{ asset("storage/hero-banner/2.jpg") }}',
                    imgAlt: 'artist images',
                    title: 'New voice, new vibes',
                    description: 'Just experience it.',
                },
                {
                    imgSrc: '{{ asset("storage/hero-banner/3.jpg") }}',
                    imgAlt: 'artist images',
                    title: 'You thought you knew your tastes',
                    description: 'Up to this point.',
                },
            ]
        })"
        x-init="autoplay; initResizeListener"
        @resize.window.debounce.150="handleResize"
        class="relative w-full overflow-hidden"
    >

        <div class="relative min-h-[80vh] md:min-h-[92svh] w-full">
            <template x-for="(slide, index) in slides" :key="index">
                <div 
                    x-cloak 
                    x-show="current === index + 1" 
                    class="absolute inset-0"
                    x-transition.opacity.duration.700ms
                >

                    <div class="lg:px-32 lg:py-14 absolute inset-0 z-10 flex flex-col items-center
                        justify-end gap-6 md:gap-8 
                        bg-gradient-to-t from-black/80 to-transparent px-6 py-20 text-center">

                        <h3 class="w-full lg:w-[80%] text-balance 
                            text-3xl md:text-5xl lg:text-6xl
                            font-bold text-white"
                            x-text="slide.title"
                        ></h3>

                        <p class="lg:w-1/2 w-full mb-10 
                            text-pretty text-lg md:text-xl
                            text-white/90"
                            x-text="slide.description"
                        ></p>
                    </div>

                    <img 
                        class="absolute w-full h-full inset-0 object-cover 
                            object-center md:object-[90%_10%]"
                        :src="slide.imgSrc"
                        :alt="slide.imgAlt"
                    />
                </div>
            </template>
        </div>

        <button 
            type="button"
            class="absolute bottom-5 right-5 z-20 rounded-full text-white opacity-60
                hover:opacity-90 focus-visible:opacity-90 cursor-pointer"
            @click="togglePause"
            :aria-pressed="paused"
        >
            <svg x-show="paused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" class="size-7">
                <path fill-rule="evenodd" 
                    d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" />
            </svg>

            <svg x-show="!paused" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                fill="currentColor" class="size-7">
                <path fill-rule="evenodd" 
                    d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm5-2.25A.75.75 0 0 1 7.75 7h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Zm4 0a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 .75.75v4.5a.75.75 0 0 1-.75.75h-.5a.75.75 0 0 1-.75-.75v-4.5Z" />
            </svg>
        </button>

        <div class="absolute bottom-3 md:bottom-5 left-1/2 z-20 flex -translate-x-1/2
            gap-3 px-2 py-1" role="group" aria-label="slides indicators">
            <template x-for="(slide, index) in slides" :key="index">
                <button 
                    class="size-2 rounded-full transition"
                    @click="goTo(index + 1)"
                    :class="current === index + 1 
                        ? 'bg-white' 
                        : 'bg-white/50'"
                ></button>
            </template>
        </div>

    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', ({slides, intervalTime}) => ({
                slides,
                current: 1,
                paused: false,
                interval: null,
                intervalTime,

                next() {
                    this.current = this.current === this.slides.length ? 1 : this.current + 1
                },

                goTo(i) {
                    this.current = i
                    this.restartAutoplay()
                },

                togglePause() {
                    this.paused = !this.paused
                },

                autoplay() {
                    this.interval = setInterval(() => {
                        if (!this.paused) this.next()
                    }, this.intervalTime)
                },

                restartAutoplay() {
                    clearInterval(this.interval)
                    this.autoplay()
                },
            }))
        })
    </script>
@endsection
