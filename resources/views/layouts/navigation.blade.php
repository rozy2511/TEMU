
<nav x-data="{ open: false }" class="sticky top-0 z-40 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[72px]">

            <div class="flex items-center gap-8 lg:gap-12">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 shrink-0">
                    <div class="w-9 h-9 rounded-xl bg-[#172f4f] flex items-center justify-center">
                        <span class="text-white text-lg font-bold">T</span>
                    </div>
                    <div>
                        <span class="block text-lg font-bold tracking-tight text-slate-900">TEMU</span>
                        <span class="block text-[9px] font-medium tracking-[0.16em] uppercase text-slate-400">
                            Lost & Found
                        </span>
                    </div>
                </a>

                <div class="hidden md:flex items-center gap-1">
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.dashboard') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Dashboard
                        </a>

                        <a href="{{ route('admin.reports.index') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.reports.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Laporan
                        </a>

                        <a href="{{ route('admin.users.index') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.users.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Pengguna
                        </a>

                        <a href="{{ route('admin.claims.index') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.claims.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Klaim
                        </a>
                    @else
                        <a href="{{ route('user.dashboard') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('user.dashboard') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Beranda
                        </a>

                        <a href="{{ route('user.reports.index') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Laporan Saya
                        </a>

                        <a href="{{ route('user.reports.create') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('user.reports.create') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Buat Laporan
                        </a>

                        <a href="{{ route('user.claims.my') }}"
                           class="px-3.5 py-2 rounded-lg text-sm font-medium transition {{ request()->routeIs('user.claims.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}">
                            Klaim Saya
                        </a>
                    @endif
                </div>
            </div>

            <div class="hidden md:flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center">
                    <span class="text-sm font-semibold text-[#172f4f]">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>

                <div class="hidden lg:block">
                    <p class="text-sm font-semibold text-slate-800 leading-5">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="text-xs text-slate-400">
                        {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Pengguna' }}
                    </p>
                </div>

                <div class="h-8 w-px bg-slate-200 mx-1"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="px-3 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-red-600 hover:bg-red-50 transition">
                        Keluar
                    </button>
                </form>
            </div>

            <button @click="open = !open"
                    type="button"
                    class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100 transition"
                    :aria-expanded="open.toString()"
                    aria-label="Buka menu navigasi">
                <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

        </div>
    </div>

    <div x-show="open" x-cloak x-transition.opacity.duration.150ms
         @click.outside="open = false"
         class="md:hidden border-t border-slate-100 bg-white">
        <div class="max-w-7xl mx-auto px-4 py-4 space-y-1">

            @if (Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Dashboard</a>
                <a href="{{ route('admin.reports.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.reports.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Laporan</a>
                <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.users.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Pengguna</a>
                <a href="{{ route('admin.claims.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('admin.claims.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Klaim</a>
            @else
                <a href="{{ route('user.dashboard') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('user.dashboard') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Beranda</a>
                <a href="{{ route('user.reports.index') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Laporan Saya</a>
                <a href="{{ route('user.reports.create') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('user.reports.create') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Buat Laporan</a>
                <a href="{{ route('user.claims.my') }}" class="block px-4 py-3 rounded-lg text-sm font-medium {{ request()->routeIs('user.claims.*') ? 'bg-slate-100 text-[#172f4f]' : 'text-slate-600 hover:bg-slate-50' }}">Klaim Saya</a>
            @endif

            <div class="border-t border-slate-100 mt-3 pt-4">
                <div class="flex items-center gap-3 px-3 mb-3">
                    <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center">
                        <span class="text-sm font-semibold text-[#172f4f]">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-slate-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-3 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
