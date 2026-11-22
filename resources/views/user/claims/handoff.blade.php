
@extends('layouts.app')

@section('title', 'Konfirmasi Serah Terima | TEMU')

@section('content')
@php
    $isFinder = auth()->id() === $report->user_id;
    $isClaimant = auth()->id() === $claim->claimant_id;

    $hasConfirmed = $isFinder
        ? $claim->finder_confirmed_at !== null
        : $claim->claimant_confirmed_at !== null;
@endphp

<div class="temu-container max-w-5xl py-8 sm:py-10">

    <div class="mb-8">
        <a href="{{ route('user.reports.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-[#172f4f]">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Laporan Saya
        </a>

        <div class="mt-6">
            <div class="flex items-start gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#172f4f] text-white">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8M8 12h8M8 17h5m-9 4h16a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Proses Pengembalian Barang
                    </p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Konfirmasi Serah Terima
                    </h1>
                </div>
            </div>

            <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">
                Atur komunikasi antara penemu dan pemilik barang, kemudian konfirmasikan proses penyerahan barang.
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 flex gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
            </svg>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
            <h3 class="text-sm font-semibold text-red-800">Terdapat kesalahan</h3>
            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-6 flex flex-wrap items-center gap-2">
        <span class="rounded-full bg-[#edf2f7] px-3 py-1.5 text-xs font-semibold text-[#172f4f]">
            {{ $isFinder ? 'Peran: Penemu' : ($isClaimant ? 'Peran: Pemilik Barang' : 'Proses Serah Terima') }}
        </span>

        <span class="rounded-full px-3 py-1.5 text-xs font-semibold
            {{ $report->status === 'returned' ? 'bg-emerald-50 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">
            {{ $report->status === 'returned' ? 'Proses Selesai' : 'Proses Berlangsung' }}
        </span>
    </div>

    {{-- INFORMASI BARANG --}}
    <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                        Informasi Barang
                    </p>
                    <h2 class="mt-1 text-xl font-bold text-slate-900">
                        {{ $report->item_name }}
                    </h2>
                </div>

                <span class="rounded-full px-3 py-1.5 text-xs font-semibold
                    {{ $report->status === 'returned' ? 'bg-emerald-50 text-emerald-700' : ($report->status === 'claimed' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-600') }}">
                    {{ $report->status === 'returned' ? 'Sudah Dikembalikan' : ($report->status === 'claimed' ? 'Sedang Diklaim' : ucfirst($report->status)) }}
                </span>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-[240px_1fr]">

                @if ($report->photo)
                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                        <img
                            src="{{ asset('storage/' . $report->photo) }}"
                            alt="Foto {{ $report->item_name }}"
                            class="h-56 w-full object-cover sm:h-full sm:min-h-[220px]"
                        >
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Kategori</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->category }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Lokasi</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->location }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Penemu</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->user->name }}</p>
                    </div>

                    <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Pemilik / Pengaju</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->claimant->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PERMINTAAN KONTAK --}}
    <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#edf2f7] text-[#172f4f]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h2.5l2 5-2 1.5a11 11 0 005 5l1.5-2 5 2V17a2 2 0 01-2 2h-1C9 19 5 15 3 9V5z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-slate-900">Permintaan Kontak Penemu</h2>
                    <p class="mt-1 text-xs text-slate-500">Pengaturan akses informasi kontak</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <p class="mb-5 text-sm leading-relaxed text-slate-500">
                Informasi kontak penemu hanya dapat dilihat setelah permintaan disetujui.
            </p>

            @if ($claim->contact_status === 'approved')

                <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-5 sm:p-6">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-emerald-900">
                                Permintaan Kontak Disetujui
                            </h3>
                            <p class="mt-1 text-sm text-emerald-700">
                                Kamu dapat menggunakan informasi kontak berikut untuk mengatur pengambilan barang.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 rounded-xl border border-emerald-200 bg-white p-4">
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Email Penemu
                        </p>
                        <p class="mt-2 break-all text-base font-semibold text-slate-900">
                            {{ $report->user->email }}
                        </p>
                    </div>
                </div>

            @elseif ($claim->contact_status === 'pending')

                @if ($isFinder)

                    <div class="mb-5 rounded-xl border border-amber-200 bg-amber-50 p-4">
                        <div class="flex items-start gap-3">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                            </svg>
                            <p class="text-sm leading-relaxed text-amber-800">
                                Pengaju klaim meminta izin untuk melihat informasi kontak Anda. Tinjau permintaan ini sebelum memberikan akses.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">
                        <form action="{{ route('user.reports.claims.approve-contact', [$report->id, $claim->id]) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="temu-button flex w-full justify-center">
                                Setujui Permintaan
                            </button>
                        </form>

                        <form action="{{ route('user.reports.claims.reject-contact', [$report->id, $claim->id]) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="temu-button-secondary flex w-full justify-center">
                                Tolak Permintaan
                            </button>
                        </form>
                    </div>

                @elseif ($isClaimant)

                    <div class="rounded-xl border border-amber-200 bg-amber-50 p-5">
                        <div class="flex items-start gap-3">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-sm leading-relaxed text-amber-800">
                                Permintaan kontak Anda sedang menunggu persetujuan penemu.
                            </p>
                        </div>
                    </div>

                @endif

            @elseif ($claim->contact_status === 'rejected')

                <div class="rounded-xl border border-red-200 bg-red-50 p-5">
                    <div class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <p class="text-sm leading-relaxed text-red-800">
                            Permintaan kontak ditolak oleh penemu.
                        </p>
                    </div>
                </div>

            @elseif ($claim->contact_status === 'not_requested')

                @if ($isClaimant)

                    <div class="rounded-xl border border-[#dce5ee] bg-[#f7f9fc] p-5">
                        <p class="text-sm leading-relaxed text-slate-600">
                            Kamu dapat meminta izin untuk melihat email penemu agar dapat mengatur proses pengambilan barang.
                        </p>

                        <form action="{{ route('user.reports.claims.request-contact', [$report->id, $claim->id]) }}" method="POST" class="mt-5">
                            @csrf
                            <button type="submit" class="temu-button flex w-full items-center justify-center gap-2 sm:w-auto">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h2.5l2 5-2 1.5a11 11 0 005 5l1.5-2 5 2V17a2 2 0 01-2 2h-1C9 19 5 15 3 9V5z"/>
                                </svg>
                                Minta Kontak Penemu
                            </button>
                        </form>
                    </div>

                @elseif ($isFinder)

                    <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                        <p class="text-sm leading-relaxed text-slate-500">
                            Belum ada permintaan kontak dari pengaju klaim.
                        </p>
                    </div>

                @endif

            @endif
        </div>
    </section>

    {{-- STATUS KONFIRMASI --}}
    <section class="mb-6 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <h2 class="text-lg font-bold text-slate-900">
                Status Konfirmasi Kedua Pihak
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Serah terima membutuhkan konfirmasi dari penemu dan pemilik barang.
            </p>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- PENEMU --}}
                <div class="rounded-xl border border-slate-200 p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#edf2f7] text-sm font-bold text-[#172f4f]">
                            {{ strtoupper(substr($report->user->name, 0, 1)) }}
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Penemu</p>
                            <h3 class="mt-1 text-sm font-bold text-slate-800">
                                {{ $report->user->name }}
                            </h3>
                        </div>
                    </div>

                    <div class="mt-5">
                        @if ($claim->finder_confirmed_at)
                            <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4">
                                <div class="flex items-center gap-2 text-emerald-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-sm font-semibold">Sudah Dikonfirmasi</p>
                                </div>
                                <p class="mt-2 text-xs text-emerald-700">
                                    {{ $claim->finder_confirmed_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        @else
                            <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                                <div class="flex items-center gap-2 text-amber-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm font-semibold">Menunggu Konfirmasi</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- PEMILIK --}}
                <div class="rounded-xl border border-slate-200 p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#edf2f7] text-sm font-bold text-[#172f4f]">
                            {{ strtoupper(substr($claim->claimant->name, 0, 1)) }}
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pemilik Barang</p>
                            <h3 class="mt-1 text-sm font-bold text-slate-800">
                                {{ $claim->claimant->name }}
                            </h3>
                        </div>
                    </div>

                    <div class="mt-5">
                        @if ($claim->claimant_confirmed_at)
                            <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4">
                                <div class="flex items-center gap-2 text-emerald-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <p class="text-sm font-semibold">Sudah Dikonfirmasi</p>
                                </div>
                                <p class="mt-2 text-xs text-emerald-700">
                                    {{ $claim->claimant_confirmed_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        @else
                            <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                                <div class="flex items-center gap-2 text-amber-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm font-semibold">Menunggu Konfirmasi</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- KONFIRMASI AKHIR --}}
    @if ($report->status === 'returned')

        <section class="overflow-hidden rounded-2xl border border-emerald-200 bg-white shadow-sm">
            <div class="border-b border-emerald-100 bg-emerald-50 px-5 py-5 sm:px-7">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-emerald-700">Status Akhir</p>
                        <h2 class="text-xl font-bold text-emerald-900">Serah Terima Selesai</h2>
                    </div>
                </div>
            </div>

            <div class="p-5 sm:p-7">
                <p class="text-sm leading-relaxed text-emerald-800">
                    Kedua pihak telah mengonfirmasi bahwa barang sudah diserahkan dan diterima. Proses pengembalian barang telah selesai.
                </p>
            </div>
        </section>

    @else

        @if ($isFinder || $isClaimant)

            @if (!$hasConfirmed)

                <section class="overflow-hidden rounded-2xl border border-[#dce5ee] bg-white shadow-sm">
                    <div class="border-b border-slate-100 bg-[#f7f9fc] px-5 py-5 sm:px-7">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#172f4f] text-white">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Langkah Terakhir</p>
                                <h2 class="text-lg font-bold text-slate-900">Konfirmasi Serah Terima</h2>
                            </div>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <p class="text-sm leading-relaxed text-slate-600">
                            Pastikan barang benar-benar sudah diserahkan atau diterima sebelum melakukan konfirmasi. Konfirmasi dari kedua pihak diperlukan agar proses pengembalian selesai.
                        </p>

                        <div class="mt-5 rounded-xl border border-amber-200 bg-amber-50 p-4">
                            <p class="text-sm leading-relaxed text-amber-800">
                                Konfirmasi hanya dilakukan setelah penyerahan barang secara nyata. Tindakan ini akan mencatat bahwa proses serah terima telah dilakukan oleh pihak yang bersangkutan.
                            </p>
                        </div>

                        <form action="{{ route('user.reports.claims.confirm-handoff', [$report->id, $claim->id]) }}" method="POST" class="mt-6">
                            @csrf

                            <button type="submit" class="temu-button flex w-full items-center justify-center gap-2 sm:w-auto">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $isFinder ? 'Konfirmasi Barang Sudah Diserahkan' : 'Konfirmasi Barang Sudah Diterima' }}
                            </button>
                        </form>
                    </div>
                </section>

            @else

                <section class="rounded-2xl border border-amber-200 bg-white shadow-sm">
                    <div class="p-5 sm:p-7">
                        <div class="flex items-start gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-amber-100 text-amber-700">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-bold text-amber-900">
                                    Konfirmasi Anda Sudah Tercatat
                                </h2>

                                <p class="mt-2 text-sm leading-relaxed text-amber-800">
                                    Konfirmasi Anda sudah tersimpan. Silakan tunggu pihak lainnya menyelesaikan konfirmasi agar proses serah terima dapat diselesaikan.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

            @endif

        @endif

    @endif

</div>
@endsection
