<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apulian — Discover Puglia's Events</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter bg-puglia-pietra overflow-x-hidden">

    {{-- NAVBAR --}}
    <nav class="absolute top-0 left-0 right-0 z-50 px-6 md:px-12 py-5 flex justify-between items-center">
        <div>
            <span class="font-playfair text-white text-2xl font-bold tracking-tight">Apulian</span>
            <span class="block text-white/60 text-xs tracking-widest uppercase">Discover Puglia's events</span>
        </div>
        <div class="flex items-center gap-3">
            @auth
            <a href="{{ route('dashboard') }}"
                class="bg-white/20 hover:bg-white/30 text-white font-semibold py-2 px-5 rounded-full backdrop-blur-sm transition text-sm">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}"
                class="text-white/80 hover:text-white font-medium py-2 px-4 transition text-sm">
                Accedi
            </a>
            <a href="{{ route('register') }}"
                class="bg-puglia-grano hover:bg-amber-600 text-white font-semibold py-2 px-5 rounded-full transition text-sm">
                Registrati
            </a>
            @endauth
        </div>
    </nav>

    {{-- HERO --}}
    <section class="relative min-h-screen flex items-center justify-center text-center overflow-hidden">
        <video autoplay muted loop playsinline
            class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('videos/mare.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-b from-puglia-notte/60 via-puglia-notte/40 to-puglia-notte/70"></div>

        <div class="relative z-10 px-6 max-w-4xl mx-auto">
            <p class="text-puglia-sabbia text-sm font-semibold tracking-widest uppercase mb-6">
                Puglia · Cultura · Musica · Tradizione
            </p>
            <h1 class="font-playfair text-5xl md:text-7xl lg:text-8xl font-bold text-white leading-tight mb-6">
                Vivi la Puglia,<br>
                <span class="text-puglia-sabbia italic">un evento alla volta</span>
            </h1>
            <p class="text-white/70 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed">
                Concerti sul mare, serate nei borghi, sagre nei trulli, festival nel Salento.
                Tutto quello che succede in Puglia, in un unico posto.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('events.index') }}"
                    class="bg-puglia-grano hover:bg-amber-600 text-white font-semibold py-4 px-8 rounded-full text-base transition">
                    Esplora gli eventi
                </a>
                @guest
                <a href="{{ route('register') }}"
                    class="bg-white/15 hover:bg-white/25 text-white font-semibold py-4 px-8 rounded-full text-base backdrop-blur-sm border border-white/30 transition">
                    Crea un account
                </a>
                @endguest
            </div>
        </div>

        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-white/40">
            <span class="text-xs tracking-widest uppercase">Scopri</span>
            <svg class="w-5 h-5 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </div>
    </section>

    {{-- FEATURES --}}
    <section class="py-24 px-6 bg-white">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <p class="text-puglia-grano text-sm font-semibold tracking-widest uppercase mb-3">Perché Apulian</p>
                <h2 class="font-playfair text-4xl md:text-5xl font-bold text-puglia-notte mb-4">
                    La Puglia che non ti aspetti
                </h2>
                <p class="text-gray-400 text-lg max-w-xl mx-auto">
                    Una piattaforma pensata per chi vuole vivere la Puglia autentica.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-8 rounded-2xl bg-puglia-pietra hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-puglia-mare/10 rounded-xl flex items-center justify-center mb-5 group-hover:bg-puglia-mare/20 transition">
                        <svg class="w-6 h-6 text-puglia-mare" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="font-playfair text-xl font-bold text-puglia-notte mb-3">Eventi locali</h3>
                    <p class="text-gray-400 leading-relaxed text-sm">
                        Dai trulli di Alberobello alle spiagge del Salento. Tutti gli eventi della Puglia in un unico posto.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-puglia-pietra hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-puglia-grano/10 rounded-xl flex items-center justify-center mb-5 group-hover:bg-puglia-grano/20 transition">
                        <svg class="w-6 h-6 text-puglia-grano" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <h3 class="font-playfair text-xl font-bold text-puglia-notte mb-3">Iscrizione semplice</h3>
                    <p class="text-gray-400 leading-relaxed text-sm">
                        Un click per iscriverti, un click per annullare. Niente code, niente stress.
                    </p>
                </div>

                <div class="p-8 rounded-2xl bg-puglia-pietra hover:shadow-md transition group">
                    <div class="w-12 h-12 bg-puglia-ulivo/10 rounded-xl flex items-center justify-center mb-5 group-hover:bg-puglia-ulivo/20 transition">
                        <svg class="w-6 h-6 text-puglia-ulivo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-playfair text-xl font-bold text-puglia-notte mb-3">Sempre con te</h3>
                    <p class="text-gray-400 leading-relaxed text-sm">
                        Consulta i tuoi eventi ovunque tu sia, dal telefono o dal computer.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- CATEGORIE --}}
    <section class="py-24 px-6 bg-puglia-pietra">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-puglia-grano text-sm font-semibold tracking-widest uppercase mb-3">Cosa trovi</p>
                <h2 class="font-playfair text-4xl font-bold text-puglia-notte">
                    Un evento per ogni gusto
                </h2>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach([
                ['label' => 'Musica', 'icon' => 'M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3'],
                ['label' => 'Sport', 'icon' => 'm15 10.42 4.8-5.07M19 18h3M9.5 22 21.414 9.415A2 2 0 0 0 21.2 6.4l-5.61-4.208A1 1 0 0 0 14 3v2a2 2 0 0 1-1.394 1.906L8.677 8.053A1 1 0 0 0 8 9c-.155 6.393-2.082 9-4 9a2 2 0 0 0 0 4h14'],
                ['label' => 'Arte', 'icon' => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'],
                ['label' => 'Food', 'icon' => 'M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2M7 2v20M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7'],
                ] as $cat)
                <a href="{{ route('events.index', ['category' => $cat['label']]) }}"
                    class="bg-white hover:bg-puglia-mare hover:text-white text-puglia-notte rounded-2xl p-6 text-center transition group">
                    <svg class="w-8 h-8 mx-auto mb-3 text-puglia-mare group-hover:text-white transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="{{ $cat['icon'] }}" />
                    </svg>
                    <span class="font-semibold text-sm">{{ $cat['label'] }}</span>
                </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-24 px-6 bg-puglia-notte text-white text-center">
        <div class="max-w-3xl mx-auto">
            <p class="text-puglia-sabbia text-sm font-semibold tracking-widest uppercase mb-4">Inizia oggi</p>
            <h2 class="font-playfair text-4xl md:text-5xl font-bold mb-4">
                Pronto a scoprire la Puglia?
            </h2>
            <p class="text-white/60 text-lg mb-10 max-w-xl mx-auto">
                Unisciti alla community e non perdere più nessun evento.
            </p>
            @guest
            <a href="{{ route('register') }}"
                class="inline-block bg-puglia-grano hover:bg-amber-600 text-white font-semibold py-4 px-10 rounded-full text-base transition">
                Crea un account gratuito
            </a>
            @else
            <a href="{{ route('events.index') }}"
                class="inline-block bg-puglia-grano hover:bg-amber-600 text-white font-semibold py-4 px-10 rounded-full text-base transition">
                Vai agli eventi
            </a>
            @endguest
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-black/30 bg-puglia-notte border-t border-white/10 text-white/40 text-center py-8 px-6">
        <p class="font-playfair text-white text-lg font-bold mb-1">Apulian</p>
        <p class="text-xs tracking-widest uppercase text-white/30">Discover Puglia's events · {{ date('Y') }}</p>
    </footer>

</body>

</html>