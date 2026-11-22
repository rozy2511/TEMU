
<x-app-layout>

    <div class="min-h-screen overflow-hidden bg-[#f5f3ed]">

        {{-- HERO --}}
        <section class="relative overflow-hidden bg-[#142b47] text-white">

            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute -right-32 -top-48 h-[600px] w-[600px] rounded-full border border-white/[0.07]"></div>
                <div class="absolute -right-16 -top-32 h-[460px] w-[460px] rounded-full border border-white/[0.07]"></div>
                <div class="absolute right-20 top-20 h-72 w-72 rounded-full border border-white/[0.06]"></div>
                <div class="absolute bottom-0 left-0 h-1 w-1/3 bg-[#d5a34a]"></div>
                <div class="absolute inset-0 opacity-[0.035]"
                     style="background-image: linear-gradient(rgba(255,255,255,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.5) 1px, transparent 1px); background-size: 55px 55px;">
                </div>
            </div>

            <div class="relative mx-auto max-w-7xl px-5 pb-16 pt-14 sm:px-8 sm:pb-20 sm:pt-20 lg:px-10 lg:pb-24">

                <div class="grid items-center gap-14 lg:grid-cols-[1.1fr_0.9fr]">

                    <div class="relative z-10">

                        <div class="mb-8 flex items-center gap-3">
                            <span class="h-[2px] w-9 bg-[#d5a34a]"></span>
                            <span class="text-[10px] font-bold uppercase tracking-[0.3em] text-[#e8c17e]">
                                Campus Lost & Found
                            </span>
                        </div>

                        <h1 class="font-['Manrope'] text-[43px] font-extrabold leading-[1.08] tracking-[-0.06em] sm:text-6xl lg:text-[76px]">
                            Setiap barang
                            <br>
                            punya
                            <span class="text-[#e0b76e]">cerita.</span>
                        </h1>

                        <div class="mt-8 flex items-start gap-4">
                            <div class="mt-1 h-12 w-[3px] shrink-0 bg-[#d5a34a]"></div>
                            <div>
                                <p class="text-sm font-semibold text-white sm:text-base">
                                    Selamat datang, {{ Auth::user()->name }}.
                                </p>
                                <p class="mt-2 max-w-lg text-sm leading-7 text-slate-300">
                                    Temukan kembali yang hilang, bantu orang lain menemukan miliknya, dan jadilah bagian dari komunitas kampus yang peduli.
                                </p>
                            </div>
                        </div>

                        <div class="mt-9 flex flex-col gap-3 sm:flex-row">

                            <a href="{{ route('user.reports.create') }}"
                               class="group inline-flex min-h-[54px] items-center justify-center gap-3 bg-[#d5a34a] px-7 text-sm font-extrabold text-[#142b47] transition duration-200 hover:bg-[#edc77f]">

                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.8"
                                          d="M12 5v14m-7-7h14"/>
                                </svg>

                                Laporkan Barang

                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 12h14m-6-6 6 6-6 6"/>
                                </svg>
                            </a>

                            <a href="{{ route('user.reports.index') }}"
                               class="inline-flex min-h-[54px] items-center justify-center border border-white/30 px-7 text-sm font-bold text-white transition duration-200 hover:border-white hover:bg-white/10">
                                Jelajahi Laporan Saya
                            </a>

                        </div>

                        <div class="mt-12 flex flex-wrap items-center gap-x-8 gap-y-4 border-t border-white/15 pt-6">

                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center border border-white/20 text-[#e0b76e]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                              d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                              d="M9 12l2 2 4-4"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold">Aman dan terarah</p>
                                    <p class="mt-1 text-[10px] text-slate-400">Alur klaim terstruktur</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 items-center justify-center border border-white/20 text-[#e0b76e]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6"
                                              d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H2v-2a4 4 0 015-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75M9 14a4 4 0 014 4v2H5v-2a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold">Saling membantu</p>
                                    <p class="mt-1 text-[10px] text-slate-400">Berawal dari komunitas</p>
                                </div>
                            </div>

                        </div>

                    </div>


                    {{-- HERO VISUAL --}}
                    <div class="relative mx-auto w-full max-w-[470px] lg:ml-auto">

                        <div class="relative aspect-[4/5] overflow-hidden border border-white/15 bg-[#1d3d60]">

                            <div class="absolute inset-0 opacity-20"
                                 style="background-image: radial-gradient(#ffffff 0.7px, transparent 0.7px); background-size: 15px 15px;">
                            </div>

                            <div class="absolute right-0 top-0 h-28 w-28 bg-[#d5a34a]"></div>
                            <div class="absolute right-0 top-0 h-20 w-20 bg-[#1d3d60]"></div>

                            <div class="absolute bottom-0 left-0 h-32 w-32 bg-[#d5a34a]"></div>
                            <div class="absolute bottom-0 left-0 h-24 w-24 bg-[#1d3d60]"></div>

                            <div class="absolute inset-8 border border-white/20"></div>

                            <div class="absolute inset-0 flex items-center justify-center">

                                <div class="relative flex h-64 w-64 items-center justify-center sm:h-72 sm:w-72">

                                    <div class="absolute inset-0 rounded-full border border-white/20"></div>
                                    <div class="absolute inset-8 rounded-full border border-white/10"></div>
                                    <div class="absolute inset-16 rounded-full border border-white/10"></div>

                                    <div class="relative flex h-40 w-40 items-center justify-center rounded-full border border-[#e4bc73]/50 bg-[#142b47] shadow-2xl sm:h-48 sm:w-48">

                                        <svg class="h-24 w-24 text-[#e4bc73] sm:h-28 sm:w-28"
                                             viewBox="0 0 120 120" fill="none">
                                            <path d="M60 8L100 24V56C100 83 83 103 60 113C37 103 20 83 20 56V24L60 8Z"
                                                  stroke="currentColor" stroke-width="2"/>
                                            <path d="M60 27L84 37V57C84 76 74 89 60 97C46 89 36 76 36 57V37L60 27Z"
                                                  stroke="currentColor" stroke-width="1.5" opacity=".5"/>
                                            <path d="M45 59L55 69L76 48"
                                                  stroke="currentColor" stroke-width="3"
                                                  stroke-linecap="square" stroke-linejoin="miter"/>
                                        </svg>

                                    </div>

                                    <div class="absolute -right-1 top-10 flex h-12 w-12 items-center justify-center bg-[#d5a34a] text-[#142b47]">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                  d="M20 11.5c0 5-8 10-8 10s-8-5-8-10a8 8 0 1116 0z"/>
                                            <circle cx="12" cy="11.5" r="2.5" stroke-width="1.8"/>
                                        </svg>
                                    </div>

                                    <div class="absolute -left-2 bottom-10 flex h-12 w-12 items-center justify-center border border-white/30 bg-[#1d3d60] text-white">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                                  d="M4 7h16M4 12h16M4 17h10"/>
                                        </svg>
                                    </div>

                                </div>

                            </div>

                            <div class="absolute bottom-7 left-8 right-8 flex items-end justify-between border-t border-white/20 pt-5">
                                <div>
                                    <p class="text-[9px] font-bold uppercase tracking-[0.3em] text-[#e4bc73]">The purpose</p>
                                    <p class="mt-2 font-['Manrope'] text-xl font-extrabold tracking-tight">Reconnect.</p>
                                </div>
                                <p class="text-[10px] font-bold tracking-[0.25em] text-white/50">TEMU / 001</p>
                            </div>

                        </div>

                        <div class="absolute -bottom-5 -right-4 hidden bg-[#f5f3ed] px-6 py-4 shadow-xl sm:block">
                            <p class="text-[9px] font-bold uppercase tracking-[0.2em] text-[#9a762f]">One community</p>
                            <p class="mt-1 font-['Manrope'] text-lg font-extrabold text-[#142b47]">Many connections.</p>
                        </div>

                    </div>

                </div>
            </div>
        </section>


        {{-- QUICK NAVIGATION --}}
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">

            <div class="mb-10 flex flex-col justify-between gap-4 md:flex-row md:items-end">

                <div>
                    <div class="flex items-center gap-3">
                        <span class="h-[2px] w-8 bg-[#d5a34a]"></span>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-[#9a762f]">
                            Your Space
                        </p>
                    </div>

                    <h2 class="mt-4 font-['Manrope'] text-3xl font-extrabold tracking-[-0.045em] text-[#142b47] sm:text-4xl">
                        Apa yang ingin kamu lakukan?
                    </h2>
                </div>

                <p class="max-w-md text-sm leading-7 text-[#748091]">
                    Semua kebutuhan pencarian, pelaporan, dan pengelolaan klaim barang tersedia dalam satu tempat.
                </p>

            </div>


            <div class="grid gap-5 md:grid-cols-3">

                {{-- REPORT --}}
                <a href="{{ route('user.reports.create') }}"
                   class="group relative min-h-[290px] overflow-hidden bg-[#142b47] p-7 text-white transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#142b47]/15">

                    <div class="absolute -right-12 -top-12 h-44 w-44 rounded-full border border-white/10 transition-transform duration-500 group-hover:scale-125"></div>
                    <div class="absolute -right-5 -top-5 h-28 w-28 rounded-full border border-white/10"></div>

                    <div class="relative flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center border border-[#e4bc73]/50 bg-[#e4bc73]/10 text-[#e4bc73]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.7"
                                      d="M12 5v14m-7-7h14"/>
                            </svg>
                        </div>
                        <span class="font-['Manrope'] text-xs font-bold tracking-[0.2em] text-white/40">01</span>
                    </div>

                    <div class="relative mt-16">
                        <h3 class="font-['Manrope'] text-2xl font-extrabold tracking-tight">Buat Laporan</h3>
                        <p class="mt-3 max-w-[250px] text-sm leading-6 text-slate-300">
                            Bagikan informasi barang hilang atau barang yang berhasil kamu temukan.
                        </p>

                        <div class="mt-6 flex items-center gap-3 text-xs font-extrabold text-[#e4bc73]">
                            BUAT LAPORAN
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </div>
                    </div>

                </a>


                {{-- MY REPORTS --}}
                <a href="{{ route('user.reports.index') }}"
                   class="group relative min-h-[290px] overflow-hidden border border-[#142b47]/10 bg-white p-7 transition duration-300 hover:-translate-y-1 hover:border-[#315f91]/40 hover:shadow-xl hover:shadow-[#142b47]/5">

                    <div class="absolute -right-12 -top-12 h-44 w-44 rounded-full border border-[#142b47]/[0.07] transition-transform duration-500 group-hover:scale-125"></div>

                    <div class="relative flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center border border-[#315f91]/15 bg-[#edf2f7] text-[#315f91]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.7"
                                      d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                            </svg>
                        </div>
                        <span class="font-['Manrope'] text-xs font-bold tracking-[0.2em] text-[#aeb7c2]">02</span>
                    </div>

                    <div class="relative mt-16">
                        <h3 class="font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#142b47]">Laporan Saya</h3>
                        <p class="mt-3 max-w-[250px] text-sm leading-6 text-[#788493]">
                            Kelola laporan yang sudah kamu buat dan pantau perkembangannya.
                        </p>

                        <div class="mt-6 flex items-center gap-3 text-xs font-extrabold text-[#315f91]">
                            LIHAT LAPORAN
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </div>
                    </div>

                </a>


                {{-- CLAIMS --}}
                <a href="{{ route('user.claims.my') }}"
                   class="group relative min-h-[290px] overflow-hidden border border-[#142b47]/10 bg-white p-7 transition duration-300 hover:-translate-y-1 hover:border-[#315f91]/40 hover:shadow-xl hover:shadow-[#142b47]/5">

                    <div class="absolute -right-12 -top-12 h-44 w-44 rounded-full border border-[#142b47]/[0.07] transition-transform duration-500 group-hover:scale-125"></div>

                    <div class="relative flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center border border-[#315f91]/15 bg-[#edf2f7] text-[#315f91]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.7"
                                      d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>
                        </div>
                        <span class="font-['Manrope'] text-xs font-bold tracking-[0.2em] text-[#aeb7c2]">03</span>
                    </div>

                    <div class="relative mt-16">
                        <h3 class="font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#142b47]">Klaim Saya</h3>
                        <p class="mt-3 max-w-[250px] text-sm leading-6 text-[#788493]">
                            Periksa pengajuan klaim dan ikuti proses konfirmasi pengembalian barang.
                        </p>

                        <div class="mt-6 flex items-center gap-3 text-xs font-extrabold text-[#315f91]">
                            LIHAT KLAIM
                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </div>
                    </div>

                </a>

            </div>
        </section>


        {{-- PROCESS SECTION --}}
        <section class="relative overflow-hidden bg-[#e9e5da]">

            <div class="absolute bottom-0 right-0 h-64 w-64 rounded-full border border-[#142b47]/[0.06]"></div>
            <div class="absolute bottom-0 right-0 h-44 w-44 rounded-full border border-[#142b47]/[0.06]"></div>

            <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">

                <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">

                    <div>
                        <div class="flex items-center gap-3">
                            <span class="h-[2px] w-8 bg-[#d5a34a]"></span>
                            <p class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-[#9a762f]">
                                How TEMU Works
                            </p>
                        </div>

                        <h2 class="mt-5 font-['Manrope'] text-3xl font-extrabold leading-tight tracking-[-0.05em] text-[#142b47] sm:text-5xl">
                            Dari kehilangan menuju penemuan.
                        </h2>

                        <p class="mt-6 max-w-sm text-sm leading-7 text-[#6d7988]">
                            TEMU dirancang untuk membantu proses pencarian dan pengembalian barang melalui langkah yang mudah dipahami.
                        </p>

                        <div class="mt-8 inline-flex items-center gap-3 border-b border-[#142b47]/30 pb-2 text-xs font-bold uppercase tracking-[0.15em] text-[#142b47]">
                            Find. Connect. Return.
                        </div>
                    </div>


                    <div class="space-y-0">

                        <div class="group grid grid-cols-[65px_1fr] gap-5 border-b border-[#142b47]/15 py-7 first:pt-0 sm:grid-cols-[90px_1fr]">

                            <div class="font-['Manrope'] text-4xl font-extrabold text-[#c39a51] transition-colors group-hover:text-[#142b47] sm:text-5xl">01</div>

                            <div>
                                <h3 class="font-['Manrope'] text-lg font-extrabold text-[#142b47] sm:text-xl">Laporkan barang</h3>
                                <p class="mt-3 max-w-lg text-sm leading-7 text-[#6d7988]">
                                    Buat laporan kehilangan atau penemuan dengan foto, deskripsi, dan informasi lokasi yang relevan.
                                </p>
                            </div>

                        </div>


                        <div class="group grid grid-cols-[65px_1fr] gap-5 border-b border-[#142b47]/15 py-7 sm:grid-cols-[90px_1fr]">

                            <div class="font-['Manrope'] text-4xl font-extrabold text-[#c39a51] transition-colors group-hover:text-[#142b47] sm:text-5xl">02</div>

                            <div>
                                <h3 class="font-['Manrope'] text-lg font-extrabold text-[#142b47] sm:text-xl">Temukan dan ajukan klaim</h3>
                                <p class="mt-3 max-w-lg text-sm leading-7 text-[#6d7988]">
                                    Periksa informasi barang dan ajukan klaim apabila kamu merasa barang tersebut adalah milikmu.
                                </p>
                            </div>

                        </div>


                        <div class="group grid grid-cols-[65px_1fr] gap-5 py-7 pb-0 sm:grid-cols-[90px_1fr]">

                            <div class="font-['Manrope'] text-4xl font-extrabold text-[#c39a51] transition-colors group-hover:text-[#142b47] sm:text-5xl">03</div>

                            <div>
                                <h3 class="font-['Manrope'] text-lg font-extrabold text-[#142b47] sm:text-xl">Konfirmasi pengembalian</h3>
                                <p class="mt-3 max-w-lg text-sm leading-7 text-[#6d7988]">
                                    Setelah proses serah terima dilakukan, kedua pihak memberikan konfirmasi agar pengembalian tercatat dengan baik.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>


        {{-- CLOSING CTA --}}
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">

            <div class="relative overflow-hidden bg-[#142b47] px-7 py-12 text-white sm:px-12 sm:py-14">

                <div class="absolute -right-20 -top-32 h-80 w-80 rounded-full border border-white/10"></div>
                <div class="absolute -right-5 -top-20 h-56 w-56 rounded-full border border-white/10"></div>
                <div class="absolute bottom-0 left-0 h-1.5 w-36 bg-[#d5a34a]"></div>

                <div class="relative flex flex-col gap-8 md:flex-row md:items-center md:justify-between">

                    <div class="max-w-2xl">
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-[#e4bc73]">
                            Make a Difference
                        </p>

                        <h2 class="mt-4 font-['Manrope'] text-3xl font-extrabold leading-tight tracking-[-0.05em] sm:text-4xl">
                            Satu tindakan kecil.
                            <span class="text-[#e4bc73]">Satu cerita yang kembali.</span>
                        </h2>

                        <p class="mt-4 max-w-lg text-sm leading-7 text-slate-300">
                            Mari ciptakan lingkungan kampus yang lebih peduli dengan membantu barang menemukan pemiliknya.
                        </p>
                    </div>

                    <a href="{{ route('user.reports.create') }}"
                       class="group inline-flex min-h-[54px] shrink-0 items-center justify-center gap-3 bg-[#d5a34a] px-7 text-sm font-extrabold text-[#142b47] transition duration-200 hover:bg-[#edc77f]">

                        Mulai Buat Laporan

                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </a>

                </div>

            </div>
        </section>

    </div>

</x-app-layout>
