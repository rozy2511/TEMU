
<nav x-data="{ open: false }"
     class="sticky top-0 z-50 border-b border-white/50 bg-white/75 backdrop-blur-2xl transition-all duration-300">

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-[76px] items-center justify-between">

            {{-- BRAND --}}
            <a href="{{ route('dashboard') }}"
               class="group flex shrink-0 items-center gap-3">

                <div class="relative flex h-11 w-11 items-center justify-center overflow-hidden rounded-2xl bg-[#142b49] shadow-lg shadow-[#142b49]/15 transition duration-300 group-hover:-rotate-3 group-hover:scale-105">

                    <div class="absolute -right-3 -top-3 h-8 w-8 rounded-full bg-[#62e7d0] opacity-80 blur-md"></div>
                    <div class="absolute -bottom-3 -left-3 h-8 w-8 rounded-full bg-[#8e85ff] opacity-80 blur-md"></div>

                    <span class="relative font-['Manrope'] text-xl font-extrabold text-white">
                        T.
                    </span>
                </div>

                <div class="leading-none">
                    <div class="font-['Manrope'] text-lg font-extrabold tracking-[0.12em] text-[#142b49]">
                        TEMU
                    </div>

                    <div class="mt-1.5 text-[9px] font-bold tracking-[0.22em] text-slate-400">
                        LOST & FOUND
                    </div>
                </div>
            </a>

            {{-- DESKTOP NAVIGATION --}}
            <div class="hidden items-center gap-1 lg:flex">

                @if(auth()->user()->role === 'admin')

                    {{-- ADMIN MENU --}}
                    <a href="{{ route('admin.dashboard') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('admin.dashboard')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Dashboard

                        @if(request()->routeIs('admin.dashboard'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                    <a href="{{ route('admin.reports.index') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('admin.reports.*')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Laporan

                        @if(request()->routeIs('admin.reports.*'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('admin.users.*')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Pengguna

                        @if(request()->routeIs('admin.users.*'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                    <a href="{{ route('admin.claims.index') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('admin.claims.*')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Klaim

                        @if(request()->routeIs('admin.claims.*'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                @else

                    {{-- USER MENU --}}
                    <a href="{{ route('user.dashboard') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('user.dashboard')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Beranda

                        @if(request()->routeIs('user.dashboard'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                    <a href="{{ route('user.reports.index') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Laporan Saya

                        @if(request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                    <a href="{{ route('user.reports.create') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('user.reports.create')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Buat Laporan

                        @if(request()->routeIs('user.reports.create'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                    <a href="{{ route('user.claims.my') }}"
                       class="group relative rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200
                       {{ request()->routeIs('user.claims.*')
                            ? 'bg-[#142b49] text-white shadow-md shadow-[#142b49]/10'
                            : 'text-slate-600 hover:bg-slate-100 hover:text-[#142b49]' }}">

                        Klaim Saya

                        @if(request()->routeIs('user.claims.*'))
                            <span class="absolute -bottom-[21px] left-1/2 h-[3px] w-8 -translate-x-1/2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                        @endif
                    </a>

                @endif

            </div>

            {{-- DESKTOP USER PROFILE --}}
            <div class="hidden items-center gap-3 lg:flex">

                <div class="flex items-center gap-3 rounded-2xl border border-slate-200/70 bg-white/70 px-3 py-2 transition duration-200 hover:border-[#62e7d0]/50 hover:shadow-sm">

                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gradient-to-br from-[#62e7d0] via-[#8bcfff] to-[#8e85ff] text-sm font-extrabold text-[#142b49]">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="max-w-[140px]">
                        <p class="truncate text-xs font-bold text-[#142b49]">
                            {{ auth()->user()->name }}
                        </p>

                        <p class="mt-0.5 text-[10px] font-medium text-slate-400">
                            {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Pengguna' }}
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="group flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition duration-200 hover:border-rose-200 hover:bg-rose-50 hover:text-rose-600"
                            title="Logout"
                            aria-label="Logout">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">

                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12H3m0 0l4-4m-4 4l4 4M10 5h8a2 2 0 012 2v10a2 2 0 01-2 2h-8"/>
                        </svg>

                    </button>
                </form>

            </div>

            {{-- MOBILE TOGGLE --}}
            <button @click="open = !open"
                    class="relative flex h-11 w-11 items-center justify-center rounded-2xl border border-slate-200 bg-white/80 text-[#142b49] transition duration-200 hover:border-[#62e7d0] hover:shadow-md lg:hidden"
                    aria-label="Toggle navigation"
                    :aria-expanded="open.toString()">

                <svg x-show="!open"
                     x-cloak
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 7h16M4 12h16M4 17h16"/>
                </svg>

                <svg x-show="open"
                     x-cloak
                     xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 6l12 12M18 6L6 18"/>
                </svg>

            </button>

        </div>

    </div>

    {{-- MOBILE MENU --}}
    <div x-show="open"
         x-cloak
         @click.outside="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="absolute left-0 right-0 top-full border-t border-slate-200/70 bg-white/95 shadow-2xl shadow-[#142b49]/10 backdrop-blur-2xl lg:hidden">

        <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6">

            {{-- MOBILE PROFILE --}}
            <div class="mb-5 flex items-center gap-3 rounded-2xl border border-white bg-gradient-to-br from-[#eafaf7] via-[#f0f5ff] to-[#f4efff] p-4">

                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#62e7d0] via-[#8bcfff] to-[#8e85ff] text-lg font-extrabold text-[#142b49] shadow-sm">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="min-w-0">
                    <p class="truncate font-bold text-[#142b49]">
                        {{ auth()->user()->name }}
                    </p>

                    <p class="mt-1 text-xs font-medium text-slate-500">
                        {{ auth()->user()->role === 'admin' ? 'Administrator' : 'Pengguna' }}
                    </p>
                </div>

                <div class="ml-auto flex h-8 w-8 items-center justify-center rounded-xl bg-white/80 text-[#8e85ff]">
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 3l1.9 5.8L20 11l-6.1 2.2L12 19l-1.9-5.8L4 11l6.1-2.2L12 3z"/>
                    </svg>
                </div>
            </div>

            {{-- MOBILE LINKS --}}
            <div class="space-y-2">

                @if(auth()->user()->role === 'admin')

                    <a href="{{ route('admin.dashboard') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('admin.dashboard')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                        </span>

                        Dashboard
                    </a>

                    <a href="{{ route('admin.reports.index') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('admin.reports.*')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.reports.*') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zm3 5h4m-4 4h4m-4 4h2"/>
                            </svg>
                        </span>

                        Laporan
                    </a>

                    <a href="{{ route('admin.users.index') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('admin.users.*')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.users.*') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m12-13a4 4 0 11-8 0 4 4 0 018 0zm6 13v-2a4 4 0 00-3-3.87M18 3.13a4 4 0 010 7.75"/>
                            </svg>
                        </span>

                        Pengguna
                    </a>

                    <a href="{{ route('admin.claims.index') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('admin.claims.*')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('admin.claims.*') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5-1a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>
                        </span>

                        Klaim
                    </a>

                @else

                    <a href="{{ route('user.dashboard') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('user.dashboard')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('user.dashboard') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                        </span>

                        Beranda
                    </a>

                    <a href="{{ route('user.reports.index') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('user.reports.*') && !request()->routeIs('user.reports.create') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 3h10a2 2 0 012 2v14a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2zm3 5h4m-4 4h4m-4 4h2"/>
                            </svg>
                        </span>

                        Laporan Saya
                    </a>

                    <a href="{{ route('user.reports.create') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('user.reports.create')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('user.reports.create') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                            </svg>
                        </span>

                        Buat Laporan
                    </a>

                    <a href="{{ route('user.claims.my') }}"
                       @click="open = false"
                       class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-semibold transition
                       {{ request()->routeIs('user.claims.*')
                            ? 'bg-[#142b49] text-white shadow-md'
                            : 'text-slate-600 hover:bg-slate-100' }}">

                        <span class="flex h-9 w-9 items-center justify-center rounded-xl {{ request()->routeIs('user.claims.*') ? 'bg-white/10' : 'bg-slate-100' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5-1a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>
                        </span>

                        Klaim Saya
                    </a>

                @endif

            </div>

            {{-- MOBILE LOGOUT --}}
            <div class="mt-4 border-t border-slate-200 pt-4">

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                            class="flex w-full items-center justify-center gap-2 rounded-2xl border border-rose-100 bg-rose-50 px-4 py-3 text-sm font-semibold text-rose-600 transition duration-200 hover:bg-rose-100">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-4 w-4"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12H3m0 0l4-4m-4 4l4 4M10 5h8a2 2 0 012 2v10a2 2 0 01-2 2h-8"/>
                        </svg>

                        Keluar dari TEMU
                    </button>
                </form>

            </div>

        </div>

    </div>

</nav>
