
@extends('layouts.app')

@section('title', 'Dashboard Admin | TEMU')

@section('content')
<div class="temu-container space-y-9 py-8 sm:py-10">

    {{-- HERO DASHBOARD --}}
    <section class="relative isolate overflow-hidden rounded-[28px] bg-[#122943] px-6 py-8 text-white shadow-xl shadow-[#122943]/10 sm:px-9 sm:py-10 lg:px-11">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -right-24 -top-36 h-96 w-96 rounded-full border border-white/[0.08]"></div>
            <div class="absolute -right-10 -top-24 h-72 w-72 rounded-full border border-white/[0.08]"></div>
            <div class="absolute -bottom-40 right-1/4 h-80 w-80 rounded-full bg-[#d5a34a]/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-[#d5a34a]/50 to-transparent"></div>
        </div>

        <div class="relative flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
            <div class="max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/[0.07] px-3.5 py-2">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-50"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                    </span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-slate-200">
                        Administrator Workspace
                    </span>
                </div>

                <p class="mt-7 text-sm font-medium text-[#e8c17b]">
                    Pusat Kendali TEMU
                </p>

                <h1 class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl lg:text-[42px]">
                    Dashboard Admin
                </h1>

                <p class="mt-4 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                    Kelola aktivitas platform, pantau laporan kehilangan dan penemuan, serta awasi proses klaim barang dalam satu ruang kerja.
                </p>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row lg:flex-col lg:items-end">
                <a href="{{ route('admin.reports.index') }}"
                   class="inline-flex items-center justify-center gap-2.5 rounded-xl bg-[#e8c17b] px-5 py-3.5 text-sm font-bold text-[#122943] shadow-lg shadow-black/10 transition hover:bg-[#f0d39b] focus:outline-none focus:ring-2 focus:ring-[#e8c17b] focus:ring-offset-2 focus:ring-offset-[#122943]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Kelola Laporan
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="relative mt-9 grid grid-cols-2 gap-3 border-t border-white/10 pt-6 sm:grid-cols-4 sm:gap-6">
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-slate-400">Pengguna</p>
                <p class="mt-2 text-2xl font-bold tabular-nums text-white">{{ $totalUsers }}</p>
            </div>
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-slate-400">Laporan</p>
                <p class="mt-2 text-2xl font-bold tabular-nums text-white">{{ $totalReports }}</p>
            </div>
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-slate-400">Total Klaim</p>
                <p class="mt-2 text-2xl font-bold tabular-nums text-white">{{ $totalClaims }}</p>
            </div>
            <div>
                <p class="text-[10px] font-semibold uppercase tracking-[0.15em] text-slate-400">Perlu Diproses</p>
                <p class="mt-2 text-2xl font-bold tabular-nums text-[#e8c17b]">{{ $pendingClaims }}</p>
            </div>
        </div>
    </section>

    {{-- RINGKASAN AKTIVITAS --}}
    <section>
        <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#b58a42]">
                    Overview
                </p>
                <h2 class="mt-1.5 text-xl font-bold tracking-tight text-[#172f4f] sm:text-2xl">
                    Ringkasan Aktivitas
                </h2>
                <p class="mt-1.5 text-sm text-slate-500">
                    Gambaran umum aktivitas yang tercatat pada platform TEMU.
                </p>
            </div>
            <span class="text-xs font-medium text-slate-400">
                Statistik keseluruhan
            </span>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

            {{-- TOTAL PENGGUNA --}}
            <article class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/[0.05]">
                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f] transition group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5 5 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-slate-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Users</span>
                </div>
                <p class="mt-6 text-sm font-medium text-slate-500">Total Pengguna</p>
                <p class="mt-1 text-3xl font-bold tracking-tight text-[#172f4f] tabular-nums">{{ $totalUsers }}</p>
                <div class="mt-5 border-t border-slate-100 pt-3">
                    <p class="text-xs text-slate-400">Akun pengguna terdaftar</p>
                </div>
            </article>

            {{-- TOTAL LAPORAN --}}
            <article class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/[0.05]">
                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-700 transition group-hover:bg-blue-700 group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-blue-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-blue-600">Reports</span>
                </div>
                <p class="mt-6 text-sm font-medium text-slate-500">Total Laporan</p>
                <p class="mt-1 text-3xl font-bold tracking-tight text-[#172f4f] tabular-nums">{{ $totalReports }}</p>
                <div class="mt-5 border-t border-slate-100 pt-3">
                    <p class="text-xs text-slate-400">Laporan kehilangan dan penemuan</p>
                </div>
            </article>

            {{-- TOTAL KLAIM --}}
            <article class="group rounded-2xl border border-slate-200/80 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-slate-900/[0.05]">
                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700 transition group-hover:bg-emerald-700 group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-emerald-600">Claims</span>
                </div>
                <p class="mt-6 text-sm font-medium text-slate-500">Total Klaim</p>
                <p class="mt-1 text-3xl font-bold tracking-tight text-[#172f4f] tabular-nums">{{ $totalClaims }}</p>
                <div class="mt-5 border-t border-slate-100 pt-3">
                    <p class="text-xs text-slate-400">Seluruh pengajuan kepemilikan</p>
                </div>
            </article>

            {{-- KLAIM MENUNGGU --}}
            <article class="group rounded-2xl border border-amber-200 bg-gradient-to-br from-amber-50 to-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-amber-900/[0.06]">
                <div class="flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-100 text-amber-700 transition group-hover:bg-amber-600 group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l2.5 2.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-amber-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-amber-700">Attention</span>
                </div>
                <p class="mt-6 text-sm font-medium text-slate-600">Klaim Menunggu</p>
                <p class="mt-1 text-3xl font-bold tracking-tight text-amber-700 tabular-nums">{{ $pendingClaims }}</p>
                <div class="mt-5 border-t border-amber-200/70 pt-3">
                    <p class="text-xs text-slate-500">Pengajuan yang belum diproses</p>
                </div>
            </article>

        </div>
    </section>

    {{-- MONITORING STATUS LAPORAN --}}
    <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">
        <div class="flex flex-col gap-4 border-b border-slate-100 px-5 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-7">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#b58a42]">Monitoring</p>
                <h2 class="mt-1.5 text-xl font-bold tracking-tight text-[#172f4f]">
                    Status Laporan
                </h2>
                <p class="mt-1.5 text-sm text-slate-500">
                    Pantau perkembangan seluruh laporan barang.
                </p>
            </div>

            <a href="{{ route('admin.reports.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 px-4 py-2.5 text-xs font-bold text-[#172f4f] transition hover:border-[#172f4f] hover:bg-[#172f4f] hover:text-white">
                Kelola Laporan
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 gap-px bg-slate-100 lg:grid-cols-4">

            <div class="bg-white p-5 sm:p-6">
                <div class="flex items-center gap-2.5">
                    <span class="h-2.5 w-2.5 rounded-full bg-slate-500"></span>
                    <p class="text-xs font-semibold text-slate-500 sm:text-sm">Aktif</p>
                </div>
                <p class="mt-4 text-3xl font-bold tracking-tight text-[#172f4f] tabular-nums">{{ $activeReports }}</p>
                <p class="mt-1 text-xs text-slate-400">Laporan aktif</p>
            </div>

            <div class="bg-white p-5 sm:p-6">
                <div class="flex items-center gap-2.5">
                    <span class="h-2.5 w-2.5 rounded-full bg-blue-600"></span>
                    <p class="text-xs font-semibold text-blue-700 sm:text-sm">Sedang Diklaim</p>
                </div>
                <p class="mt-4 text-3xl font-bold tracking-tight text-blue-800 tabular-nums">{{ $claimedReports }}</p>
                <p class="mt-1 text-xs text-slate-400">Dalam proses klaim</p>
            </div>

            <div class="bg-white p-5 sm:p-6">
                <div class="flex items-center gap-2.5">
                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-600"></span>
                    <p class="text-xs font-semibold text-emerald-700 sm:text-sm">Dikembalikan</p>
                </div>
                <p class="mt-4 text-3xl font-bold tracking-tight text-emerald-800 tabular-nums">{{ $returnedReports }}</p>
                <p class="mt-1 text-xs text-slate-400">Barang telah kembali</p>
            </div>

            <div class="bg-white p-5 sm:p-6">
                <div class="flex items-center gap-2.5">
                    <span class="h-2.5 w-2.5 rounded-full bg-red-600"></span>
                    <p class="text-xs font-semibold text-red-700 sm:text-sm">Disembunyikan</p>
                </div>
                <p class="mt-4 text-3xl font-bold tracking-tight text-red-800 tabular-nums">{{ $hiddenReports }}</p>
                <p class="mt-1 text-xs text-slate-400">Tidak ditampilkan</p>
            </div>

        </div>

        <div class="flex flex-wrap items-center justify-between gap-2 border-t border-slate-100 bg-slate-50/70 px-5 py-3.5 sm:px-7">
            <p class="text-xs text-slate-500">Status visibilitas dan proses laporan</p>
            <div class="flex items-center gap-2 text-xs font-medium text-slate-500">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                Data dashboard
            </div>
        </div>
    </section>

    {{-- MANAJEMEN SISTEM --}}
    <section>
        <div class="mb-5">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#b58a42]">Workspace</p>
            <h2 class="mt-1.5 text-xl font-bold tracking-tight text-[#172f4f] sm:text-2xl">
                Manajemen Sistem
            </h2>
            <p class="mt-1.5 text-sm text-slate-500">
                Akses pengelolaan utama untuk menjaga aktivitas TEMU tetap terorganisasi.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">

            {{-- LAPORAN --}}
            <a href="{{ route('admin.reports.index') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#172f4f]/30 hover:shadow-xl hover:shadow-[#172f4f]/[0.06] sm:p-6">
                <div class="absolute right-0 top-0 h-28 w-28 translate-x-10 -translate-y-10 rounded-full bg-[#172f4f]/[0.035] transition group-hover:scale-150"></div>

                <div class="relative flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#172f4f]/[0.07] text-[#172f4f] transition duration-300 group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold text-slate-600">
                        {{ $totalReports }} laporan
                    </span>
                </div>

                <div class="relative mt-6">
                    <h3 class="text-lg font-bold text-[#172f4f]">Manajemen Laporan</h3>
                    <p class="mt-2 min-h-[42px] text-sm leading-6 text-slate-500">
                        Periksa dan kelola laporan kehilangan maupun penemuan barang.
                    </p>
                </div>

                <div class="relative mt-5 grid grid-cols-2 gap-3 border-t border-slate-100 pt-5">
                    <div>
                        <p class="text-xs text-slate-400">Terlihat</p>
                        <p class="mt-1.5 text-2xl font-bold text-emerald-700 tabular-nums">{{ $visibleReports }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Tersembunyi</p>
                        <p class="mt-1.5 text-2xl font-bold text-red-700 tabular-nums">{{ $hiddenReports }}</p>
                    </div>
                </div>

                <div class="relative mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                    <span class="text-xs font-bold text-[#172f4f]">Buka Manajemen Laporan</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#172f4f]/[0.06] text-[#172f4f] transition group-hover:translate-x-1 group-hover:bg-[#172f4f] group-hover:text-white">&rarr;</span>
                </div>
            </a>

            {{-- PENGGUNA --}}
            <a href="{{ route('admin.users.index') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#172f4f]/30 hover:shadow-xl hover:shadow-[#172f4f]/[0.06] sm:p-6">
                <div class="absolute right-0 top-0 h-28 w-28 translate-x-10 -translate-y-10 rounded-full bg-[#172f4f]/[0.035] transition group-hover:scale-150"></div>

                <div class="relative flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#172f4f]/[0.07] text-[#172f4f] transition duration-300 group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5 5 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-slate-100 px-3 py-1.5 text-[10px] font-bold text-slate-600">
                        {{ $totalUsers }} pengguna
                    </span>
                </div>

                <div class="relative mt-6">
                    <h3 class="text-lg font-bold text-[#172f4f]">Manajemen Pengguna</h3>
                    <p class="mt-2 min-h-[42px] text-sm leading-6 text-slate-500">
                        Lihat data akun pengguna dan pantau aktivitas mereka di TEMU.
                    </p>
                </div>

                <div class="relative mt-5 border-t border-slate-100 pt-5">
                    <p class="text-2xl font-bold text-[#172f4f] tabular-nums">{{ $totalUsers }}</p>
                    <p class="mt-1 text-xs text-slate-400">Akun pengguna terdaftar</p>
                </div>

                <div class="relative mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                    <span class="text-xs font-bold text-[#172f4f]">Buka Manajemen Pengguna</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#172f4f]/[0.06] text-[#172f4f] transition group-hover:translate-x-1 group-hover:bg-[#172f4f] group-hover:text-white">&rarr;</span>
                </div>
            </a>

            {{-- KLAIM --}}
            <a href="{{ route('admin.claims.index') }}"
               class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:border-[#172f4f]/30 hover:shadow-xl hover:shadow-[#172f4f]/[0.06] sm:p-6">
                <div class="absolute right-0 top-0 h-28 w-28 translate-x-10 -translate-y-10 rounded-full bg-[#172f4f]/[0.035] transition group-hover:scale-150"></div>

                <div class="relative flex items-start justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#172f4f]/[0.07] text-[#172f4f] transition duration-300 group-hover:bg-[#172f4f] group-hover:text-white">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>
                    <span class="rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-700">
                        {{ $pendingClaims }} menunggu
                    </span>
                </div>

                <div class="relative mt-6">
                    <h3 class="text-lg font-bold text-[#172f4f]">Manajemen Klaim</h3>
                    <p class="mt-2 min-h-[42px] text-sm leading-6 text-slate-500">
                        Pantau pengajuan klaim, persetujuan, dan proses pengembalian barang.
                    </p>
                </div>

                <div class="relative mt-5 grid grid-cols-3 gap-2 border-t border-slate-100 pt-5">
                    <div>
                        <p class="text-xs text-slate-400">Menunggu</p>
                        <p class="mt-1.5 text-xl font-bold text-amber-700 tabular-nums">{{ $pendingClaims }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Disetujui</p>
                        <p class="mt-1.5 text-xl font-bold text-emerald-700 tabular-nums">{{ $approvedClaims }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400">Ditolak</p>
                        <p class="mt-1.5 text-xl font-bold text-red-700 tabular-nums">{{ $rejectedClaims }}</p>
                    </div>
                </div>

                <div class="relative mt-5 flex items-center justify-between border-t border-slate-100 pt-4">
                    <span class="text-xs font-bold text-[#172f4f]">Buka Manajemen Klaim</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-[#172f4f]/[0.06] text-[#172f4f] transition group-hover:translate-x-1 group-hover:bg-[#172f4f] group-hover:text-white">&rarr;</span>
                </div>
            </a>

        </div>
    </section>

    {{-- FOOTER DASHBOARD --}}
    <div class="flex flex-col gap-2 border-t border-slate-200 pt-5 sm:flex-row sm:items-center sm:justify-between">
        <p class="text-xs font-medium text-slate-400">
            TEMU · Administrator Workspace
        </p>
        <p class="text-xs text-slate-400">
            Pusat pengelolaan laporan kehilangan dan penemuan barang
        </p>
    </div>

</div>
@endsection
