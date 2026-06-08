<x-app-layout>
    <div class="min-h-screen bg-puglia-pietra">

        {{-- HERO EVENTO --}}
        <div class="relative h-72 md:h-96 overflow-hidden">
            @if($event->image)
            <img src="{{ asset('storage/' . $event->image) }}"
                alt="{{ $event->title }}"
                class="w-full h-full object-cover">
            @else
            <div class="w-full h-full bg-gradient-to-br from-puglia-mare to-puglia-notte"></div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-puglia-notte/90 via-puglia-notte/40 to-transparent"></div>

            {{-- BACK BUTTON --}}
            <div class="absolute top-6 left-6">
                <a href="{{ route('events.index') }}"
                    class="flex items-center gap-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white text-sm font-medium px-4 py-2 rounded-full transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Torna agli eventi
                </a>
            </div>

            {{-- TITOLO SULL'IMMAGINE --}}
            <div class="absolute bottom-0 left-0 right-0 px-6 md:px-12 pb-8">
                <span class="inline-block bg-puglia-grano text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide mb-3">
                    {{ $event->category }}
                </span>
                <h1 class="font-playfair text-3xl md:text-5xl font-bold text-white leading-tight">
                    {{ $event->title }}
                </h1>
            </div>
        </div>

        {{-- CONTENUTO --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

            {{-- FLASH MESSAGES --}}
            @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl text-sm">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-5 py-4 rounded-2xl text-sm">
                {{ session('error') }}
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- COLONNA SINISTRA: info + descrizione --}}
                <div class="md:col-span-2 space-y-6">

                    {{-- INFO CARDS --}}
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-2xl p-5 flex items-center gap-4 shadow-sm">
                            <div class="w-10 h-10 bg-puglia-grano/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-puglia-grano" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Data</p>
                                <p class="text-sm font-semibold text-puglia-notte mt-0.5">{{ $event->date->format('d/m/Y') }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">ore {{ $event->date->format('H:i') }}</p>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl p-5 flex items-center gap-4 shadow-sm">
                            <div class="w-10 h-10 bg-puglia-ulivo/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-puglia-ulivo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Posti</p>
                                <p class="text-sm font-semibold text-puglia-notte mt-0.5">{{ $event->registrations()->count() }} / {{ $event->max_participants }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">{{ $event->max_participants - $event->registrations()->count() }} disponibili</p>
                            </div>
                        </div>

                        <div class="col-span-2 bg-white rounded-2xl p-5 flex items-center gap-4 shadow-sm">
                            <div class="w-10 h-10 bg-puglia-mare/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-puglia-mare" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Luogo</p>
                                <p class="text-sm font-semibold text-puglia-notte mt-0.5">{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- DESCRIZIONE --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm">
                        <h2 class="font-playfair text-xl font-bold text-puglia-notte mb-4">Descrizione</h2>
                        <p class="text-gray-500 leading-relaxed">{{ $event->description }}</p>
                    </div>
                </div>

                {{-- COLONNA DESTRA: iscrizione --}}
                <div class="bg-white rounded-2xl p-8 shadow-sm sticky top-6 self-start">
                    <h3 class="font-playfair text-2xl font-bold text-puglia-notte mb-2">Partecipa</h3>
                    <p class="text-gray-400 text-sm mb-6">Assicurati il tuo posto all'evento</p>

                    {{-- BARRA POSTI --}}
                    @php
                    $iscritti = $event->registrations()->count();
                    $percentuale = $event->max_participants > 0
                    ? min(100, round(($iscritti / $event->max_participants) * 100))
                    : 0;
                    @endphp

                    <div class="mb-8">
                        <div class="flex justify-between text-sm mb-2">
                            <span class="font-semibold text-puglia-notte">{{ $iscritti }} iscritti</span>
                            <span class="text-gray-400">{{ $event->max_participants }} posti totali</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-3">
                            <div class="bg-puglia-mare h-3 rounded-full transition-all"
                                style="width: {{ $percentuale }}%"></div>
                        </div>
                        <p class="text-sm text-gray-400 mt-2">
                            <span class="font-semibold text-puglia-notte">{{ $event->max_participants - $iscritti }}</span> posti ancora disponibili
                        </p>
                    </div>

                    @auth
                    @if(!auth()->user()->isAdmin())
                    @if($event->isUserRegistered(auth()->id()))
                    <form action="{{ route('events.unregister', $event) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-4 rounded-xl transition">
                            Annulla iscrizione
                        </button>
                    </form>
                    @elseif($iscritti >= $event->max_participants)
                    <button disabled
                        class="w-full bg-gray-100 text-gray-400 font-semibold py-4 rounded-xl cursor-not-allowed">
                        Posti esauriti
                    </button>
                    @else
                    <form action="{{ route('events.register', $event) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full bg-puglia-mare hover:bg-puglia-marescuro text-white font-semibold py-4 rounded-xl transition">
                            Iscriviti all'evento
                        </button>
                    </form>
                    @endif
                    @endif
                    @endauth

                    @guest
                    <a href="{{ route('login') }}"
                        class="block w-full text-center bg-puglia-mare hover:bg-puglia-marescuro text-white font-semibold py-4 rounded-xl transition">
                        Accedi per iscriverti
                    </a>
                    @endguest

                    @if(auth()->user() && auth()->user()->isAdmin())
                    <div class="mt-6 pt-6 border-t border-gray-100 space-y-3">
                        <a href="{{ route('events.edit', $event) }}"
                            class="flex items-center justify-center gap-2 w-full bg-amber-50 hover:bg-amber-100 text-amber-700 font-semibold py-3 rounded-xl transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Modifica evento
                        </a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST"
                            onsubmit="return confirm('Eliminare questo evento?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="flex items-center justify-center gap-2 w-full bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-3 rounded-xl transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Elimina evento
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>