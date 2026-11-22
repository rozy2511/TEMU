
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User | TEMU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f5f7fa] text-slate-800 antialiased">

    <nav class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 sm:px-8">

            <a href="{{ route('user.dashboard') }}" class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f] text-lg font-bold text-white">
                    T
                </div>
                <div>
                    <h1 class="text-lg font-bold tracking-[0.12em] text-[#172f4f]">TEMU</h1>
                    <p class="text-[10px] tracking-wider text-slate-400">LOST & FOUND</p>
                </div>
            </a>

            <div class="flex items-center gap-3">
                <div class="hidden text-right sm:block">
                    <p class="text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-400">Pengguna</p>
                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#e8edf3] font-semibold text-[#172f4f]">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-slate-50">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8 sm:py-10">

        {{-- Welcome Section --}}
        <section class="mb-8">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-center">

                <div>
                    <p class="mb-2 text-sm font-semibold tracking-wide text-[#496783]">
                        BERANDA
                    </p>

                    <h2 class="text-2xl font-bold tracking-tight text-[#172f4f] sm:text-3xl">
                        Halo, {{ Auth::user()->name }}!
                    </h2>

                    <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                        Kehilangan atau menemukan barang? TEMU membantu menghubungkan
                        barang dengan pemiliknya melalui laporan yang terorganisir.
                    </p>
                </div>

                <a href="{{ route('user.reports.create') }}"
                   class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                    </svg>
                    Buat Laporan
                </a>

            </div>
        </section>

        {{-- Quick Actions --}}
        <section class="mb-8 grid grid-cols-1 gap-5 md:grid-cols-2">

            <a href="{{ route('user.reports.create') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-6 transition hover:border-[#a7b8c9] hover:shadow-sm sm:p-7">

                <div class="flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#edf2f7] text-[#172f4f]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14m7-7H5"/>
                        </svg>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300 transition group-hover:text-[#172f4f]" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M7 7h10v10"/>
                    </svg>
                </div>

                <h3 class="mt-5 text-lg font-bold text-[#172f4f]">
                    Laporkan Barang
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Buat laporan barang hilang atau ditemukan agar dapat dilihat oleh pengguna lainnya.
                </p>

                <p class="mt-5 text-sm font-semibold text-[#496783] group-hover:text-[#172f4f]">
                    Mulai membuat laporan →
                </p>
            </a>

            <a href="{{ route('user.reports.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-6 transition hover:border-[#a7b8c9] hover:shadow-sm sm:p-7">

                <div class="flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                        </svg>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300 transition group-hover:text-[#172f4f]" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17 17 7M7 7h10v10"/>
                    </svg>
                </div>

                <h3 class="mt-5 text-lg font-bold text-[#172f4f]">
                    Laporan Saya
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-500">
                    Pantau status laporan barang yang telah kamu buat dan lihat perkembangannya.
                </p>

                <p class="mt-5 text-sm font-semibold text-[#496783] group-hover:text-[#172f4f]">
                    Lihat laporan saya →
                </p>
            </a>

        </section>

        {{-- Information Section --}}
        <section class="relative overflow-hidden rounded-2xl bg-[#172f4f] p-6 sm:p-8">

            <div class="relative z-10 max-w-3xl">

                <div class="mb-4 inline-flex items-center rounded-lg border border-white/15 bg-white/10 px-3 py-1.5 text-xs font-medium text-blue-100">
                    Tentang TEMU
                </div>

                <h3 class="text-xl font-bold text-white sm:text-2xl">
                    Barang hilang bisa ditemukan kembali.
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-300">
                    TEMU merupakan platform Lost & Found yang membantu civitas akademika
                    melaporkan, mencari, dan mengembalikan barang hilang secara lebih mudah
                    dan terorganisir. Melalui informasi yang dibagikan, setiap orang dapat
                    berkontribusi membantu menemukan pemilik barang.
                </p>

            </div>

            <div class="pointer-events-none absolute -right-16 -top-16 h-64 w-64 rounded-full border border-white/10"></div>
            <div class="pointer-events-none absolute -right-8 -top-8 h-40 w-40 rounded-full border border-white/10"></div>

        </section>

    </main>

    <footer class="mt-10 border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <p class="text-xs font-semibold tracking-wider text-[#172f4f]">
                TEMU <span class="font-normal text-slate-400">| LOST & FOUND</span>
            </p>
            <p class="text-xs text-slate-400">
                Menghubungkan barang yang hilang dengan pemiliknya.
            </p>
        </div>
    </footer>

</body>
</html>
