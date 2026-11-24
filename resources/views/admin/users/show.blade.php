
@extends('layouts.app')

@section('title', 'Detail Pengguna | TEMU')

@section('content')
<div class="temu-container space-y-8 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#514c94]">
            <span>&larr;</span>
            Kembali ke Daftar Pengguna
        </a>

        <div class="relative mt-6 overflow-hidden rounded-[2rem] border border-white/70 bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] px-6 py-8 text-white shadow-xl sm:px-9 sm:py-10">
            <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
            <div class="pointer-events-none absolute right-20 top-20 h-40 w-40 rounded-full bg-[#f4b6d2]/20 blur-3xl"></div>

            <div class="relative">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-xs font-semibold text-[#a9f4e8] backdrop-blur-md">
                    <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                    Administrasi Pengguna
                </div>

                <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Detail Pengguna
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-7 text-white/70">
                    Informasi akun dan aktivitas pengguna selama menggunakan platform TEMU.
                </p>
            </div>
        </div>
    </section>

    {{-- INFORMASI AKUN --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">

        <div class="border-b border-slate-100 p-5 sm:p-7">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-2xl font-extrabold text-[#514c94] shadow-sm">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                        Profil Pengguna
                    </p>

                    <h2 class="mt-1 break-words text-xl font-extrabold text-[#142b49] sm:text-2xl">
                        {{ $user->name }}
                    </h2>

                    <p class="mt-1 break-all text-sm text-slate-500">
                        {{ $user->email }}
                    </p>
                </div>

                <div class="w-fit rounded-2xl border border-[#8e85ff]/15 bg-gradient-to-r from-[#e4faf5] to-[#eeeaff] px-4 py-3">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-500">
                        Role Akun
                    </p>
                    <p class="mt-1 text-sm font-extrabold text-[#514c94]">
                        {{ ucfirst($user->role) }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 p-5 sm:grid-cols-2 sm:p-7">
            <div class="rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f6f7fb] p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e9e5ff] text-[#514c94]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <circle cx="12" cy="8" r="4"/>
                            <path stroke-linecap="round" d="M5 21v-2a7 7 0 0114 0v2"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                            Nama Pengguna
                        </p>
                        <p class="mt-1 break-words text-sm font-semibold text-slate-800">
                            {{ $user->name }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f6f7fb] p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#dffaf5] text-[#287d72]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18v14H3z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3 7 9 6 9-6"/>
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                            Alamat Email
                        </p>
                        <p class="mt-1 break-all text-sm font-medium text-slate-700">
                            {{ $user->email }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f6f7fb] p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#fce8f2] text-[#a44d79]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v6c0 5-3.5 7-8 8-4.5-1-8-3-8-8V7l8-4z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                            Role Akun
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ ucfirst($user->role) }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f6f7fb] p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#fff1dc] text-[#b17b32]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <rect x="3" y="4" width="18" height="17" rx="2"/>
                            <path stroke-linecap="round" d="M16 2v4M8 2v4M3 10h18"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                            Tanggal Bergabung
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $user->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STATISTIK AKTIVITAS --}}
    <section>
        <div class="mb-5">
            <div class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-[#e4faf5] to-[#eeeaff] px-3 py-1.5 text-xs font-bold text-[#514c94]">
                <span class="h-2 w-2 rounded-full bg-[#8e85ff]"></span>
                Aktivitas Pengguna
            </div>

            <h2 class="mt-3 text-xl font-extrabold text-[#142b49] sm:text-2xl">
                Ringkasan Aktivitas
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Statistik laporan kehilangan dan penemuan yang dibuat pengguna.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5 sm:grid-cols-3">

            {{-- TOTAL LAPORAN --}}
            <div class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 p-6 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="pointer-events-none absolute -right-10 -top-10 h-36 w-36 rounded-full bg-[#8e85ff]/10 blur-2xl transition group-hover:bg-[#8e85ff]/20"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e9e5ff] to-[#dce9ff] text-[#514c94]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Keseluruhan
                    </span>
                </div>

                <p class="relative mt-5 text-sm font-medium text-slate-500">
                    Total Laporan
                </p>

                <p class="relative mt-2 text-4xl font-extrabold tracking-tight text-[#514c94]">
                    {{ $user->itemReports->count() }}
                </p>

                <p class="relative mt-2 text-xs text-slate-400">
                    Seluruh laporan barang
                </p>

                <div class="relative mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full w-full rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></div>
                </div>
            </div>

            {{-- KEHILANGAN --}}
            <div class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 p-6 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="pointer-events-none absolute -right-10 -top-10 h-36 w-36 rounded-full bg-[#f4b6d2]/20 blur-2xl transition group-hover:bg-[#f4b6d2]/30"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#fff1dc] to-[#fce8f2] text-[#a44d79]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3l-7.5-13.1a2 2 0 00-3.4 0z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-[#b17b32]">
                        Lost
                    </span>
                </div>

                <p class="relative mt-5 text-sm font-medium text-slate-500">
                    Laporan Kehilangan
                </p>

                <p class="relative mt-2 text-4xl font-extrabold tracking-tight text-[#b17b32]">
                    {{ $user->itemReports->where('type', 'lost')->count() }}
                </p>

                <p class="relative mt-2 text-xs text-slate-400">
                    Barang yang dilaporkan hilang
                </p>

                <div class="relative mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full w-full rounded-full bg-gradient-to-r from-[#e8c17b] to-[#f4b6d2]"></div>
                </div>
            </div>

            {{-- PENEMUAN --}}
            <div class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 p-6 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl transition duration-300 hover:-translate-y-1 hover:shadow-lg">
                <div class="pointer-events-none absolute -right-10 -top-10 h-36 w-36 rounded-full bg-[#62e7d0]/20 blur-2xl transition group-hover:bg-[#62e7d0]/30"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#dce9ff] text-[#287d72]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3m2.5-6.5l13 13m0-13l-13 13"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600">
                        Found
                    </span>
                </div>

                <p class="relative mt-5 text-sm font-medium text-slate-500">
                    Laporan Penemuan
                </p>

                <p class="relative mt-2 text-4xl font-extrabold tracking-tight text-[#287d72]">
                    {{ $user->itemReports->where('type', 'found')->count() }}
                </p>

                <p class="relative mt-2 text-xs text-slate-400">
                    Barang yang dilaporkan ditemukan
                </p>

                <div class="relative mt-5 h-1.5 overflow-hidden rounded-full bg-slate-100">
                    <div class="h-full w-full rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8bcfff]"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- RIWAYAT LAPORAN --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">

        <div class="border-b border-slate-100 px-5 py-6 sm:px-7">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-extrabold text-[#142b49]">
                        Riwayat Laporan Barang
                    </h2>
                    <p class="mt-2 text-xs leading-5 text-slate-500">
                        Seluruh laporan kehilangan dan penemuan yang dibuat pengguna.
                    </p>
                </div>

                <div class="inline-flex w-fit items-center gap-2 rounded-2xl bg-gradient-to-r from-[#e4faf5] to-[#eeeaff] px-4 py-2.5">
                    <svg class="h-4 w-4 text-[#514c94]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                    </svg>
                    <span class="text-xs font-bold text-[#514c94]">
                        {{ $user->itemReports->count() }} Laporan
                    </span>
                </div>
            </div>
        </div>

        {{-- TABEL DESKTOP --}}
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full min-w-[1050px] text-left text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-[#f5f7fc] to-[#f0efff] text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">
                        <th class="px-5 py-4">No.</th>
                        <th class="px-5 py-4">Nama Barang</th>
                        <th class="px-5 py-4">Jenis</th>
                        <th class="px-5 py-4">Lokasi</th>
                        <th class="px-5 py-4">Status Barang</th>
                        <th class="px-5 py-4">Tanggal</th>
                        <th class="px-5 py-4">Klaim</th>
                        <th class="px-5 py-4">Moderasi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($user->itemReports as $report)
                        <tr class="transition duration-200 hover:bg-gradient-to-r hover:from-[#f5fffc] hover:to-[#f8f6ff]">
                            <td class="px-5 py-5 text-slate-400">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-5">
                                <p class="font-bold text-slate-800">
                                    {{ $report->item_name }}
                                </p>
                                <p class="mt-1 text-xs text-slate-400">
                                    {{ $report->category }}
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                @if ($report->type === 'lost')
                                    <span class="whitespace-nowrap rounded-full border border-[#e8c17b]/20 bg-[#fff1dc] px-3 py-1.5 text-xs font-bold text-[#a67530]">
                                        Kehilangan
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full border border-[#62e7d0]/20 bg-[#dffaf5] px-3 py-1.5 text-xs font-bold text-[#287d72]">
                                        Penemuan
                                    </span>
                                @endif
                            </td>

                            <td class="max-w-[180px] px-5 py-5 text-slate-600">
                                <p class="line-clamp-2 leading-6">
                                    {{ $report->location }}
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                @if ($report->status === 'active')
                                    <span class="whitespace-nowrap rounded-full bg-blue-50 px-3 py-1.5 text-xs font-bold text-blue-700">
                                        Aktif
                                    </span>
                                @elseif ($report->status === 'claimed')
                                    <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">
                                        Sedang Diklaim
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-5 py-5 text-slate-500">
                                {{ $report->created_at->format('d M Y') }}
                            </td>

                            <td class="px-5 py-5 text-center font-bold text-slate-700">
                                {{ $report->claims->count() }}
                            </td>

                            <td class="px-5 py-5">
                                @if ($report->moderation_status === 'hidden')
                                    <span class="whitespace-nowrap rounded-full bg-red-50 px-3 py-1.5 text-xs font-bold text-red-700">
                                        Disembunyikan
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                        Terlihat
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                                    </svg>
                                </div>

                                <p class="mt-4 text-sm font-bold text-slate-700">
                                    Belum Ada Laporan Barang
                                </p>
                                <p class="mt-2 text-xs text-slate-400">
                                    Pengguna ini belum pernah membuat laporan kehilangan atau penemuan.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- KARTU MOBILE DAN TABLET --}}
        <div class="space-y-3 p-4 lg:hidden">
            @forelse ($user->itemReports as $report)
                <article class="group rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f7f8fc] p-4 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">

                    <div class="flex flex-wrap items-start justify-between gap-3">
                        <div class="min-w-0 flex-1">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Laporan #{{ $loop->iteration }}
                            </p>
                            <h3 class="mt-1 break-words text-sm font-bold text-slate-800">
                                {{ $report->item_name }}
                            </h3>
                            <p class="mt-1 text-xs text-slate-500">
                                {{ $report->category }}
                            </p>
                        </div>

                        @if ($report->type === 'lost')
                            <span class="shrink-0 rounded-full bg-[#fff1dc] px-3 py-1.5 text-[10px] font-bold text-[#a67530]">
                                Kehilangan
                            </span>
                        @else
                            <span class="shrink-0 rounded-full bg-[#dffaf5] px-3 py-1.5 text-[10px] font-bold text-[#287d72]">
                                Penemuan
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 grid grid-cols-2 gap-4 border-t border-slate-200/70 pt-4">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Lokasi
                            </p>
                            <p class="mt-1 break-words text-xs font-medium leading-5 text-slate-700">
                                {{ $report->location }}
                            </p>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Tanggal
                            </p>
                            <p class="mt-1 text-xs font-medium text-slate-700">
                                {{ $report->created_at->format('d M Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Status Barang
                            </p>
                            <div class="mt-2">
                                @if ($report->status === 'active')
                                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-[10px] font-bold text-blue-700">
                                        Aktif
                                    </span>
                                @elseif ($report->status === 'claimed')
                                    <span class="rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-700">
                                        Sedang Diklaim
                                    </span>
                                @else
                                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold text-emerald-700">
                                        Dikembalikan
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Jumlah Klaim
                            </p>
                            <p class="mt-1 text-sm font-bold text-slate-700">
                                {{ $report->claims->count() }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-between gap-3 border-t border-slate-200/70 pt-3">
                        <span class="text-xs font-medium text-slate-500">
                            Moderasi
                        </span>

                        @if ($report->moderation_status === 'hidden')
                            <span class="rounded-full bg-red-50 px-3 py-1.5 text-[10px] font-bold text-red-700">
                                Disembunyikan
                            </span>
                        @else
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold text-emerald-700">
                                Terlihat
                            </span>
                        @endif
                    </div>
                </article>
            @empty
                <div class="py-10 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                        </svg>
                    </div>

                    <p class="mt-4 text-sm font-bold text-slate-700">
                        Belum Ada Laporan Barang
                    </p>
                    <p class="mt-2 text-xs text-slate-400">
                        Pengguna ini belum pernah membuat laporan kehilangan atau penemuan.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

</div>
@endsection
