
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TEMU — Lost & Found')</title>

    <meta name="description" content="TEMU adalah platform Lost & Found untuk membantu menemukan dan mengembalikan barang yang hilang di lingkungan kampus.">
    <meta name="theme-color" content="#172f4f">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --temu-navy: #172f4f;
            --temu-blue: #315f91;
            --temu-ivory: #f5f3ed;
            --temu-amber: #d5a34a;
            --temu-ink: #202a35;
            --temu-muted: #718096;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--temu-ink);
            background: var(--temu-ivory);
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Manrope', sans-serif;
            letter-spacing: -0.035em;
        }

        ::selection {
            color: #fff;
            background: var(--temu-blue);
        }

        a, button {
            -webkit-tap-highlight-color: transparent;
        }

        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: 3px solid rgba(49, 95, 145, 0.35);
            outline-offset: 3px;
        }

        .temu-page {
            width: 100%;
            min-height: 100%;
        }

        .temu-footer {
            background: var(--temu-navy);
            color: #fff;
        }

        .temu-footer-link {
            transition: color 180ms ease;
        }

        .temu-footer-link:hover {
            color: var(--temu-amber);
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="min-h-screen flex flex-col antialiased">

    @include('layouts.navigation')

    <main class="temu-page relative flex-1 w-full">

        @isset($header)
            <section class="border-b border-[#172f4f]/10 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </section>
        @endisset

        {{ $slot ?? '' }}

        @yield('content')

    </main>

    <footer class="temu-footer mt-auto">
        <div class="mx-auto max-w-7xl px-5 sm:px-6 lg:px-8">

            <div class="grid gap-9 py-10 sm:grid-cols-2 sm:items-center lg:grid-cols-[1fr_1.5fr_1fr]">

                <a href="{{ route('dashboard') }}"
                   class="group inline-flex w-fit items-center gap-3"
                   aria-label="TEMU - Kembali ke dashboard">

                    <div class="flex h-12 w-12 items-center justify-center border border-white/20 bg-white/10 transition-colors duration-200 group-hover:bg-white/20">
                        <span class="font-['Manrope'] text-2xl font-extrabold tracking-tight text-white">T.</span>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-['Manrope'] text-lg font-extrabold tracking-[0.13em] text-white">
                            TEMU
                        </span>
                        <span class="mt-0.5 text-[9px] font-semibold tracking-[0.25em] text-[#d5a34a]">
                            LOST & FOUND
                        </span>
                    </div>

                </a>

                <div class="max-w-md">
                    <p class="font-['Manrope'] text-lg font-semibold leading-snug tracking-tight text-white sm:text-center">
                        Setiap barang memiliki cerita.
                        <span class="text-[#d5a34a]">Bantu temukan kembali.</span>
                    </p>
                    <p class="mt-2 text-sm leading-relaxed text-slate-300 sm:text-center">
                        Menghubungkan barang yang hilang dengan pemiliknya melalui komunitas kampus.
                    </p>
                </div>

                <div class="sm:col-span-2 lg:col-span-1 lg:text-right">
                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">
                        Built with purpose
                    </p>
                    <p class="mt-2 text-xs text-slate-300">
                        &copy; {{ date('Y') }} TEMU. All rights reserved.
                    </p>
                </div>

            </div>

            <div class="flex flex-col gap-2 border-t border-white/10 py-4 text-[11px] text-slate-400 sm:flex-row sm:items-center sm:justify-between">
                <span>Lost something? Start here.</span>
                <span>Platform Lost & Found Kampus</span>
            </div>

        </div>
    </footer>

    @stack('scripts')

</body>
</html>
