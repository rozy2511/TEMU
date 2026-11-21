
@extends('layouts.app')

@section('title', 'Klaim Saya | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('user.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Beranda
        </a>

        <div class="mt-7">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">
                Riwayat Pengajuan
            </p>

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Klaim Saya
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">
                Pantau status pengajuan kepemilikan barang dan proses pengembalian barang.
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

    <div class="space-y-5">
        @forelse ($claims as $claim)

            <article class="temu-card overflow-hidden p-5 sm:p-7">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                            Barang yang Diklaim
                        </p>

                        <h2 class="mt-2 text-xl font-bold text-slate-900">
                            {{ $claim->itemReport->item_name }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Penemu: {{ $claim->itemReport->user->name }}
                        </p>
                    </div>

                    <span class="w-fit rounded-full px-3 py-1.5 text-xs font-semibold
                        {{ $claim->status === 'pending' ? 'bg-amber-50 text-amber-700' : '' }}
                        {{ $claim->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : '' }}
                        {{ $claim->status === 'rejected' ? 'bg-red-50 text-red-700' : '' }}">
                        {{ $claim->status === 'pending' ? 'Menunggu Konfirmasi' : ($claim->status === 'approved' ? 'Disetujui' : 'Ditolak') }}
                    </span>
                </div>

                @if ($claim->itemReport->photo)
                    <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
                        <img
                            src="{{ asset('storage/' . $claim->itemReport->photo) }}"
                            alt="Foto {{ $claim->itemReport->item_name }}"
                            class="h-56 w-full object-cover sm:h-64"
                        >
                    </div>
                @endif

                <div class="mt-6 grid grid-cols-1 gap-5 border-t border-slate-100 pt-5 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                            Kategori
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $claim->itemReport->category }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                            Lokasi
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $claim->itemReport->location }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                            Tanggal Kejadian
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $claim->itemReport->incident_date->format('d M Y') }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                            Tanggal Pengajuan
                        </p>
                        <p class="mt-1 text-sm font-semibold text-slate-700">
                            {{ $claim->created_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <h3 class="text-sm font-bold text-slate-800">
                        Alasan dan Bukti Kepemilikan
                    </h3>

                    <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:p-5">
                        <p class="whitespace-pre-line text-sm leading-relaxed text-slate-600">{{ $claim->reason }}</p>
                    </div>
                </div>

                @if ($claim->responded_at)
                    <p class="mt-4 text-xs text-slate-400">
                        Diproses pada: {{ $claim->responded_at->format('d M Y, H:i') }}
                    </p>
                @endif

                @if ($claim->status === 'approved')

                    <div class="mt-6 rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                        <h3 class="text-sm font-bold text-emerald-800">
                            Pengajuan Klaim Disetujui
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-emerald-700">
                            Penemu telah menyetujui klaim kamu. Lanjutkan proses komunikasi dan konfirmasi pengembalian melalui halaman serah terima.
                        </p>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('user.reports.claims.handoff', [$claim->item_report_id, $claim->id]) }}"
                           class="temu-button">
                            Buka Proses Serah Terima
                        </a>
                    </div>

                @elseif ($claim->status === 'pending')

                    <div class="mt-6 rounded-xl border border-amber-200 bg-amber-50 p-5">
                        <h3 class="text-sm font-bold text-amber-800">
                            Menunggu Konfirmasi Penemu
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-amber-700">
                            Pengajuan kamu sedang diperiksa oleh penemu barang. Tunggu keputusan melalui halaman ini.
                        </p>
                    </div>

                @else

                    <div class="mt-6 rounded-xl border border-red-200 bg-red-50 p-5">
                        <h3 class="text-sm font-bold text-red-800">
                            Pengajuan Ditolak
                        </h3>

                        <p class="mt-2 text-sm leading-relaxed text-red-700">
                            Pengajuan klaim ini telah ditolak oleh penemu barang.
                        </p>
                    </div>

                @endif

            </article>

        @empty

            <div class="temu-card px-6 py-12 text-center sm:py-16">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">
                    <svg class="h-7 w-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>
                </div>

                <h2 class="mt-4 text-lg font-bold text-slate-900">
                    Belum Ada Pengajuan Klaim
                </h2>

                <p class="mx-auto mt-2 max-w-lg text-sm leading-relaxed text-slate-500">
                    Kamu belum mengajukan klaim kepemilikan barang. Ketika menemukan laporan yang berpotensi cocok, kamu dapat mengajukan klaim melalui halaman Smart Matching.
                </p>

                <a href="{{ route('user.dashboard') }}" class="temu-button mt-6 inline-flex">
                    Cari Barang
                </a>
            </div>

        @endforelse
    </div>

    @if ($claims->hasPages())
        <div class="mt-8">
            {{ $claims->links() }}
        </div>
    @endif

</div>
@endsection
