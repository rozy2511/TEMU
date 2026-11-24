
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User | TEMU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .aurora-dashboard {
            background:
                radial-gradient(ellipse at 0% 0%, rgba(98, 231, 208, .13), transparent 40%),
                radial-gradient(ellipse at 100% 10%, rgba(142, 133, 255, .14), transparent 38%),
                radial-gradient(ellipse at 55% 100%, rgba(139, 207, 255, .10), transparent 45%),
                #f6f7fb;
        }

        .aurora-hero {
            background: linear-gradient(120deg, #142b49 0%, #203e68 45%, #514d91 100%);
        }

        .aurora-orb {
            animation: orbFloat 9s ease-in-out infinite;
        }

        .aurora-orb-delay {
            animation: orbFloat 12s ease-in-out infinite reverse;
        }

        .aurora-reveal {
            animation: revealUp .65s ease both;
        }

        .aurora-reveal-delay {
            animation: revealUp .8s ease both;
            animation-delay: .12s;
        }

        .aurora-reveal-delay-2 {
            animation: revealUp .9s ease both;
            animation-delay: .22s;
        }

        .aurora-card {
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
        }

        .aurora-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 22px 45px rgba(35, 57, 90, .10);
        }

        .aurora-icon {
            transition: transform .3s ease;
        }

        .aurora-card:hover .aurora-icon {
            transform: scale(1.08) rotate(-4deg);
        }

        @keyframes orbFloat {
            0%, 100% { transform: translateY(0px) translateX(0px); }
            50% { transform: translateY(-18px) translateX(8px); }
        }

        @keyframes revealUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .aurora-orb,
            .aurora-orb-delay,
            .aurora-reveal,
            .aurora-reveal-delay,
            .aurora-reveal-delay-2 {
                animation: none !important;
            }

            .aurora-card,
            .aurora-icon {
                transition: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen text-slate-800 antialiased aurora-dashboard">

    {{-- NAVBAR --}}
    <nav class="sticky top-0 z-50 border-b border-white/70 bg-white/80 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8">

            <a href="{{ route('user.dashboard') }}" class="group flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#62e7d0] via-[#8bcfff] to-[#8e85ff] shadow-lg shadow-[#8e85ff]/20 transition group-hover:scale-105">
                    <span class="text-lg font-black text-[#142b49]">T</span>
                </div>

                <div>
                    <h1 class="text-lg font-extrabold tracking-[0.16em] text-[#142b49]">TEMU</h1>
                    <p class="text-[10px] font-semibold tracking-[0.18em] text-slate-400">LOST & FOUND</p>
                </div>
            </a>

            <div class="flex items-center gap-3 sm:gap-4">
                <div class="hidden text-right sm:block">
                    <p class="text-sm font-bold text-[#142b49]">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-400">Pengguna TEMU</p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-[#d4fff5] to-[#ddd8ff] font-bold text-[#142b49] ring-2 ring-white shadow-sm">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="rounded-xl border border-slate-200/80 bg-white/80 px-3.5 py-2 text-sm font-semibold text-slate-600 transition hover:border-rose-200 hover:bg-rose-50 hover:text-rose-600">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 sm:py-11">

        {{-- HERO --}}
        <section class="aurora-reveal relative mb-9 overflow-hidden rounded-[2rem] aurora-hero px-6 py-9 shadow-2xl shadow-[#142b49]/10 sm:px-10 sm:py-12 lg:px-12">

            {{-- Background effects --}}
            <div class="aurora-orb pointer-events-none absolute -right-24 -top-28 h-72 w-72 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
            <div class="aurora-orb-delay pointer-events-none absolute -bottom-32 right-1/3 h-80 w-80 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -right-8 top-10 h-64 w-64 rounded-full border border-white/10"></div>
            <div class="pointer-events-none absolute -right-1 top-16 h-48 w-48 rounded-full border border-white/10"></div>
            <div class="pointer-events-none absolute right-16 top-24 h-28 w-28 rounded-full border border-white/10"></div>

            <div class="relative z-10 flex flex-col justify-between gap-8 lg:flex-row lg:items-center">

                <div class="max-w-2xl">
                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3.5 py-2 backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0] shadow-[0_0_10px_rgba(98,231,208,0.8)]"></span>
                        <span class="text-xs font-semibold tracking-wide text-white/80">Campus Lost & Found Platform</span>
                    </div>

                    <p class="mb-3 text-sm font-medium tracking-wide text-[#a7f6e8]">
                        BERANDA PENGGUNA
                    </p>

                    <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-4xl lg:text-[2.7rem]">
                        Halo, {{ Auth::user()->name }}!
                    </h2>

                    <p class="mt-4 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                        Ada barang yang hilang atau kamu menemukan sesuatu?
                        Mulai langkah kecil untuk mempertemukan barang dengan pemiliknya melalui TEMU.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <a href="{{ route('user.reports.create') }}"
                           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#62e7d0] to-[#8bcfff] px-5 py-3 text-sm font-bold text-[#142b49] shadow-lg shadow-[#62e7d0]/10 transition hover:-translate-y-0.5 hover:shadow-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                            </svg>
                            Buat Laporan
                        </a>

                        <a href="{{ route('user.reports.index') }}"
                           class="inline-flex items-center gap-2 rounded-xl border border-white/20 bg-white/10 px-5 py-3 text-sm font-semibold text-white backdrop-blur-md transition hover:bg-white/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                            </svg>
                            Laporan Saya
                        </a>
                    </div>
                </div>

                {{-- Visual --}}
                <div class="hidden shrink-0 lg:block">
                    <div class="relative flex h-64 w-64 items-center justify-center">

                        <div class="absolute inset-5 rounded-full border border-white/10"></div>
                        <div class="absolute inset-10 rounded-full border border-white/10"></div>

                        <div class="absolute h-36 w-36 rounded-full bg-gradient-to-br from-[#62e7d0]/30 to-[#8e85ff]/40 blur-2xl"></div>

                        <div class="relative flex h-40 w-40 items-center justify-center rounded-[2.5rem] border border-white/20 bg-white/10 shadow-2xl backdrop-blur-xl">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-[#a7f6e8]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0Z"/>
                                <circle cx="12" cy="10" r="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                        <div class="absolute right-0 top-5 rounded-2xl border border-white/20 bg-white/10 px-4 py-3 shadow-lg backdrop-blur-xl">
                            <p class="text-xs font-medium text-white/70">Temukan</p>
                            <p class="text-sm font-bold text-[#a7f6e8]">Harapan baru</p>
                        </div>

                        <div class="absolute bottom-5 left-0 rounded-2xl border border-white/20 bg-white/10 px-4 py-3 shadow-lg backdrop-blur-xl">
                            <p class="text-xs font-medium text-white/70">Hubungkan</p>
                            <p class="text-sm font-bold text-[#d9d4ff]">Pemilik barang</p>
                        </div>

                    </div>
                </div>

            </div>
        </section>

        {{-- SECTION INTRO --}}
        <section class="aurora-reveal-delay mb-6">
            <div class="flex flex-col justify-between gap-2 sm:flex-row sm:items-end">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#7268c7]">
                        Mulai dari sini
                    </p>
                    <h3 class="mt-2 text-xl font-extrabold tracking-tight text-[#142b49] sm:text-2xl">
                        Apa yang ingin kamu lakukan?
                    </h3>
                </div>

                <p class="max-w-md text-sm leading-6 text-slate-500">
                    Pilih tindakan yang sesuai untuk membantu proses pencarian barang.
                </p>
            </div>
        </section>

        {{-- ACTION CARDS --}}
        <section class="aurora-reveal-delay-2 mb-9 grid grid-cols-1 gap-5 md:grid-cols-2">

            {{-- CREATE REPORT --}}
            <a href="{{ route('user.reports.create') }}"
               class="aurora-card group relative overflow-hidden rounded-[1.7rem] border border-white bg-white/80 p-6 shadow-sm backdrop-blur-xl sm:p-8">

                <div class="absolute -right-14 -top-14 h-40 w-40 rounded-full bg-[#62e7d0]/15 blur-2xl transition group-hover:bg-[#62e7d0]/25"></div>

                <div class="relative flex items-start justify-between">
                    <div class="aurora-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#d4fff5] to-[#c3eaff] text-[#142b49] shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                        </svg>
                    </div>

                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 text-slate-400 transition group-hover:bg-[#142b49] group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M7 7h10v10"/>
                        </svg>
                    </span>
                </div>

                <div class="relative mt-6">
                    <span class="inline-flex rounded-full bg-[#e5fbf6] px-3 py-1 text-xs font-semibold text-[#247d70]">
                        Kontribusi
                    </span>

                    <h4 class="mt-3 text-xl font-extrabold text-[#142b49]">
                        Laporkan Barang
                    </h4>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        Laporkan barang yang hilang atau ditemukan. Bagikan informasi agar dapat membantu proses pencarian.
                    </p>

                    <div class="mt-6 flex items-center gap-2 text-sm font-bold text-[#247d70] transition group-hover:gap-3">
                        Buat laporan baru
                        <span>→</span>
                    </div>
                </div>

                <div class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-[#62e7d0] to-[#8bcfff] transition-all duration-500 group-hover:w-full"></div>
            </a>

            {{-- MY REPORTS --}}
            <a href="{{ route('user.reports.index') }}"
               class="aurora-card group relative overflow-hidden rounded-[1.7rem] border border-white bg-white/80 p-6 shadow-sm backdrop-blur-xl sm:p-8">

                <div class="absolute -right-14 -top-14 h-40 w-40 rounded-full bg-[#8e85ff]/15 blur-2xl transition group-hover:bg-[#8e85ff]/25"></div>

                <div class="relative flex items-start justify-between">
                    <div class="aurora-icon flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4ddff] to-[#d4eaff] text-[#514d91] shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                        </svg>
                    </div>

                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-50 text-slate-400 transition group-hover:bg-[#514d91] group-hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M7 7h10v10"/>
                        </svg>
                    </span>
                </div>

                <div class="relative mt-6">
                    <span class="inline-flex rounded-full bg-[#eeebff] px-3 py-1 text-xs font-semibold text-[#6558b0]">
                        Pemantauan
                    </span>

                    <h4 class="mt-3 text-xl font-extrabold text-[#142b49]">
                        Laporan Saya
                    </h4>

                    <p class="mt-2 text-sm leading-7 text-slate-500">
                        Lihat laporan yang telah kamu buat, pantau perkembangan, dan periksa informasi laporanmu.
                    </p>

                    <div class="mt-6 flex items-center gap-2 text-sm font-bold text-[#6558b0] transition group-hover:gap-3">
                        Kelola laporan
                        <span>→</span>
                    </div>
                </div>

                <div class="absolute bottom-0 left-0 h-1 w-0 bg-gradient-to-r from-[#8e85ff] to-[#8bcfff] transition-all duration-500 group-hover:w-full"></div>
            </a>

        </section>

        {{-- HOW TEMU WORKS --}}
        <section class="aurora-reveal-delay-2 mb-9">

            <div class="mb-6">
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#247d70]">
                    Alur platform
                </p>
                <h3 class="mt-2 text-xl font-extrabold tracking-tight text-[#142b49] sm:text-2xl">
                    Bagaimana TEMU bekerja?
                </h3>
                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Proses sederhana untuk membantu barang yang hilang kembali kepada pemiliknya.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

                {{-- STEP 1 --}}
                <div class="rounded-2xl border border-white bg-white/75 p-5 shadow-sm backdrop-blur-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#d4fff5] text-[#247d70]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest text-slate-300">01</span>
                    </div>

                    <h4 class="mt-4 font-bold text-[#142b49]">Buat laporan</h4>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Laporkan barang hilang atau ditemukan beserta informasi yang relevan.
                    </p>
                </div>

                {{-- STEP 2 --}}
                <div class="rounded-2xl border border-white bg-white/75 p-5 shadow-sm backdrop-blur-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#dcefff] text-[#3875ae]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <circle cx="11" cy="11" r="7"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20 20-4-4"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest text-slate-300">02</span>
                    </div>

                    <h4 class="mt-4 font-bold text-[#142b49]">Cari kecocokan</h4>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Telusuri laporan dan temukan kemungkinan kecocokan barang.
                    </p>
                </div>

                {{-- STEP 3 --}}
                <div class="rounded-2xl border border-white bg-white/75 p-5 shadow-sm backdrop-blur-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#e7e1ff] text-[#6558b0]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest text-slate-300">03</span>
                    </div>

                    <h4 class="mt-4 font-bold text-[#142b49]">Ajukan klaim</h4>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Ajukan permintaan klaim dan ikuti proses verifikasi dengan penemu.
                    </p>
                </div>

                {{-- STEP 4 --}}
                <div class="rounded-2xl border border-white bg-white/75 p-5 shadow-sm backdrop-blur-xl">
                    <div class="flex items-center justify-between">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ffe7f1] text-[#b65d89]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <span class="text-xs font-bold tracking-widest text-slate-300">04</span>
                    </div>

                    <h4 class="mt-4 font-bold text-[#142b49]">Barang kembali</h4>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Konfirmasi serah terima agar proses pengembalian tercatat dengan baik.
                    </p>
                </div>

            </div>
        </section>

        {{-- ABOUT TEMU --}}
        <section class="aurora-reveal-delay-2 relative overflow-hidden rounded-[1.8rem] border border-white/10 bg-gradient-to-br from-[#142b49] via-[#203e68] to-[#514d91] p-6 shadow-xl shadow-[#142b49]/10 sm:p-8 lg:p-10">

            <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#8e85ff]/20 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-20 left-1/3 h-52 w-52 rounded-full bg-[#62e7d0]/15 blur-3xl"></div>

            <div class="relative z-10 flex flex-col gap-8 lg:flex-row lg:items-center lg:justify-between">

                <div class="max-w-3xl">
                    <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3.5 py-2 text-xs font-semibold text-[#d9d4ff] backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#8e85ff]"></span>
                        Mengenal TEMU
                    </div>

                    <h3 class="text-2xl font-extrabold leading-tight text-white sm:text-3xl">
                        Satu langkah kecil.
                        <span class="bg-gradient-to-r from-[#62e7d0] via-[#8bcfff] to-[#d9d4ff] bg-clip-text text-transparent">
                            Dampak besar.
                        </span>
                    </h3>

                    <p class="mt-4 text-sm leading-7 text-slate-300 sm:text-base">
                        TEMU merupakan platform Lost & Found yang dirancang untuk membantu civitas akademika dalam melaporkan, mencari, dan mengembalikan barang yang hilang secara lebih mudah dan terorganisir. Melalui kolaborasi dan informasi yang terhubung, TEMU mendorong lingkungan kampus yang lebih peduli.
                    </p>
                </div>

                <div class="relative flex shrink-0 items-center justify-center">
                    <div class="flex h-36 w-36 items-center justify-center rounded-full border border-white/15 bg-white/5 backdrop-blur-xl sm:h-44 sm:w-44">
                        <div class="flex h-24 w-24 items-center justify-center rounded-full bg-gradient-to-br from-[#62e7d0]/20 to-[#8e85ff]/30 shadow-[0_0_40px_rgba(98,231,208,0.15)] sm:h-32 sm:w-32">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-[#a7f6e8] sm:h-16 sm:w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.3">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 1 1 18 0Z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </main>

    {{-- FOOTER --}}
    <footer class="mt-10 border-t border-white/70 bg-white/60 backdrop-blur-xl">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-5 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-8">

            <div>
                <p class="text-xs font-extrabold tracking-[0.16em] text-[#142b49]">
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

</body>
</html>
