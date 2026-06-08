<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="font-playfair text-2xl font-bold text-puglia-notte mb-2">Bentornato</h2>
    <p class="text-gray-400 text-sm mb-8">Accedi al tuo account Apulian</p>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare transition"
                   placeholder="la-tua@email.com">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare transition"
                   placeholder="••••••••">
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-gray-500">
                <input type="checkbox" name="remember"
                       class="rounded border-gray-300 text-puglia-mare focus:ring-puglia-mare">
                Ricordami
            </label>
            @if(Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-puglia-mare hover:text-puglia-marescuro transition">
                    Password dimenticata?
                </a>
            @endif
        </div>

        <button type="submit"
                class="w-full bg-puglia-mare hover:bg-puglia-marescuro text-white font-semibold py-3 px-6 rounded-xl transition">
            Accedi
        </button>

        <p class="text-center text-sm text-gray-400">
            Non hai un account?
            <a href="{{ route('register') }}" class="text-puglia-mare hover:text-puglia-marescuro font-semibold transition">
                Registrati
            </a>
        </p>
    </form>
</x-guest-layout>