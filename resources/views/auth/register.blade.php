<x-guest-layout>
    <h2 class="font-playfair text-2xl font-bold text-puglia-notte mb-2">Crea un account</h2>
    <p class="text-gray-400 text-sm mb-8">Unisciti alla community di Apulian</p>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}" required autofocus
                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare transition"
                   placeholder="Il tuo nome">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare transition"
                   placeholder="la-tua@email.com">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare transition"
                   placeholder="••••••••">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Conferma password</label>
            <input type="password" name="password_confirmation" required
                   class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-puglia-mare transition"
                   placeholder="••••••••">
        </div>

        <button type="submit"
                class="w-full bg-puglia-mare hover:bg-puglia-marescuro text-white font-semibold py-3 px-6 rounded-xl transition">
            Registrati
        </button>

        <p class="text-center text-sm text-gray-400">
            Hai già un account?
            <a href="{{ route('login') }}" class="text-puglia-mare hover:text-puglia-marescuro font-semibold transition">
                Accedi
            </a>
        </p>
    </form>
</x-guest-layout>