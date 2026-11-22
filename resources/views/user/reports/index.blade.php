
@extends('layouts.app')

@section('title', 'Laporan Saya | TEMU')

@section('content')
<main class="min-h-screen overflow-hidden bg-[#f3f5f8]">

    {{-- PAGE HEADER --}}
    <section class="relative overflow-hidden bg-[#102640] text-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -right-32 -top-48 h-[520px] w-[520px] rounded-full border border-white/[0.07]"></div>
            <div class="absolute -right-12 -top-28 h-[360px] w-[360px] rounded-full border border-white/[0.07]"></div>
            <div class="absolute bottom-0 left-0 h-1 w-44 bg-[#e2b76c]"></div>
            <div class="absolute inset-0 opacity-[0.035]"
                 style="background-image: linear-gradient(rgba(255,255,255,.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.5) 1px, transparent 1px); background-size: 48px 48px;">
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 pb-12 pt-10 sm:px-8 sm:pb-16 sm:pt-14 lg:px-10">

            <div class="flex flex-col justify-between gap-10 lg:flex-row lg:items-end">

                <div class="max-w-2xl">
                    <div class="mb-6 flex items-center gap-3">
                        <span class="h-[2px] w-8 bg-[#e2b76c]"></span>
                        <span class="text-[10px] font-bold uppercase tracking-[0.28em] text-[#e2b76c]">
                            Personal Workspace / Reports
                        </span>
                    </div>

                    <h1 class="font-['Manrope'] text-4xl font-extrabold tracking-[-0.055em] sm:text-5xl lg:text-6xl">
                        Laporan
                        <span class="text-[#e2b76c]">Saya.</span>
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                        Semua laporan barang yang kamu buat, tersusun dalam satu ruang untuk dipantau, dikelola, dan ditindaklanjuti.
                    </p>

                    <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs text-slate-300">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-[#e2b76c]"></span>
                            <span>Ruang pengelolaan pribadi</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4 text-[#e2b76c]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                      d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                      d="M9 12l2 2 4-4"/>
                            </svg>
                            <span>Informasi laporan terpantau</span>
                        </div>
                    </div>
                </div>

                <div class="flex shrink-0 flex-col gap-4 sm:flex-row sm:items-center lg:flex-col lg:items-end">
                    <div class="text-left sm:text-right">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-slate-400">
                            Total laporan tercatat
                        </p>
                        <p class="mt-1 font-['Manrope'] text-4xl font-extrabold tracking-tight text-white">
                            {{ $reports->total() }}
                            <span class="text-base font-semibold text-[#e2b76c]">laporan</span>
                        </p>
                    </div>

                    <a href="{{ route('user.reports.create') }}"
                       class="group inline-flex min-h-[52px] items-center justify-center gap-3 bg-[#e2b76c] px-6 text-sm font-extrabold text-[#102640] shadow-lg shadow-black/10 transition duration-200 hover:bg-[#f0cb88]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
                        </svg>
                        Buat Laporan Baru
                        <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                        </svg>
                    </a>
                </div>

            </div>
        </div>
    </section>


    {{-- MAIN CONTENT --}}
    <div class="mx-auto max-w-7xl px-5 pb-16 sm:px-8 lg:px-10">

        {{-- NOTIFICATIONS --}}
        @if (session('success'))
            <div class="mt-6 flex items-start gap-3 border-l-4 border-emerald-500 bg-white px-5 py-4 shadow-sm">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center bg-emerald-50 text-emerald-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">Berhasil</p>
                    <p class="mt-1 text-sm leading-6 text-slate-600">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="mt-6 flex items-start gap-3 border-l-4 border-red-500 bg-white px-5 py-4 shadow-sm">
                <div class="flex h-9 w-9 shrink-0 items-center justify-center bg-red-50 text-red-600">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-800">Terjadi Kesalahan</p>
                    <p class="mt-1 text-sm leading-6 text-slate-600">{{ session('error') }}</p>
                </div>
            </div>
        @endif


        {{-- STATISTICS --}}
        <section class="relative z-10 -mt-1 grid gap-4 pt-7 sm:grid-cols-3">

            {{-- TOTAL --}}
            <div class="group relative overflow-hidden bg-white p-6 shadow-sm ring-1 ring-slate-200/70 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="absolute right-0 top-0 h-1 w-full bg-[#315f91]"></div>
                <div class="absolute -right-9 -top-9 h-28 w-28 rounded-full bg-[#315f91]/[0.06] transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-slate-400">Keseluruhan</p>
                        <p class="mt-4 font-['Manrope'] text-4xl font-extrabold tracking-tight text-[#102640]">
                            {{ $reports->total() }}
                        </p>
                        <p class="mt-2 text-xs font-medium text-slate-500">Total laporan dibuat</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center bg-[#eaf0f7] text-[#315f91]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="5" y="3" width="14" height="18" rx="1.5" stroke-width="1.7"/>
                            <path stroke-linecap="round" stroke-width="1.7" d="M9 8h6M9 12h6M9 16h3"/>
                        </svg>
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3 text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                    Semua jenis laporan
                </div>
            </div>


            {{-- LOST --}}
            <div class="group relative overflow-hidden bg-white p-6 shadow-sm ring-1 ring-slate-200/70 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="absolute right-0 top-0 h-1 w-full bg-[#e16c63]"></div>
                <div class="absolute -right-9 -top-9 h-28 w-28 rounded-full bg-[#e16c63]/[0.06] transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-slate-400">Lost Items</p>
                        <p class="mt-4 font-['Manrope'] text-4xl font-extrabold tracking-tight text-[#102640]">
                            {{ $reports->getCollection()->where('type', 'lost')->count() }}
                        </p>
                        <p class="mt-2 text-xs font-medium text-slate-500">Laporan barang hilang</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center bg-[#fff0ed] text-[#d85f56]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                            <path stroke-linecap="round" stroke-width="2" d="M12 8v5m0 3h.01"/>
                        </svg>
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3 text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                    Membutuhkan bantuan pencarian
                </div>
            </div>


            {{-- FOUND --}}
            <div class="group relative overflow-hidden bg-white p-6 shadow-sm ring-1 ring-slate-200/70 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="absolute right-0 top-0 h-1 w-full bg-[#269b7b]"></div>
                <div class="absolute -right-9 -top-9 h-28 w-28 rounded-full bg-[#269b7b]/[0.06] transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.2em] text-slate-400">Found Items</p>
                        <p class="mt-4 font-['Manrope'] text-4xl font-extrabold tracking-tight text-[#102640]">
                            {{ $reports->getCollection()->where('type', 'found')->count() }}
                        </p>
                        <p class="mt-2 text-xs font-medium text-slate-500">Laporan barang ditemukan</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center bg-[#e8f7f1] text-[#269b7b]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.5 12 2.3 2.3 4.7-4.8"/>
                        </svg>
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3 text-[10px] font-semibold uppercase tracking-wider text-slate-400">
                    Berpotensi kembali ke pemilik
                </div>
            </div>

        </section>


        {{-- REPORT LIST HEADER --}}
        <section class="mt-12">

            <div class="flex flex-col justify-between gap-5 border-b border-[#102640]/10 pb-6 sm:flex-row sm:items-end">

                <div>
                    <div class="flex items-center gap-3">
                        <span class="h-[2px] w-8 bg-[#d5a34a]"></span>
                        <p class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-[#a17a36]">
                            Report Management
                        </p>
                    </div>

                    <h2 class="mt-3 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#102640] sm:text-3xl">
                        Riwayat Laporan
                    </h2>

                    <p class="mt-2 text-sm text-slate-500">
                        Pantau informasi dan perkembangan setiap laporanmu.
                    </p>
                </div>

                <div class="inline-flex items-center gap-3 border border-slate-200 bg-white px-4 py-3">
                    <div class="flex h-8 w-8 items-center justify-center bg-[#eaf0f7] text-[#315f91]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[9px] font-bold uppercase tracking-widest text-slate-400">Data tercatat</p>
                        <p class="mt-0.5 text-sm font-extrabold text-[#102640]">{{ $reports->total() }} laporan</p>
                    </div>
                </div>

            </div>


            {{-- REPORT CARDS --}}
            <div class="mt-7 space-y-6">

                @forelse ($reports as $report)

                    <article class="group overflow-hidden border border-slate-200/90 bg-white shadow-sm transition duration-300 hover:border-[#315f91]/40 hover:shadow-xl hover:shadow-[#102640]/[0.06]">

                        <div class="grid min-w-0 lg:grid-cols-[300px_minmax(0,1fr)]">

                            {{-- IMAGE AREA --}}
                            <div class="relative min-h-[250px] overflow-hidden bg-[#e9edf2] sm:min-h-[300px] lg:min-h-full">

                                @if ($report->photo)
                                    <img
                                        src="{{ asset('storage/' . $report->photo) }}"
                                        alt="Foto {{ $report->item_name }}"
                                        loading="lazy"
                                        class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#102640]/50 via-transparent to-[#102640]/10"></div>
                                @else
                                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-[#e9edf2] text-slate-400">
                                        <div class="flex h-20 w-20 items-center justify-center border border-slate-300 bg-white/70">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                            </svg>
                                        </div>
                                        <span class="mt-3 text-[10px] font-bold uppercase tracking-[0.15em]">No Image Available</span>
                                    </div>
                                @endif

                                {{-- TYPE BADGE --}}
                                <div class="absolute left-4 top-4">
                                    <span class="inline-flex items-center gap-2 px-3 py-2 text-[10px] font-extrabold uppercase tracking-[0.12em] shadow-lg
                                        {{ $report->type === 'lost' ? 'bg-[#d85f56] text-white' : 'bg-[#269b7b] text-white' }}">
                                        @if ($report->type === 'lost')
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="9" stroke-width="2"/>
                                                <path stroke-linecap="round" stroke-width="2" d="M12 8v5m0 3h.01"/>
                                            </svg>
                                            Barang Hilang
                                        @else
                                            <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 12 4 4L19 6"/>
                                            </svg>
                                            Barang Ditemukan
                                        @endif
                                    </span>
                                </div>

                                <div class="absolute bottom-4 left-4 right-4">
                                    <p class="text-[9px] font-bold uppercase tracking-[0.22em] text-white/80">
                                        TEMU / ITEM REPORT
                                    </p>
                                </div>

                            </div>


                            {{-- CONTENT AREA --}}
                            <div class="flex min-w-0 flex-col p-5 sm:p-7 lg:p-8">

                                {{-- STATUS ROW --}}
                                <div class="flex flex-wrap items-center justify-between gap-3">

                                    <div class="flex flex-wrap items-center gap-2">

                                        <span class="inline-flex items-center gap-2 border px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.1em]
                                            {{ $report->status === 'active' ? 'border-blue-200 bg-blue-50 text-blue-700' : ($report->status === 'claimed' ? 'border-amber-200 bg-amber-50 text-amber-700' : 'border-slate-200 bg-slate-100 text-slate-600') }}">

                                            <span class="h-1.5 w-1.5 rounded-full
                                                {{ $report->status === 'active' ? 'bg-blue-500' : ($report->status === 'claimed' ? 'bg-amber-500' : 'bg-slate-400') }}">
                                            </span>

                                            {{ $report->status === 'active' ? 'Aktif' : ($report->status === 'claimed' ? 'Dalam Proses Klaim' : 'Dikembalikan') }}
                                        </span>

                                        @if ($report->moderation_status === 'hidden')
                                            <span class="inline-flex items-center gap-1.5 border border-red-200 bg-red-50 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.1em] text-red-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                Disembunyikan Admin
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-[10px] font-extrabold uppercase tracking-[0.1em] text-emerald-700">
                                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                Ditampilkan
                                            </span>
                                        @endif

                                    </div>

                                    <span class="text-[9px] font-bold uppercase tracking-[0.2em] text-slate-300">
                                        TEMU
                                    </span>

                                </div>


                                {{-- ITEM NAME --}}
                                <div class="mt-6">
                                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#a17a36]">
                                        Nama Barang
                                    </p>

                                    <h3 class="mt-2 break-words font-['Manrope'] text-2xl font-extrabold leading-tight tracking-[-0.035em] text-[#102640] sm:text-3xl">
                                        {{ $report->item_name }}
                                    </h3>

                                    <p class="mt-2 inline-flex items-center gap-2 text-xs font-semibold text-[#315f91]">
                                        <span class="h-1.5 w-1.5 rounded-full bg-[#d5a34a]"></span>
                                        {{ $report->category }}
                                    </p>
                                </div>


                                {{-- DESCRIPTION --}}
                                <p class="mt-5 max-w-3xl text-sm leading-7 text-slate-600">
                                    {{ \Illuminate\Support\Str::limit($report->description, 160) }}
                                </p>


                                {{-- INFORMATION --}}
                                <div class="mt-6 grid gap-4 border-y border-slate-100 py-5 sm:grid-cols-2 lg:grid-cols-3">

                                    <div class="flex min-w-0 items-start gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center bg-[#edf2f7] text-[#315f91]">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"/>
                                                <circle cx="12" cy="10" r="2.5"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-[9px] font-bold uppercase tracking-[0.15em] text-slate-400">Lokasi</p>
                                            <p class="mt-1 break-words text-xs font-semibold leading-5 text-slate-700">{{ $report->location }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center bg-[#edf2f7] text-[#315f91]">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[9px] font-bold uppercase tracking-[0.15em] text-slate-400">Tanggal Kejadian</p>
                                            <p class="mt-1 text-xs font-semibold leading-5 text-slate-700">{{ $report->incident_date->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center bg-[#edf2f7] text-[#315f91]">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 7v5l3 2"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[9px] font-bold uppercase tracking-[0.15em] text-slate-400">Tanggal Dibuat</p>
                                            <p class="mt-1 text-xs font-semibold leading-5 text-slate-700">{{ $report->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                </div>


                                {{-- MODERATION NOTICE --}}
                                @if ($report->moderation_status === 'hidden')
                                    <div class="mt-5 border-l-4 border-red-500 bg-[#fff4f2] p-4 sm:p-5">

                                        <div class="flex items-start gap-3">
                                            <div class="flex h-9 w-9 shrink-0 items-center justify-center bg-red-100 text-red-600">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                                                </svg>
                                            </div>

                                            <div class="min-w-0">
                                                <p class="text-sm font-extrabold text-red-900">
                                                    Laporan Disembunyikan oleh Admin
                                                </p>

                                                <p class="mt-2 text-sm leading-6 text-red-800">
                                                    Alasan: {{ $report->moderation_reason ?? 'Tidak ada alasan yang dicantumkan.' }}
                                                </p>

                                                @if ($report->moderator)
                                                    <p class="mt-3 text-xs font-medium text-red-700">
                                                        Dimoderasi oleh: {{ $report->moderator->name }}
                                                    </p>
                                                @endif

                                                @if ($report->moderated_at)
                                                    <p class="mt-1 text-xs text-red-700">
                                                        Tanggal moderasi: {{ $report->moderated_at->format('d M Y H:i') }}
                                                    </p>
                                                @endif

                                                <p class="mt-3 border-t border-red-200 pt-3 text-xs leading-5 text-red-700">
                                                    Laporan ini tidak ditampilkan kepada pengguna lain dan tidak dapat digunakan untuk pencocokan barang.
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                @endif


                                {{-- ACTIONS --}}
                                <div class="mt-auto flex flex-wrap gap-3 pt-6">

                                    @if ($report->status === 'active' && $report->moderation_status === 'visible')
                                        <a href="{{ route('user.reports.matches', $report->id) }}"
                                           class="group inline-flex min-h-[44px] items-center justify-center gap-2 bg-[#102640] px-5 py-3 text-xs font-extrabold text-white transition duration-200 hover:bg-[#315f91]">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="10.8" cy="10.8" r="7.3" stroke-width="1.8"/>
                                                <path stroke-linecap="round" stroke-width="1.8" d="m16.2 16.2 4.3 4.3"/>
                                            </svg>

                                            Cari Kecocokan

                                            <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($report->type === 'found')
                                        <a href="{{ route('user.reports.claims.index', $report->id) }}"
                                           class="group inline-flex min-h-[44px] items-center justify-center gap-2 border border-[#d5a34a]/60 bg-[#fffaf0] px-5 py-3 text-xs font-extrabold text-[#8c6729] transition duration-200 hover:border-[#d5a34a] hover:bg-[#f9edda]">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>

                                            Lihat Klaim Masuk

                                            <svg class="h-3.5 w-3.5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                                            </svg>
                                        </a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </article>

                @empty

                    {{-- EMPTY STATE --}}
                    <div class="relative overflow-hidden border border-slate-200 bg-white px-6 py-16 text-center shadow-sm sm:py-20">

                        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full border border-[#315f91]/[0.07]"></div>
                        <div class="absolute -left-20 -bottom-20 h-64 w-64 rounded-full border border-[#d5a34a]/[0.12]"></div>

                        <div class="relative mx-auto flex h-24 w-24 items-center justify-center bg-[#edf2f7] text-[#315f91]">
                            <svg class="h-11 w-11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="5" y="3" width="14" height="18" rx="1.5" stroke-width="1.5"/>
                                <path stroke-linecap="round" stroke-width="1.5" d="M9 8h6M9 12h6M9 16h3"/>
                            </svg>
                        </div>

                        <div class="relative mx-auto mt-7 max-w-lg">
                            <p class="text-[10px] font-extrabold uppercase tracking-[0.25em] text-[#a17a36]">
                                Your Story Starts Here
                            </p>

                            <h3 class="mt-3 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#102640] sm:text-3xl">
                                Belum Ada Laporan
                            </h3>

                            <p class="mt-4 text-sm leading-7 text-slate-500">
                                Ruang laporanmu masih kosong. Mulai dengan melaporkan barang yang hilang atau barang yang kamu temukan agar komunitas TEMU dapat saling membantu.
                            </p>

                            <a href="{{ route('user.reports.create') }}"
                               class="mt-8 inline-flex min-h-[50px] items-center justify-center gap-3 bg-[#102640] px-6 text-sm font-extrabold text-white transition duration-200 hover:bg-[#315f91]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="square" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
                                </svg>
                                Buat Laporan Pertama
                            </a>
                        </div>

                    </div>

                @endforelse

            </div>


            {{-- PAGINATION --}}
            @if ($reports->hasPages())
                <div class="mt-8 border border-slate-200 bg-white p-4 shadow-sm sm:p-5">
                    {{ $reports->links() }}
                </div>
            @endif

        </section>


        {{-- BOTTOM BRAND STRIP --}}
        <section class="mt-14 border-t border-[#102640]/10 pt-7">
            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                <div class="flex items-center gap-3">
                    <div class="flex h-8 w-8 items-center justify-center bg-[#102640] font-['Manrope'] text-sm font-extrabold text-[#e2b76c]">
                        T
                    </div>
                    <div>
                        <p class="text-xs font-extrabold tracking-wide text-[#102640]">TEMU</p>
                        <p class="text-[9px] font-medium uppercase tracking-[0.18em] text-slate-400">Lost & Found Platform</p>
                    </div>
                </div>

                <p class="text-xs text-slate-400">
                    Setiap barang punya cerita. Bantu temukan jalan pulangnya.
                </p>
            </div>
        </section>

    </div>
</main>
@endsection
