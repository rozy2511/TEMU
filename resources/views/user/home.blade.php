
@extends('layouts.app')

@section('title', 'Beranda | TEMU')

@section('content')
<main class="temu-container space-y-12 py-8 sm:py-10">

    {{-- HERO --}}
    <section class="relative isolate overflow-hidden rounded-[2rem] bg-[#172f4f] shadow-2xl shadow-[#172f4f]/10">
        <div class="pointer-events-none absolute -right-32 -top-32 h-[30rem] w-[30rem] rounded-full border border-white/[0.08]"></div>
        <div class="pointer-events-none absolute -right-16 -top-16 h-[22rem] w-[22rem] rounded-full border border-white/[0.08]"></div>
        <div class="pointer-events-none absolute -bottom-40 left-1/3 h-80 w-80 rounded-full bg-[#d5a34a]/10 blur-3xl"></div>
        <div class="pointer-events-none absolute right-1/4 top-0 h-64 w-64 rounded-full bg-blue-400/10 blur-3xl"></div>

        <div class="relative grid items-center gap-12 px-6 py-12 sm:px-10 sm:py-14 lg:grid-cols-[1.15fr_0.85fr] lg:px-14 lg:py-16">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2.5 rounded-full border border-white/15 bg-white/[0.08] px-4 py-2">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-50"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-blue-100">
                        Campus Lost & Found Platform
                    </span>
                </div>

                <p class="mt-8 text-xs font-semibold uppercase tracking-[0.22em] text-[#e8c17b]">
                    Setiap barang punya cerita
                </p>

                <h1 class="mt-4 text-4xl font-extrabold leading-[1.15] tracking-tight text-white sm:text-5xl lg:text-[3.5rem]">
                    Barang hilang?
                    <span class="mt-2 block text-[#e8c17b]">
                        Temukan kembali bersama TEMU.
                    </span>
                </h1>

                <p class="mt-6 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                    Ruang bersama untuk melaporkan barang hilang, menemukan barang yang tertinggal, dan mempertemukan kembali barang dengan pemiliknya.
                </p>

                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('user.reports.create') }}"
                       class="group inline-flex items-center justify-center gap-3 rounded-xl bg-[#e8c17b] px-6 py-4 text-sm font-bold text-[#172f4f] shadow-lg shadow-black/10 transition duration-300 hover:-translate-y-1 hover:bg-[#f0d39e]">
                        Buat Laporan
                        <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"/>
                        </svg>
                    </a>

                    <a href="#laporan"
                       class="inline-flex items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/[0.06] px-6 py-4 text-sm font-semibold text-white transition duration-300 hover:bg-white/[0.13]">
                        Jelajahi Laporan
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                </div>

                <div class="mt-9 flex flex-wrap items-center gap-x-6 gap-y-3 border-t border-white/10 pt-6">
                    <div class="flex items-center gap-2 text-xs text-slate-300">
                        <svg class="h-4 w-4 text-[#e8c17b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5-3.5A2.5 2.5 0 0117.5 4h-11A2.5 2.5 0 004 6.5v11A2.5 2.5 0 006.5 20h11a2.5 2.5 0 002.5-2.5v-11z"/>
                        </svg>
                        Pelaporan mudah
                    </div>
                    <div class="flex items-center gap-2 text-xs text-slate-300">
                        <svg class="h-4 w-4 text-[#e8c17b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s8-4 8-11V5l-8-3-8 3v5c0 7 8 11 8 11z"/>
                        </svg>
                        Privasi terjaga
                    </div>
                </div>
            </div>

            {{-- HOW IT WORKS --}}
            <div class="relative hidden lg:block">
                <div class="absolute -inset-4 rounded-[2rem] border border-white/[0.08]"></div>

                <div class="relative rounded-3xl border border-white/15 bg-white/[0.09] p-7 shadow-2xl backdrop-blur-md">
                    <div class="flex items-start justify-between gap-4 border-b border-white/15 pb-6">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#e8c17b]">
                                Proses sederhana
                            </p>
                            <h2 class="mt-2 text-xl font-bold text-white">
                                Bagaimana TEMU bekerja?
                            </h2>
                        </div>

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#e8c17b]/15 text-[#e8c17b]">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 12l2 2 4-4m5-3.5A2.5 2.5 0 0117.5 4h-11A2.5 2.5 0 004 6.5v11A2.5 2.5 0 006.5 20h11a2.5 2.5 0 002.5-2.5v-11z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-6 pt-7">
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-[#e8c17b]/25 bg-[#e8c17b]/10 text-sm font-extrabold text-[#e8c17b]">
                                01
                            </div>
                            <div class="pt-1">
                                <h3 class="text-sm font-bold text-white">Laporkan barang</h3>
                                <p class="mt-1.5 text-xs leading-5 text-slate-300">
                                    Bagikan informasi barang yang hilang atau ditemukan.
                                </p>
                            </div>
                        </div>

                        <div class="ml-5 h-5 border-l border-dashed border-white/25"></div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-[#e8c17b]/25 bg-[#e8c17b]/10 text-sm font-extrabold text-[#e8c17b]">
                                02
                            </div>
                            <div class="pt-1">
                                <h3 class="text-sm font-bold text-white">Temukan kecocokan</h3>
                                <p class="mt-1.5 text-xs leading-5 text-slate-300">
                                    Jelajahi laporan dan manfaatkan Smart Item Matching.
                                </p>
                            </div>
                        </div>

                        <div class="ml-5 h-5 border-l border-dashed border-white/25"></div>

                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-[#e8c17b]/25 bg-[#e8c17b]/10 text-sm font-extrabold text-[#e8c17b]">
                                03
                            </div>
                            <div class="pt-1">
                                <h3 class="text-sm font-bold text-white">Konfirmasi pengembalian</h3>
                                <p class="mt-1.5 text-xs leading-5 text-slate-300">
                                    Verifikasi klaim dan konfirmasi serah terima barang.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-5 -left-7 rounded-2xl border border-white/15 bg-[#243f5e] px-5 py-4 shadow-xl">
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-blue-200">
                        Satu tujuan
                    </p>
                    <p class="mt-1 text-sm font-bold text-white">
                        Barang kembali ke pemiliknya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- SEARCH --}}
    <section>
        <div class="mb-6">
            <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#b58a45]">
                <span class="h-px w-7 bg-[#b58a45]"></span>
                Pencarian laporan
            </div>

            <div class="mt-3 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-2xl font-extrabold tracking-tight text-[#172f4f] sm:text-3xl">
                        Temukan barang
                    </h2>
                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Gunakan pencarian untuk menemukan laporan yang sesuai.
                    </p>
                </div>
            </div>
        </div>

        <form id="searchForm"
              action="{{ route('user.dashboard') }}"
              method="GET"
              class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-7">

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">
                <div class="lg:col-span-2">
                    <label for="search" class="temu-label">Nama Barang atau Kata Kunci</label>

                    <div class="relative mt-2">
                        <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                        </svg>

                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Contoh: HP, kunci motor, dompet..."
                            class="temu-input pl-12"
                        >
                    </div>
                </div>

                <div>
                    <label for="type" class="temu-label">Jenis Laporan</label>
                    <select id="type" name="type" class="temu-input mt-2">
                        <option value="">Semua Jenis</option>
                        <option value="lost" {{ request('type') === 'lost' ? 'selected' : '' }}>
                            Barang Hilang
                        </option>
                        <option value="found" {{ request('type') === 'found' ? 'selected' : '' }}>
                            Barang Ditemukan
                        </option>
                    </select>
                </div>

                <div>
                    <label for="category" class="temu-label">Kategori Barang</label>
                    <select id="category" name="category" class="temu-input mt-2">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6 flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:items-center">
                <button id="searchButton" type="submit" class="temu-button inline-flex items-center justify-center gap-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                    </svg>
                    <span id="searchButtonText">Cari Barang</span>
                </button>

                <a href="{{ route('user.dashboard') }}"
                   class="temu-button-secondary inline-flex items-center justify-center">
                    Reset Filter
                </a>
            </div>
        </form>
    </section>

    {{-- REPORT CATALOG --}}
    <section id="laporan" class="scroll-mt-24">
        <div class="mb-7 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#b58a45]">
                    <span class="h-px w-7 bg-[#b58a45]"></span>
                    Informasi komunitas
                </div>

                <h2 id="catalogTitle" class="mt-3 text-2xl font-extrabold tracking-tight text-[#172f4f] sm:text-3xl">
                    {{ request()->hasAny(['search', 'type', 'category']) ? 'Hasil Pencarian Barang' : 'Laporan Barang' }}
                </h2>

                <p id="catalogDescription" class="mt-2 text-sm leading-6 text-slate-500">
                    {{ request()->hasAny(['search', 'type', 'category']) ? 'Berikut laporan yang sesuai dengan pencarian kamu.' : 'Jelajahi laporan kehilangan dan penemuan barang dari pengguna TEMU.' }}
                </p>

                @if (request('search'))
                    <p id="searchKeyword" class="mt-3 inline-flex rounded-lg bg-[#f5f1e8] px-3 py-1.5 text-xs font-semibold text-[#8d6b32]">
                        Kata kunci: "{{ request('search') }}"
                    </p>
                @else
                    <p id="searchKeyword" class="mt-3 hidden rounded-lg bg-[#f5f1e8] px-3 py-1.5 text-xs font-semibold text-[#8d6b32]"></p>
                @endif
            </div>

            <div class="inline-flex w-fit items-center gap-3 rounded-2xl border border-slate-200 bg-white px-4 py-3 shadow-sm">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#f5f1e8] text-[#a47b39]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Jumlah hasil</p>
                    <p id="resultCount" class="text-lg font-extrabold leading-tight text-[#172f4f]">{{ $reports->total() }}</p>
                </div>
            </div>
        </div>

        <div id="reportGrid" class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">
            @forelse ($reports as $report)
                <article class="group flex h-full flex-col overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#d8c7a5] hover:shadow-xl hover:shadow-[#172f4f]/[0.07]">

                    {{-- IMAGE --}}
                    <div class="relative h-60 overflow-hidden bg-[#f2f4f7]">
                        @if ($report->photo)
                            <img
                                src="{{ asset('storage/' . $report->photo) }}"
                                alt="Foto {{ $report->item_name }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                            >
                        @else
                            <div class="flex h-full flex-col items-center justify-center text-slate-400">
                                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-sm">
                                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                    </svg>
                                </div>
                                <span class="mt-3 text-xs font-medium">Foto tidak tersedia</span>
                            </div>
                        @endif

                        <div class="absolute inset-x-0 top-0 flex items-start justify-between gap-3 p-4">
                            <span class="inline-flex items-center gap-2 rounded-xl px-3 py-2 text-[11px] font-bold shadow-sm backdrop-blur-md {{ $report->type === 'lost' ? 'bg-red-50/95 text-red-700' : 'bg-emerald-50/95 text-emerald-700' }}">
                                <span class="h-1.5 w-1.5 rounded-full {{ $report->type === 'lost' ? 'bg-red-500' : 'bg-emerald-500' }}"></span>
                                {{ $report->type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                            </span>

                            <span class="rounded-xl border border-white/30 bg-slate-900/55 px-3 py-2 text-[10px] font-semibold text-white backdrop-blur-md">
                                {{ $report->category }}
                            </span>
                        </div>

                        <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-slate-950/35 to-transparent"></div>

                        <div class="absolute bottom-4 left-4 flex items-center gap-2 text-[11px] font-medium text-white">
                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                            {{ $report->created_at->format('d M Y') }}
                        </div>
                    </div>

                    {{-- CONTENT --}}
                    <div class="flex flex-1 flex-col p-5 sm:p-6">
                        <div class="flex items-center justify-between gap-3">
                            <span class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Informasi barang
                            </span>

                            <span class="inline-flex items-center gap-1.5 text-[10px] font-bold text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Aktif
                            </span>
                        </div>

                        <h3 class="mt-3 text-xl font-extrabold leading-snug tracking-tight text-[#172f4f] transition group-hover:text-[#9a7438]">
                            {{ $report->item_name }}
                        </h3>

                        <p class="mt-2 min-h-[3rem] text-sm leading-6 text-slate-500">
                            {{ \Illuminate\Support\Str::limit($report->description, 110) }}
                        </p>

                        <div class="mt-5 space-y-3 border-t border-slate-100 pt-5">
                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-[#f5f1e8] text-[#a47b39]">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 pt-0.5">
                                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Lokasi kejadian</p>
                                    <p class="mt-0.5 break-words text-xs font-semibold leading-5 text-slate-700">
                                        {{ $report->location }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-[#f5f1e8] text-[#a47b39]">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                    </svg>
                                </div>
                                <div class="min-w-0 pt-0.5">
                                    <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400">Tanggal kejadian</p>
                                    <p class="mt-0.5 text-xs font-semibold text-slate-700">
                                        {{ $report->incident_date->format('d M Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3 border-t border-slate-100 pt-4">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full border border-[#e8dfce] bg-[#f5f1e8] text-xs font-extrabold text-[#8d6b32]">
                                    {{ strtoupper(substr($report->user->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[10px] font-medium text-slate-400">Dilaporkan oleh</p>
                                    <p class="truncate text-xs font-bold text-[#263c54]">
                                        {{ $report->user->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#f5f1e8] text-[#a47b39]">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 text-lg font-extrabold text-[#172f4f]">
                        {{ request()->hasAny(['search', 'type', 'category']) ? 'Barang Tidak Ditemukan' : 'Belum Ada Laporan' }}
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                        @if (request()->hasAny(['search', 'type', 'category']))
                            Tidak ada laporan yang cocok dengan pencarian kamu. Coba gunakan kata kunci atau filter lainnya.
                        @else
                            Belum ada laporan barang yang tersedia. Jadilah pengguna pertama yang membuat laporan di TEMU.
                        @endif
                    </p>

                    <a href="{{ route('user.dashboard') }}"
                       class="mt-6 inline-flex items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#213e63]">
                        Tampilkan Semua Laporan
                    </a>
                </div>
            @endforelse
        </div>

        @if ($reports->hasPages())
            <div id="reportPagination" class="mt-9">
                {{ $reports->links() }}
            </div>
        @else
            <div id="reportPagination"></div>
        @endif
    </section>

    {{-- CALL TO ACTION --}}
    <section class="relative overflow-hidden rounded-3xl border border-[#e8dfce] bg-[#faf8f3] px-6 py-8 sm:px-9 sm:py-9">
        <div class="pointer-events-none absolute -right-12 -top-20 h-64 w-64 rounded-full border border-[#d5a34a]/20"></div>
        <div class="pointer-events-none absolute -right-4 -top-12 h-48 w-48 rounded-full border border-[#d5a34a]/20"></div>

        <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="max-w-xl">
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#a47b39]">
                    Berkontribusi bersama TEMU
                </p>
                <h2 class="mt-2 text-xl font-extrabold tracking-tight text-[#172f4f] sm:text-2xl">
                    Kehilangan atau menemukan barang?
                </h2>
                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Buat laporan agar komunitas kampus dapat membantu menemukan kecocokannya.
                </p>
            </div>

            <a href="{{ route('user.reports.create') }}"
               class="group inline-flex shrink-0 items-center justify-center gap-3 rounded-xl bg-[#172f4f] px-6 py-4 text-sm font-bold text-white shadow-lg shadow-[#172f4f]/10 transition duration-300 hover:-translate-y-1 hover:bg-[#213e63]">
                Buat Laporan
                <svg class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('searchForm');
    const searchButton = document.getElementById('searchButton');
    const searchButtonText = document.getElementById('searchButtonText');

    if (!form) return;

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        const originalText = searchButtonText.textContent;

        searchButton.disabled = true;
        searchButtonText.textContent = 'Mencari...';

        const params = new URLSearchParams(new FormData(form));
        const url = form.action + '?' + params.toString();

        try {
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            });

            if (!response.ok) {
                throw new Error('Pencarian gagal.');
            }

            const html = await response.text();
            const parser = new DOMParser();
            const documentResult = parser.parseFromString(html, 'text/html');

            const newCatalog = documentResult.getElementById('laporan');
            const currentCatalog = document.getElementById('laporan');

            if (!newCatalog || !currentCatalog) {
                throw new Error('Bagian katalog tidak ditemukan.');
            }

            currentCatalog.replaceWith(newCatalog);

            window.history.pushState({}, '', url);

            const keyword = document.getElementById('searchKeyword');

            if (keyword) {
                const searchValue = document.getElementById('search').value.trim();

                if (searchValue) {
                    keyword.textContent = 'Kata kunci: "' + searchValue + '"';
                    keyword.classList.remove('hidden');
                } else {
                    keyword.textContent = '';
                    keyword.classList.add('hidden');
                }
            }

            document.getElementById('laporan').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        } catch (error) {
            alert('Pencarian tidak berhasil. Silakan coba kembali.');
            console.error(error);
        } finally {
            searchButton.disabled = false;
            searchButtonText.textContent = originalText;
        }
    });
});
</script>
@endpush
