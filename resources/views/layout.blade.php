<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website of SAM artist">
    <meta name="keywords" content="SAM, Artist, Moldova">
    <link rel="shortcut icon" href="public\logo\logo.svg" type="image/x-icon">
    <title>SAM - voice of generation</title>
    <i></i>

    @vite(["resources/css/app.css", "resources/js/search.js"])
    @livewireStyles

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
</head>

<body class="{{ request()->is('/') || Route::is('home') ? 'is-home' : 'not-home' }} relative">
    <div class="fixed inset-0 bg-linear-to-b from-[#000000] via-gray-900 to-[#434343] pointer-events-none -z-10"
    aria-hidden="true"></div>
    @livewire("header")
    @livewire("nav")

    <main class="min-h-screen pt-14 md:pt-18">
        @yield("main")
        @yield("content")
    </main>

    @livewire("footer")

    @livewireScripts
    
    @livewire("product-modal")

</body>
</html>