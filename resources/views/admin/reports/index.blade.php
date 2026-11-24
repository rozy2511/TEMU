
@extends('layouts.app')

@section('title', 'Manajemen Laporan | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section class="relative overflow-hidden rounded-[2rem] border border-white/20 bg-gradient-to-br from-[#142b49] via-[#253d67] to-[#7165c8] p-6 text-white shadow-xl sm:p-9">
        <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 -left-20 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
        <div class="pointer-events-none absolute right-1/3 top-1/2 h-40 w-40 rounded-full bg-[#8bcfff]/10 blur-3xl"></div>

        <div class="relative">
            <a href="{{ route('admin.dashboard') }}"
               class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/80 backdrop-blur-md transition hover:bg-white/20 hover:text-white">
                <span>&larr;</span>
                Kembali ke Dashboard
            </a>

            <div class="mt-8 flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-[0.25em] text-[#8be9d7]">
                        Administrasi TEMU
                    </p>
                    <h1 class="mt-3 text-3xl font-extrabold tracking-tight sm:text-4xl">
                        Manajemen Laporan
                    </h1>
                    <p class="mt-4 max-w-xl text-sm leading-7 text-white/75 sm:text-base">
                        Kelola dan pantau laporan kehilangan maupun penemuan barang yang disampaikan oleh pengguna.
                    </p>
                </div>

                <div class="w-full rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur-xl sm:w-56">
                    <p class="text-xs font-semibold uppercase tracking-[0.18em] text-white/65">
                        Total Laporan
                    </p>
                    <p class="mt-2 text-4xl font-extrabold tracking-tight">
                        {{ $reports->total() }}
                    </p>
                    <div class="mt-3 flex items-center gap-2 text-xs text-[#8be9d7]">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                        Laporan terdaftar
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-2xl border border-emerald-200/70 bg-gradient-to-r from-emerald-50 to-[#e8faf6] p-4 text-sm text-emerald-800 shadow-sm">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-100 font-bold">✓</div>
            <p class="pt-1">{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-start gap-3 rounded-2xl border border-rose-200/70 bg-gradient-to-r from-rose-50 to-[#fff0f5] p-4 text-sm text-rose-800 shadow-sm">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-rose-100 font-bold">!</div>
            <p class="pt-1">{{ session('error') }}</p>
        </div>
    @endif

    {{-- FILTER --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/80 shadow-[0_12px_40px_rgba(35,55,90,0.06)] backdrop-blur-xl">
        <div class="flex items-center gap-4 border-b border-slate-100/80 px-5 py-5 sm:px-6">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf4] to-[#e8e4ff] text-[#334d75]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 4h18M6 9h12m-9 5h6m-4 5h2"/>
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-[#172f4f]">Filter Laporan</h2>
                <p class="mt-1 text-xs text-slate-500">Gunakan pencarian dan filter untuk menemukan laporan tertentu.</p>
            </div>
        </div>

        <form action="{{ route('admin.reports.index') }}" method="GET" class="p-5 sm:p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <div>
                    <label for="search" class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-500">
                        Pencarian
                    </label>
                    <div class="group relative">
                        <svg class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400 transition group-focus-within:text-[#7165c8]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="11" cy="11" r="7" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-width="1.8" d="M16 16l4 4"/>
                        </svg>
                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Nama barang, lokasi, pelapor..."
                            class="w-full rounded-2xl border border-slate-200/80 bg-[#f8faff] py-3.5 pl-11 pr-3 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                        >
                    </div>
                </div>

                <div>
                    <label for="type" class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-500">
                        Jenis Laporan
                    </label>
                    <select name="type" id="type"
                            class="w-full rounded-2xl border border-slate-200/80 bg-[#f8faff] px-3.5 py-3.5 text-sm text-slate-700 outline-none transition focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10">
                        <option value="">Semua Jenis</option>
                        <option value="lost" {{ request('type') === 'lost' ? 'selected' : '' }}>Kehilangan</option>
                        <option value="found" {{ request('type') === 'found' ? 'selected' : '' }}>Penemuan</option>
                    </select>
                </div>

                <div>
                    <label for="status" class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-500">
                        Status Barang
                    </label>
                    <select name="status" id="status"
                            class="w-full rounded-2xl border border-slate-200/80 bg-[#f8faff] px-3.5 py-3.5 text-sm text-slate-700 outline-none transition focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10">
                        <option value="">Semua Status</option>
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="claimed" {{ request('status') === 'claimed' ? 'selected' : '' }}>Sedang Diklaim</option>
                        <option value="returned" {{ request('status') === 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                </div>

                <div>
                    <label for="moderation_status" class="mb-2 block text-xs font-bold uppercase tracking-wide text-slate-500">
                        Status Moderasi
                    </label>
                    <select name="moderation_status" id="moderation_status"
                            class="w-full rounded-2xl border border-slate-200/80 bg-[#f8faff] px-3.5 py-3.5 text-sm text-slate-700 outline-none transition focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10">
                        <option value="">Semua Status</option>
                        <option value="visible" {{ request('moderation_status') === 'visible' ? 'selected' : '' }}>Terlihat</option>
                        <option value="hidden" {{ request('moderation_status') === 'hidden' ? 'selected' : '' }}>Disembunyikan</option>
                    </select>
                </div>

            </div>

            <div class="mt-6 flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.reports.index') }}"
                   class="inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:border-[#8e85ff]/40 hover:bg-[#f6f4ff] hover:text-[#6256b5]">
                    Reset Filter
                </a>

                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#253d67] to-[#7165c8] px-6 py-3 text-sm font-semibold text-white shadow-md shadow-[#7165c8]/20 transition hover:-translate-y-0.5 hover:shadow-lg hover:shadow-[#7165c8]/25">
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
    <section class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/85 shadow-[0_12px_40px_rgba(35,55,90,0.06)] backdrop-blur-xl">

        <div class="flex flex-col gap-4 border-b border-slate-100/80 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <div class="flex items-center gap-3">
                    <div class="h-1.5 w-10 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></div>
                    <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#7165c8]">Data & Monitoring</p>
                </div>
                <h2 class="mt-2 text-lg font-bold text-[#172f4f]">Daftar Laporan</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Menampilkan {{ $reports->count() }} dari {{ $reports->total() }} laporan.
                </p>
            </div>

            <div class="flex w-fit items-center gap-2 rounded-2xl border border-[#8e85ff]/10 bg-gradient-to-r from-[#eafaf6] to-[#f0edff] px-4 py-3 text-xs font-bold text-[#42557c]">
                <span class="h-2 w-2 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                {{ $reports->total() }} laporan ditemukan
            </div>
        </div>

        {{-- DESKTOP TABLE --}}
        <div class="hidden overflow-x-auto lg:block">
            <table class="w-full text-left text-sm">
                <thead class="bg-gradient-to-r from-[#f1f8ff] via-[#f5f3ff] to-[#effcf9] text-[11px] uppercase tracking-wider text-[#64748b]">
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

                <tbody class="divide-y divide-slate-100/80">
                    @forelse ($reports as $report)
                        <tr class="transition duration-200 hover:bg-gradient-to-r hover:from-[#f0fbf8]/70 hover:to-[#f4f2ff]/70">

                            <td class="px-5 py-4">
                                <div class="flex min-w-[190px] items-center gap-3">
                                    @if ($report->photo)
                                        <img
                                            src="{{ asset('storage/' . $report->photo) }}"
                                            alt="Foto {{ $report->item_name }}"
                                            class="h-12 w-12 shrink-0 rounded-2xl border border-white object-cover shadow-sm transition duration-300 hover:scale-105"
                                        >
                                    @else
                                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e5f8f4] to-[#ece9ff] text-[#7182a0]">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <rect x="3" y="3" width="18" height="18" rx="3" stroke-width="1.5"/>
                                                <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.5"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15l-5-5L5 21"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="min-w-0">
                                        <p class="font-semibold text-[#172f4f]">{{ $report->item_name }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $report->category }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-4 py-4">
                                @if ($report->type === 'lost')
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full border border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                                        Kehilangan
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full border border-emerald-100 bg-gradient-to-r from-emerald-50 to-[#e5faf5] px-3 py-1.5 text-xs font-semibold text-emerald-700">
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
                                    <span class="whitespace-nowrap rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-semibold text-sky-700">Aktif</span>
                                @elseif ($report->status === 'claimed')
                                    <span class="whitespace-nowrap rounded-full border border-amber-100 bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Sedang Diklaim</span>
                                @else
                                    <span class="whitespace-nowrap rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Dikembalikan</span>
                                @endif
                            </td>

                            <td class="px-4 py-4">
                                @if ($report->moderation_status === 'hidden')
                                    <span class="whitespace-nowrap rounded-full border border-rose-100 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700">Disembunyikan</span>
                                @else
                                    <span class="whitespace-nowrap rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Terlihat</span>
                                @endif
                            </td>

                            <td class="px-5 py-4 text-right">
                                <a href="{{ route('admin.reports.show', $report->id) }}"
                                   class="inline-flex items-center gap-2 rounded-xl border border-[#8e85ff]/20 bg-gradient-to-r from-[#f1f0ff] to-[#eafaf6] px-3.5 py-2 text-xs font-semibold text-[#4e5485] transition hover:-translate-y-0.5 hover:border-[#8e85ff]/40 hover:shadow-md">
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
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e5f8f4] to-[#ece9ff] text-slate-400">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <p class="mt-4 font-semibold text-slate-800">Tidak ada laporan ditemukan</p>
                                <p class="mt-1 text-sm text-slate-500">Coba ubah kata pencarian atau filter yang digunakan.</p>
                                <a href="{{ route('admin.reports.index') }}"
                                   class="mt-4 inline-flex text-sm font-semibold text-[#7165c8] underline underline-offset-4">
                                    Hapus semua filter
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- MOBILE CARDS --}}
        <div class="space-y-4 p-4 lg:hidden">
            @forelse ($reports as $report)
                <article class="rounded-2xl border border-slate-200/70 bg-gradient-to-br from-white to-[#f8faff] p-4 shadow-sm transition duration-300 hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-start gap-3">
                        @if ($report->photo)
                            <img
                                src="{{ asset('storage/' . $report->photo) }}"
                                alt="Foto {{ $report->item_name }}"
                                class="h-16 w-16 shrink-0 rounded-2xl border border-white object-cover shadow-sm"
                            >
                        @else
                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e5f8f4] to-[#ece9ff] text-slate-400">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="3" y="3" width="18" height="18" rx="3" stroke-width="1.5"/>
                                    <circle cx="8.5" cy="8.5" r="1.5" stroke-width="1.5"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15l-5-5L5 21"/>
                                </svg>
                            </div>
                        @endif

                        <div class="min-w-0 flex-1">
                            <h3 class="break-words font-bold text-[#172f4f]">{{ $report->item_name }}</h3>
                            <p class="mt-1 text-xs text-slate-500">{{ $report->category }}</p>
                            <p class="mt-2 text-xs text-slate-500">
                                Pelapor: <span class="font-medium text-slate-700">{{ $report->user->name }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-2">
                        @if ($report->type === 'lost')
                            <span class="rounded-full border border-amber-100 bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Kehilangan</span>
                        @else
                            <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Penemuan</span>
                        @endif

                        @if ($report->status === 'active')
                            <span class="rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-semibold text-sky-700">Aktif</span>
                        @elseif ($report->status === 'claimed')
                            <span class="rounded-full border border-amber-100 bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Sedang Diklaim</span>
                        @else
                            <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Dikembalikan</span>
                        @endif

                        @if ($report->moderation_status === 'hidden')
                            <span class="rounded-full border border-rose-100 bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-700">Disembunyikan</span>
                        @else
                            <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Terlihat</span>
                        @endif
                    </div>

                    <div class="mt-4 grid grid-cols-1 gap-3 rounded-2xl bg-white/80 p-3 sm:grid-cols-2">
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-wide text-slate-400">Lokasi</p>
                            <p class="mt-1 text-sm text-slate-700">{{ $report->location }}</p>
                        </div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-wide text-slate-400">Tanggal Kejadian</p>
                            <p class="mt-1 text-sm text-slate-700">{{ $report->incident_date->format('d M Y') }}</p>
                        </div>
                    </div>

                    <a href="{{ route('admin.reports.show', $report->id) }}"
                       class="mt-4 flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#253d67] to-[#7165c8] px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
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
                       class="mt-4 inline-flex text-sm font-semibold text-[#7165c8] underline underline-offset-4">
                        Hapus semua filter
                    </a>
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($reports->hasPages())
            <div class="border-t border-slate-100/80 px-5 py-5 sm:px-6">
                {{ $reports->links() }}
            </div>
        @endif

    </section>
</div>
@endsection
