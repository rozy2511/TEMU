
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'TEMU - Lost & Found')</title>

    <meta name="description" content="TEMU adalah platform Lost & Found untuk membantu menemukan dan mengembalikan barang yang hilang di lingkungan kampus.">
    <meta name="theme-color" content="#172f4f">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="min-h-screen flex flex-col bg-slate-50 font-sans antialiased text-slate-800">

    @include('layouts.navigation')

    <main class="flex-1 w-full">

        @isset($header)
            <div class="border-b border-slate-200 bg-white">
                <div class="mx-auto max-w-7xl px-4 py-5 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </div>
        @endisset

        {{ $slot ?? '' }}

        @yield('content')

    </main>

    <footer class="mt-auto border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">

                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-2"
                   aria-label="TEMU - Kembali ke dashboard">

                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#172f4f]">
                        <span class="text-sm font-bold text-white">T</span>
                    </div>

                    <span class="text-sm font-bold tracking-wide text-slate-800">
                        TEMU
                    </span>
                </a>

                <p class="text-center text-xs text-slate-500">
                    Platform Lost & Found Lingkungan Kampus
                </p>

                <p class="text-xs text-slate-400">
                    &copy; {{ date('Y') }} TEMU
                </p>

            </div>

        </div>
    </footer>

    @stack('scripts')

</body>
</html>
