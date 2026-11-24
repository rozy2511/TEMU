
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TEMU — Lost & Found')</title>

    <meta name="description" content="TEMU adalah platform Lost & Found untuk membantu menemukan dan mengembalikan barang yang hilang di lingkungan kampus.">
    <meta name="theme-color" content="#142b49">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --temu-navy: #142b49;
            --temu-navy-deep: #0c1d33;
            --temu-blue: #467cb5;
            --temu-cyan: #8bcfff;
            --temu-mint: #62e7d0;
            --temu-purple: #8e85ff;
            --temu-rose: #f4b6d2;
            --temu-gold: #e8c17b;

            --temu-bg: #f6f7fb;
            --temu-surface: #ffffff;
            --temu-ink: #1e293b;
            --temu-muted: #718096;
            --temu-border: rgba(20, 43, 73, 0.09);

            --temu-gradient:
                linear-gradient(
                    120deg,
                    #62e7d0 0%,
                    #8bcfff 35%,
                    #8e85ff 70%,
                    #f4b6d2 100%
                );

            --temu-gradient-dark:
                linear-gradient(
                    135deg,
                    #142b49 0%,
                    #244e73 45%,
                    #365b94 100%
                );

            --temu-shadow:
                0 8px 24px rgba(20, 43, 73, 0.05);

            --temu-shadow-hover:
                0 12px 30px rgba(20, 43, 73, 0.09);
        }

        /* ==============================
           BASE
        ============================== */

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 100px;
        }

        body {
            position: relative;
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            color: var(--temu-ink);
            background: var(--temu-bg);
            -webkit-font-smoothing: antialiased;
            text-rendering: optimizeLegibility;
        }

        body,
        button,
        input,
        select,
        textarea {
            font-family: 'DM Sans', sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Manrope', sans-serif;
            letter-spacing: -0.035em;
        }

        ::selection {
            color: var(--temu-navy-deep);
            background: var(--temu-mint);
        }

        a, button {
            -webkit-tap-highlight-color: transparent;
        }

        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: 3px solid rgba(98, 231, 208, 0.65);
            outline-offset: 3px;
        }

        /* ==============================
           GLOBAL PAGE
        ============================== */

        .temu-page {
            position: relative;
            width: 100%;
            min-height: 100%;
            isolation: isolate;
        }

        /* ==============================
           AURORA BACKGROUND
        ============================== */

        .temu-aurora {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            background: var(--temu-gradient-dark);
        }

        .temu-aurora::before,
        .temu-aurora::after {
            content: "";
            position: absolute;
            z-index: -1;
            pointer-events: none;
            border-radius: 50%;
            opacity: 0.30;
        }

        .temu-aurora::before {
            width: 360px;
            height: 360px;
            top: -150px;
            right: -100px;
            background: radial-gradient(
                circle,
                rgba(98, 231, 208, 0.5),
                transparent 70%
            );
        }

        .temu-aurora::after {
            width: 340px;
            height: 340px;
            bottom: -160px;
            left: -100px;
            background: radial-gradient(
                circle,
                rgba(142, 133, 255, 0.5),
                transparent 70%
            );
        }

        .temu-aurora-light {
            position: absolute;
            width: 280px;
            height: 280px;
            top: 35%;
            left: 45%;
            border-radius: 50%;
            background: radial-gradient(
                circle,
                rgba(139, 207, 255, 0.35),
                transparent 70%
            );
            opacity: 0.15;
            pointer-events: none;
        }

        /* ==============================
           GRADIENT TEXT
        ============================== */

        .temu-gradient-text {
            background-image: var(--temu-gradient);
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
        }

        /* ==============================
           GLASS
        ============================== */

        .temu-glass {
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(255, 255, 255, 0.65);
            box-shadow: var(--temu-shadow);
        }

        .temu-glass-dark {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.14);
        }

        /* ==============================
           CARDS
        ============================== */

        .temu-card {
            position: relative;
            background: var(--temu-surface);
            border: 1px solid var(--temu-border);
            border-radius: 24px;
            box-shadow: var(--temu-shadow);
        }

        @media (hover: hover) and (pointer: fine) {
            .temu-card {
                transition:
                    transform 180ms ease,
                    box-shadow 180ms ease,
                    border-color 180ms ease;
            }

            .temu-card:hover {
                transform: translateY(-2px);
                box-shadow: var(--temu-shadow-hover);
                border-color: rgba(98, 231, 208, 0.35);
            }
        }

        /* ==============================
           BUTTON EFFECT
        ============================== */

        .temu-interactive {
            transition:
                opacity 150ms ease,
                background-color 150ms ease;
        }

        @media (hover: hover) and (pointer: fine) {
            .temu-interactive {
                transition:
                    transform 150ms ease,
                    opacity 150ms ease,
                    background-color 150ms ease;
            }

            .temu-interactive:hover {
                transform: translateY(-1px);
            }
        }

        .temu-interactive:active {
            opacity: 0.85;
        }

        /* ==============================
           IMAGE
        ============================== */

        .temu-image-hover {
            overflow: hidden;
        }

        @media (hover: hover) and (pointer: fine) {
            .temu-image-hover img {
                transition: transform 250ms ease;
            }

            .temu-image-hover:hover img {
                transform: scale(1.025);
            }
        }

        /* ==============================
           GRADIENT BORDER
        ============================== */

        .temu-gradient-border {
            position: relative;
            border: 1px solid transparent;
            background:
                linear-gradient(
                    white,
                    white
                ) padding-box,
                var(--temu-gradient) border-box;
        }

        /* ==============================
           ANIMATION
        ============================== */

        @keyframes temu-fade-up {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .temu-fade-up {
            animation: temu-fade-up 350ms ease both;
        }

        .temu-fade-up-delay-1 {
            animation-delay: 80ms;
        }

        .temu-fade-up-delay-2 {
            animation-delay: 160ms;
        }

        .temu-fade-up-delay-3 {
            animation-delay: 240ms;
        }

        .temu-glow {
            animation: none;
        }

        /* ==============================
           SCROLLBAR
        ============================== */

        * {
            scrollbar-width: thin;
            scrollbar-color: rgba(20, 43, 73, 0.22) transparent;
        }

        *::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        *::-webkit-scrollbar-track {
            background: transparent;
        }

        *::-webkit-scrollbar-thumb {
            background: rgba(20, 43, 73, 0.18);
            border-radius: 999px;
        }

        *::-webkit-scrollbar-thumb:hover {
            background: rgba(98, 231, 208, 0.7);
        }

        /* ==============================
           FOOTER
        ============================== */

        .temu-footer {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            background: var(--temu-navy-deep);
            color: #fff;
        }

        .temu-footer-link {
            transition: color 150ms ease;
        }

        .temu-footer-link:hover {
            color: var(--temu-mint);
        }

        .temu-footer-logo {
            position: relative;
            overflow: hidden;
            border-radius: 16px;
            background: linear-gradient(
                135deg,
                rgba(98, 231, 208, 0.2),
                rgba(142, 133, 255, 0.25)
            );
            border: 1px solid rgba(255, 255, 255, 0.14);
        }

        @media (hover: hover) and (pointer: fine) {
            .temu-footer-logo {
                transition: transform 180ms ease;
            }

            .temu-footer-logo:hover {
                transform: translateY(-2px);
            }
        }

        /* ==============================
           HEADER SLOT
        ============================== */

        .temu-header-shell {
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid var(--temu-border);
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 640px) {
            .temu-aurora::before {
                width: 240px;
                height: 240px;
            }

            .temu-aurora::after {
                width: 220px;
                height: 220px;
            }

            .temu-card {
                border-radius: 20px;
            }
        }

        /* ==============================
           ACCESSIBILITY
        ============================== */

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
            <section class="temu-header-shell relative z-10">
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

            <div class="grid gap-9 py-12 sm:grid-cols-2 sm:items-center lg:grid-cols-[1fr_1.5fr_1fr]">

                <a href="{{ route('dashboard') }}"
                   class="group inline-flex w-fit items-center gap-3"
                   aria-label="TEMU - Kembali ke dashboard">

                    <div class="temu-footer-logo flex h-12 w-12 items-center justify-center">
                        <span class="font-['Manrope'] text-2xl font-extrabold tracking-tight text-white">
                            T.
                        </span>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-['Manrope'] text-lg font-extrabold tracking-[0.13em] text-white">
                            TEMU
                        </span>

                        <span class="mt-0.5 text-[9px] font-semibold tracking-[0.25em] text-[#62e7d0]">
                            LOST & FOUND
                        </span>
                    </div>

                </a>

                <div class="max-w-md">
                    <p class="font-['Manrope'] text-lg font-semibold leading-snug tracking-tight text-white sm:text-center">
                        Setiap barang memiliki cerita.
                        <span class="temu-gradient-text">
                            Bantu temukan kembali.
                        </span>
                    </p>

                    <p class="mt-3 text-sm leading-relaxed text-slate-300 sm:text-center">
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

            <div class="flex flex-col gap-2 border-t border-white/10 py-5 text-[11px] text-slate-400 sm:flex-row sm:items-center sm:justify-between">
                <span>Lost something? Start here.</span>
                <span>Platform Lost & Found Kampus</span>
            </div>

        </div>

    </footer>

    @stack('scripts')

</body>
</html>
