<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(auth()->user()->isAdmin())

            {{-- DASHBOARD ADMIN --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-4xl font-bold text-indigo-600">{{ $totalEvents }}</p>
                    <p class="text-gray-500 mt-1">Eventi totali</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-4xl font-bold text-indigo-600">{{ $totalRegistrations }}</p>
                    <p class="text-gray-500 mt-1">Iscrizioni totali</p>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 text-center">
                    <p class="text-4xl font-bold text-indigo-600">{{ $totalUsers }}</p>
                    <p class="text-gray-500 mt-1">Utenti registrati</p>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Gestione Eventi</h3>
                    <a href="{{ route('events.create') }}"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition text-sm">
                        + Nuovo Evento
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Evento</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Data</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Categoria</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Iscritti</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Azioni</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($events as $event)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $event->title }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <span class="block text-gray-700 font-medium">{{ $event->date->format('d/m/Y') }}</span>
                                    <span class="block text-gray-400 text-xs mt-0.5">{{ $event->date->format('H:i') }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-xs font-semibold text-indigo-600 uppercase">{{ $event->category }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-sm">
                                    {{ $event->registrations_count }} / {{ $event->max_participants }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('events.show', $event) }}"
                                            class="inline-flex items-center gap-1.5 text-xs bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-1.5 px-4 rounded-full transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Vedi
                                        </a>
                                        <a href="{{ route('events.edit', $event) }}"
                                            class="inline-flex items-center gap-1.5 text-xs bg-amber-50 hover:bg-amber-100 text-amber-700 font-semibold py-1.5 px-4 rounded-full transition">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Modifica
                                        </a>
                                        <form action="{{ route('events.destroy', $event) }}" method="POST"
                                            onsubmit="return confirm('Eliminare questo evento?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-1.5 text-xs bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-1.5 px-4 rounded-full transition">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Elimina
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    Nessun evento creato ancora.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @else

            {{-- DASHBOARD UTENTE --}}
            <h3 class="text-lg font-semibold text-gray-700 mb-4">I tuoi eventi</h3>

            @if($registrations->isEmpty())
            <div class="bg-white rounded-xl shadow-sm p-8 text-center text-gray-500">
                <p class="text-xl mb-4">Non sei ancora iscritto a nessun evento.</p>
                <a href="{{ route('events.index') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                    Scopri gli eventi
                </a>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($registrations as $registration)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                    @if($registration->event->image)
                    <img src="{{ $registration->event->image }}"
                        alt="{{ $registration->event->title }}"
                        class="w-full h-40 object-cover">
                    @else
                    <div class="w-full h-40 bg-indigo-100 flex items-center justify-center">
                        <span class="text-indigo-400 text-4xl">📅</span>
                    </div>
                    @endif
                    <div class="p-5">
                        <span class="text-xs font-semibold text-indigo-600 uppercase">
                            {{ $registration->event->category }}
                        </span>
                        <h3 class="mt-1 text-lg font-bold text-gray-900">
                            {{ $registration->event->title }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            📍 {{ $registration->event->location }}
                        </p>
                        <p class="text-sm text-gray-500">
                            🗓 {{ $registration->event->date->format('d/m/Y H:i') }}
                        </p>
                        <a href="{{ route('events.show', $registration->event) }}"
                            class="mt-3 inline-block text-indigo-600 hover:text-indigo-800 font-semibold text-sm">
                            Vedi dettagli →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

            @endif
        </div>
    </div>
</x-app-layout>