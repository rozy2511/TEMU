
@extends('layouts.app')

@section('title', 'Klaim Masuk | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-10">

    <div class="mb-8">
        <a href="{{ route('user.reports.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-[#172f4f]">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Laporan Saya
        </a>

        <div class="mt-6">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#172f4f] text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Manajemen Klaim</p>
                    <h1 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        Pengajuan Klaim Masuk
                    </h1>
                </div>
            </div>

            <p class="mt-4 max-w-2xl text-sm leading-relaxed text-slate-500">
                Periksa bukti kepemilikan yang diajukan pengguna untuk barang yang kamu temukan sebelum mengambil keputusan.
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-6 flex gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 flex gap-3 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

    <section class="mb-10 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Barang yang Dilaporkan</p>
                    <h2 class="mt-1 text-xl font-bold text-slate-900">{{ $report->item_name }}</h2>
                </div>

                <span class="inline-flex items-center gap-2 rounded-full bg-[#edf2f7] px-3 py-1.5 text-xs font-semibold text-[#172f4f]">
                    <span class="h-2 w-2 rounded-full bg-[#496783]"></span>
                    Barang Ditemukan
                </span>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-[260px_1fr]">

                @if ($report->photo)
                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-slate-50">
                        <img
                            src="{{ asset('storage/' . $report->photo) }}"
                            alt="Foto {{ $report->item_name }}"
                            class="h-56 w-full object-cover lg:h-full lg:min-h-[220px]"
                        >
                    </div>
                @endif

                <div class="space-y-5">
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                            {{ $report->category }}
                        </span>

                        <span class="rounded-lg px-3 py-1.5 text-xs font-semibold
                            {{ $report->status === 'active' ? 'bg-blue-50 text-blue-700' : '' }}
                            {{ $report->status === 'claimed' ? 'bg-amber-50 text-amber-700' : '' }}
                            {{ $report->status === 'returned' ? 'bg-emerald-50 text-emerald-700' : '' }}">
                            {{ $report->status === 'active' ? 'Aktif' : ($report->status === 'claimed' ? 'Dalam Proses Klaim' : 'Telah Dikembalikan') }}
                        </span>
                    </div>

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                            <div class="flex items-center gap-2 text-slate-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 21s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"/>
                                    <circle cx="12" cy="10" r="2.5" stroke-width="1.8"/>
                                </svg>
                                <span class="text-xs font-medium">Lokasi Ditemukan</span>
                            </div>
                            <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->location }}</p>
                        </div>

                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4">
                            <div class="flex items-center gap-2 text-slate-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                </svg>
                                <span class="text-xs font-medium">Tanggal Ditemukan</span>
                            </div>
                            <p class="mt-2 text-sm font-semibold text-slate-800">{{ $report->incident_date->format('d M Y') }}</p>
                        </div>

                        <div class="rounded-xl border border-slate-100 bg-slate-50 p-4 sm:col-span-2">
                            <div class="flex items-center gap-2 text-slate-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-xs font-medium">Status Barang</span>
                            </div>
                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $report->status === 'active' ? 'Menunggu Klaim' : ($report->status === 'claimed' ? 'Sedang Diproses' : 'Selesai') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">Daftar Pengajuan</h2>
                <p class="mt-1 text-sm text-slate-500">
                    Tinjau bukti kepemilikan dari setiap pengguna.
                </p>
            </div>
        </div>

        <div class="space-y-5">
            @forelse ($claims as $claim)
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="border-b border-slate-100 p-5 sm:px-7 sm:py-6">
                        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#edf2f7] text-lg font-bold text-[#172f4f]">
                                    {{ strtoupper(substr($claim->claimant->name, 0, 1)) }}
                                </div>

                                <div>
                                    <p class="text-xs font-medium uppercase tracking-wider text-slate-400">Pengaju Klaim</p>
                                    <h3 class="mt-1 text-lg font-bold text-slate-900">
                                        {{ $claim->claimant->name }}
                                    </h3>
                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ $claim->created_at->format('d M Y, H:i') }}
                                    </p>
                                </div>
                            </div>

                            <span class="w-fit rounded-full px-3 py-1.5 text-xs font-semibold
                                {{ $claim->status === 'pending' ? 'bg-amber-50 text-amber-700' : '' }}
                                {{ $claim->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : '' }}
                                {{ $claim->status === 'rejected' ? 'bg-red-50 text-red-700' : '' }}">
                                {{ $claim->status === 'pending' ? 'Menunggu Konfirmasi' : ($claim->status === 'approved' ? 'Disetujui' : 'Ditolak') }}
                            </span>
                        </div>
                    </div>

                    <div class="p-5 sm:p-7">
                        <div>
                            <div class="flex items-center gap-2">
                                <svg class="h-5 w-5 text-[#496783]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h8M8 14h5m-9 5h16a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <h4 class="text-sm font-bold text-slate-800">Alasan dan Bukti Kepemilikan</h4>
                            </div>

                            <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:p-5">
                                <p class="whitespace-pre-line text-sm leading-7 text-slate-600">{{ $claim->reason }}</p>
                            </div>
                        </div>

                        <div class="mt-4 flex flex-wrap gap-x-5 gap-y-2 text-xs text-slate-400">
                            <p>Diajukan: {{ $claim->created_at->format('d M Y, H:i') }}</p>

                            @if ($claim->responded_at)
                                <p>Diproses: {{ $claim->responded_at->format('d M Y, H:i') }}</p>
                            @endif
                        </div>

                        @if ($claim->status === 'pending' && $report->status === 'active')
                            <div class="mt-6 rounded-xl border border-[#dce5ee] bg-[#f7f9fc] p-4 sm:p-5">
                                <div class="flex gap-3">
                                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-[#496783]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                    </svg>
                                    <p class="text-sm leading-relaxed text-slate-600">
                                        Pastikan bukti kepemilikan sesuai dengan ciri barang sebelum menyetujui pengajuan.
                                    </p>
                                </div>

                                <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                                    <form action="{{ route('user.reports.claims.approve', [$report->id, $claim->id]) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="temu-button flex w-full items-center justify-center gap-2">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Setujui Klaim
                                        </button>
                                    </form>

                                    <form action="{{ route('user.reports.claims.reject', [$report->id, $claim->id]) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="temu-button-secondary flex w-full items-center justify-center gap-2">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Tolak Klaim
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endif

                        @if ($claim->status === 'approved')
                            <div class="mt-6 border-t border-slate-100 pt-6">
                                <div class="flex items-center gap-2">
                                    <svg class="h-5 w-5 text-[#496783]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4m-3 0h10a2 2 0 012 2v7H5v-7a2 2 0 012-2z"/>
                                    </svg>
                                    <h4 class="text-sm font-bold text-slate-900">Permintaan Akses Kontak</h4>
                                </div>

                                @if ($claim->contact_status === 'not_requested')
                                    <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4">
                                        <p class="text-sm leading-relaxed text-slate-600">
                                            Pengaju belum meminta akses informasi kontak kamu.
                                        </p>
                                    </div>

                                @elseif ($claim->contact_status === 'pending')
                                    <div class="mt-3 rounded-xl border border-amber-200 bg-amber-50 p-4">
                                        <p class="text-sm leading-relaxed text-amber-800">
                                            Pengaju klaim meminta izin untuk melihat informasi kontak kamu. Buka halaman serah terima untuk mengelola permintaan tersebut.
                                        </p>
                                    </div>

                                @elseif ($claim->contact_status === 'approved')
                                    <div class="mt-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4">
                                        <p class="text-sm leading-relaxed text-emerald-800">
                                            Permintaan kontak telah disetujui.
                                        </p>
                                    </div>

                                @elseif ($claim->contact_status === 'rejected')
                                    <div class="mt-3 rounded-xl border border-red-200 bg-red-50 p-4">
                                        <p class="text-sm leading-relaxed text-red-800">
                                            Permintaan kontak telah ditolak.
                                        </p>
                                    </div>
                                @endif

                                @if ($claim->contact_responded_at)
                                    <p class="mt-3 text-xs text-slate-400">
                                        Keputusan kontak pada: {{ $claim->contact_responded_at->format('d M Y, H:i') }}
                                    </p>
                                @endif

                                <div class="mt-5">
                                    <a href="{{ route('user.reports.claims.handoff', [$report->id, $claim->id]) }}" class="temu-button-secondary inline-flex w-full items-center justify-center gap-2 sm:w-auto">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h12M8 12h12M8 17h12M3 7h.01M3 12h.01M3 17h.01"/>
                                        </svg>
                                        Buka Proses Serah Terima
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="rounded-2xl border border-slate-200 bg-white px-6 py-12 text-center shadow-sm sm:py-16">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#edf2f7] text-[#496783]">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1-1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 text-lg font-bold text-slate-900">
                        Belum Ada Pengajuan Klaim
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-slate-500">
                        Belum ada pengguna yang mengajukan klaim kepemilikan untuk barang ini. Pengajuan akan ditampilkan di sini ketika seseorang mengirim klaim.
                    </p>

                    <a href="{{ route('user.reports.index') }}" class="temu-button mt-6 inline-flex items-center justify-center gap-2">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Kembali ke Laporan Saya
                    </a>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection
