@extends('layout')

@section('main')
<div class="relative py-24">
    <div class="container mx-auto px-6 max-w-5xl">
        <h1 class="text-6xl md:text-8xl font-bold text-center mb-20 text-white">
            <span class="bg-clip-text text-transparent bg-linear-to-r from-pink-400 to-indigo-400">TOUR 2026</span>
        </h1>

        <div class="space-y-24">
            @foreach([
                ['city' => 'SAKHIR, BAHRAIN', 'venue' => 'BEYON AL DANA AMPHITHEATRE', 'date' => '18 JAN 2026', 'vip' => true],
                ['city' => 'ABU DHABI, UAE', 'venue' => 'ETIHAD ARENA – YAS ISLAND', 'date' => '20 JAN 2026', 'vip' => true],
                ['city' => 'BENGALURU, INDIA', 'venue' => 'BRIGADE INNOVATION GARDEN', 'date' => '23 JAN 2026', 'vip' => false],
                ['city' => 'Mumbai, India', 'venue' => 'MAHALAKSHMI RACE COURSE', 'date' => '25 JAN 2026', 'vip' => false],
            ] as $show)
            <div class="relative group">
                <div class="absolute inset-0 bg-linear-to-r from-indigo-600/20 to-transparent rounded-3xl blur-3xl opacity-0 group-hover:opacity-100 transition duration-1000"></div>

                <div class="relative flex flex-col md:flex-row items-center justify-between gap-8 py-12 border-b border-white/10 last:border-0">
                    <div class="text-center md:text-left">
                        <h3 class="text-4xl md:text-6xl font-bold text-white tracking-wider">
                            {{ $show['city'] }}
                        </h3>
                        <p class="text-xl md:text-2xl text-white/70 mt-2">{{ $show['venue'] }}</p>
                        <p class="text-lg md:text-xl text-white/50 mt-4">{{ $show['date'] }}</p>
                    </div>

                    <div class="flex flex-col gap-4">
                        @if($show['vip'])
                            <a class="px-8 py-3 bg-neutral-800/80 backdrop-blur border border-white/20 rounded-full text-white font-semibold hover:bg-neutral-700 transition text-center cursor-pointer">
                                VIP
                            </a>
                        @endif
                        <a class="px-8 py-3 bg-linear-to-r from-pink-600 to-purple-600 rounded-full text-white font-bold hover:from-pink-800 hover:to-purple-800 transition shadow-lg cursor-pointer">
                            TICKETS
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-20">
            <p class="text-white/70 text-lg">
                More dates coming soon. Subscribe to our newsletter so you don't miss out...
            </p>
        </div>
    </div>
</div>
@endsection
