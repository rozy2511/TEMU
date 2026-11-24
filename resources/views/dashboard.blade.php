
<x-app-layout>
    <div class="min-h-screen overflow-hidden bg-[#f6f7fb] text-[#142b49]">

        {{-- HERO --}}
        <section class="relative isolate overflow-hidden bg-[#102640] text-white">
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -right-40 -top-48 h-[650px] w-[650px] rounded-full bg-[#8e85ff]/20 blur-[100px]"></div>
                <div class="absolute -bottom-48 left-1/4 h-[500px] w-[500px] rounded-full bg-[#62e7d0]/10 blur-[100px]"></div>
                <div class="absolute inset-0 opacity-[0.035]"
                     style="background-image: linear-gradient(rgba(255,255,255,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.5) 1px, transparent 1px); background-size: 48px 48px;">
                </div>
            </div>

            <div class="relative mx-auto max-w-7xl px-5 pb-16 pt-14 sm:px-8 sm:pb-20 sm:pt-20 lg:px-10 lg:pb-24">
                <div class="grid items-center gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:gap-16">

                    {{-- HERO CONTENT --}}
                    <div class="relative z-10">
                        <div class="mb-8 inline-flex items-center gap-3 rounded-full border border-white/15 bg-white/[0.06] px-4 py-2 backdrop-blur-xl">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#62e7d0] opacity-50"></span>
                                <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-[#62e7d0]"></span>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/75">
                                Campus Lost & Found Platform
                            </span>
                        </div>

                        <p class="mb-4 text-xs font-bold uppercase tracking-[0.3em] text-[#8eeede]">
                            Selamat datang di TEMU
                        </p>

                        <h1 class="font-['Manrope'] text-4xl font-extrabold leading-[1.12] tracking-[-0.055em] sm:text-5xl lg:text-[64px]">
                            Setiap barang
                            <br>
                            punya
                            <span class="bg-gradient-to-r from-[#62e7d0] via-[#8bcfff] to-[#b8aaff] bg-clip-text text-transparent">
                                cerita.
                            </span>
                        </h1>

                        <p class="mt-7 text-sm font-semibold text-white sm:text-base">
                            Selamat datang, {{ Auth::user()->name }}.
                        </p>

                        <p class="mt-3 max-w-xl text-sm leading-8 text-slate-300 sm:text-base">
                            Temukan kembali barang yang hilang, bantu orang lain menemukan miliknya, dan jadilah bagian dari komunitas kampus yang saling peduli melalui TEMU.
                        </p>

                        <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                            <a href="{{ route('user.reports.create') }}"
                               class="group inline-flex min-h-[54px] items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-[#62e7d0] to-[#8bcfff] px-7 text-sm font-extrabold text-[#102640] shadow-lg shadow-[#62e7d0]/15 transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#62e7d0]/20">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
                                </svg>
                                Laporkan Barang
                                <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                                </svg>
                            </a>

                            <a href="{{ route('user.reports.index') }}"
                               class="inline-flex min-h-[54px] items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/[0.06] px-7 text-sm font-bold text-white backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:border-white/40 hover:bg-white/[0.12]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                                </svg>
                                Laporan Saya
                            </a>
                        </div>

                        <div class="mt-11 grid max-w-xl grid-cols-2 gap-4 border-t border-white/10 pt-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-[#62e7d0]/20 bg-[#62e7d0]/10 text-[#8eeede]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 12l2 2 4-4"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-white">Proses terarah</p>
                                    <p class="mt-1 text-[10px] text-slate-400">Verifikasi lebih terstruktur</p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-[#b8aaff]/20 bg-[#8e85ff]/10 text-[#c2baff]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H2v-2a4 4 0 015-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-white">Saling membantu</p>
                                    <p class="mt-1 text-[10px] text-slate-400">Berawal dari komunitas</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- HERO VISUAL --}}
                    <div class="relative mx-auto w-full max-w-[460px] lg:ml-auto">
                        <div class="relative overflow-hidden rounded-[2rem] border border-white/15 bg-gradient-to-br from-[#25496b] via-[#1b3858] to-[#393c70] p-6 shadow-2xl shadow-black/20 sm:p-8">

                            <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#62e7d0]/15 blur-3xl"></div>
                            <div class="pointer-events-none absolute -bottom-24 -left-20 h-64 w-64 rounded-full bg-[#8e85ff]/20 blur-3xl"></div>

                            <div class="relative flex items-center justify-between">
                                <div>
                                    <p class="text-[9px] font-bold uppercase tracking-[0.25em] text-[#8eeede]">TEMU / 001</p>
                                    <p class="mt-2 text-sm font-bold text-white">Reconnect what matters.</p>
                                </div>
                                <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-white/15 bg-white/10 text-[#8eeede]">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="relative my-10 flex items-center justify-center">
                                <div class="absolute h-64 w-64 rounded-full border border-white/10"></div>
                                <div class="absolute h-52 w-52 rounded-full border border-white/10"></div>
                                <div class="absolute h-40 w-40 rounded-full border border-[#62e7d0]/20"></div>
                                <div class="absolute h-36 w-36 rounded-full bg-gradient-to-br from-[#62e7d0]/20 to-[#8e85ff]/30 blur-2xl"></div>

                                <div class="relative flex h-36 w-36 items-center justify-center rounded-[2rem] border border-white/20 bg-white/[0.09] shadow-2xl backdrop-blur-xl sm:h-40 sm:w-40">
                                    <svg class="h-20 w-20 text-[#8eeede] sm:h-24 sm:w-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3" d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1116 0z"/>
                                        <circle cx="12" cy="10" r="2.8" stroke-width="1.5"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="relative grid grid-cols-2 gap-3">
                                <div class="rounded-2xl border border-white/10 bg-white/[0.07] p-4 backdrop-blur-xl">
                                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#62e7d0]/15 text-[#8eeede]">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
                                        </svg>
                                    </div>
                                    <p class="mt-3 text-xs font-bold text-white">Laporkan</p>
                                    <p class="mt-1 text-[10px] leading-5 text-slate-400">Bagikan informasi barang</p>
                                </div>

                                <div class="rounded-2xl border border-white/10 bg-white/[0.07] p-4 backdrop-blur-xl">
                                    <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#b8aaff]/15 text-[#c2baff]">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20 20l-4-4m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                    <p class="mt-3 text-xs font-bold text-white">Temukan</p>
                                    <p class="mt-1 text-[10px] leading-5 text-slate-400">Periksa kemungkinan cocok</p>
                                </div>
                            </div>

                            <div class="relative mt-6 flex items-center justify-between border-t border-white/10 pt-5">
                                <p class="text-[10px] font-medium text-slate-400">One community. Many connections.</p>
                                <span class="h-2 w-2 rounded-full bg-[#62e7d0] shadow-[0_0_12px_rgba(98,231,208,.8)]"></span>
                            </div>
                        </div>

                        <div class="pointer-events-none absolute -bottom-4 -right-3 -z-0 h-28 w-28 rounded-full bg-[#8e85ff]/20 blur-3xl"></div>
                    </div>

                </div>
            </div>

            <div class="relative h-1 bg-gradient-to-r from-[#62e7d0] via-[#8bcfff] to-[#8e85ff]"></div>
        </section>


        {{-- QUICK NAVIGATION --}}
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
            <div class="mb-10 flex flex-col justify-between gap-5 md:flex-row md:items-end">
                <div>
                    <div class="flex items-center gap-3">
                        <span class="h-[2px] w-8 bg-[#62bfae]"></span>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-[#438f86]">
                            Your Space
                        </p>
                    </div>

                    <h2 class="mt-4 font-['Manrope'] text-3xl font-extrabold tracking-[-0.045em] text-[#142b49] sm:text-4xl">
                        Apa yang ingin kamu lakukan?
                    </h2>
                </div>

                <p class="max-w-md text-sm leading-7 text-slate-500">
                    Semua kebutuhan pelaporan, pencarian, dan pengelolaan klaim barang tersedia dalam satu tempat.
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">

                {{-- REPORT --}}
                <a href="{{ route('user.reports.create') }}"
                   class="group relative overflow-hidden rounded-[1.7rem] bg-gradient-to-br from-[#142b49] to-[#254d70] p-7 text-white shadow-lg shadow-[#142b49]/10 transition duration-300 hover:-translate-y-2 hover:shadow-2xl hover:shadow-[#142b49]/15">
                    <div class="pointer-events-none absolute -right-16 -top-16 h-52 w-52 rounded-full border border-white/10 transition-transform duration-500 group-hover:scale-125"></div>
                    <div class="pointer-events-none absolute -right-8 -top-8 h-36 w-36 rounded-full bg-[#62e7d0]/10 blur-2xl"></div>

                    <div class="relative flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#62e7d0]/20 bg-[#62e7d0]/10 text-[#8eeede]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
                            </svg>
                        </div>
                        <span class="font-['Manrope'] text-xs font-bold tracking-[0.2em] text-white/40">01</span>
                    </div>

                    <div class="relative mt-12">
                        <span class="inline-flex rounded-full border border-[#62e7d0]/20 bg-[#62e7d0]/10 px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#8eeede]">
                            Kontribusi
                        </span>
                        <h3 class="mt-4 font-['Manrope'] text-2xl font-extrabold tracking-tight">Buat Laporan</h3>
                        <p class="mt-3 max-w-xs text-sm leading-7 text-slate-300">
                            Bagikan informasi barang hilang atau barang yang berhasil kamu temukan.
                        </p>
                        <div class="mt-7 flex items-center gap-3 text-xs font-extrabold tracking-wider text-[#8eeede]">
                            BUAT LAPORAN
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-[#62e7d0] to-[#8bcfff] transition-all duration-500 group-hover:w-full"></div>
                </a>


                {{-- MY REPORTS --}}
                <a href="{{ route('user.reports.index') }}"
                   class="group relative overflow-hidden rounded-[1.7rem] border border-[#dce4ed] bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-[#8bcfff] hover:shadow-xl hover:shadow-[#315f91]/10">
                    <div class="pointer-events-none absolute -right-16 -top-16 h-52 w-52 rounded-full border border-[#142b49]/[0.06] transition-transform duration-500 group-hover:scale-125"></div>
                    <div class="pointer-events-none absolute -right-8 -top-8 h-36 w-36 rounded-full bg-[#8bcfff]/15 blur-2xl"></div>

                    <div class="relative flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#8bcfff]/30 bg-gradient-to-br from-[#e4f6ff] to-[#e7e4ff] text-[#4779aa]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                            </svg>
                        </div>
                        <span class="font-['Manrope'] text-xs font-bold tracking-[0.2em] text-slate-300">02</span>
                    </div>

                    <div class="relative mt-12">
                        <span class="inline-flex rounded-full bg-[#edf6ff] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#4779aa]">
                            Pemantauan
                        </span>
                        <h3 class="mt-4 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#142b49]">Laporan Saya</h3>
                        <p class="mt-3 max-w-xs text-sm leading-7 text-slate-500">
                            Kelola laporan yang sudah kamu buat dan pantau perkembangannya.
                        </p>
                        <div class="mt-7 flex items-center gap-3 text-xs font-extrabold tracking-wider text-[#4779aa]">
                            LIHAT LAPORAN
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-[#8bcfff] to-[#8e85ff] transition-all duration-500 group-hover:w-full"></div>
                </a>


                {{-- CLAIMS --}}
                <a href="{{ route('user.claims.my') }}"
                   class="group relative overflow-hidden rounded-[1.7rem] border border-[#dce4ed] bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-[#c5baff] hover:shadow-xl hover:shadow-[#6558b0]/10">
                    <div class="pointer-events-none absolute -right-16 -top-16 h-52 w-52 rounded-full border border-[#142b49]/[0.06] transition-transform duration-500 group-hover:scale-125"></div>
                    <div class="pointer-events-none absolute -right-8 -top-8 h-36 w-36 rounded-full bg-[#8e85ff]/15 blur-2xl"></div>

                    <div class="relative flex items-start justify-between">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#cfc7ff]/40 bg-gradient-to-br from-[#eeeaff] to-[#e4efff] text-[#6558b0]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                            </svg>
                        </div>
                        <span class="font-['Manrope'] text-xs font-bold tracking-[0.2em] text-slate-300">03</span>
                    </div>

                    <div class="relative mt-12">
                        <span class="inline-flex rounded-full bg-[#f0edff] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-[#6558b0]">
                            Verifikasi
                        </span>
                        <h3 class="mt-4 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#142b49]">Klaim Saya</h3>
                        <p class="mt-3 max-w-xs text-sm leading-7 text-slate-500">
                            Periksa pengajuan klaim dan ikuti proses konfirmasi pengembalian barang.
                        </p>
                        <div class="mt-7 flex items-center gap-3 text-xs font-extrabold tracking-wider text-[#6558b0]">
                            LIHAT KLAIM
                            <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-[#8e85ff] to-[#c5baff] transition-all duration-500 group-hover:w-full"></div>
                </a>

            </div>
        </section>


        {{-- PROCESS SECTION --}}
        <section class="relative overflow-hidden bg-gradient-to-br from-[#edf1f6] via-[#f2f0fa] to-[#eaf6f5]">
            <div class="pointer-events-none absolute -right-32 -top-32 h-96 w-96 rounded-full bg-[#8e85ff]/10 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-32 -left-32 h-96 w-96 rounded-full bg-[#62e7d0]/10 blur-3xl"></div>

            <div class="relative mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
                <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">

                    {{-- PROCESS INTRO --}}
                    <div>
                        <div class="flex items-center gap-3">
                            <span class="h-[2px] w-8 bg-[#62bfae]"></span>
                            <p class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-[#438f86]">
                                How TEMU Works
                            </p>
                        </div>

                        <h2 class="mt-5 font-['Manrope'] text-3xl font-extrabold leading-tight tracking-[-0.05em] text-[#142b49] sm:text-5xl">
                            Dari kehilangan menuju penemuan.
                        </h2>

                        <p class="mt-6 max-w-sm text-sm leading-8 text-slate-500">
                            TEMU membantu proses pencarian dan pengembalian barang melalui tahapan yang mudah dipahami dan terstruktur.
                        </p>

                        <div class="mt-8 inline-flex items-center gap-3 rounded-full border border-[#142b49]/10 bg-white/70 px-4 py-3 text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#315f91] shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-[#62bfae]"></span>
                            Find. Connect. Return.
                        </div>
                    </div>


                    {{-- PROCESS STEPS --}}
                    <div class="overflow-hidden rounded-[1.8rem] border border-white/80 bg-white/75 p-5 shadow-xl shadow-[#142b49]/[0.04] backdrop-blur-xl sm:p-8">

                        <div class="mb-3 flex items-center justify-between border-b border-[#142b49]/10 pb-5">
                            <div>
                                <p class="text-[9px] font-extrabold uppercase tracking-[0.2em] text-[#438f86]">Proses sederhana</p>
                                <h3 class="mt-2 font-['Manrope'] text-xl font-extrabold text-[#142b49] sm:text-2xl">
                                    Bagaimana TEMU bekerja?
                                </h3>
                            </div>
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#edf6ff] text-[#4779aa]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="divide-y divide-[#142b49]/10">

                            {{-- STEP 1 --}}
                            <div class="group flex gap-5 py-6 first:pt-5">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-[#62bfae]/20 bg-[#e5faf5] font-['Manrope'] text-sm font-extrabold text-[#368d80] transition duration-300 group-hover:scale-105 group-hover:bg-[#62e7d0]">
                                    01
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-['Manrope'] text-base font-extrabold text-[#142b49] sm:text-lg">
                                        Laporkan barang
                                    </h4>
                                    <p class="mt-2 text-sm leading-7 text-slate-500">
                                        Buat laporan kehilangan atau penemuan dengan foto, deskripsi, dan informasi lokasi yang relevan.
                                    </p>
                                </div>
                            </div>

                            {{-- STEP 2 --}}
                            <div class="group flex gap-5 py-6">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-[#8bcfff]/30 bg-[#eaf5ff] font-['Manrope'] text-sm font-extrabold text-[#4779aa] transition duration-300 group-hover:scale-105 group-hover:bg-[#8bcfff]">
                                    02
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-['Manrope'] text-base font-extrabold text-[#142b49] sm:text-lg">
                                        Temukan dan ajukan klaim
                                    </h4>
                                    <p class="mt-2 text-sm leading-7 text-slate-500">
                                        Periksa informasi barang dan ajukan klaim apabila kamu merasa barang tersebut adalah milikmu.
                                    </p>
                                </div>
                            </div>

                            {{-- STEP 3 --}}
                            <div class="group flex gap-5 py-6 last:pb-2">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-[#b8aaff]/30 bg-[#f0edff] font-['Manrope'] text-sm font-extrabold text-[#6558b0] transition duration-300 group-hover:scale-105 group-hover:bg-[#c5baff]">
                                    03
                                </div>
                                <div class="min-w-0 flex-1">
                                    <h4 class="font-['Manrope'] text-base font-extrabold text-[#142b49] sm:text-lg">
                                        Konfirmasi pengembalian
                                    </h4>
                                    <p class="mt-2 text-sm leading-7 text-slate-500">
                                        Setelah proses serah terima dilakukan, kedua pihak memberikan konfirmasi agar pengembalian tercatat dengan baik.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        {{-- CLOSING CTA --}}
        <section class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:px-10 lg:py-20">
            <div class="relative isolate overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#142b49] via-[#203e68] to-[#514d91] px-7 py-12 text-white shadow-2xl shadow-[#142b49]/10 sm:px-12 sm:py-14">

                <div class="pointer-events-none absolute -right-24 -top-32 h-80 w-80 rounded-full border border-white/10"></div>
                <div class="pointer-events-none absolute -right-10 -top-20 h-56 w-56 rounded-full border border-white/10"></div>
                <div class="pointer-events-none absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/10 blur-3xl"></div>

                <div class="relative flex flex-col gap-8 md:flex-row md:items-center md:justify-between">
                    <div class="max-w-2xl">
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.3em] text-[#8eeede]">
                            Make a Difference
                        </p>

                        <h2 class="mt-4 font-['Manrope'] text-3xl font-extrabold leading-tight tracking-[-0.05em] sm:text-4xl">
                            Satu tindakan kecil.
                            <span class="bg-gradient-to-r from-[#62e7d0] via-[#8bcfff] to-[#d9d4ff] bg-clip-text text-transparent">
                                Satu cerita yang kembali.
                            </span>
                        </h2>

                        <p class="mt-4 max-w-lg text-sm leading-7 text-slate-300">
                            Mari ciptakan lingkungan kampus yang lebih peduli dengan membantu barang menemukan pemiliknya.
                        </p>
                    </div>

                    <a href="{{ route('user.reports.create') }}"
                       class="group inline-flex min-h-[54px] shrink-0 items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-[#62e7d0] to-[#8bcfff] px-7 text-sm font-extrabold text-[#142b49] shadow-lg shadow-[#62e7d0]/10 transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        Mulai Buat Laporan
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>


        {{-- FOOTER --}}
        <footer class="border-t border-[#142b49]/[0.07] bg-white">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-5 py-7 sm:flex-row sm:items-center sm:justify-between sm:px-8 lg:px-10">
                <div>
                    <p class="font-['Manrope'] text-sm font-extrabold tracking-[0.18em] text-[#142b49]">
                        TEMU <span class="font-medium tracking-normal text-slate-400">| LOST & FOUND</span>
                    </p>
                    <p class="mt-1 text-xs text-slate-400">
                        Menghubungkan barang yang hilang dengan pemiliknya.
                    </p>
                </div>

                <p class="text-xs text-slate-400">
                    Platform pencarian dan pengembalian barang.
                </p>
            </div>
        </footer>

    </div>
</x-app-layout>
