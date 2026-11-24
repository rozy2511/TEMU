
@extends('layouts.app')

@section('title', 'Manajemen Klaim | TEMU')

@section('content')
<div class="temu-container space-y-8 py-8 sm:py-10">

    <section>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#635bdb]">
            <span>&larr;</span>
            Kembali ke Dashboard
        </a>

        <div class="relative mt-6 overflow-hidden rounded-[2rem] border border-white/10 bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] px-6 py-8 text-white shadow-xl sm:px-9 sm:py-10">
            <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
            <div class="pointer-events-none absolute right-24 top-24 h-40 w-40 rounded-full bg-[#f4b6d2]/20 blur-3xl"></div>

            <div class="relative">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-xs font-semibold text-[#a9f4e8] backdrop-blur-md">
                    <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                    Administrasi TEMU
                </div>

                <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Manajemen Klaim
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-7 text-white/70 sm:text-base">
                    Kelola pengajuan kepemilikan barang, periksa informasi pengaju, dan pantau proses verifikasi klaim.
                </p>
            </div>

            <div class="relative mt-8 flex flex-wrap items-center gap-3 border-t border-white/10 pt-5">
                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/10 px-4 py-3 backdrop-blur-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#62e7d0]/20 to-[#8e85ff]/30 text-[#a9f4e8]">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-white/60">Total Pengajuan</p>
                        <p class="text-xl font-extrabold text-[#a9f4e8]">{{ $claims->total() }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-xs text-white/60">
                    <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                    Data pengajuan klaim pengguna
                </div>
            </div>
        </div>
    </section>

    @if (session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-medium text-red-700">
            {{ session('error') }}
        </div>
    @endif

    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/85 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-[#142b49]">Pencarian dan Filter</h2>
                    <p class="mt-1 text-xs leading-5 text-slate-500">
                        Temukan pengajuan berdasarkan barang, pengguna, atau status.
                    </p>
                </div>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.claims.index') }}" class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-5 lg:grid-cols-[1fr_240px_auto]">
                <div>
                    <label for="search" class="mb-2 block text-xs font-bold text-slate-600">
                        Kata Kunci
                    </label>
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m16 16 4 4"/>
                        </svg>
                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nama barang atau pengguna..."
                            class="w-full rounded-2xl border border-slate-200/80 bg-[#f6f7fb] py-3.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
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
                        class="w-full rounded-2xl border border-slate-200/80 bg-[#f6f7fb] px-4 py-3.5 text-sm text-slate-700 outline-none transition focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                    >
                        <option value="">Semua Status</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Menunggu</option>
                        <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Disetujui</option>
                        <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </div>

                <div class="flex flex-col justify-end gap-2 sm:flex-row lg:flex-col">
                    <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#514c94] to-[#8077e8] px-5 py-3.5 text-sm font-bold text-white shadow-md shadow-[#514c94]/15 transition hover:-translate-y-0.5 hover:shadow-lg">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                            <circle cx="11" cy="11" r="7"/>
                            <path stroke-linecap="round" d="m16 16 4 4"/>
                        </svg>
                        Cari Klaim
                    </button>

                    <a href="{{ route('admin.claims.index') }}"
                       class="inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 py-3.5 text-sm font-semibold text-slate-600 transition hover:bg-[#f6f7fb] hover:text-[#514c94]">
                        Reset Filter
                    </a>
                </div>
            </div>
        </form>
    </section>

    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">
        <div class="flex flex-col gap-4 border-b border-slate-100 px-5 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-7">
            <div>
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                    <h2 class="text-lg font-bold text-[#142b49]">Data Pengajuan Klaim</h2>
                </div>
                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Daftar pengajuan kepemilikan barang yang tercatat dalam sistem.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-2xl bg-gradient-to-r from-[#e4faf5] to-[#eeeaff] px-4 py-2.5">
                <svg class="h-4 w-4 text-[#514c94]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                </svg>
                <span class="text-xs font-bold text-[#514c94]">{{ $claims->total() }} Pengajuan</span>
            </div>
        </div>

        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[1150px] text-left text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-[#f5f7fc] to-[#f0efff] text-[10px] font-bold uppercase tracking-[0.15em] text-slate-500">
                        <th class="px-5 py-4">No.</th>
                        <th class="px-5 py-4">Barang</th>
                        <th class="px-5 py-4">Penemu</th>
                        <th class="px-5 py-4">Pengaju Klaim</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Tanggal Pengajuan</th>
                        <th class="px-5 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($claims as $claim)
                        <tr class="transition duration-200 hover:bg-gradient-to-r hover:from-[#f5fffc] hover:to-[#f8f6ff]">
                            <td class="px-5 py-5 text-xs font-medium text-slate-400">
                                {{ $claims->firstItem() + $loop->index }}
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94]">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
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
                                <p class="font-semibold text-slate-700">{{ $claim->itemReport->user->name ?? '-' }}</p>
                                <p class="mt-1 text-[10px] uppercase tracking-wider text-slate-400">Penemu barang</p>
                            </td>

                            <td class="px-5 py-5">
                                <p class="font-semibold text-slate-700">{{ $claim->claimant->name ?? '-' }}</p>
                                <p class="mt-1 text-[10px] uppercase tracking-wider text-slate-400">Pemohon klaim</p>
                            </td>

                            <td class="px-5 py-5">
                                @if ($claim->status === 'pending')
                                    <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full border border-amber-200/70 bg-amber-50 px-3 py-1.5 text-[11px] font-bold text-amber-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Menunggu
                                    </span>
                                @elseif ($claim->status === 'approved')
                                    <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full border border-emerald-200/70 bg-emerald-50 px-3 py-1.5 text-[11px] font-bold text-emerald-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 whitespace-nowrap rounded-full border border-red-200/70 bg-red-50 px-3 py-1.5 text-[11px] font-bold text-red-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Ditolak
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-5 py-5">
                                <p class="font-semibold text-slate-700">{{ $claim->created_at->format('d M Y') }}</p>
                                <p class="mt-1 text-xs text-slate-400">{{ $claim->created_at->format('H:i') }} WIB</p>
                            </td>

                            <td class="px-5 py-5">
                                <div class="flex flex-wrap items-center gap-2">
                                    <a href="{{ route('admin.claims.show', $claim->id) }}"
                                       class="inline-flex items-center gap-2 whitespace-nowrap rounded-xl border border-[#8e85ff]/20 bg-[#f3f1ff] px-3.5 py-2.5 text-xs font-bold text-[#514c94] transition hover:bg-[#514c94] hover:text-white">
                                        Lihat Detail
                                    </a>

                                    @if ($claim->status !== 'approved')
                                        <form action="{{ route('admin.claims.destroy', $claim->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Apakah kamu yakin ingin menghapus pengajuan klaim ini? Penghapusan tidak dapat dibatalkan.');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center gap-2 whitespace-nowrap rounded-xl border border-red-200 bg-red-50 px-3.5 py-2.5 text-xs font-bold text-red-600 transition hover:bg-red-600 hover:text-white">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 7h12m-10 0l1 13h6l1-13M9 7V4h6v3"/>
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    @else
                                        <span class="inline-flex items-center rounded-xl border border-slate-200 bg-slate-50 px-3.5 py-2.5 text-xs font-semibold text-slate-400">
                                            Tidak dapat dihapus
                                        </span>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-16 text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                                    </svg>
                                </div>
                                <h3 class="mt-4 text-base font-bold text-slate-700">Belum Ada Pengajuan Klaim</h3>
                                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                                    Pengajuan klaim pengguna akan ditampilkan di halaman ini setelah dikirimkan.
                                </p>
                                @if (request()->filled('search') || request()->filled('status'))
                                    <a href="{{ route('admin.claims.index') }}"
                                       class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#514c94] underline underline-offset-4 hover:text-[#8077e8]">
                                        Hapus semua filter
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="space-y-4 p-4 md:hidden">
            @forelse ($claims as $claim)
                <article class="group rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f7f8fc] p-4 transition duration-200 hover:shadow-md">
                    <div class="flex items-start gap-3">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Pengajuan #{{ $claims->firstItem() + $loop->index }}
                            </p>
                            <h3 class="mt-1 break-words text-sm font-bold text-slate-800">
                                {{ $claim->itemReport->item_name ?? 'Laporan tidak tersedia' }}
                            </h3>
                            @if ($claim->itemReport)
                                <p class="mt-1 text-xs text-slate-500">{{ $claim->itemReport->category }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 space-y-3 border-t border-slate-200/70 pt-4">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Penemu Barang</p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">{{ $claim->itemReport->user->name ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pengaju Klaim</p>
                            <p class="mt-1 text-sm font-semibold text-slate-700">{{ $claim->claimant->name ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap items-center justify-between gap-3 border-t border-slate-200/70 pt-4">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Status Klaim</p>
                            <div class="mt-2">
                                @if ($claim->status === 'pending')
                                    <span class="inline-flex items-center gap-2 rounded-full border border-amber-200/70 bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Menunggu
                                    </span>
                                @elseif ($claim->status === 'approved')
                                    <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200/70 bg-emerald-50 px-3 py-1.5 text-[10px] font-bold text-emerald-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Disetujui
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 rounded-full border border-red-200/70 bg-red-50 px-3 py-1.5 text-[10px] font-bold text-red-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                        Ditolak
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tanggal</p>
                            <p class="mt-1 text-xs font-semibold text-slate-600">{{ $claim->created_at->format('d M Y') }}</p>
                            <p class="text-xs text-slate-400">{{ $claim->created_at->format('H:i') }} WIB</p>
                        </div>
                    </div>

                    <div class="mt-4 grid grid-cols-1 gap-2 border-t border-slate-200/70 pt-4">
                        <a href="{{ route('admin.claims.show', $claim->id) }}"
                           class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#514c94] to-[#8077e8] px-4 py-3 text-xs font-bold text-white">
                            Lihat Detail Klaim
                        </a>

                        @if ($claim->status !== 'approved')
                            <form action="{{ route('admin.claims.destroy', $claim->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah kamu yakin ingin menghapus pengajuan klaim ini? Penghapusan tidak dapat dibatalkan.');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-xs font-bold text-red-600 transition hover:bg-red-600 hover:text-white">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 7h12m-10 0l1 13h6l1-13M9 7V4h6v3"/>
                                    </svg>
                                    Hapus Pengajuan
                                </button>
                            </form>
                        @else
                            <div class="rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-center text-xs font-semibold text-slate-400">
                                Klaim disetujui tidak dapat dihapus
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="py-10 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-bold text-slate-700">Belum Ada Pengajuan Klaim</h3>
                    <p class="mx-auto mt-2 max-w-sm text-xs leading-5 text-slate-400">
                        Pengajuan klaim pengguna akan ditampilkan di halaman ini setelah dikirimkan.
                    </p>
                    @if (request()->filled('search') || request()->filled('status'))
                        <a href="{{ route('admin.claims.index') }}"
                           class="mt-4 inline-flex text-xs font-bold text-[#514c94] underline underline-offset-4">
                            Hapus semua filter
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

        @if ($claims->hasPages())
            <div class="flex flex-col gap-4 border-t border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                <p class="text-xs text-slate-400">
                    Menampilkan {{ $claims->firstItem() }}–{{ $claims->lastItem() }} dari {{ $claims->total() }} pengajuan
                </p>
                <div>
                    {{ $claims->links() }}
                </div>
            </div>
        @endif
    </section>

</div>
@endsection
