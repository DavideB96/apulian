<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Apulian') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter antialiased">
    <div class="min-h-screen flex">

        {{-- SINISTRA: form --}}
        <div class="w-full md:w-1/2 flex flex-col justify-center px-8 sm:px-16 lg:px-24 bg-puglia-pietra">
            <div class="max-w-md w-full mx-auto">
                <a href="/" class="flex flex-col mb-10">
                    <span class="font-playfair text-puglia-notte font-bold text-3xl tracking-tight">Apulian</span>
                    <span class="text-gray-400 text-xs tracking-widest uppercase">Discover Puglia's events</span>
                </a>
                {{ $slot }}
            </div>
        </div>

        {{-- DESTRA: video (solo desktop) --}}
        <div class="hidden md:block md:w-1/2 relative overflow-hidden">
            <video autoplay muted loop playsinline
                class="absolute inset-0 w-full h-full object-cover">
                <source src="{{ asset('videos/mare.mp4') }}" type="video/mp4">
            </video>
            <div class="absolute inset-0 flex flex-col justify-end p-12">
                <blockquote class="text-white">
                    <p class="font-playfair text-3xl font-bold leading-snug mb-4">
                        "La Puglia non è solo un posto.<br>È uno stato d'animo."
                    </p>
                    <p class="text-white/60 text-sm">— Scopri gli eventi più belli della Puglia</p>
                </blockquote>
            </div>
        </div>

    </div>
</body>

</html>