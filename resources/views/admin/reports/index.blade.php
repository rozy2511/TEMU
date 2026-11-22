
@extends('layouts.app')

@section('title', 'Manajemen Laporan | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section class="relative overflow-hidden rounded-3xl bg-[#172f4f] p-6 text-white shadow-lg sm:p-8">
        <div class="absolute -right-16 -top-20 h-64 w-64 rounded-full border-[30px] border-white/[0.04]"></div>
        <div class="absolute -bottom-28 right-32 h-64 w-64 rounded-full border border-[#d5a34a]/20"></div>

        <div class="relative">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-slate-300 transition hover:text-[#e8c17b]">
                <span class="text-lg">&larr;</span>
                Kembali ke Dashboard
            </a>

            <div class="mt-7 flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#e8c17b]">
                        Administrasi TEMU
                    </p>
                    <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">
                        Manajemen Laporan
                    </h1>
                    <p class="mt-3 max-w-xl text-sm leading-7 text-slate-300">
                        Kelola dan pantau laporan kehilangan maupun penemuan barang yang disampaikan oleh pengguna.
                    </p>
                </div>

                <div class="w-fit min-w-40 rounded-2xl border border-white/15 bg-white/10 p-4 backdrop-blur-sm">
                    <p class="text-[11px] font-semibold uppercase tracking-widest text-slate-300">
                        Total Laporan
                    </p>
                    <p class="mt-2 text-3xl font-bold tabular-nums text-[#e8c17b]">
                        {{ $reports->total() }}
                    </p>
                    <p class="mt-1 text-xs text-slate-300">Laporan terdaftar</p>
                </div>
            </div>
        </div>
    </section>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <span class="font-bold">✓</span>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <span class="font-bold">!</span>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{-- FILTER --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center gap-3 border-b border-slate-100 px-5 py-5 sm:px-6">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 4h18M6 9h12m-9 5h6m-4 5h2"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-slate-900">Filter Laporan</h2>
                <p class="mt-1 text-xs text-slate-500">Gunakan pencarian dan filter untuk menemukan laporan tertentu.</p>
            </div>
        </div>

        <form action="{{ route('admin.reports.index') }}" method="GET" class="p-5 sm:p-6">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">

                <div>
                    <label for="search" class="mb-2 block text-xs font-semibold text-slate-600">
                        Pencarian
                    </label>
                    <div class="relative">
                        <svg class="pointer-events-none absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-width="1.8" d="M16 16l4 4"/>
                        </svg>
                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nama barang, lokasi, pelapor..."
                            class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-10 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#172f4f] focus:ring-2 focus:ring-[#172f4f]/10"
                        >
                    </div>
                </div>

                <div>
                    <label for="type" class="mb-2 block text-xs font-semibold text-slate-600">
                        Jenis Laporan
                    </label>
                    <select name="type" id="type"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-[#172f4f] focus:ring-2 focus:ring-[#172f4f]/10">
                        <option value="">Semua Jenis</option>
                        <option value="lost" {{ request('type') === 'lost' ? 'selected' : '' }}>Kehilangan</option>
                        <option value="found" {{ request('type') === 'found' ? 'selected' : '' }}>Penemuan</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="mb-2 block text-xs font-semibold text-slate-600">
                        Status Barang
                    </label>
                    <select name="status" id="status"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-[#172f4f] focus:ring-2 focus:ring-[#172f4f]/10">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="claimed" {{ request('status') === 'claimed' ? 'selected' : '' }}>Sedang Diklaim</option>
                        <option value="returned" {{ request('status') === 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                </div>

                <div>
                    <label for="moderation_status" class="mb-2 block text-xs font-semibold text-slate-600">
                        Status Moderasi
                    </label>
                    <select name="moderation_status" id="moderation_status"
                            class="w-full rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm text-slate-700 outline-none transition focus:border-[#172f4f] focus:ring-2 focus:ring-[#172f4f]/10">
                        <option value="">Semua Status</option>
                        <option value="visible" {{ request('moderation_status') === 'visible' ? 'selected' : '' }}>Terlihat</option>
                        <option value="hidden" {{ request('moderation_status') === 'hidden' ? 'selected' : '' }}>Disembunyikan</option>
                    </select>
                </div>

            </div>

            <div class="mt-5 flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.reports.index') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50">
                    Reset Filter
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#244565]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" stroke-width="2"/>
                        <path stroke-linecap="round" stroke-width="2" d="M16 16l4 4"/>
                    </svg>
                    Cari Laporan
                </button>
            </div>
        </form>
    </section>

    {{-- DAFTAR LAPORAN --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <h2 class="text-lg font-bold text-[#172f4f]">Daftar Laporan</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Menampilkan {{ $reports->count() }} dari {{ $reports->total() }} laporan.
                </p>
            </div>

            <span class="w-fit rounded-lg bg-[#172f4f]/[0.06] px-3 py-2 text-xs font-semibold text-[#172f4f]">
                {{ $reports->total() }} laporan ditemukan
            </span>
        </div>

        {{-- DESKTOP TABLE --}}
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-[11px] uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-bold">Barang</th>
                        <th class="px-4 py-4 font-bold">Jenis</th>
                        <th class="px-4 py-4 font-bold">Pelapor</th>
                        <th class="px-4 py-4 font-bold">Lokasi</th>
                        <th class="px-4 py-4 font-bold">Tanggal</th>
                        <th class="px-4 py-4 font-bold">Status Barang</th>
                        <th class="px-4 py-4 font-bold">Moderasi</th>
                        <th class="px-5 py-4 text-right font-bold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($reports as $report)
                        <tr class="transition hover:bg-slate-50/70">

                            <td class="px-5 py-4">
                                <div class="flex min-w-[190px] items-center gap-3">
                                    @if ($report->photo)
                                        <img
                                            src="{{ asset('storage/' . $report->photo) }}"
                                            alt="Foto {{ $report->item_name }}"
                                            class="h-12 w-12 shrink-0 rounded-xl border border-slate-200 bg-slate-100 object-cover"
                                        >
                                    @else
                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-slate-100 text-slate-400">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <rect x="3" y="3" width="18" height="18" rx="3" stroke-width="1.5"/>
                                                <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.5"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15l-5-5L5 21"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="min-w-0">
                                        <p class="font-semibold text-slate-900">{{ $report->item_name }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $report->category }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-4">
                                @if ($report->type === 'lost')
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Kehilangan
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        Penemuan
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-4 py-4 font-medium text-slate-700">
                                {{ $report->user->name }}
                            </td>

                            <td class="max-w-[170px] px-4 py-4 text-slate-600">
                                <p class="line-clamp-2">{{ $report->location }}</p>
                            </td>

                            <td class="whitespace-nowrap px-4 py-4 text-slate-600">
                                {{ $report->incident_date->format('d M Y') }}
                            </td>

                            <td class="px-4 py-4">
                                @if ($report->status === 'active')
                                    <span class="whitespace-nowrap rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">Aktif</span>
                                @elseif ($report->status === 'claimed')
                                    <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Sedang Diklaim</span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Dikembalikan</span>
                                @endif
                            </td>

                            <td class="px-4 py-4">
                                @if ($report->moderation_status === 'hidden')
                                    <span class="whitespace-nowrap rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">Disembunyikan</span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Terlihat</span>
                                @endif
                            </td>

                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('admin.reports.show', $report->id) }}"
                                   class="inline-flex items-center gap-2 rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-[#172f4f] transition hover:border-[#172f4f] hover:bg-[#172f4f] hover:text-white">
                                    Detail
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <p class="mt-4 font-semibold text-slate-800">Tidak ada laporan ditemukan</p>
                                <p class="mt-1 text-sm text-slate-500">Coba ubah kata pencarian atau filter yang digunakan.</p>
                                <a href="{{ route('admin.reports.index') }}"
                                   class="mt-4 inline-flex text-sm font-semibold text-[#172f4f] underline underline-offset-4">
                                    Hapus semua filter
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MOBILE CARDS --}}
        <div class="space-y-3 p-4 lg:hidden">
            @forelse ($reports as $report)
                <article class="rounded-xl border border-slate-200 p-4 transition hover:border-slate-300">
                    <div class="flex items-start gap-3">
                        @if ($report->photo)
                            <img
                                src="{{ asset('storage/' . $report->photo) }}"
                                alt="Foto {{ $report->item_name }}"
                                class="h-16 w-16 shrink-0 rounded-xl border border-slate-200 bg-slate-100 object-cover"
                            >
                        @else
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-slate-100 text-slate-400">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="3" stroke-width="1.5"/>
                                    <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.5"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15l-5-5L5 21"/>
                                </svg>
                            </div>
                        @endif

                        <div class="min-w-0 flex-1">
                            <h3 class="break-words font-bold text-slate-900">{{ $report->item_name }}</h3>
                            <p class="mt-1 text-xs text-slate-500">{{ $report->category }}</p>
                            <p class="mt-2 text-xs text-slate-500">
                                Pelapor: <span class="font-medium text-slate-700">{{ $report->user->name }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        @if ($report->type === 'lost')
                            <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Kehilangan</span>
                        @else
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Penemuan</span>
                        @endif

                        @if ($report->status === 'active')
                            <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">Aktif</span>
                        @elseif ($report->status === 'claimed')
                            <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Sedang Diklaim</span>
                        @else
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Dikembalikan</span>
                        @endif

                        @if ($report->moderation_status === 'hidden')
                            <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">Disembunyikan</span>
                        @else
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Terlihat</span>
                        @endif
                    </div>

                    <div class="mt-4 grid grid-cols-1 gap-3 border-t border-slate-100 pt-4 sm:grid-cols-2">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">Lokasi</p>
                            <p class="mt-1 text-sm text-slate-700">{{ $report->location }}</p>
                        </div>
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-slate-400">Tanggal Kejadian</p>
                            <p class="mt-1 text-sm text-slate-700">{{ $report->incident_date->format('d M Y') }}</p>
                        </div>
                    </div>

                    <a href="{{ route('admin.reports.show', $report->id) }}"
                       class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#244565]">
                        Lihat Detail Laporan
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </article>
            @empty
                <div class="px-4 py-12 text-center">
                    <p class="font-semibold text-slate-800">Tidak ada laporan ditemukan</p>
                    <p class="mt-1 text-sm text-slate-500">Coba ubah kata pencarian atau filter yang digunakan.</p>
                    <a href="{{ route('admin.reports.index') }}"
                       class="mt-4 inline-flex text-sm font-semibold text-[#172f4f] underline underline-offset-4">
                        Hapus semua filter
                    </a>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($reports->hasPages())
            <div class="border-t border-slate-100 px-5 py-5 sm:px-6">
                {{ $reports->links() }}
            </div>
        @endif

    </section>
</div>
@endsection
