
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

<div class="temu-container max-w-5xl space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] px-6 py-8 text-white shadow-xl sm:px-9 sm:py-10">
        <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
        <div class="pointer-events-none absolute right-1/4 top-10 h-40 w-40 rounded-full bg-[#f4b6d2]/15 blur-3xl"></div>

        <div class="relative">
            <a href="{{ route('user.reports.index') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-white/65 transition hover:text-white">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Kembali ke Laporan Saya
            </a>

            <div class="mt-8 flex items-start gap-4">
                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-2xl border border-white/15 bg-white/10 text-[#a9f4e8] backdrop-blur-md">
                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8M8 12h8M8 17h5m-9 4h16a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-[10px] font-bold uppercase tracking-[0.18em] text-[#a9f4e8] backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                        Proses Pengembalian Barang
                    </div>

                    <h1 class="mt-4 text-2xl font-extrabold tracking-tight sm:text-3xl">
                        Konfirmasi Serah Terima
                    </h1>
                </div>
            </div>

            <p class="mt-5 max-w-2xl text-sm leading-7 text-white/70 sm:text-base">
                Atur komunikasi antara penemu dan pemilik barang, kemudian konfirmasikan proses penyerahan barang.
            </p>

            <div class="mt-7 flex flex-wrap gap-3">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-2 text-xs font-semibold text-white/80">
                    <span class="h-2 w-2 rounded-full bg-[#8bcfff]"></span>
                    Komunikasi
                </span>
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-2 text-xs font-semibold text-white/80">
                    <span class="h-2 w-2 rounded-full bg-[#e8c17b]"></span>
                    Serah Terima
                </span>
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-2 text-xs font-semibold text-white/80">
                    <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                    Konfirmasi
                </span>
            </div>
        </div>
    </section>

    {{-- NOTIFICATIONS --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-2xl border border-emerald-200 bg-gradient-to-r from-emerald-50 to-[#e4faf5] p-4 text-sm text-emerald-800 shadow-sm">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-start gap-3 rounded-2xl border border-rose-200 bg-gradient-to-r from-rose-50 to-[#fff1f5] p-4 text-sm text-rose-800 shadow-sm">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
            </svg>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-2xl border border-rose-200 bg-gradient-to-br from-rose-50 to-[#fff1f5] p-5 shadow-sm">
            <div class="flex items-center gap-2">
                <svg class="h-5 w-5 text-rose-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
                <h3 class="text-sm font-bold text-rose-900">Terdapat kesalahan</h3>
            </div>

            <ul class="mt-3 list-disc space-y-1.5 pl-7 text-sm text-rose-800">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- ROLE AND PROCESS STATUS --}}
    <div class="flex flex-wrap items-center gap-3">
        <span class="inline-flex items-center gap-2 rounded-full border border-[#8e85ff]/15 bg-gradient-to-r from-[#e4faf5] to-[#eeeaff] px-4 py-2 text-xs font-bold text-[#514c94]">
            <span class="h-2 w-2 rounded-full bg-[#8e85ff]"></span>
            {{ $isFinder ? 'Peran: Penemu' : ($isClaimant ? 'Peran: Pemilik Barang' : 'Proses Serah Terima') }}
        </span>

        <span class="inline-flex items-center gap-2 rounded-full border px-4 py-2 text-xs font-bold
            {{ $report->status === 'returned' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : 'border-amber-200 bg-amber-50 text-amber-700' }}">
            <span class="h-2 w-2 rounded-full {{ $report->status === 'returned' ? 'bg-emerald-500' : 'bg-amber-500' }}"></span>
            {{ $report->status === 'returned' ? 'Proses Selesai' : 'Proses Berlangsung' }}
        </span>
    </div>

    {{-- INFORMASI BARANG --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">

        <div class="relative overflow-hidden border-b border-slate-100 bg-gradient-to-r from-[#f4f7fc] via-white to-[#f3f0ff] px-5 py-5 sm:px-7">
            <div class="pointer-events-none absolute -right-10 -top-16 h-36 w-36 rounded-full bg-[#8e85ff]/10 blur-2xl"></div>

            <div class="relative flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#746bd0]">
                        Informasi Barang
                    </p>
                    <h2 class="mt-2 text-xl font-extrabold text-[#142b49]">
                        {{ $report->item_name }}
                    </h2>
                </div>

                <span class="rounded-full border px-3 py-1.5 text-xs font-bold
                    {{ $report->status === 'returned' ? 'border-emerald-200 bg-emerald-50 text-emerald-700' : ($report->status === 'claimed' ? 'border-[#8bcfff]/30 bg-[#eef8ff] text-blue-700' : 'border-slate-200 bg-slate-100 text-slate-600') }}">
                    {{ $report->status === 'returned' ? 'Sudah Dikembalikan' : ($report->status === 'claimed' ? 'Sedang Diklaim' : ucfirst($report->status)) }}
                </span>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-[240px_1fr]">

                @if ($report->photo)
                    <div class="group overflow-hidden rounded-2xl border border-slate-200/80 bg-gradient-to-br from-[#e4faf5] to-[#eeeaff]">
                        <img
                            src="{{ asset('storage/' . $report->photo) }}"
                            alt="Foto {{ $report->item_name }}"
                            class="h-56 w-full object-cover transition duration-500 group-hover:scale-[1.03] sm:h-full sm:min-h-[220px]"
                        >
                    </div>
                @endif

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div class="rounded-2xl border border-[#8e85ff]/10 bg-gradient-to-br from-white to-[#f3f0ff] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Kategori</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->category }}</p>
                    </div>

                    <div class="rounded-2xl border border-[#62e7d0]/15 bg-gradient-to-br from-white to-[#eafbf7] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Lokasi</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->location }}</p>
                    </div>

                    <div class="rounded-2xl border border-[#e8c17b]/20 bg-gradient-to-br from-white to-[#fff8eb] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Penemu</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->user->name }}</p>
                    </div>

                    <div class="rounded-2xl border border-[#8bcfff]/20 bg-gradient-to-br from-white to-[#eef8ff] p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pemilik / Pengaju</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->claimant->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PERMINTAAN KONTAK --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">

        <div class="border-b border-slate-100 bg-gradient-to-r from-[#f4f7fc] via-white to-[#eafbf7] px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h2.5l2 5-2 1.5a11 11 0 005 5l1.5-2 5 2V17a2 2 0 01-2 2h-1C9 19 5 15 3 9V5z"/>
                    </svg>
                </div>

                <div>
                    <h2 class="text-lg font-extrabold text-[#142b49]">Permintaan Kontak Penemu</h2>
                    <p class="mt-1 text-xs text-slate-500">Pengaturan akses informasi kontak</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <p class="mb-5 text-sm leading-relaxed text-slate-500">
                Informasi kontak penemu hanya dapat dilihat setelah permintaan disetujui.
            </p>

            @if ($claim->contact_status === 'approved')

                <div class="rounded-2xl border border-emerald-200 bg-gradient-to-br from-emerald-50 to-[#e4faf5] p-5 sm:p-6">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-white/80 text-emerald-700 shadow-sm">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-sm font-extrabold text-emerald-900">
                                Permintaan Kontak Disetujui
                            </h3>
                            <p class="mt-1 text-sm leading-6 text-emerald-700">
                                Kamu dapat menggunakan informasi kontak berikut untuk mengatur pengambilan barang.
                            </p>
                        </div>
                    </div>

                    <div class="mt-5 rounded-2xl border border-emerald-200/80 bg-white p-4">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                            Email Penemu
                        </p>
                        <p class="mt-2 break-all text-base font-bold text-[#142b49]">
                            {{ $report->user->email }}
                        </p>
                    </div>
                </div>

            @elseif ($claim->contact_status === 'pending')

                @if ($isFinder)

                    <div class="mb-5 rounded-2xl border border-amber-200 bg-gradient-to-br from-amber-50 to-[#fff8eb] p-4">
                        <div class="flex items-start gap-3">
                            <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
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

                    <div class="rounded-2xl border border-amber-200 bg-gradient-to-br from-amber-50 to-[#fff8eb] p-5">
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

                <div class="rounded-2xl border border-rose-200 bg-gradient-to-br from-rose-50 to-[#fff1f5] p-5">
                    <div class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-rose-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <p class="text-sm leading-relaxed text-rose-800">
                            Permintaan kontak ditolak oleh penemu.
                        </p>
                    </div>
                </div>

            @elseif ($claim->contact_status === 'not_requested')

                @if ($isClaimant)

                    <div class="rounded-2xl border border-[#8e85ff]/15 bg-gradient-to-br from-[#f3f0ff] via-white to-[#eafbf7] p-5">
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

                    <div class="rounded-2xl border border-slate-200 bg-gradient-to-br from-white to-[#f6f7fb] p-5">
                        <p class="text-sm leading-relaxed text-slate-500">
                            Belum ada permintaan kontak dari pengaju klaim.
                        </p>
                    </div>

                @endif

            @endif
        </div>
    </section>

    {{-- STATUS KONFIRMASI --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">

        <div class="border-b border-slate-100 bg-gradient-to-r from-[#f4f7fc] via-white to-[#f3f0ff] px-5 py-5 sm:px-7">
            <h2 class="text-lg font-extrabold text-[#142b49]">
                Status Konfirmasi Kedua Pihak
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Serah terima membutuhkan konfirmasi dari penemu dan pemilik barang.
            </p>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                {{-- PENEMU --}}
                <div class="rounded-2xl border border-[#8e85ff]/15 bg-gradient-to-br from-white to-[#f3f0ff] p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e9e5ff] to-[#dce9ff] text-sm font-extrabold text-[#514c94]">
                            {{ strtoupper(substr($report->user->name, 0, 1)) }}
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Penemu</p>
                            <h3 class="mt-1 text-sm font-bold text-[#142b49]">
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
                                    <p class="text-sm font-bold">Sudah Dikonfirmasi</p>
                                </div>
                                <p class="mt-2 text-xs font-medium text-emerald-700">
                                    {{ $claim->finder_confirmed_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        @else
                            <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                                <div class="flex items-center gap-2 text-amber-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm font-bold">Menunggu Konfirmasi</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- PEMILIK --}}
                <div class="rounded-2xl border border-[#62e7d0]/20 bg-gradient-to-br from-white to-[#eafbf7] p-5 transition hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#dce9ff] text-sm font-extrabold text-[#287d72]">
                            {{ strtoupper(substr($claim->claimant->name, 0, 1)) }}
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Pemilik Barang</p>
                            <h3 class="mt-1 text-sm font-bold text-[#142b49]">
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
                                    <p class="text-sm font-bold">Sudah Dikonfirmasi</p>
                                </div>
                                <p class="mt-2 text-xs font-medium text-emerald-700">
                                    {{ $claim->claimant_confirmed_at->format('d M Y, H:i') }}
                                </p>
                            </div>
                        @else
                            <div class="rounded-xl border border-amber-200 bg-amber-50 p-4">
                                <div class="flex items-center gap-2 text-amber-700">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <p class="text-sm font-bold">Menunggu Konfirmasi</p>
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

        <section class="overflow-hidden rounded-[1.75rem] border border-emerald-200 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)]">
            <div class="border-b border-emerald-100 bg-gradient-to-r from-emerald-50 to-[#e4faf5] px-5 py-5 sm:px-7">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white text-emerald-700 shadow-sm">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>

                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-wider text-emerald-700">Status Akhir</p>
                        <h2 class="text-xl font-extrabold text-emerald-900">Serah Terima Selesai</h2>
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

                <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">
                    <div class="border-b border-slate-100 bg-gradient-to-r from-[#f4f7fc] via-white to-[#eafbf7] px-5 py-5 sm:px-7">
                        <div class="flex items-center gap-3">
                            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94]">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>

                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-wider text-[#746bd0]">Langkah Terakhir</p>
                                <h2 class="text-lg font-extrabold text-[#142b49]">Konfirmasi Serah Terima</h2>
                            </div>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <p class="text-sm leading-relaxed text-slate-600">
                            Pastikan barang benar-benar sudah diserahkan atau diterima sebelum melakukan konfirmasi. Konfirmasi dari kedua pihak diperlukan agar proses pengembalian selesai.
                        </p>

                        <div class="mt-5 rounded-2xl border border-amber-200 bg-gradient-to-br from-amber-50 to-[#fff8eb] p-4">
                            <div class="flex items-start gap-3">
                                <svg class="mt-0.5 h-5 w-5 shrink-0 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                </svg>
                                <p class="text-sm leading-relaxed text-amber-800">
                                    Konfirmasi hanya dilakukan setelah penyerahan barang secara nyata. Tindakan ini akan mencatat bahwa proses serah terima telah dilakukan oleh pihak yang bersangkutan.
                                </p>
                            </div>
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

                <section class="overflow-hidden rounded-[1.75rem] border border-amber-200 bg-gradient-to-br from-white to-[#fff8eb] shadow-sm">
                    <div class="p-5 sm:p-7">
                        <div class="flex items-start gap-4">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-amber-100 text-amber-700">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="text-lg font-extrabold text-amber-900">
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
