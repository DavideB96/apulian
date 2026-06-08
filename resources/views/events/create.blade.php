<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crea Nuovo Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm p-8">

                @if($errors->any())
                    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titolo</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                               placeholder="Es. Concerto jazz in piazza">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descrizione</label>
                        <textarea name="description" rows="4"
                                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                  placeholder="Descrivi l'evento...">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Luogo</label>
                            <input type="text" name="location" value="{{ old('location') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Es. Piazza del Ferrarese, Bari">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Data e ora</label>
                            <input type="datetime-local" name="date" value="{{ old('date') }}"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Posti disponibili</label>
                            <input type="number" name="max_participants" value="{{ old('max_participants') }}" min="1"
                                   class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                   placeholder="Es. 100">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Categoria</label>
                            <select name="category"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                <option value="">Seleziona categoria</option>
                                <option value="Musica" {{ old('category') == 'Musica' ? 'selected' : '' }}>Musica</option>
                                <option value="Sport" {{ old('category') == 'Sport' ? 'selected' : '' }}>Sport</option>
                                <option value="Arte" {{ old('category') == 'Arte' ? 'selected' : '' }}>Arte</option>
                                <option value="Cultura" {{ old('category') == 'Cultura' ? 'selected' : '' }}>Cultura</option>
                                <option value="Food" {{ old('category') == 'Food' ? 'selected' : '' }}>Food</option>
                                <option value="Tech" {{ old('category') == 'Tech' ? 'selected' : '' }}>Tech</option>
                                <option value="Altro" {{ old('category') == 'Altro' ? 'selected' : '' }}>Altro</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Immagine (opzionale)</label>
                        <input type="file" name="image" accept="image/*"
                               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('events.index') }}"
                           class="text-gray-500 hover:text-gray-700 font-medium">
                            ← Annulla
                        </a>
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg transition">
                            Crea Evento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>