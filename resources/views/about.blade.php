@extends('layout')

@section('main')
<div class="relative min-h-screen py-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-neutral-900/50 to-transparent pointer-events-none"></div>

    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-6xl md:text-7xl font-bold mb-16 tracking-tight text-center">
            <span class="bg-clip-text text-transparent bg-linear-to-r from-pink-400 to-indigo-400">About SAM</span>
        </h1>

        <div class="grid md:grid-cols-2 gap-12 md:gap-20 items-center mb-32">
            <div>
                <img src="{{ asset('storage/about/sam-1.jpg') }}" alt="SAM on stage" class="w-full h-auto rounded-2xl shadow-2xl object-cover border border-white/10">
            </div>
            <div class="text-white/90 space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold">Голос поколения</h2>
                <p class="text-lg leading-relaxed text-white/70">
                    SAM — это не просто имя. Это энергия, которая проходит сквозь толпу, когда включается бит. 
                    Это момент, когда тысячи голосов поют одну строку вместе со мной.
                </p>
                <p class="text-lg leading-relaxed text-white/70">
                    Я начал с улиц, с маленьких клубов, с демок на флешке. Сейчас — стадионы, миллионы стримов и вы — мои люди.
                </p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 md:gap-20 items-center mb-32">
            <div class="order-2 md:order-1 text-white/90 space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold">Не музыка. Образ жизни.</h2>
                <p class="text-lg leading-relaxed text-white/70">
                    Каждый трек — это кусочек меня. Иногда злой, иногда влюблённый, иногда уставший от всего. 
                    Но всегда честный.
                </p>
                <p class="text-lg leading-relaxed text-white/70">
                    Я не хочу быть просто артистом в плейлисте. Хочу быть тем, кто звучит в твоих наушниках, когда ты идёшь ночью по городу и чувствуешь, что не один.
                </p>
            </div>
            <div class="order-1 md:order-2">
                <img src="{{ asset('storage/about/sam-2.jpg') }}" alt="SAM in studio" class="w-full h-auto rounded-2xl shadow-2xl object-cover border border-white/10">
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 md:gap-20 items-center">
            <div>
                <img src="{{ asset('storage/about/sam-3.jpg') }}" alt="SAM with fans" class="w-full h-auto rounded-2xl shadow-2xl object-cover border border-white/10">
            </div>
            <div class="text-white/90 space-y-6">
                <h2 class="text-3xl md:text-4xl font-bold">Это про нас</h2>
                <p class="text-lg leading-relaxed text-white/70">
                    SAM — это не только я. Это вы. Это мы. Это те, кто не боится быть собой.
                </p>
                <p class="text-lg leading-relaxed text-white/70">
                    Спасибо, что идёте со мной. Дальше — только громче.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
