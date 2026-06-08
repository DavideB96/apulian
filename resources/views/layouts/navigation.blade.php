<nav x-data="{ open: false, userMenu: false }" class="bg-puglia-notte border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 gap-4">

            {{-- LOGO --}}
            <a href="/" class="flex-shrink-0 flex flex-col leading-tight">
                <span class="font-playfair text-white font-bold text-xl tracking-tight">Apulian</span>
                <span class="text-white/40 text-xs tracking-widest uppercase">Discover Puglia's events</span>
            </a>

            {{-- LINK DESKTOP --}}
            <div class="hidden sm:flex items-center gap-1 flex-1 justify-center">
                <a href="{{ route('events.index') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                   {{ request()->routeIs('events.*') ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                    Eventi
                </a>
                @auth
                <a href="{{ route('dashboard') }}"
                    class="px-4 py-2 rounded-full text-sm font-medium transition
                   {{ request()->routeIs('dashboard') ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                    Dashboard
                </a>
                @endauth
            </div>

            {{-- DESKTOP RIGHT --}}
            @auth
            <div class="hidden sm:flex items-center gap-3 flex-shrink-0">
                @if(auth()->user()->isAdmin())
                    <span class="text-xs font-semibold text-puglia-grano bg-puglia-grano/15 px-3 py-1 rounded-full">
                        Admin
                    </span>
                @endif

                <div class="relative" x-data="{ userMenu: false }">
                    <button @click="userMenu = !userMenu"
                        class="flex items-center gap-2 px-3 py-2 rounded-full text-white/70 hover:text-white hover:bg-white/10 transition text-sm">
                        <div class="w-7 h-7 rounded-full bg-puglia-mare flex items-center justify-center text-white font-semibold text-xs">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <div x-show="userMenu"
                        @click.outside="userMenu = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg py-2 z-50">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-puglia-pietra transition">
                            Profilo
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-puglia-pietra transition">
                                Esci
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endauth

            @guest
            <div class="hidden sm:flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('login') }}"
                   class="text-white/60 hover:text-white text-sm font-medium transition px-3 py-2">
                    Accedi
                </a>
                <a href="{{ route('register') }}"
                   class="bg-puglia-grano hover:bg-amber-600 text-white text-sm font-semibold px-4 py-2 rounded-full transition">
                    Registrati
                </a>
            </div>
            @endguest

            {{-- HAMBURGER MOBILE --}}
            @auth
            <button @click="open = !open"
                class="sm:hidden p-2 rounded-lg text-white/60 hover:text-white hover:bg-white/10 transition">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            @endauth

            @guest
            <div class="sm:hidden flex items-center gap-2">
                <a href="{{ route('login') }}"
                   class="text-white/60 hover:text-white text-sm font-medium transition px-2 py-1">
                    Accedi
                </a>
                <a href="{{ route('register') }}"
                   class="bg-puglia-grano hover:bg-amber-600 text-white text-xs font-semibold px-3 py-2 rounded-full transition">
                    Registrati
                </a>
            </div>
            @endguest

        </div>
    </div>

    {{-- MENU MOBILE --}}
    @auth
    <div x-show="open" class="sm:hidden border-t border-white/10">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('events.index') }}"
                class="block px-4 py-3 rounded-xl text-sm font-medium transition
               {{ request()->routeIs('events.*') ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                Eventi
            </a>
            <a href="{{ route('dashboard') }}"
                class="block px-4 py-3 rounded-xl text-sm font-medium transition
               {{ request()->routeIs('dashboard') ? 'bg-white/15 text-white' : 'text-white/60 hover:text-white hover:bg-white/10' }}">
                Dashboard
            </a>
        </div>

        <div class="px-4 py-3 border-t border-white/10">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 rounded-full bg-puglia-mare flex items-center justify-center text-white font-semibold text-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="text-white font-medium text-sm">{{ Auth::user()->name }}</div>
                    <div class="text-white/40 text-xs">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}"
                    class="block px-4 py-3 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/10 transition">
                    Profilo
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-3 rounded-xl text-sm text-white/60 hover:text-white hover:bg-white/10 transition">
                        Esci
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endauth

</nav>