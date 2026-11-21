
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

<div class="temu-container max-w-4xl py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('user.reports.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Laporan Saya
        </a>

        <div class="mt-7">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">
                Proses Pengembalian Barang
            </p>

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Konfirmasi Serah Terima
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">
                Atur komunikasi antara penemu dan pemilik barang, kemudian konfirmasikan proses penyerahan barang.
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <ul class="list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Informasi Barang --}}
    <section class="temu-card mb-5 overflow-hidden p-5 sm:p-7">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-bold text-slate-900">
                Informasi Barang
            </h2>

            <span class="w-fit rounded-full px-3 py-1.5 text-xs font-semibold
                {{ $report->status === 'returned'
                    ? 'bg-emerald-50 text-emerald-700'
                    : ($report->status === 'claimed'
                        ? 'bg-blue-50 text-blue-700'
                        : 'bg-slate-100 text-slate-600') }}">
                {{ $report->status === 'returned'
                    ? 'Sudah Dikembalikan'
                    : ($report->status === 'claimed'
                        ? 'Sedang Diklaim'
                        : ucfirst($report->status)) }}
            </span>
        </div>

        @if ($report->photo)
            <div class="mb-6 overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                <img
                    src="{{ asset('storage/' . $report->photo) }}"
                    alt="Foto {{ $report->item_name }}"
                    class="max-h-80 w-full object-contain"
                >
            </div>
        @endif

        <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                Nama Barang
            </p>
            <h3 class="mt-1 text-xl font-bold text-slate-900">
                {{ $report->item_name }}
            </h3>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-5 border-t border-slate-100 pt-5 sm:grid-cols-2">
            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Kategori
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $report->category }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Lokasi
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $report->location }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Penemu
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $report->user->name }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Pemilik / Pengaju Klaim
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $claim->claimant->name }}
                </p>
            </div>
        </div>

    </section>

    {{-- Permintaan Kontak --}}
    <section class="temu-card mb-5 p-5 sm:p-7">

        <div class="mb-6">
            <h2 class="text-lg font-bold text-slate-900">
                Permintaan Kontak Penemu
            </h2>

            <p class="mt-2 text-sm leading-relaxed text-slate-500">
                Informasi kontak penemu hanya dapat dilihat setelah permintaan disetujui.
            </p>
        </div>

        @if ($claim->contact_status === 'approved')

            <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                <p class="text-sm font-bold text-emerald-800">
                    Permintaan Kontak Disetujui
                </p>

                <p class="mt-4 text-xs font-medium uppercase tracking-wider text-emerald-700">
                    Email Penemu
                </p>

                <p class="mt-1 break-all text-base font-semibold text-emerald-900">
                    {{ $report->user->email }}
                </p>

                <p class="mt-3 text-sm leading-relaxed text-emerald-700">
                    Gunakan informasi ini untuk mengatur pengambilan barang.
                </p>
            </div>

        @elseif ($claim->contact_status === 'pending')

            @if ($isFinder)

                <div class="mb-5 rounded-xl border border-amber-200 bg-amber-50 p-5">
                    <p class="text-sm leading-relaxed text-amber-800">
                        Pengaju klaim meminta izin untuk melihat informasi kontak Anda.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <form action="{{ route('user.reports.claims.approve-contact', [$report->id, $claim->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="temu-button">
                            Setujui Permintaan
                        </button>
                    </form>

                    <form action="{{ route('user.reports.claims.reject-contact', [$report->id, $claim->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="temu-button-secondary">
                            Tolak Permintaan
                        </button>
                    </form>
                </div>

            @elseif ($isClaimant)

                <div class="rounded-xl border border-amber-200 bg-amber-50 p-5">
                    <p class="text-sm leading-relaxed text-amber-800">
                        Permintaan kontak Anda sedang menunggu persetujuan penemu.
                    </p>
                </div>

            @endif

        @elseif ($claim->contact_status === 'rejected')

            <div class="rounded-xl border border-red-200 bg-red-50 p-5">
                <p class="text-sm leading-relaxed text-red-800">
                    Permintaan kontak ditolak oleh penemu.
                </p>
            </div>

        @elseif ($claim->contact_status === 'not_requested')

            @if ($isClaimant)

                <p class="mb-5 text-sm leading-relaxed text-slate-500">
                    Anda dapat meminta izin untuk melihat email penemu agar dapat mengatur proses pengambilan barang.
                </p>

                <form action="{{ route('user.reports.claims.request-contact', [$report->id, $claim->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="temu-button">
                        Minta Kontak Penemu
                    </button>
                </form>

            @elseif ($isFinder)

                <div class="rounded-xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm text-slate-500">
                        Belum ada permintaan kontak dari pengaju klaim.
                    </p>
                </div>

            @endif

        @endif

    </section>

    {{-- Status Konfirmasi --}}
    <section class="temu-card mb-5 p-5 sm:p-7">

        <h2 class="mb-6 text-lg font-bold text-slate-900">
            Status Konfirmasi Kedua Pihak
        </h2>

        <div class="space-y-5">

            <div class="flex flex-col gap-3 border-b border-slate-100 pb-5 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-800">
                        Konfirmasi Penemu
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">
                        {{ $report->user->name }}
                    </p>
                </div>

                @if ($claim->finder_confirmed_at)
                    <div class="w-fit text-sm text-emerald-700">
                        <p class="font-semibold">Sudah Dikonfirmasi</p>
                        <p class="mt-1 text-xs">
                            {{ $claim->finder_confirmed_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                @else
                    <span class="w-fit rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                        Menunggu Konfirmasi
                    </span>
                @endif
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-800">
                        Konfirmasi Pemilik Barang
                    </h3>
                    <p class="mt-1 text-sm text-slate-500">
                        {{ $claim->claimant->name }}
                    </p>
                </div>

                @if ($claim->claimant_confirmed_at)
                    <div class="w-fit text-sm text-emerald-700">
                        <p class="font-semibold">Sudah Dikonfirmasi</p>
                        <p class="mt-1 text-xs">
                            {{ $claim->claimant_confirmed_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                @else
                    <span class="w-fit rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                        Menunggu Konfirmasi
                    </span>
                @endif
            </div>

        </div>
    </section>

    {{-- Konfirmasi Akhir --}}
    @if ($report->status === 'returned')

        <section class="rounded-2xl border border-emerald-200 bg-emerald-50 p-6 sm:p-8">
            <div class="flex items-start gap-4">
                <div class="flex h-11 w-11 flex-shrink-0 items-center justify-center rounded-xl bg-emerald-100">
                    <svg class="h-6 w-6 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-lg font-bold text-emerald-900">
                        Serah Terima Selesai
                    </h2>

                    <p class="mt-2 text-sm leading-relaxed text-emerald-800">
                        Kedua pihak telah mengonfirmasi bahwa barang sudah diserahkan dan diterima. Proses pengembalian barang telah selesai.
                    </p>
                </div>
            </div>
        </section>

    @else

        @if ($isFinder || $isClaimant)

            @if (!$hasConfirmed)

                <section class="temu-card p-5 sm:p-7">
                    <h2 class="text-lg font-bold text-slate-900">
                        Konfirmasi Serah Terima
                    </h2>

                    <p class="mb-6 mt-3 text-sm leading-relaxed text-slate-500">
                        Pastikan barang benar-benar sudah diserahkan atau diterima sebelum melakukan konfirmasi. Konfirmasi dari kedua pihak diperlukan agar proses pengembalian selesai.
                    </p>

                    <form
                        action="{{ route('user.reports.claims.confirm-handoff', [$report->id, $claim->id]) }}"
                        method="POST"
                    >
                        @csrf

                        <button type="submit" class="temu-button">
                            {{ $isFinder
                                ? 'Konfirmasi Barang Sudah Diserahkan'
                                : 'Konfirmasi Barang Sudah Diterima' }}
                        </button>
                    </form>
                </section>

            @else

                <section class="rounded-xl border border-amber-200 bg-amber-50 p-5">
                    <h2 class="text-sm font-bold text-amber-900">
                        Konfirmasi Anda Sudah Tercatat
                    </h2>

                    <p class="mt-2 text-sm leading-relaxed text-amber-800">
                        Konfirmasi Anda sudah tersimpan. Silakan tunggu pihak lainnya menyelesaikan konfirmasi agar proses serah terima dapat diselesaikan.
                    </p>
                </section>

            @endif

        @endif

    @endif

</div>
@endsection
