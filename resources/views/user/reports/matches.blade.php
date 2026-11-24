
@extends('layouts.app')

@section('title', 'Smart Matching | TEMU')

@section('content')
<main class="temu-container space-y-8 py-8 sm:py-10">

    {{-- HERO --}}
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-[#142b49] shadow-xl shadow-[#142b49]/10">
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-br from-[#142b49] via-[#193958] to-[#263b70]"></div>
        <div class="pointer-events-none absolute -right-20 -top-20 h-72 w-72 rounded-full bg-[#8e85ff]/10"></div>
        <div class="pointer-events-none absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/[0.07]"></div>
        <div class="pointer-events-none absolute inset-0 opacity-[0.04]" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 22px 22px;"></div>

        <div class="relative px-6 py-8 sm:px-9 sm:py-10 lg:px-12 lg:py-12">
            <a href="{{ route('user.reports.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-slate-300 transition hover:text-[#8debd8]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                </svg>
                Kembali ke Laporan Saya
            </a>

            <div class="mt-8 grid gap-8 lg:grid-cols-[1fr_auto] lg:items-center">
                <div class="max-w-2xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-[#62e7d0]/20 bg-[#62e7d0]/[0.08] px-3.5 py-2 text-[10px] font-bold uppercase tracking-[0.18em] text-[#9af3df]">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                        TEMU Match Intelligence
                    </div>

                    <h1 class="mt-6 text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                        Temukan kemungkinan
                        <span class="bg-gradient-to-r from-[#62e7d0] via-[#8bcfff] to-[#b6aaff] bg-clip-text text-transparent">barangmu kembali.</span>
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                        TEMU menganalisis laporan lain untuk menemukan barang yang memiliki kemiripan dengan laporanmu. Periksa kandidat yang tersedia dan lanjutkan proses verifikasi jika menemukan kecocokan.
                    </p>

                    <div class="mt-7 flex flex-wrap gap-3">
                        <div class="flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.05] px-3.5 py-2.5">
                            <svg class="h-4 w-4 text-[#8debd8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs font-medium text-slate-300">Analisis kemiripan</span>
                        </div>

                        <div class="flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.05] px-3.5 py-2.5">
                            <svg class="h-4 w-4 text-[#a9a0ff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs font-medium text-slate-300">Pencocokan otomatis</span>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <div class="w-64 rounded-2xl border border-white/10 bg-white/[0.05] p-6">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-[#62e7d0]/15 bg-[#62e7d0]/[0.08] text-[#8debd8]">
                            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                            </svg>
                        </div>

                        <p class="mt-5 text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">Intelligent discovery</p>
                        <h3 class="mt-2 text-xl font-bold text-white">Smart Matching</h3>
                        <p class="mt-2 text-sm leading-6 text-slate-400">
                            Menghubungkan laporan kehilangan dengan penemuan yang relevan.
                        </p>

                        <div class="mt-5 flex items-center gap-2">
                            <span class="h-1.5 flex-1 rounded-full bg-[#62e7d0]"></span>
                            <span class="h-1.5 flex-1 rounded-full bg-[#8bcfff]"></span>
                            <span class="h-1.5 flex-1 rounded-full bg-[#8e85ff]"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative flex items-center gap-3 border-t border-white/10 bg-white/[0.03] px-6 py-4 sm:px-9">
            <svg class="h-4 w-4 shrink-0 text-[#8debd8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
            </svg>
            <p class="text-xs leading-5 text-slate-300">
                Hasil pencocokan merupakan rekomendasi awal dan tetap memerlukan verifikasi kepemilikan.
            </p>
        </div>
    </section>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="m9 12 2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
            </svg>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-2xl border border-red-200 bg-red-50 p-5">
            <h3 class="text-sm font-bold text-red-800">Pengajuan belum dapat diproses</h3>
            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- LAPORAN ACUAN --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-sm">
        <div class="flex flex-col gap-3 border-b border-slate-100 px-6 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#142b49] text-[#8debd8]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#6b9eaa]">Reference report</p>
                    <h2 class="mt-1 text-lg font-bold text-[#142b49]">Laporan Acuan</h2>
                </div>
            </div>

            <span class="inline-flex w-fit items-center gap-2 rounded-xl border border-[#8e85ff]/15 bg-[#8e85ff]/[0.06] px-3 py-2 text-xs font-semibold text-[#7167d5]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Dasar pencocokan barang
            </span>
        </div>

        <div class="grid gap-6 p-5 sm:p-7 md:grid-cols-[240px_1fr] md:gap-8">
            <div class="relative h-56 overflow-hidden rounded-2xl bg-[#f0f4f8] md:h-full md:min-h-[220px]">
                @if ($report->photo)
                    <img
                        src="{{ asset('storage/' . $report->photo) }}"
                        alt="Foto {{ $report->item_name }}"
                        class="h-full w-full object-cover"
                    >
                @else
                    <div class="flex h-full flex-col items-center justify-center text-slate-400">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                        </svg>
                        <span class="mt-3 text-xs font-medium">Foto tidak tersedia</span>
                    </div>
                @endif

                <div class="absolute left-3 top-3">
                    <span class="rounded-lg px-3 py-1.5 text-[11px] font-bold text-white {{ $report->type === 'lost' ? 'bg-[#d65c68]' : 'bg-[#249d82]' }}">
                        {{ $report->type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                    </span>
                </div>
            </div>

            <div class="flex min-w-0 flex-col justify-center">
                <div class="flex flex-wrap gap-2">
                    <span class="rounded-lg bg-[#e8f8f5] px-3 py-1.5 text-xs font-semibold text-[#247e77]">
                        {{ $report->category }}
                    </span>
                    <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-medium text-slate-500">
                        ID Laporan #{{ $report->id }}
                    </span>
                </div>

                <h3 class="mt-4 text-2xl font-bold tracking-tight text-[#142b49] sm:text-3xl">
                    {{ $report->item_name }}
                </h3>

                <p class="mt-3 text-sm leading-7 text-slate-500">
                    {{ $report->description }}
                </p>

                <div class="mt-6 grid gap-4 border-t border-slate-100 pt-5 sm:grid-cols-2">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#e8f8f5] text-[#299b88]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400">Lokasi kejadian</p>
                            <p class="mt-1 break-words text-sm font-semibold text-slate-700">{{ $report->location }}</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#f0efff] text-[#8279e8]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400">Tanggal kejadian</p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">{{ $report->incident_date->format('d M Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- HASIL MATCH --}}
    <section>
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#6b9eaa]">
                    <span class="h-px w-7 bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                    Match discovery
                </div>

                <h2 class="mt-2 text-2xl font-bold tracking-tight text-[#142b49] sm:text-3xl">
                    Kandidat Kecocokan
                </h2>

                <p class="mt-2 max-w-xl text-sm leading-6 text-slate-500">
                    Periksa laporan berikut untuk menemukan kemungkinan barang yang kamu cari.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-[#62e7d0]/30 bg-[#62e7d0]/[0.08] px-4 py-3">
                <span class="h-2 w-2 rounded-full bg-[#35b99c]"></span>
                <span class="text-xs font-semibold text-[#287f72]">Hasil analisis tersedia</span>
            </div>
        </div>

        <div class="space-y-6">
            @forelse ($matches as $match)
                <article class="overflow-hidden rounded-[1.75rem] border border-slate-200 bg-white shadow-sm">

                    {{-- CARD HEADER --}}
                    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 px-5 py-4 sm:px-7">
                        <div class="flex items-center gap-3">
                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#e8f8f5] text-[#398e91]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-[#142b49]">Kandidat ditemukan</p>
                                <p class="mt-0.5 text-[11px] text-slate-400">Hasil analisis laporan</p>
                            </div>
                        </div>

                        <span class="rounded-lg bg-slate-50 px-3 py-1.5 text-[11px] font-medium text-slate-500">
                            Laporan #{{ $match['report']->id }}
                        </span>
                    </div>

                    {{-- BODY --}}
                    <div class="grid lg:grid-cols-[minmax(0,1fr)_250px]">
                        <div class="p-5 sm:p-7">
                            <div class="grid gap-6 sm:grid-cols-[220px_minmax(0,1fr)]">

                                {{-- FOTO --}}
                                <div class="relative h-56 overflow-hidden rounded-2xl bg-[#f0f4f8] sm:h-52">
                                    @if ($match['report']->photo)
                                        <img
                                            src="{{ asset('storage/' . $match['report']->photo) }}"
                                            alt="Foto {{ $match['report']->item_name }}"
                                            loading="lazy"
                                            class="h-full w-full object-cover"
                                        >
                                    @else
                                        <div class="flex h-full flex-col items-center justify-center text-slate-400">
                                            <svg class="h-11 w-11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 001 1v14a1 1 0 001 1z"/>
                                            </svg>
                                            <span class="mt-3 text-xs font-medium">Foto tidak tersedia</span>
                                        </div>
                                    @endif

                                    <div class="absolute left-3 top-3">
                                        <span class="rounded-lg px-3 py-1.5 text-[11px] font-bold text-white {{ $match['report']->type === 'found' ? 'bg-[#249d82]' : 'bg-[#d65c68]' }}">
                                            {{ $match['report']->type === 'found' ? 'Barang Ditemukan' : 'Barang Hilang' }}
                                        </span>
                                    </div>
                                </div>

                                {{-- DETAIL --}}
                                <div class="flex min-w-0 flex-col">
                                    <div class="flex flex-wrap gap-2">
                                        <span class="rounded-lg bg-[#e8f8f5] px-3 py-1.5 text-[11px] font-semibold text-[#247e77]">
                                            {{ $match['report']->category }}
                                        </span>
                                    </div>

                                    <h3 class="mt-3 text-xl font-bold leading-snug tracking-tight text-[#142b49] sm:text-2xl">
                                        {{ $match['report']->item_name }}
                                    </h3>

                                    <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-500">
                                        {{ $match['report']->description }}
                                    </p>

                                    <div class="mt-5 grid gap-4 border-t border-slate-100 pt-5 sm:grid-cols-2">
                                        <div class="flex items-start gap-2.5">
                                            <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#39a995]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <div class="min-w-0">
                                                <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Lokasi</p>
                                                <p class="mt-1 break-words text-sm font-medium text-slate-700">{{ $match['report']->location }}</p>
                                            </div>
                                        </div>

                                        <div class="flex items-start gap-2.5">
                                            <svg class="mt-0.5 h-4 w-4 shrink-0 text-[#9187e9]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                            </svg>
                                            <div>
                                                <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Tanggal kejadian</p>
                                                <p class="mt-1 text-sm font-medium text-slate-700">{{ $match['report']->incident_date->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 flex items-center gap-3 border-t border-slate-100 pt-4">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#142b49] text-sm font-bold text-[#8debd8]">
                                            {{ strtoupper(substr($match['report']->user->name, 0, 1)) }}
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-[10px] font-medium uppercase tracking-wider text-slate-400">Dilaporkan oleh</p>
                                            <p class="truncate text-sm font-semibold text-slate-700">{{ $match['report']->user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- SCORE PANEL --}}
                        <div class="border-t border-slate-100 bg-[#f8fafc] p-6 sm:p-7 lg:border-l lg:border-t-0">
                            <div class="flex items-center justify-between lg:block">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-slate-400">
                                        Similarity score
                                    </p>
                                    <p class="mt-1 text-xs text-slate-500">Tingkat kemiripan</p>
                                </div>

                                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#e8f8f5] text-[#299b88] lg:mt-5">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>

                            <div class="mt-5 flex items-baseline gap-1">
                                <span class="text-5xl font-bold tracking-tighter text-[#142b49]">
                                    {{ $match['score'] }}
                                </span>
                                <span class="text-xl font-semibold text-[#6e8fe0]">%</span>
                            </div>

                            <div class="mt-4 h-3 overflow-hidden rounded-full bg-slate-200">
                                <div
                                    class="h-full rounded-full bg-gradient-to-r from-[#62e7d0] via-[#70bde9] to-[#8e85ff]"
                                    style="width: {{ max(0, min(100, (float) $match['score'])) }}%"
                                ></div>
                            </div>

                            <p class="mt-3 text-xs leading-5 text-slate-500">
                                Tingkat kemiripan berdasarkan informasi yang tersedia.
                            </p>

                            <div class="mt-6 rounded-xl border border-[#dce5ed] bg-white p-4">
                                <div class="flex items-center gap-2">
                                    <span class="h-2 w-2 rounded-full bg-[#35b99c]"></span>
                                    <p class="text-xs font-semibold text-[#315d78]">Kandidat pencocokan</p>
                                </div>
                                <p class="mt-2 text-xs leading-5 text-slate-500">
                                    Periksa informasi barang untuk memastikan kecocokan.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- FORM KLAIM --}}
                    @if ($report->type === 'lost' && $match['report']->type === 'found')
                        <div class="border-t border-slate-200 bg-[#f8fafc] p-5 sm:p-7">
                            <div class="grid gap-6 lg:grid-cols-[0.8fr_1.2fr] lg:items-start">
                                <div>
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#142b49] text-[#8debd8]">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-[#469e96]">Ownership verification</p>
                                            <h4 class="mt-1 text-lg font-bold text-[#142b49]">Ajukan Klaim Kepemilikan</h4>
                                        </div>
                                    </div>

                                    <p class="mt-4 text-sm leading-7 text-slate-600">
                                        Merasa barang ini milikmu? Jelaskan ciri khusus yang dapat membantu penemu memverifikasi kepemilikan barang tersebut.
                                    </p>

                                    <div class="mt-4 flex items-start gap-3 rounded-xl border border-amber-200 bg-amber-50 p-4">
                                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a1.92 1.92 0 00-3.42 0z"/>
                                        </svg>
                                        <p class="text-xs leading-5 text-amber-800">
                                            Jangan mengungkapkan seluruh informasi rahasia barang secara publik. Gunakan detail khusus sebagai bukti kepemilikan.
                                        </p>
                                    </div>
                                </div>

                                <form
                                    action="{{ route('user.reports.claims.store', $match['report']->id) }}"
                                    method="POST"
                                    class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6"
                                >
                                    @csrf

                                    <label for="reason-{{ $match['report']->id }}" class="block text-sm font-bold text-[#142b49]">
                                        Alasan dan Bukti Kepemilikan
                                    </label>

                                    <p class="mt-1 text-xs leading-5 text-slate-400">
                                        Ceritakan tanda khusus, isi, ciri fisik, atau informasi lain yang hanya diketahui pemilik.
                                    </p>

                                    <textarea
                                        id="reason-{{ $match['report']->id }}"
                                        name="reason"
                                        rows="5"
                                        required
                                        minlength="20"
                                        maxlength="2000"
                                        placeholder="Contoh: Pada bagian belakang barang terdapat tanda khusus berupa..."
                                        class="mt-4 w-full resize-y rounded-xl border border-slate-200 bg-[#f8fafc] px-4 py-3 text-sm leading-6 text-slate-700 outline-none placeholder:text-slate-400 focus:border-[#6bcdbd] focus:bg-white focus:ring-2 focus:ring-[#62e7d0]/20"
                                    >{{ old('reason') }}</textarea>

                                    <div class="mt-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                                        <p class="text-xs text-slate-400">Minimal 20 karakter · Maksimal 2.000 karakter</p>

                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#142b49] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#203e60] focus:outline-none focus:ring-2 focus:ring-[#62e7d0]/40"
                                        >
                                            Kirim Pengajuan
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-7-7 7 7-7 7"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </article>

            @empty
                {{-- EMPTY STATE --}}
                <div class="rounded-[1.75rem] border border-slate-200 bg-white px-6 py-16 text-center shadow-sm sm:py-20">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-[#e8f8f5] text-[#548d9b]">
                        <svg class="h-9 w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                        </svg>
                    </div>

                    <div class="mx-auto mt-6 max-w-lg">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#469e96]">Match discovery</p>

                        <h3 class="mt-3 text-2xl font-bold tracking-tight text-[#142b49]">
                            Belum Ada Kecocokan
                        </h3>

                        <p class="mt-3 text-sm leading-7 text-slate-500">
                            Saat ini belum ditemukan laporan yang memiliki kemiripan cukup dengan barangmu. Jangan khawatir, laporanmu tetap tersimpan dan dapat dicocokkan dengan laporan baru di kemudian hari.
                        </p>

                        <a href="{{ route('user.dashboard') }}"
                           class="mt-7 inline-flex items-center justify-center gap-2 rounded-xl bg-[#142b49] px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-[#203e60]">
                            Kembali ke Beranda
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 12h14m-7-7 7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    {{-- INFORMASI MATCHING --}}
    <section class="relative overflow-hidden rounded-[1.75rem] bg-[#142b49] p-6 text-white sm:p-8">
        <div class="pointer-events-none absolute -right-16 -top-20 h-64 w-64 rounded-full bg-[#8e85ff]/10"></div>
        <div class="pointer-events-none absolute -bottom-24 left-1/4 h-64 w-64 rounded-full bg-[#62e7d0]/[0.06]"></div>

        <div class="relative grid gap-6 md:grid-cols-[auto_1fr] md:items-start">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl border border-[#62e7d0]/20 bg-[#62e7d0]/[0.08] text-[#9af3df]">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 18h.01M12 14a4 4 0 10-4-4m4 12a10 10 0 110-20 10 10 0 010 20z"/>
                </svg>
            </div>

            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#8debd8]">How it works</p>

                <h3 class="mt-2 text-xl font-bold">Tentang Smart Item Matching</h3>

                <p class="mt-3 max-w-3xl text-sm leading-7 text-slate-300">
                    Persentase kemiripan dihitung berdasarkan kategori (35%), lokasi (25%), tanggal kejadian (20%), dan deskripsi barang (20%). Hasil pencocokan merupakan rekomendasi awal, bukan bukti kepemilikan. Verifikasi tetap diperlukan sebelum barang dikembalikan.
                </p>

                <div class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">
                    <div class="rounded-xl border border-white/10 bg-white/[0.05] p-4">
                        <p class="text-2xl font-bold text-[#8debd8]">35%</p>
                        <p class="mt-1 text-xs text-slate-300">Kategori</p>
                        <div class="mt-3 h-1.5 rounded-full bg-white/10">
                            <div class="h-full w-[35%] rounded-full bg-[#8debd8]"></div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.05] p-4">
                        <p class="text-2xl font-bold text-[#a9a0ff]">25%</p>
                        <p class="mt-1 text-xs text-slate-300">Lokasi</p>
                        <div class="mt-3 h-1.5 rounded-full bg-white/10">
                            <div class="h-full w-[25%] rounded-full bg-[#a9a0ff]"></div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.05] p-4">
                        <p class="text-2xl font-bold text-[#8bcfff]">20%</p>
                        <p class="mt-1 text-xs text-slate-300">Tanggal</p>
                        <div class="mt-3 h-1.5 rounded-full bg-white/10">
                            <div class="h-full w-[20%] rounded-full bg-[#8bcfff]"></div>
                        </div>
                    </div>

                    <div class="rounded-xl border border-white/10 bg-white/[0.05] p-4">
                        <p class="text-2xl font-bold text-[#f4b6d2]">20%</p>
                        <p class="mt-1 text-xs text-slate-300">Deskripsi</p>
                        <div class="mt-3 h-1.5 rounded-full bg-white/10">
                            <div class="h-full w-[20%] rounded-full bg-[#f4b6d2]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
