
@extends('layouts.app')

@section('title', 'Laporan Saya | TEMU')

@section('content')
<main class="temu-container py-8 sm:py-10">

    <div class="space-y-7">

        {{-- HEADER --}}
        <section class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#172f4f]">
                    Area Pengguna
                </p>

                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">
                    Laporan Saya
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Pantau dan kelola laporan barang hilang maupun ditemukan.
                </p>
            </div>

            <a href="{{ route('user.reports.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-[#213e63]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-width="2" d="M12 5v14m7-7H5"/>
                </svg>
                Buat Laporan
            </a>
        </section>

        {{-- NOTIFIKASI --}}
        @if (session('success'))
            <div class="flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 002.57 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        {{-- RINGKASAN --}}
        <section class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            {{-- TOTAL LAPORAN --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">
                        Total Laporan
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-blue-50 text-blue-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <rect x="5" y="3" width="14" height="18" rx="2" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 8h6M9 12h6M9 16h3"/>
                        </svg>
                    </div>
                </div>

                <p class="mt-3 text-2xl font-bold text-slate-900">
                    {{ $reports->total() }}
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    Seluruh laporan yang dibuat
                </p>
            </div>

            {{-- BARANG HILANG --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">
                        Barang Hilang
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v5m0 3h.01"/>
                        </svg>
                    </div>
                </div>

                <p class="mt-3 text-2xl font-bold text-slate-900">
                    {{ $reports->getCollection()->where('type', 'lost')->count() }}
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    Laporan barang yang hilang
                </p>
            </div>

            {{-- BARANG DITEMUKAN --}}
            <div class="rounded-xl border border-slate-200 bg-white p-5">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">
                        Barang Ditemukan
                    </p>

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8.5 12 2.3 2.3 4.7-4.8"/>
                        </svg>
                    </div>
                </div>

                <p class="mt-3 text-2xl font-bold text-slate-900">
                    {{ $reports->getCollection()->where('type', 'found')->count() }}
                </p>

                <p class="mt-1 text-xs text-slate-400">
                    Laporan barang yang ditemukan
                </p>
            </div>

        </section>

        {{-- DAFTAR LAPORAN --}}
        <section>

            <div class="mb-5 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-slate-900">
                        Daftar Laporan
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Semua laporan yang pernah kamu kirim.
                    </p>
                </div>

                <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                    {{ $reports->total() }} Data
                </span>
            </div>

            <div class="space-y-4">

                @forelse ($reports as $report)

                    <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white transition hover:border-slate-300 hover:shadow-sm">

                        <div class="flex flex-col sm:flex-row">

                            {{-- FOTO --}}
                            <div class="relative h-48 shrink-0 overflow-hidden bg-slate-100 sm:h-auto sm:min-h-[190px] sm:w-48 lg:w-56">

                                @if ($report->photo)
                                    <img
                                        src="{{ asset('storage/' . $report->photo) }}"
                                        alt="Foto {{ $report->item_name }}"
                                        loading="lazy"
                                        class="absolute inset-0 h-full w-full object-cover"
                                    >
                                @else
                                    <div class="flex h-full min-h-[190px] flex-col items-center justify-center text-slate-400">
                                        <svg class="h-9 w-9" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                        </svg>
                                        <span class="mt-2 text-xs">
                                            Foto tidak tersedia
                                        </span>
                                    </div>
                                @endif

                            </div>

                            {{-- KONTEN --}}
                            <div class="flex min-w-0 flex-1 flex-col p-5 sm:p-6">

                                {{-- LABEL STATUS --}}
                                <div class="flex flex-wrap items-center gap-2">

                                    <span class="rounded-md px-2.5 py-1 text-xs font-semibold
                                        {{ $report->type === 'lost' ? 'bg-red-50 text-red-700' : 'bg-emerald-50 text-emerald-700' }}">
                                        {{ $report->type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                                    </span>

                                    <span class="rounded-md px-2.5 py-1 text-xs font-semibold
                                        {{ $report->status === 'active' ? 'bg-blue-50 text-blue-700' : ($report->status === 'claimed' ? 'bg-amber-50 text-amber-700' : 'bg-slate-100 text-slate-600') }}">
                                        {{ $report->status === 'active' ? 'Aktif' : ($report->status === 'claimed' ? 'Dalam Proses Klaim' : 'Dikembalikan') }}
                                    </span>

                                    @if ($report->moderation_status === 'hidden')
                                        <span class="rounded-md bg-red-50 px-2.5 py-1 text-xs font-semibold text-red-700">
                                            Disembunyikan Admin
                                        </span>
                                    @else
                                        <span class="rounded-md bg-emerald-50 px-2.5 py-1 text-xs font-semibold text-emerald-700">
                                            Ditampilkan
                                        </span>
                                    @endif

                                </div>

                                {{-- JUDUL --}}
                                <div class="mt-3">
                                    <h3 class="text-lg font-bold text-slate-900">
                                        {{ $report->item_name }}
                                    </h3>

                                    <p class="mt-1 text-sm text-slate-500">
                                        {{ $report->category }}
                                    </p>
                                </div>

                                {{-- DESKRIPSI --}}
                                <p class="mt-3 text-sm leading-6 text-slate-600">
                                    {{ \Illuminate\Support\Str::limit($report->description, 160) }}
                                </p>

                                {{-- DETAIL --}}
                                <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-xs text-slate-500">

                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"/>
                                            <circle cx="12" cy="10" r="2.5"/>
                                        </svg>
                                        {{ $report->location }}
                                    </span>

                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                        </svg>
                                        Kejadian: {{ $report->incident_date->format('d M Y') }}
                                    </span>

                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Dibuat: {{ $report->created_at->format('d M Y') }}
                                    </span>

                                </div>

                                {{-- MODERASI --}}
                                @if ($report->moderation_status === 'hidden')
                                    <div class="mt-4 rounded-lg border border-red-200 bg-red-50 p-3">
                                        <p class="text-sm font-semibold text-red-800">
                                            Laporan Disembunyikan oleh Admin
                                        </p>

                                        <p class="mt-1 text-sm leading-5 text-red-700">
                                            Alasan: {{ $report->moderation_reason ?? 'Tidak ada alasan yang dicantumkan.' }}
                                        </p>

                                        @if ($report->moderator)
                                            <p class="mt-2 text-xs text-red-600">
                                                Dimoderasi oleh: {{ $report->moderator->name }}
                                            </p>
                                        @endif

                                        @if ($report->moderated_at)
                                            <p class="mt-1 text-xs text-red-600">
                                                Tanggal moderasi: {{ $report->moderated_at->format('d M Y H:i') }}
                                            </p>
                                        @endif

                                        <p class="mt-2 text-xs leading-5 text-red-700">
                                            Laporan ini tidak ditampilkan kepada pengguna lain dan tidak dapat digunakan untuk pencocokan barang.
                                        </p>
                                    </div>
                                @endif

                                {{-- TOMBOL --}}
                                <div class="mt-5 flex flex-wrap gap-2 border-t border-slate-100 pt-4">

                                    @if ($report->status === 'active' && $report->moderation_status === 'visible')
                                        <a href="{{ route('user.reports.matches', $report->id) }}"
                                           class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#172f4f] px-4 py-2.5 text-xs font-semibold text-white transition hover:bg-[#213e63]">
                                            Cari Kecocokan

                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                                            </svg>
                                        </a>
                                    @endif

                                    @if ($report->type === 'found')
                                        <a href="{{ route('user.reports.claims.index', $report->id) }}"
                                           class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-50">
                                            Lihat Klaim Masuk
                                        </a>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </article>

                @empty

                    {{-- EMPTY STATE --}}
                    <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">

                        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-[#172f4f]">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                            </svg>
                        </div>

                        <h3 class="mt-5 text-lg font-bold text-slate-900">
                            Belum Ada Laporan
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                            Kamu belum membuat laporan barang hilang atau ditemukan. Buat laporan pertamamu agar pengguna lain dapat membantu.
                        </p>

                        <a href="{{ route('user.reports.create') }}"
                           class="mt-6 inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                            Buat Laporan Pertama

                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-width="2" d="M12 5v14m7-7H5"/>
                            </svg>
                        </a>

                    </div>

                @endforelse

            </div>

            {{-- PAGINATION --}}
            @if ($reports->hasPages())
                <div class="mt-6">
                    {{ $reports->links() }}
                </div>
            @endif

        </section>

    </div>

</main>
@endsection
