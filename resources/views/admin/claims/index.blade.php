
@extends('layouts.app')

@section('title', 'Manajemen Klaim | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section class="relative isolate overflow-hidden rounded-[28px] bg-[#122943] px-6 py-8 text-white shadow-xl shadow-[#122943]/10 sm:px-9 sm:py-10">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="absolute -right-20 -top-28 h-72 w-72 rounded-full border border-white/[0.08]"></div>
            <div class="absolute -right-5 -top-16 h-52 w-52 rounded-full border border-white/[0.08]"></div>
            <div class="absolute -bottom-28 right-1/3 h-56 w-56 rounded-full bg-[#d5a34a]/10 blur-3xl"></div>
        </div>

        <div class="relative">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-slate-300 transition hover:text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Dashboard
            </a>

            <div class="mt-8 max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/[0.07] px-3.5 py-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#e8c17b]"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#f0d7a7]">
                        Administrasi TEMU
                    </span>
                </div>

                <h1 class="mt-4 text-3xl font-bold tracking-tight sm:text-4xl">
                    Manajemen Klaim
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                    Kelola seluruh pengajuan kepemilikan barang, periksa identitas pengaju, dan pantau perkembangan proses verifikasi.
                </p>
            </div>

            <div class="mt-8 flex flex-wrap items-center gap-3 border-t border-white/10 pt-5">
                <div class="flex items-center gap-2 rounded-xl border border-white/10 bg-white/[0.06] px-4 py-3">
                    <svg class="h-4 w-4 text-[#e8c17b]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>
                    <span class="text-xs text-slate-300">Total pengajuan</span>
                    <span class="text-sm font-bold text-white">{{ $claims->total() }}</span>
                </div>

                <div class="flex items-center gap-2 text-xs text-slate-400">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    Data pengajuan klaim pengguna
                </div>
            </div>
        </div>
    </section>

    {{-- SEARCH AND FILTER --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-6">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-[#172f4f]">
                        Pencarian dan Filter
                    </h2>
                    <p class="mt-0.5 text-xs text-slate-500">
                        Temukan pengajuan berdasarkan barang, pengguna, atau status.
                    </p>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.claims.index') }}" class="p-5 sm:p-6">
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-[1fr_240px_auto]">

                <div>
                    <label for="search" class="mb-2 block text-xs font-bold text-slate-600">
                        Kata Kunci
                    </label>
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nama barang atau pengguna..."
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-10 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#172f4f] focus:bg-white focus:ring-2 focus:ring-[#172f4f]/10"
                        >
                    </div>
                </div>

                <div>
                    <label for="status" class="mb-2 block text-xs font-bold text-slate-600">
                        Status Klaim
                    </label>
                    <select
                        name="status"
                        id="status"
                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-[#172f4f] focus:bg-white focus:ring-2 focus:ring-[#172f4f]/10"
                    >
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>
                            Menunggu
                        </option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>
                            Disetujui
                        </option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>
                            Ditolak
                        </option>
                    </select>
                </div>

                <div class="flex flex-col justify-end gap-2 sm:flex-row lg:flex-col">
                    <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213f63] focus:outline-none focus:ring-2 focus:ring-[#172f4f] focus:ring-offset-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Klaim
                    </button>

                    <a href="{{ route('admin.claims.index') }}"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50 hover:text-[#172f4f]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset Filter
                    </a>
                </div>

            </div>
        </form>
    </section>

    {{-- CLAIM TABLE --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200/80 bg-white shadow-sm">

        <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#b58a42]">
                    Database
                </p>
                <h2 class="mt-1 text-lg font-bold text-[#172f4f]">
                    Data Pengajuan Klaim
                </h2>
                <p class="mt-1 text-xs text-slate-500">
                    Daftar pengajuan kepemilikan barang yang tercatat dalam sistem.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <span class="rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2 text-xs font-semibold text-slate-600">
                    Total: <span class="font-bold text-[#172f4f]">{{ $claims->total() }}</span> pengajuan
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1050px] text-left text-sm">

                <thead class="bg-[#f7f8fa]">
                    <tr class="border-b border-slate-200">
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">No.</th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">Barang</th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">Penemu</th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">Pengaju Klaim</th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">Status</th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">Tanggal Pengajuan</th>
                        <th class="px-5 py-4 text-[10px] font-bold uppercase tracking-[0.13em] text-slate-500">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($claims as $claim)

                        <tr class="transition duration-150 hover:bg-slate-50/80">

                            <td class="px-5 py-5 text-xs font-medium text-slate-400">
                                {{ $claims->firstItem() + $loop->index }}
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#172f4f]/[0.06] text-[#172f4f]">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-slate-800">
                                            {{ $claim->itemReport->item_name ?? 'Laporan tidak tersedia' }}
                                        </p>
                                        @if ($claim->itemReport)
                                            <p class="mt-1 text-xs text-slate-400">
                                                {{ $claim->itemReport->category }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-5">
                                <p class="font-medium text-slate-700">
                                    {{ $claim->itemReport->user->name ?? '-' }}
                                </p>
                                <p class="mt-1 text-[10px] uppercase tracking-wider text-slate-400">Penemu barang</p>
                            </td>

                            <td class="px-5 py-5">
                                <p class="font-medium text-slate-700">
                                    {{ $claim->claimant->name ?? '-' }}
                                </p>
                                <p class="mt-1 text-[10px] uppercase tracking-wider text-slate-400">Pemohon klaim</p>
                            </td>

                            <td class="px-5 py-5">
                                @if ($claim->status === 'pending')
                                    <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full border border-amber-200 bg-amber-50 px-3 py-1.5 text-[11px] font-bold text-amber-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Menunggu
                                    </span>
                                @elseif ($claim->status === 'approved')
                                    <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full border border-emerald-200 bg-emerald-50 px-3 py-1.5 text-[11px] font-bold text-emerald-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full border border-red-200 bg-red-50 px-3 py-1.5 text-[11px] font-bold text-red-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Ditolak
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-5 py-5">
                                <p class="font-medium text-slate-700">
                                    {{ $claim->created_at->format('d M Y') }}
                                </p>
                                <p class="mt-1 text-xs text-slate-400">
                                    {{ $claim->created_at->format('H:i') }} WIB
                                </p>
                            </td>

                            <td class="px-5 py-5">
                                <a href="{{ route('admin.claims.show', $claim->id) }}"
                                   class="inline-flex items-center gap-2 whitespace-nowrap rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs font-bold text-[#172f4f] transition hover:border-[#172f4f] hover:bg-[#172f4f] hover:text-white focus:outline-none focus:ring-2 focus:ring-[#172f4f]/20">
                                    Lihat Detail
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-5 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#172f4f]/[0.06] text-[#172f4f]">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                                    </svg>
                                </div>

                                <h3 class="mt-4 text-base font-bold text-[#172f4f]">
                                    Belum Ada Pengajuan Klaim
                                </h3>

                                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                                    Pengajuan klaim pengguna akan ditampilkan di halaman ini setelah dikirimkan.
                                </p>

                                @if (request()->filled('search') || request()->filled('status'))
                                    <a href="{{ route('admin.claims.index') }}"
                                       class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#172f4f] underline decoration-[#d5a34a] underline-offset-4 hover:text-[#b58a42]">
                                        Hapus semua filter
                                    </a>
                                @endif
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINATION --}}
        @if ($claims->hasPages())
            <div class="flex flex-col gap-3 border-t border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <p class="text-xs text-slate-400">
                    Menampilkan {{ $claims->firstItem() }}–{{ $claims->lastItem() }} dari {{ $claims->total() }} pengajuan
                </p>
                {{ $claims->links() }}
            </div>
        @endif

    </section>

</div>
@endsection
