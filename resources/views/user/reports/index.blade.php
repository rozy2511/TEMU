
@extends('layouts.app')

@section('title', 'Laporan Saya | TEMU')

@section('content')
<main class="min-h-screen overflow-hidden bg-[#f6f7fb]">

    {{-- HERO --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-[#142b49] via-[#203e68] to-[#514d91] text-white">
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -right-32 -top-40 h-[500px] w-[500px] rounded-full bg-[#62e7d0]/10 blur-3xl"></div>
            <div class="absolute -bottom-40 right-1/3 h-[400px] w-[400px] rounded-full bg-[#8e85ff]/20 blur-3xl"></div>
            <div class="absolute -right-20 top-10 h-80 w-80 rounded-full border border-white/10"></div>
            <div class="absolute -right-5 top-24 h-56 w-56 rounded-full border border-white/10"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-5 py-10 sm:px-8 sm:py-14 lg:px-10">
            <div class="flex flex-col justify-between gap-8 lg:flex-row lg:items-end">

                <div class="max-w-2xl">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3.5 py-2 backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                        <span class="text-xs font-semibold tracking-wide text-white/80">Personal Workspace</span>
                    </div>

                    <p class="mb-3 text-xs font-bold uppercase tracking-[0.22em] text-[#a7f6e8]">
                        Report Management
                    </p>

                    <h1 class="font-['Manrope'] text-3xl font-extrabold tracking-tight sm:text-4xl lg:text-5xl">
                        Laporan
                        <span class="bg-gradient-to-r from-[#62e7d0] via-[#8bcfff] to-[#d9d4ff] bg-clip-text text-transparent">
                            Saya.
                        </span>
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                        Semua laporan barang yang kamu buat, tersusun dalam satu ruang untuk dipantau, dikelola, dan ditindaklanjuti.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-4 text-xs text-slate-300">
                        <div class="flex items-center gap-2">
                            <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                            Ruang pengelolaan pribadi
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="h-4 w-4 text-[#8bcfff]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 12l2 2 4-4"/>
                            </svg>
                            Informasi laporan terpantau
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center lg:flex-col lg:items-end">
                    <div class="text-left sm:text-right">
                        <p class="text-xs font-medium tracking-wide text-slate-300">
                            Total laporan tercatat
                        </p>
                        <p class="mt-2 font-['Manrope'] text-4xl font-extrabold text-white">
                            {{ $reports->total() }}
                            <span class="text-base font-semibold text-[#a7f6e8]">laporan</span>
                        </p>
                    </div>

                    <a href="{{ route('user.reports.create') }}"
                       class="group inline-flex min-h-[50px] items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-[#62e7d0] to-[#8bcfff] px-6 text-sm font-extrabold text-[#142b49] shadow-lg shadow-[#62e7d0]/10 transition hover:-translate-y-0.5 hover:shadow-xl">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
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


    {{-- MAIN --}}
    <div class="mx-auto max-w-7xl px-5 pb-16 sm:px-8 lg:px-10">

        {{-- NOTIFICATIONS --}}
        @if (session('success'))
            <div class="mt-6 flex items-start gap-3 rounded-2xl border border-[#62e7d0]/30 bg-white/90 px-5 py-4 shadow-sm backdrop-blur-xl">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#e5fbf6] text-[#247d70]">
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
            <div class="mt-6 flex items-start gap-3 rounded-2xl border border-rose-200 bg-white/90 px-5 py-4 shadow-sm backdrop-blur-xl">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-50 text-rose-600">
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
        <section class="mt-7 grid gap-5 sm:grid-cols-3">

            {{-- TOTAL --}}
            <div class="group relative overflow-hidden rounded-2xl border border-white bg-white/80 p-6 shadow-sm backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute right-0 top-0 h-1 w-full bg-gradient-to-r from-[#62e7d0] to-[#8bcfff]"></div>
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#62e7d0]/10 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Keseluruhan</p>
                        <p class="mt-4 font-['Manrope'] text-4xl font-extrabold text-[#142b49]">
                            {{ $reports->total() }}
                        </p>
                        <p class="mt-2 text-sm text-slate-500">Total laporan dibuat</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#d4fff5] to-[#c3eaff] text-[#247d70]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="5" y="3" width="14" height="18" rx="1.5" stroke-width="1.7"/>
                            <path stroke-linecap="round" stroke-width="1.7" d="M9 8h6M9 12h6M9 16h3"/>
                        </svg>
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3 text-xs font-medium text-slate-400">
                    Semua jenis laporan
                </div>
            </div>

            {{-- LOST --}}
            <div class="group relative overflow-hidden rounded-2xl border border-white bg-white/80 p-6 shadow-sm backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute right-0 top-0 h-1 w-full bg-gradient-to-r from-[#f4b6d2] to-[#e98292]"></div>
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#f4b6d2]/15 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Lost Items</p>
                        <p class="mt-4 font-['Manrope'] text-4xl font-extrabold text-[#142b49]">
                            {{ $reports->getCollection()->where('type', 'lost')->count() }}
                        </p>
                        <p class="mt-2 text-sm text-slate-500">Laporan barang hilang</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#ffe5ee] to-[#ffd6d9] text-[#b65d89]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                            <path stroke-linecap="round" stroke-width="2" d="M12 8v5m0 3h.01"/>
                        </svg>
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3 text-xs font-medium text-slate-400">
                    Membutuhkan bantuan pencarian
                </div>
            </div>

            {{-- FOUND --}}
            <div class="group relative overflow-hidden rounded-2xl border border-white bg-white/80 p-6 shadow-sm backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                <div class="absolute right-0 top-0 h-1 w-full bg-gradient-to-r from-[#62e7d0] to-[#65bba8]"></div>
                <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#62e7d0]/10 transition-transform duration-500 group-hover:scale-125"></div>

                <div class="relative flex items-start justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Found Items</p>
                        <p class="mt-4 font-['Manrope'] text-4xl font-extrabold text-[#142b49]">
                            {{ $reports->getCollection()->where('type', 'found')->count() }}
                        </p>
                        <p class="mt-2 text-sm text-slate-500">Laporan barang ditemukan</p>
                    </div>

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#d4fff5] to-[#b8f0dd] text-[#247d70]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.5 12 2.3 2.3 4.7-4.8"/>
                        </svg>
                    </div>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-3 text-xs font-medium text-slate-400">
                    Berpotensi kembali ke pemilik
                </div>
            </div>

        </section>


        {{-- REPORT LIST HEADER --}}
        <section class="mt-12">

            <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#6558b0]">
                        Report Management
                    </p>

                    <h2 class="mt-2 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#142b49] sm:text-3xl">
                        Riwayat Laporan
                    </h2>

                    <p class="mt-2 text-sm leading-6 text-slate-500">
                        Pantau informasi dan perkembangan setiap laporanmu.
                    </p>
                </div>

                <div class="inline-flex items-center gap-3 rounded-2xl border border-white bg-white/80 px-4 py-3 shadow-sm backdrop-blur-xl">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e7e1ff] text-[#6558b0]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-400">Data tercatat</p>
                        <p class="text-sm font-extrabold text-[#142b49]">{{ $reports->total() }} laporan</p>
                    </div>
                </div>
            </div>


            {{-- REPORT CARDS --}}
            <div class="mt-7 space-y-6">

                @forelse ($reports as $report)

                    <article class="group overflow-hidden rounded-[1.7rem] border border-white bg-white/90 shadow-sm backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[#142b49]/[0.06]">

                        <div class="grid min-w-0 lg:grid-cols-[300px_minmax(0,1fr)]">

                            {{-- IMAGE --}}
                            <div class="relative min-h-[250px] overflow-hidden bg-gradient-to-br from-[#e7e1ff] to-[#d4fff5] sm:min-h-[300px] lg:min-h-full">

                                @if ($report->photo)
                                    <img
                                        src="{{ asset('storage/' . $report->photo) }}"
                                        alt="Foto {{ $report->item_name }}"
                                        loading="lazy"
                                        class="absolute inset-0 h-full w-full object-cover transition duration-700 group-hover:scale-105"
                                    >
                                    <div class="absolute inset-0 bg-gradient-to-t from-[#142b49]/60 via-transparent to-[#142b49]/10"></div>
                                @else
                                    <div class="absolute inset-0 flex flex-col items-center justify-center bg-gradient-to-br from-[#e7e1ff] to-[#d4fff5] text-slate-400">
                                        <div class="flex h-20 w-20 items-center justify-center rounded-2xl border border-white bg-white/60 text-[#6558b0]">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.4" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                            </svg>
                                        </div>
                                        <span class="mt-3 text-xs font-bold tracking-wide">Belum ada foto</span>
                                    </div>
                                @endif

                                {{-- TYPE --}}
                                <div class="absolute left-4 top-4">
                                    <span class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-xs font-bold shadow-lg
                                        {{ $report->type === 'lost' ? 'bg-[#f4b6d2] text-[#803c61]' : 'bg-[#62e7d0] text-[#14584d]' }}">
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
                                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-white/90">
                                        TEMU / ITEM REPORT
                                    </p>
                                </div>

                            </div>


                            {{-- CONTENT --}}
                            <div class="flex min-w-0 flex-col p-5 sm:p-7 lg:p-8">

                                {{-- STATUS --}}
                                <div class="flex flex-wrap items-center justify-between gap-3">
                                    <div class="flex flex-wrap items-center gap-2">

                                        <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-bold
                                            {{ $report->status === 'active' ? 'bg-[#e0f2fe] text-[#2563a8]' : ($report->status === 'claimed' ? 'bg-[#fff0d8] text-[#a66b20]' : 'bg-slate-100 text-slate-600') }}">

                                            <span class="h-2 w-2 rounded-full
                                                {{ $report->status === 'active' ? 'bg-blue-500' : ($report->status === 'claimed' ? 'bg-amber-500' : 'bg-slate-400') }}">
                                            </span>

                                            {{ $report->status === 'active' ? 'Aktif' : ($report->status === 'claimed' ? 'Dalam Proses Klaim' : 'Dikembalikan') }}
                                        </span>

                                        @if ($report->moderation_status === 'hidden')
                                            <span class="inline-flex items-center gap-2 rounded-full bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700">
                                                <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                                                Disembunyikan Admin
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-2 rounded-full bg-[#e5fbf6] px-3 py-1.5 text-xs font-bold text-[#247d70]">
                                                <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                                                Ditampilkan
                                            </span>
                                        @endif

                                    </div>

                                    <span class="text-xs font-bold tracking-widest text-slate-300">
                                        TEMU
                                    </span>
                                </div>


                                {{-- ITEM --}}
                                <div class="mt-6">
                                    <p class="text-xs font-bold uppercase tracking-wider text-[#6558b0]">
                                        Nama Barang
                                    </p>

                                    <h3 class="mt-2 break-words font-['Manrope'] text-2xl font-extrabold leading-tight tracking-tight text-[#142b49] sm:text-3xl">
                                        {{ $report->item_name }}
                                    </h3>

                                    <p class="mt-3 inline-flex items-center gap-2 rounded-full bg-[#f0edff] px-3 py-1.5 text-xs font-semibold text-[#6558b0]">
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
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#e5fbf6] text-[#247d70]">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"/>
                                                <circle cx="12" cy="10" r="2.5"/>
                                            </svg>
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-xs font-medium text-slate-400">Lokasi</p>
                                            <p class="mt-1 break-words text-sm font-semibold leading-5 text-slate-700">{{ $report->location }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#e7e1ff] text-[#6558b0]">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium text-slate-400">Tanggal Kejadian</p>
                                            <p class="mt-1 text-sm font-semibold leading-5 text-slate-700">{{ $report->incident_date->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#e5f0ff] text-[#3875ae]">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="12" cy="12" r="9" stroke-width="1.7"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 7v5l3 2"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium text-slate-400">Tanggal Dibuat</p>
                                            <p class="mt-1 text-sm font-semibold leading-5 text-slate-700">{{ $report->created_at->format('d M Y') }}</p>
                                        </div>
                                    </div>

                                </div>


                                {{-- MODERATION --}}
                                @if ($report->moderation_status === 'hidden')
                                    <div class="mt-5 rounded-2xl border border-rose-200 bg-rose-50/80 p-4 sm:p-5">

                                        <div class="flex items-start gap-3">
                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-rose-100 text-rose-600">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                                                </svg>
                                            </div>

                                            <div class="min-w-0">
                                                <p class="text-sm font-extrabold text-rose-900">
                                                    Laporan Disembunyikan oleh Admin
                                                </p>

                                                <p class="mt-2 text-sm leading-6 text-rose-800">
                                                    Alasan: {{ $report->moderation_reason ?? 'Tidak ada alasan yang dicantumkan.' }}
                                                </p>

                                                @if ($report->moderator)
                                                    <p class="mt-3 text-xs font-medium text-rose-700">
                                                        Dimoderasi oleh: {{ $report->moderator->name }}
                                                    </p>
                                                @endif

                                                @if ($report->moderated_at)
                                                    <p class="mt-1 text-xs text-rose-700">
                                                        Tanggal moderasi: {{ $report->moderated_at->format('d M Y H:i') }}
                                                    </p>
                                                @endif

                                                <p class="mt-3 border-t border-rose-200 pt-3 text-xs leading-5 text-rose-700">
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
                                           class="group inline-flex min-h-[46px] items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#142b49] to-[#315f91] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-lg">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <circle cx="10.8" cy="10.8" r="7.3" stroke-width="1.8"/>
                                                <path stroke-linecap="round" stroke-width="1.8" d="m16.2 16.2 4.3 4.3"/>
                                            </svg>

                                            Cari Kecocokan

                                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6 6 6-6 6"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($report->type === 'found')
                                        <a href="{{ route('user.reports.claims.index', $report->id) }}"
                                           class="group inline-flex min-h-[46px] items-center justify-center gap-2 rounded-xl border border-[#e8c17b]/50 bg-[#fff8eb] px-5 py-3 text-sm font-bold text-[#946c2e] transition hover:-translate-y-0.5 hover:border-[#e8c17b] hover:shadow-md">

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>

                                            Lihat Klaim Masuk

                                            <svg class="h-4 w-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <div class="relative overflow-hidden rounded-[1.8rem] border border-white bg-white/80 px-6 py-16 text-center shadow-sm backdrop-blur-xl sm:py-20">

                        <div class="pointer-events-none absolute -right-20 -top-20 h-64 w-64 rounded-full bg-[#8e85ff]/10 blur-3xl"></div>
                        <div class="pointer-events-none absolute -left-20 -bottom-20 h-64 w-64 rounded-full bg-[#62e7d0]/10 blur-3xl"></div>

                        <div class="relative mx-auto flex h-24 w-24 items-center justify-center rounded-3xl bg-gradient-to-br from-[#d4fff5] to-[#e7e1ff] text-[#6558b0]">
                            <svg class="h-11 w-11" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <rect x="5" y="3" width="14" height="18" rx="1.5" stroke-width="1.5"/>
                                <path stroke-linecap="round" stroke-width="1.5" d="M9 8h6M9 12h6M9 16h3"/>
                            </svg>
                        </div>

                        <div class="relative mx-auto mt-7 max-w-lg">
                            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#6558b0]">
                                Your Story Starts Here
                            </p>

                            <h3 class="mt-3 font-['Manrope'] text-2xl font-extrabold tracking-tight text-[#142b49] sm:text-3xl">
                                Belum Ada Laporan
                            </h3>

                            <p class="mt-4 text-sm leading-7 text-slate-500">
                                Ruang laporanmu masih kosong. Mulai dengan melaporkan barang yang hilang atau barang yang kamu temukan agar komunitas TEMU dapat saling membantu.
                            </p>

                            <a href="{{ route('user.reports.create') }}"
                               class="mt-8 inline-flex min-h-[50px] items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-[#142b49] to-[#514d91] px-6 text-sm font-bold text-white shadow-lg shadow-[#142b49]/10 transition hover:-translate-y-0.5 hover:shadow-xl">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m7-7H5"/>
                                </svg>
                                Buat Laporan Pertama
                            </a>
                        </div>

                    </div>

                @endforelse

            </div>


            {{-- PAGINATION --}}
            @if ($reports->hasPages())
                <div class="mt-8 rounded-2xl border border-white bg-white/80 p-4 shadow-sm backdrop-blur-xl sm:p-5">
                    {{ $reports->links() }}
                </div>
            @endif

        </section>


        {{-- BRAND FOOTER --}}
        <section class="mt-14 border-t border-[#142b49]/10 pt-7">
            <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#62e7d0] to-[#8e85ff] font-['Manrope'] text-sm font-extrabold text-[#142b49]">
                        T
                    </div>
                    <div>
                        <p class="text-sm font-extrabold tracking-wide text-[#142b49]">TEMU</p>
                        <p class="text-xs font-medium tracking-wide text-slate-400">Lost & Found Platform</p>
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
