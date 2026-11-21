
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

<body class="min-h-screen bg-slate-50 font-sans antialiased text-slate-800">

    <main class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden px-4 py-10 sm:px-6">

        <div class="pointer-events-none absolute -left-32 -top-32 h-80 w-80 rounded-full bg-slate-200/60 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -right-32 h-80 w-80 rounded-full bg-blue-100/60 blur-3xl"></div>

        <div class="relative z-10 w-full max-w-md">

            <a href="{{ url('/') }}" class="mb-8 flex flex-col items-center">
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#172f4f] shadow-lg shadow-slate-900/10">
                    <span class="text-2xl font-bold text-white">T</span>
                </div>

                <span class="mt-3 text-2xl font-extrabold tracking-wider text-slate-900">
                    TEMU
                </span>

                <span class="mt-1 text-xs font-medium uppercase tracking-[0.25em] text-slate-500">
                    Lost & Found Platform
                </span>
            </a>

            <div class="w-full rounded-2xl border border-slate-200/80 bg-white px-6 py-8 shadow-xl shadow-slate-900/[0.04] sm:px-8 sm:py-9">
                {{ $slot }}
            </div>

            <p class="mt-8 text-center text-xs text-slate-400">
                &copy; {{ date('Y') }} TEMU. All rights reserved.
            </p>

        </div>

    </main>

</body>
</html>
