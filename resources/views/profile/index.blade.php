@extends("layout")

@section("main")
    <div class="relative min-h-screen py-16 md:py-24">
        <div class="container mx-auto px-4 sm:px-6 max-w-4xl">
            <h2 class="text-5xl md:text-6xl font-bold tracking-tight text-center p-2 mb-6">
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-purple-400 to-indigo-400">
                    My Profile
                </span>
            </h2>

            @if(session("success"))
                <div class="mb-8 p-4 bg-green-900/50 border border-green-500/50 text-green-200 rounded-xl text-center">
                    {{ session("success") }}
                </div>
            @endif

            <form action="{{ route("profile.update") }}" method="POST" enctype="multipart/form-data"
                class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-6 sm:p-8">
                @csrf
                @method("PATCH")

                <div class="grid md:grid-cols-3 gap-8 md:gap-10">
                    <div class="text-center flex flex-col items-center">
                        <img src="{{ auth()->user()->avatar_url }}"
                            id="avatar-preview"
                            alt="Avatar"
                            class="w-40 h-40 md:w-48 md:h-48 rounded-full ring-4 ring-indigo-500/50 object-cover shadow-2xl">

                        <label class="mt-5 cursor-pointer">
                            <span class="px-6 py-3 bg-indigo-600 hover:bg-indigo-500 rounded-xl text-white font-medium transition">
                                Change Avatar
                            </span>
                            <input type="file" name="avatar" accept="image/*" class="hidden" onchange="previewAvatar(event)">
                        </label>

                        @error("avatar")
                            <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 space-y-6">

                        <div>
                            <label class="block text-white/80 font-medium">Full Name</label>
                            <input type="text" name="name"
                                value="{{ old("name", auth()->user()->name) }}" required
                                class="mt-2 w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:border-indigo-500 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-white/80 font-medium">Username</label>
                            <input type="text" name="username"
                                value="{{ old("username", auth()->user()->username) }}" required
                                class="mt-2 w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:border-indigo-500 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-white/80 font-medium">About Me</label>
                            <textarea name="about" rows="5"
                                    class="mt-2 w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/50 focus:border-indigo-500 focus:outline-none transition">{{ old("about", auth()->user()->about) }}</textarea>
                        </div>

                        <div class="space-y-5">

                            <div>
                                <label class="flex items-center gap-2 text-white/80 font-medium mb-1">
                                    Twitter <x-bi-twitter-x class="w-4 h-4" />
                                </label>
                                <input type="text" name="social_twitter"
                                    value="{{ old('social_twitter', auth()->user()->social_twitter) }}"
                                    placeholder="X_account"
                                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:border-indigo-500 transition">
                            </div>

                            <div>
                                <label class="flex items-center gap-2 text-white/80 font-medium mb-1">
                                    Instagram <x-bi-instagram class="w-4 h-4"/>
                                </label>
                                <input type="text" name="social_instagram"
                                    value="{{ old('social_instagram', auth()->user()->social_instagram) }}"
                                    placeholder="instagram_account"
                                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:border-indigo-500 transition">
                            </div>

                            <div>
                                <label class="flex items-center gap-2 text-white/80 font-medium mb-1">
                                    YouTube <x-bi-youtube class="w-4 h-4"/>
                                </label>
                                <input type="url" name="social_youtube"
                                    value="{{ old('social_youtube', auth()->user()->social_youtube) }}"
                                    placeholder="youtube_channel"
                                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:border-indigo-500 transition">
                            </div>

                            <div>
                                <label class="flex items-center gap-2 text-white/80 font-medium mb-1">
                                    Website ✨
                                </label>
                                <input type="url" name="social_website"
                                    value="{{ old('social_website', auth()->user()->social_website) }}"
                                    placeholder="personal_website"
                                    class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-white/40 focus:border-indigo-500 transition">
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row justify-end gap-4 pt-6">
                            <a href="{{ route("home") }}" wire:navigate
                            class="px-8 py-3 border border-white/30 rounded-xl text-white text-center hover:bg-white/10 transition">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 rounded-xl text-white font-semibold transition cursor-pointer">
                                Save Changes
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
    function previewAvatar(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => document.getElementById('avatar-preview').src = e.target.result;
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
@endsection
