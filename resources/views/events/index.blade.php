<x-app-layout>
    <x-slot name="header">
        <h2 class="font-playfair text-2xl font-bold text-puglia-notte">
            Eventi in Puglia
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- TOPBAR --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
                <p class="text-gray-400 text-sm">
                    Scopri tutti gli eventi disponibili in Puglia
                </p>
                @if(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('events.create') }}"
                    class="inline-flex items-center gap-2 bg-puglia-mare hover:bg-puglia-marescuro text-white font-semibold py-2 px-5 rounded-full transition text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nuovo Evento
                </a>
                @endif
            </div>

            {{-- RICERCA E FILTRI --}}
            <form method="GET" action="{{ route('events.index') }}"
                class="bg-white rounded-2xl shadow-sm p-4 mb-8 flex flex-col md:flex-row gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cerca eventi, luoghi, descrizioni..."
                    class="flex-1 border-0 bg-puglia-pietra rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare placeholder-gray-400">
                <select name="category"
                    class="border-0 bg-puglia-pietra rounded-xl px-4 py-3 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare text-gray-600">
                    <option value="">Tutte le categorie</option>
                    @foreach(['Musica', 'Sport', 'Arte', 'Cultura', 'Food', 'Tech', 'Altro'] as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                        {{ $cat }}
                    </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="bg-puglia-mare hover:bg-puglia-marescuro text-white font-semibold py-3 px-6 rounded-xl transition text-sm">
                    Cerca
                </button>
                @if(request('search') || request('category'))
                <a href="{{ route('events.index') }}"
                    class="bg-puglia-pietra hover:bg-gray-200 text-gray-600 font-semibold py-3 px-6 rounded-xl transition text-sm text-center">
                    Reset
                </a>
                @endif
            </form>

            {{-- FLASH MESSAGE --}}
            @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-2xl text-sm">
                {{ session('success') }}
            </div>
            @endif

            {{-- EVENTI --}}
            @if($events->isEmpty())
            <div class="text-center py-24">
                <div class="w-16 h-16 bg-puglia-pietra rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <p class="text-gray-400 text-lg font-medium">Nessun evento trovato</p>
                <p class="text-gray-300 text-sm mt-1">Prova a modificare i filtri di ricerca</p>
            </div>
            @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition group">

                    {{-- IMMAGINE --}}
                    <div class="relative overflow-hidden">
                        @if($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}"
                            alt="{{ $event->title }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                        @else
                        <div class="w-full h-48 bg-gradient-to-br from-puglia-mare/20 to-puglia-notte/30 flex items-center justify-center group-hover:scale-105 transition duration-500">
                            <svg class="w-12 h-12 text-puglia-mare/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span class="bg-white/90 backdrop-blur-sm text-puglia-mare text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">
                                {{ $event->category }}
                            </span>
                        </div>
                    </div>

                    {{-- CONTENUTO --}}
                    <div class="p-5">
                        <h3 class="font-playfair text-lg font-bold text-puglia-notte mb-3 leading-tight">
                            {{ $event->title }}
                        </h3>

                        <div class="space-y-1 mb-4">
                            <div class="flex items-center gap-2 text-gray-400 text-sm">
                                <svg class="w-4 h-4 text-puglia-mare flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="truncate">{{ $event->location }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-400 text-sm">
                                <svg class="w-4 h-4 text-puglia-mare flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $event->date->format('d/m/Y · H:i') }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-gray-400 text-sm">
                                <svg class="w-4 h-4 text-puglia-mare flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ $event->max_participants }} posti</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <a href="{{ route('events.show', $event) }}"
                                class="text-puglia-mare hover:text-puglia-marescuro font-semibold text-sm transition">
                                Scopri di più →
                            </a>

                            @if(auth()->user() && auth()->user()->isAdmin())
                            <div class="flex gap-2">
                                <a href="{{ route('events.edit', $event) }}"
                                    class="text-xs bg-amber-50 hover:bg-amber-100 text-amber-700 font-semibold py-1 px-3 rounded-full transition">
                                    Modifica
                                </a>
                                <form action="{{ route('events.destroy', $event) }}" method="POST"
                                    onsubmit="return confirm('Eliminare questo evento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-xs bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-1 px-3 rounded-full transition">
                                        Elimina
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $events->links() }}
            </div>
            @endif
        </div>
    </div>
</x-app-layout>