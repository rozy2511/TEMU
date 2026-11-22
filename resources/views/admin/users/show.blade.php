
@extends('layouts.app')

@section('title', 'Detail Pengguna | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#172f4f]">
            <span class="text-lg">&larr;</span>
            Kembali ke Daftar Pengguna
        </a>

        <div class="relative mt-6 overflow-hidden rounded-3xl bg-[#172f4f] px-6 py-8 text-white shadow-sm sm:px-8 sm:py-9">
            <div class="absolute -right-16 -top-24 h-64 w-64 rounded-full border-[35px] border-white/[0.04]"></div>
            <div class="absolute -bottom-28 right-32 h-56 w-56 rounded-full bg-[#d5a34a]/10 blur-3xl"></div>

            <div class="relative">
                <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8c17b]">
                    Administrasi / Pengguna
                </p>
                <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">
                    Detail Pengguna
                </h1>
                <p class="mt-3 max-w-xl text-sm leading-6 text-slate-300">
                    Informasi akun dan aktivitas pengguna selama menggunakan platform TEMU.
                </p>
            </div>
        </div>
    </section>

    {{-- INFORMASI AKUN --}}
    <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

        <div class="border-b border-slate-100 p-5 sm:p-7">
            <div class="flex flex-col gap-5 sm:flex-row sm:items-center">
                <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-[#172f4f]/[0.08] text-2xl font-bold text-[#172f4f]">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>

                <div class="min-w-0 flex-1">
                    <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                        Profil Pengguna
                    </p>
                    <h2 class="mt-1 break-words text-xl font-bold text-[#172f4f] sm:text-2xl">
                        {{ $user->name }}
                    </h2>
                    <p class="mt-1 break-all text-sm text-slate-500">
                        {{ $user->email }}
                    </p>
                </div>

                <div class="w-fit rounded-xl border border-[#172f4f]/10 bg-[#172f4f]/[0.04] px-4 py-2.5">
                    <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                        Role Akun
                    </p>
                    <p class="mt-1 text-sm font-bold text-[#172f4f]">
                        {{ ucfirst($user->role) }}
                    </p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6 p-5 sm:grid-cols-2 sm:p-7">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Nama Pengguna
                </p>
                <p class="mt-2 text-sm font-semibold text-slate-800">
                    {{ $user->name }}
                </p>
            </div>

            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Alamat Email
                </p>
                <p class="mt-2 break-all text-sm font-medium text-slate-700">
                    {{ $user->email }}
                </p>
            </div>

            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Role Akun
                </p>
                <p class="mt-2 text-sm font-medium text-slate-700">
                    {{ ucfirst($user->role) }}
                </p>
            </div>

            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Tanggal Bergabung
                </p>
                <p class="mt-2 text-sm font-medium text-slate-700">
                    {{ $user->created_at->format('d M Y, H:i') }}
                </p>
            </div>
        </div>
    </section>

    {{-- STATISTIK AKTIVITAS --}}
    <section>
        <div class="mb-5">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#d5a34a]">
                Aktivitas Pengguna
            </p>
            <h2 class="mt-2 text-xl font-bold text-[#172f4f]">
                Ringkasan Aktivitas
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Statistik laporan kehilangan dan penemuan yang dibuat pengguna.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            {{-- TOTAL LAPORAN --}}
            <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-[#172f4f]/[0.04]"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#172f4f]/[0.08] text-[#172f4f]">
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
                <p class="relative mt-1 text-4xl font-bold tracking-tight text-[#172f4f]">
                    {{ $user->itemReports->count() }}
                </p>
                <p class="relative mt-2 text-xs text-slate-400">
                    Seluruh laporan barang
                </p>
            </div>

            {{-- KEHILANGAN --}}
            <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-amber-500/[0.05]"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-amber-50 text-amber-700">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.3 3.9L2.8 17a2 2 0 001.7 3h15a2 2 0 001.7-3l-7.5-13.1a2 2 0 00-3.4 0z"/>
                        </svg>
                    </div>
                    <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600">
                        Lost
                    </span>
                </div>

                <p class="relative mt-5 text-sm font-medium text-slate-500">
                    Laporan Kehilangan
                </p>
                <p class="relative mt-1 text-4xl font-bold tracking-tight text-amber-700">
                    {{ $user->itemReports->where('type', 'lost')->count() }}
                </p>
                <p class="relative mt-2 text-xs text-slate-400">
                    Barang yang dilaporkan hilang
                </p>
            </div>

            {{-- PENEMUAN --}}
            <div class="relative overflow-hidden rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
                <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full bg-emerald-500/[0.05]"></div>

                <div class="relative flex items-center justify-between">
                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-700">
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
                <p class="relative mt-1 text-4xl font-bold tracking-tight text-emerald-700">
                    {{ $user->itemReports->where('type', 'found')->count() }}
                </p>
                <p class="relative mt-2 text-xs text-slate-400">
                    Barang yang dilaporkan ditemukan
                </p>
            </div>
        </div>
    </section>

    {{-- RIWAYAT LAPORAN --}}
    <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-bold text-[#172f4f]">
                        Riwayat Laporan Barang
                    </h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Seluruh laporan kehilangan dan penemuan yang dibuat pengguna.
                    </p>
                </div>

                <div class="w-fit rounded-xl bg-[#172f4f]/[0.06] px-4 py-2">
                    <p class="text-xs font-bold text-[#172f4f]">
                        {{ $user->itemReports->count() }} Laporan Tercatat
                    </p>
                </div>
            </div>
        </div>

        {{-- TABEL DESKTOP --}}
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full min-w-[1050px] text-left text-sm">
                <thead class="bg-slate-50">
                    <tr class="text-[10px] font-bold uppercase tracking-[0.13em] text-slate-400">
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
                        <tr class="transition hover:bg-slate-50/70">
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
                                    <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">
                                        Kehilangan
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
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
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
                                    </svg>
                                </div>
                                <p class="mt-4 text-sm font-bold text-slate-700">
                                    Belum Ada Laporan Barang
                                </p>
                                <p class="mt-1 text-xs text-slate-400">
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
                <article class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">

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
                            <span class="shrink-0 rounded-full bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-700">
                                Kehilangan
                            </span>
                        @else
                            <span class="shrink-0 rounded-full bg-emerald-50 px-3 py-1.5 text-[10px] font-bold text-emerald-700">
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
                    <p class="text-sm font-bold text-slate-700">
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
