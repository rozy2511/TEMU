
@extends('layouts.app')

@section('title', 'Dashboard Admin | TEMU')

@section('content')
<div class="temu-container space-y-8 py-8 sm:py-10">

    {{-- Header Dashboard --}}
    <section class="relative overflow-hidden rounded-3xl bg-[#172f4f] px-6 py-8 text-white shadow-sm sm:px-9 sm:py-10">
        <div class="absolute -right-16 -top-24 h-64 w-64 rounded-full border-[35px] border-white/[0.04]"></div>
        <div class="absolute -bottom-32 right-36 h-64 w-64 rounded-full border-[35px] border-white/[0.04]"></div>

        <div class="relative flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="max-w-2xl">
                <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-xs font-semibold text-slate-200">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Panel Administrator
                </div>

                <h1 class="text-2xl font-bold tracking-tight sm:text-3xl">
                    Dashboard Admin
                </h1>

                <p class="mt-3 text-sm leading-relaxed text-slate-300 sm:text-base">
                    Selamat datang di pusat pengelolaan TEMU. Pantau laporan, pengguna, dan proses klaim barang dalam satu tempat.
                </p>
            </div>

            <a href="{{ route('admin.reports.index') }}"
               class="inline-flex w-fit shrink-0 items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-semibold text-[#172f4f] shadow-sm transition hover:bg-slate-100">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                Lihat Laporan
            </a>
        </div>
    </section>

    {{-- Statistik Utama --}}
    <section>
        <div class="mb-5">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">
                Overview
            </p>
            <h2 class="mt-1 text-xl font-bold tracking-tight text-slate-900">
                Ringkasan Aktivitas
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Informasi umum aktivitas yang tercatat pada platform TEMU.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Total Pengguna --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Pengguna</p>
                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900 tabular-nums">
                            {{ $totalUsers }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5 5 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 border-t border-slate-100 pt-3">
                    <p class="text-xs text-slate-400">Akun pengguna terdaftar</p>
                </div>
            </div>

            {{-- Total Laporan --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Laporan</p>
                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900 tabular-nums">
                            {{ $totalReports }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-100 text-slate-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 border-t border-slate-100 pt-3">
                    <p class="text-xs text-slate-400">Laporan kehilangan dan penemuan</p>
                </div>
            </div>

            {{-- Total Klaim --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500">Total Klaim</p>
                        <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900 tabular-nums">
                            {{ $totalClaims }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 border-t border-slate-100 pt-3">
                    <p class="text-xs text-slate-400">Seluruh pengajuan klaim</p>
                </div>
            </div>

            {{-- Klaim Menunggu --}}
            <div class="rounded-2xl border border-amber-200 bg-amber-50/40 p-5 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-600">Klaim Menunggu</p>
                        <p class="mt-3 text-3xl font-bold tracking-tight text-amber-700 tabular-nums">
                            {{ $pendingClaims }}
                        </p>
                    </div>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M12 8v4l2.5 2.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-4 border-t border-amber-200/70 pt-3">
                    <p class="text-xs text-slate-500">Pengajuan yang belum diproses</p>
                </div>
            </div>

        </div>
    </section>

    {{-- Status Laporan --}}
    <section class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">
                    Monitoring
                </p>
                <h2 class="mt-1 text-xl font-bold text-slate-900">
                    Status Laporan
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Pantau perkembangan laporan yang masuk ke platform.
                </p>
            </div>

            <a href="{{ route('admin.reports.index') }}"
               class="inline-flex w-fit items-center gap-2 text-sm font-semibold text-[#172f4f] transition hover:text-blue-700">
                Kelola laporan
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14m-6-6l6 6-6 6"/>
                </svg>
            </a>
        </div>

        <div class="mt-7 grid grid-cols-2 gap-3 lg:grid-cols-4">

            <div class="rounded-xl bg-slate-50 p-4 sm:p-5">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-500"></span>
                    <p class="text-xs font-medium text-slate-500 sm:text-sm">Aktif</p>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-900 tabular-nums">
                    {{ $activeReports }}
                </p>
                <p class="mt-1 text-xs text-slate-400">Laporan aktif</p>
            </div>

            <div class="rounded-xl bg-blue-50/70 p-4 sm:p-5">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-blue-600"></span>
                    <p class="text-xs font-medium text-blue-700 sm:text-sm">Sedang Diklaim</p>
                </div>
                <p class="mt-3 text-2xl font-bold text-blue-800 tabular-nums">
                    {{ $claimedReports }}
                </p>
                <p class="mt-1 text-xs text-blue-600/70">Dalam proses klaim</p>
            </div>

            <div class="rounded-xl bg-emerald-50/70 p-4 sm:p-5">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-600"></span>
                    <p class="text-xs font-medium text-emerald-700 sm:text-sm">Dikembalikan</p>
                </div>
                <p class="mt-3 text-2xl font-bold text-emerald-800 tabular-nums">
                    {{ $returnedReports }}
                </p>
                <p class="mt-1 text-xs text-emerald-600/70">Barang telah kembali</p>
            </div>

            <div class="rounded-xl bg-red-50/70 p-4 sm:p-5">
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-red-600"></span>
                    <p class="text-xs font-medium text-red-700 sm:text-sm">Disembunyikan</p>
                </div>
                <p class="mt-3 text-2xl font-bold text-red-800 tabular-nums">
                    {{ $hiddenReports }}
                </p>
                <p class="mt-1 text-xs text-red-600/70">Tidak ditampilkan</p>
            </div>

        </div>
    </section>

    {{-- Manajemen Sistem --}}
    <section>
        <div class="mb-5">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">
                Pengelolaan
            </p>
            <h2 class="mt-1 text-xl font-bold tracking-tight text-slate-900">
                Manajemen Sistem
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Akses dan kelola fitur utama administrasi TEMU.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

            {{-- Manajemen Laporan --}}
            <a href="{{ route('admin.reports.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md sm:p-6">

                <div class="flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f] transition group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>

                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                        {{ $totalReports }} laporan
                    </span>
                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900">
                    Manajemen Laporan
                </h3>
                <p class="mt-2 min-h-[42px] text-sm leading-relaxed text-slate-500">
                    Periksa dan kelola laporan kehilangan maupun penemuan barang.
                </p>

                <div class="mt-5 grid grid-cols-2 gap-3 border-t border-slate-100 pt-5">
                    <div>
                        <p class="text-xs text-slate-400">Terlihat</p>
                        <p class="mt-1 text-xl font-bold text-emerald-700">{{ $visibleReports }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Tersembunyi</p>
                        <p class="mt-1 text-xl font-bold text-red-700">{{ $hiddenReports }}</p>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                    <span class="text-sm font-semibold text-[#172f4f]">Buka Manajemen Laporan</span>
                    <span class="text-lg text-[#172f4f] transition group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

            {{-- Manajemen Pengguna --}}
            <a href="{{ route('admin.users.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md sm:p-6">

                <div class="flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f] transition group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5 5 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>

                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                        {{ $totalUsers }} pengguna
                    </span>
                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900">
                    Manajemen Pengguna
                </h3>
                <p class="mt-2 min-h-[42px] text-sm leading-relaxed text-slate-500">
                    Lihat data akun pengguna dan pantau aktivitas mereka di TEMU.
                </p>

                <div class="mt-5 border-t border-slate-100 pt-5">
                    <p class="text-2xl font-bold text-slate-900 tabular-nums">{{ $totalUsers }}</p>
                    <p class="mt-1 text-xs text-slate-400">Akun pengguna terdaftar</p>
                </div>

                <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                    <span class="text-sm font-semibold text-[#172f4f]">Buka Manajemen Pengguna</span>
                    <span class="text-lg text-[#172f4f] transition group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

            {{-- Manajemen Klaim --}}
            <a href="{{ route('admin.claims.index') }}"
               class="group rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-slate-300 hover:shadow-md sm:p-6">

                <div class="flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f] transition group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                  d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>

                    <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                        {{ $pendingClaims }} menunggu
                    </span>
                </div>

                <h3 class="mt-5 text-lg font-bold text-slate-900">
                    Manajemen Klaim
                </h3>
                <p class="mt-2 min-h-[42px] text-sm leading-relaxed text-slate-500">
                    Pantau pengajuan klaim, persetujuan, dan proses pengembalian barang.
                </p>

                <div class="mt-5 grid grid-cols-3 gap-2 border-t border-slate-100 pt-5">
                    <div>
                        <p class="text-xs text-slate-400">Menunggu</p>
                        <p class="mt-1 text-xl font-bold text-amber-700">{{ $pendingClaims }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Disetujui</p>
                        <p class="mt-1 text-xl font-bold text-emerald-700">{{ $approvedClaims }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Ditolak</p>
                        <p class="mt-1 text-xl font-bold text-red-700">{{ $rejectedClaims }}</p>
                    </div>
                </div>

                <div class="mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                    <span class="text-sm font-semibold text-[#172f4f]">Buka Manajemen Klaim</span>
                    <span class="text-lg text-[#172f4f] transition group-hover:translate-x-1">&rarr;</span>
                </div>
            </a>

        </div>
    </section>

</div>
@endsection
