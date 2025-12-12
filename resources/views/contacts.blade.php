@extends('layout')

@section('main')
<div class="relative py-24">
    <div class="container mx-auto px-6 max-w-7xl">
        <h1 class="text-6xl md:text-7xl font-bold mb-16 tracking-tight text-center">
            <span class="bg-clip-text text-transparent bg-linear-to-r from-pink-400 to-indigo-400">Contacts</span>
        </h1>

        <div class="grid lg:grid-cols-2 gap-16">
            <div class="space-y-12">
                <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-8">
                    <h2 class="text-3xl font-bold text-white mb-8">Contact us</h2>

                    <div class="space-y-6 text-white/80">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-500/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm text-white/60">Email</p>
                                <p class="font-semibold">management@sam-official.com</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-indigo-500/20 rounded-full flex items-center justify-center">
                                <svg class="w-6 h-6 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L3 12V6a2 2 0 012-2h12a2 2 0 012 2v6a2 2 0 01-2 2H5l2 2z"/></svg>
                            </div>
                            <div>
                                <p class="text-sm text-white/60">Media and collaboration</p>
                                <p class="font-semibold">press@sam-official.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-8">
                    <h3 class="text-2xl font-bold text-white mb-6">Write to us</h3>

                    <form action="#" class="space-y-6">
                        <input type="text" placeholder="Your Name" class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-indigo-500">
                        <input type="email" placeholder="Email" class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-indigo-500">
                        <textarea rows="5" placeholder="Message" class="w-full px-5 py-4 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:outline-none focus:border-indigo-500 resize-none"></textarea>
                        <button class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 rounded-xl font-semibold text-white transition cursor-pointer">Send</button>
                    </form>
                </div>
            </div>

            <div class="h-96 lg:h-full min-h-96 rounded-2xl overflow-hidden shadow-2xl border border-white/10">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10879.310389697082!2d28.835997!3d47.023989!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c97c3470a2d9b5%3A0xc74f4ac8ebc6b645!2z0KLRgNC40YPQvNGE0LDQu9GM0L3QsNGPINCQ0YDQutCw!5e0!3m2!1sru!2sus!4v1764255130170!5m2!1sru!2sus"
                    width="100%" height="100%" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection
