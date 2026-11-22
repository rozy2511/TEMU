
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Autentikasi - TEMU')</title>

    <meta name="description" content="Masuk atau daftar akun TEMU, platform Lost & Found lingkungan kampus.">
    <meta name="theme-color" content="#172f4f">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-100 font-sans antialiased text-slate-800">

    <main class="relative flex min-h-screen items-center justify-center overflow-hidden p-3 sm:p-6">

        <div class="pointer-events-none absolute -left-32 -top-32 h-80 w-80 rounded-full bg-blue-100/70 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -right-32 h-80 w-80 rounded-full bg-slate-300/60 blur-3xl"></div>

        <div class="relative z-10 grid w-full max-w-5xl overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-2xl shadow-slate-900/10 md:min-h-[600px] md:grid-cols-2">

            <section class="relative flex flex-col justify-between overflow-hidden bg-[#172f4f] px-6 py-6 text-white sm:px-10 sm:py-9 md:px-10 md:py-10">

                <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full border border-white/10"></div>
                <div class="pointer-events-none absolute -right-10 -top-10 h-44 w-44 rounded-full border border-white/10"></div>
                <div class="pointer-events-none absolute -bottom-24 -left-20 h-64 w-64 rounded-full bg-white/[0.04]"></div>

                <div class="relative z-10">
                    <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/15 bg-white/10">
                            <span class="text-2xl font-extrabold">T</span>
                        </div>

                        <div>
                            <h1 class="text-xl font-extrabold tracking-[0.15em]">TEMU</h1>
                            <p class="text-[10px] font-medium uppercase tracking-[0.2em] text-blue-100/70">
                                Lost & Found Platform
                            </p>
                        </div>
                    </a>
                </div>

                <div class="relative z-10 my-7 md:my-0">
                    <div class="mb-6 hidden items-center justify-center md:flex">
                        <div class="relative flex h-56 w-56 items-center justify-center rounded-full border border-white/15 bg-white/[0.04]">
                            <div class="absolute h-40 w-40 rounded-full border border-white/15"></div>
                            <div class="absolute h-28 w-28 rounded-full border border-white/15"></div>

                            <div class="relative flex h-24 w-24 items-center justify-center rounded-3xl border border-white/20 bg-white/10 shadow-xl shadow-slate-950/10">
                                <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4 5.5A2.5 2.5 0 016.5 3H20v16H6.5A2.5 2.5 0 014 16.5v-11zM4 16h16M8 7h8M8 10h6"/>
                                </svg>
                            </div>

                            <div class="absolute right-5 top-8 flex h-10 w-10 items-center justify-center rounded-xl bg-white text-[#172f4f] shadow-lg">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 12l4 4L19 6"/>
                                </svg>
                            </div>

                            <div class="absolute bottom-8 left-3 flex h-10 w-10 items-center justify-center rounded-xl border border-white/20 bg-white/10">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                          d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.2em] text-blue-200">
                        Temukan. Hubungkan. Kembalikan.
                    </p>

                    <h2 class="max-w-md text-2xl font-bold leading-tight sm:text-3xl md:text-4xl">
                        Barang yang hilang, kesempatan untuk ditemukan kembali.
                    </h2>

                    <p class="mt-4 max-w-md text-sm leading-6 text-blue-100/75">
                        TEMU membantu civitas akademika melaporkan, mencari, dan mengembalikan barang yang hilang di lingkungan kampus.
                    </p>
                </div>

                <div class="relative z-10 hidden border-t border-white/15 pt-5 md:block">
                    <p class="text-xs text-blue-100/60">
                        &copy; {{ date('Y') }} TEMU. All rights reserved.
                    </p>
                </div>

                <div class="relative z-10 mt-1 md:hidden">
                    <p class="text-[10px] text-blue-100/60">
                        &copy; {{ date('Y') }} TEMU
                    </p>
                </div>

            </section>

            <section class="flex min-w-0 items-center justify-center px-5 py-7 sm:px-9 sm:py-9 md:px-10 lg:px-14">
                <div class="w-full max-w-md">
                    {{ $slot }}
                </div>
            </section>

        </div>

    </main>

</body>
</html>
