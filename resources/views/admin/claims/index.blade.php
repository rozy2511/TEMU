
@extends('layouts.app')

@section('title', 'Manajemen Klaim | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Dashboard
        </a>

        <p class="mt-6 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Administrasi
        </p>

        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
            Manajemen Klaim
        </h1>

        <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">
            Pantau seluruh pengajuan klaim barang dari pengguna TEMU dan lihat perkembangan proses verifikasi.
        </p>
    </div>

    {{-- Pencarian dan Filter --}}
    <section class="temu-card mb-6 p-5 sm:p-6">

        <div class="mb-5">
            <h2 class="font-bold text-slate-900">
                Cari dan Filter Klaim
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Cari berdasarkan nama barang atau pengguna, kemudian filter berdasarkan status klaim.
            </p>
        </div>

        <form method="GET" action="{{ route('admin.claims.index') }}">

            <div class="grid grid-cols-1 gap-4 lg:grid-cols-[1fr_240px_auto]">

                <div>
                    <label for="search" class="temu-label">
                        Pencarian
                    </label>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Nama barang atau nama pengguna..."
                        class="temu-input"
                    >
                </div>

                <div>
                    <label for="status" class="temu-label">
                        Status Klaim
                    </label>
                    <select name="status" id="status" class="temu-input">
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
                    <button type="submit" class="temu-button w-full">
                        Cari Klaim
                    </button>

                    <a href="{{ route('admin.claims.index') }}"
                       class="temu-button-secondary w-full">
                        Reset Filter
                    </a>
                </div>

            </div>
        </form>
    </section>

    {{-- Daftar Klaim --}}
    <section class="temu-card overflow-hidden">

        <div class="flex flex-col gap-2 border-b border-slate-100 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Data Pengajuan Klaim
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Seluruh pengajuan klaim yang tercatat dalam sistem.
                </p>
            </div>

            <span class="w-fit rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600">
                {{ $claims->total() }} Pengajuan
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">No.</th>
                        <th class="px-5 py-4 font-semibold">Nama Barang</th>
                        <th class="px-5 py-4 font-semibold">Penemu</th>
                        <th class="px-5 py-4 font-semibold">Pengaju Klaim</th>
                        <th class="px-5 py-4 font-semibold">Status Klaim</th>
                        <th class="px-5 py-4 font-semibold">Tanggal Pengajuan</th>
                        <th class="px-5 py-4 font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($claims as $claim)

                        <tr class="transition hover:bg-slate-50/70">

                            <td class="px-5 py-4 text-slate-500">
                                {{ $claims->firstItem() + $loop->index }}
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-800">
                                    {{ $claim->itemReport->item_name ?? 'Laporan tidak tersedia' }}
                                </p>
                                @if ($claim->itemReport)
                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ $claim->itemReport->category }}
                                    </p>
                                @endif
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-medium text-slate-700">
                                    {{ $claim->itemReport->user->name ?? '-' }}
                                </p>
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-medium text-slate-700">
                                    {{ $claim->claimant->name ?? '-' }}
                                </p>
                            </td>

                            <td class="px-5 py-4">
                                @if ($claim->status === 'pending')
                                    <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        Menunggu
                                    </span>
                                @elseif ($claim->status === 'approved')
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        Disetujui
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                                        Ditolak
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-slate-500">
                                {{ $claim->created_at->format('d M Y, H:i') }}
                            </td>

                            <td class="px-5 py-4">
                                <a
                                    href="{{ route('admin.claims.show', $claim->id) }}"
                                    class="inline-flex whitespace-nowrap rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">
                                    Lihat Detail
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-5 py-14 text-center">

                                <p class="font-semibold text-slate-800">
                                    Belum ada pengajuan klaim.
                                </p>

                                <p class="mt-2 text-sm text-slate-500">
                                    Pengajuan klaim pengguna akan ditampilkan di sini.
                                </p>

                                @if (request()->filled('search') || request()->filled('status'))
                                    <a href="{{ route('admin.claims.index') }}"
                                       class="mt-4 inline-flex text-sm font-semibold text-slate-700 underline underline-offset-4 hover:text-slate-950">
                                        Hapus semua filter
                                    </a>
                                @endif

                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        @if ($claims->hasPages())
            <div class="border-t border-slate-100 p-5 sm:p-6">
                {{ $claims->links() }}
            </div>
        @endif

    </section>

</div>
@endsection
