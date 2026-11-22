
<nav x-data="{ open: false }"
     @keydown.escape.window="open = false"
     class="sticky top-0 z-50 border-b border-[#172f4f]/15 bg-white">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-[76px] items-center justify-between gap-4">

            {{-- BRAND --}}
            <a href="{{ route('dashboard') }}"
               class="group flex shrink-0 items-center gap-3"
               aria-label="TEMU - Kembali ke dashboard">

                <div class="relative flex h-11 w-11 items-center justify-center overflow-hidden bg-[#172f4f] transition-colors duration-200 group-hover:bg-[#315f91]">
                    <span class="font-['Manrope'] text-[25px] font-extrabold tracking-tighter text-white">T.</span>
                    <span class="absolute bottom-0 left-0 h-[3px] w-full bg-[#d5a34a]"></span>
                </div>

                <div class="leading-none">
                    <span class="block font-['Manrope'] text-[19px] font-extrabold tracking-[0.12em] text-[#172f4f]">
                        TEMU
                    </span>
                    <span class="mt-[6px] block text-[9px] font-bold uppercase tracking-[0.24em] text-[#8793a0]">
                        Lost & Found
                    </span>
                </div>
            </a>

            {{-- DESKTOP NAVIGATION --}}
            <div class="hidden h-full items-center gap-1 md:flex">

                @if (Auth::user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('admin.dashboard') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Dashboard

                        @if(request()->routeIs('admin.dashboard'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                    <a href="{{ route('admin.reports.index') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('admin.reports.*') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Laporan

                        @if(request()->routeIs('admin.reports.*'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('admin.users.*') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Pengguna

                        @if(request()->routeIs('admin.users.*'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                    <a href="{{ route('admin.claims.index') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('admin.claims.*') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Klaim

                        @if(request()->routeIs('admin.claims.*'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                @else

                    <a href="{{ route('user.dashboard') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('user.dashboard') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Beranda

                        @if(request()->routeIs('user.dashboard'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                    <a href="{{ route('user.reports.index') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Laporan Saya

                        @if(request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                    <a href="{{ route('user.reports.create') }}"
                       class="ml-2 inline-flex items-center gap-2 bg-[#172f4f] px-4 py-3 text-[12px] font-bold text-white transition-colors duration-200 hover:bg-[#315f91]">

                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 5v14m-7-7h14"/>
                        </svg>

                        Buat Laporan
                    </a>

                    <a href="{{ route('user.claims.my') }}"
                       class="relative flex min-h-[76px] items-center px-4 text-[13px] font-semibold transition-colors duration-200
                       {{ request()->routeIs('user.claims.*') ? 'text-[#172f4f]' : 'text-[#788493] hover:text-[#172f4f]' }}">
                        Klaim Saya

                        @if(request()->routeIs('user.claims.*'))
                            <span class="absolute bottom-0 left-4 right-4 h-[3px] bg-[#d5a34a]"></span>
                        @endif
                    </a>

                @endif

            </div>

            {{-- DESKTOP ACCOUNT --}}
            <div class="hidden items-center gap-3 border-l border-[#172f4f]/10 pl-5 lg:flex">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center border border-[#172f4f]/10 bg-[#f5f3ed]">
                    <span class="font-['Manrope'] text-sm font-extrabold text-[#172f4f]">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </span>
                </div>

                <div class="max-w-[125px] min-w-0">
                    <p class="truncate text-[12px] font-bold text-[#202a35]">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="mt-1 text-[10px] font-medium uppercase tracking-[0.12em] text-[#8793a0]">
                        {{ Auth::user()->role === 'admin' ? 'Administrator' : 'Member' }}
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="ml-1">
                    @csrf
                    <button type="submit"
                            aria-label="Keluar dari akun"
                            title="Keluar"
                            class="flex h-9 w-9 items-center justify-center text-[#8793a0] transition-colors duration-200 hover:bg-red-50 hover:text-red-600">

                        <svg class="h-[18px] w-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M15 17l5-5-5-5M20 12H9m4 8H5a2 2 0 01-2-2V6a2 2 0 012-2h8"/>
                        </svg>
                    </button>
                </form>

            </div>

            {{-- MOBILE MENU BUTTON --}}
            <button @click="open = !open"
                    type="button"
                    class="flex h-11 w-11 shrink-0 items-center justify-center border border-[#172f4f]/15 bg-[#f5f3ed] text-[#172f4f] transition-colors duration-200 hover:bg-[#172f4f] hover:text-white md:hidden"
                    :aria-expanded="open.toString()"
                    aria-controls="temu-mobile-navigation"
                    :aria-label="open ? 'Tutup menu navigasi' : 'Buka menu navigasi'">

                <svg x-show="!open" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.8"
                          d="M4 7h16M4 12h16M4 17h16"/>
                </svg>

                <svg x-show="open" x-cloak class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.8"
                          d="M6 6l12 12M18 6L6 18"/>
                </svg>

            </button>

        </div>
    </div>

    {{-- MOBILE NAVIGATION --}}
    <div id="temu-mobile-navigation"
         x-show="open"
         x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.outside="open = false"
         class="border-t border-[#172f4f]/10 bg-white md:hidden">

        <div class="mx-auto max-w-7xl px-4 pb-5 pt-4 sm:px-6">

            <div class="mb-4 flex items-center justify-between">
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#8793a0]">
                    Main Navigation
                </span>
                <span class="text-[10px] font-bold uppercase tracking-[0.12em] text-[#d5a34a]">
                    {{ Auth::user()->role === 'admin' ? 'Admin Panel' : 'Member Area' }}
                </span>
            </div>

            @if (Auth::user()->role === 'admin')

                <div class="space-y-1">

                    <a @click="open = false"
                       href="{{ route('admin.dashboard') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('admin.dashboard') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Dashboard
                    </a>

                    <a @click="open = false"
                       href="{{ route('admin.reports.index') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('admin.reports.*') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Laporan
                    </a>

                    <a @click="open = false"
                       href="{{ route('admin.users.index') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('admin.users.*') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Pengguna
                    </a>

                    <a @click="open = false"
                       href="{{ route('admin.claims.index') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('admin.claims.*') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Klaim
                    </a>

                </div>

            @else

                <div class="space-y-1">

                    <a @click="open = false"
                       href="{{ route('user.dashboard') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('user.dashboard') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Beranda
                    </a>

                    <a @click="open = false"
                       href="{{ route('user.reports.index') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Laporan Saya
                    </a>

                    <a @click="open = false"
                       href="{{ route('user.reports.create') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('user.reports.create') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Buat Laporan
                        <span class="text-[#d5a34a]">+</span>
                    </a>

                    <a @click="open = false"
                       href="{{ route('user.claims.my') }}"
                       class="flex items-center justify-between px-4 py-3 text-[13px] font-semibold transition-colors
                       {{ request()->routeIs('user.claims.*') ? 'border-l-[3px] border-[#d5a34a] bg-[#172f4f]/5 text-[#172f4f]' : 'border-l-[3px] border-transparent text-[#667587] hover:bg-[#f5f3ed]' }}">
                        Klaim Saya
                    </a>

                </div>

            @endif

            {{-- MOBILE ACCOUNT --}}
            <div class="mt-5 border-t border-[#172f4f]/10 pt-5">

                <div class="flex items-center gap-3 bg-[#f5f3ed] p-4">

                    <div class="flex h-11 w-11 shrink-0 items-center justify-center bg-[#172f4f]">
                        <span class="font-['Manrope'] text-base font-bold text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>

                    <div class="min-w-0 flex-1">
                        <p class="truncate text-[13px] font-bold text-[#202a35]">
                            {{ Auth::user()->name }}
                        </p>
                        <p class="mt-1 truncate text-[11px] text-[#8793a0]">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf

                    <button type="submit"
                            class="flex w-full items-center justify-center gap-2 border border-red-100 px-4 py-3 text-[12px] font-bold text-red-600 transition-colors duration-200 hover:bg-red-50">

                        <svg class="h-[16px] w-[16px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M15 17l5-5-5-5M20 12H9m4 8H5a2 2 0 01-2-2V6a2 2 0 012-2h8"/>
                        </svg>

                        Keluar dari akun
                    </button>
                </form>

            </div>

        </div>
    </div>

</nav>
