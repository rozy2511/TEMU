
@extends('layouts.app')

@section('title', 'Detail Klaim | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('admin.claims.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Manajemen Klaim
        </a>

        <p class="mt-6 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Administrasi / Detail Klaim
        </p>

        <div class="mt-2 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Detail Pengajuan Klaim
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Informasi lengkap pengajuan klaim dan proses serah terima barang.
                </p>
            </div>

            <span class="w-fit rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600">
                ID Klaim #{{ $claim->id }}
            </span>
        </div>
    </div>

    <div class="space-y-6">

        {{-- Informasi Barang --}}
        <section class="temu-card overflow-hidden">

            <div class="border-b border-slate-100 p-5 sm:p-6">
                <h2 class="text-lg font-bold text-slate-900">
                    Informasi Barang
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi barang yang menjadi objek pengajuan klaim.
                </p>
            </div>

            <div class="p-5 sm:p-6">

                @if ($claim->itemReport)

                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-[280px_1fr]">

                        <div>
                            @if ($claim->itemReport->photo)
                                <img
                                    src="{{ asset('storage/' . $claim->itemReport->photo) }}"
                                    alt="Foto {{ $claim->itemReport->item_name }}"
                                    class="aspect-[4/3] w-full rounded-2xl border border-slate-200 bg-slate-100 object-cover"
                                >
                            @else
                                <div class="flex aspect-[4/3] w-full items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-slate-50 text-sm text-slate-400">
                                    Tidak ada foto barang
                                </div>
                            @endif
                        </div>

                        <div>

                            <div class="mb-5 flex flex-wrap gap-2">
                                @if ($claim->itemReport->type === 'lost')
                                    <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        Kehilangan
                                    </span>
                                @else
                                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        Penemuan
                                    </span>
                                @endif

                                @if ($claim->itemReport->status === 'active')
                                    <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                        Aktif
                                    </span>
                                @elseif ($claim->itemReport->status === 'claimed')
                                    <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        Sedang Diklaim
                                    </span>
                                @else
                                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        Dikembalikan
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-2xl font-bold text-slate-900">
                                {{ $claim->itemReport->item_name }}
                            </h3>

                            <p class="mt-2 text-sm text-slate-500">
                                {{ $claim->itemReport->category }}
                            </p>

                            <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Lokasi Kejadian
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ $claim->itemReport->location }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Tanggal Kejadian
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ $claim->itemReport->incident_date->format('d M Y') }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Status Barang
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ ucfirst($claim->itemReport->status) }}
                                    </p>
                                </div>

                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Status Moderasi
                                    </p>
                                    <p class="mt-2 text-sm font-medium text-slate-800">
                                        {{ $claim->itemReport->moderation_status === 'hidden' ? 'Disembunyikan' : 'Terlihat' }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mt-7 border-t border-slate-100 pt-6">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Deskripsi Barang
                        </p>
                        <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">
                            {{ $claim->itemReport->description }}
                        </p>
                    </div>

                @else

                    <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        Laporan barang yang terkait dengan klaim ini tidak tersedia.
                    </div>

                @endif

            </div>
        </section>

        {{-- Informasi Kedua Pihak --}}
        <section class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            <div class="temu-card p-5 sm:p-6">
                <div class="mb-5">
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">
                        Pihak Pertama
                    </p>
                    <h2 class="mt-2 text-lg font-bold text-slate-900">
                        Informasi Penemu
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Pengguna yang membuat laporan penemuan barang.
                    </p>
                </div>

                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Nama Penemu
                        </p>
                        <p class="mt-2 font-semibold text-slate-800">
                            {{ $claim->itemReport->user->name ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Email Penemu
                        </p>
                        <p class="mt-2 break-all text-sm font-medium text-slate-700">
                            {{ $claim->itemReport->user->email ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="temu-card p-5 sm:p-6">
                <div class="mb-5">
                    <p class="text-xs font-semibold uppercase tracking-widest text-slate-400">
                        Pihak Kedua
                    </p>
                    <h2 class="mt-2 text-lg font-bold text-slate-900">
                        Informasi Pengaju Klaim
                    </h2>
                    <p class="mt-1 text-sm text-slate-500">
                        Pengguna yang mengajukan klaim kepemilikan barang.
                    </p>
                </div>

                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Nama Pengaju
                        </p>
                        <p class="mt-2 font-semibold text-slate-800">
                            {{ $claim->claimant->name ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Email Pengaju
                        </p>
                        <p class="mt-2 break-all text-sm font-medium text-slate-700">
                            {{ $claim->claimant->email ?? '-' }}
                        </p>
                    </div>
                </div>
            </div>

        </section>

        {{-- Informasi Pengajuan --}}
        <section class="temu-card p-5 sm:p-6">

            <h2 class="text-lg font-bold text-slate-900">
                Informasi Pengajuan Klaim
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Detail alasan dan status pengajuan dari pengguna.
            </p>

            <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Tanggal Pengajuan
                    </p>
                    <p class="mt-2 font-medium text-slate-800">
                        {{ $claim->created_at->format('d M Y, H:i') }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Status Klaim
                    </p>
                    <div class="mt-2">
                        @if ($claim->status === 'pending')
                            <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                Menunggu
                            </span>
                        @elseif ($claim->status === 'approved')
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                Disetujui
                            </span>
                        @else
                            <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                                Ditolak
                            </span>
                        @endif
                    </div>
                </div>

                @if ($claim->responded_at)
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                            Waktu Respons Klaim
                        </p>
                        <p class="mt-2 font-medium text-slate-800">
                            {{ $claim->responded_at->format('d M Y, H:i') }}
                        </p>
                    </div>
                @endif

            </div>

            <div class="mt-6 border-t border-slate-100 pt-6">
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Alasan Klaim
                </p>
                <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">
                    {{ $claim->reason }}
                </p>
            </div>

        </section>

        {{-- Persetujuan Kontak --}}
        <section class="temu-card p-5 sm:p-6">

            <h2 class="text-lg font-bold text-slate-900">
                Persetujuan Kontak
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Status permintaan komunikasi antara penemu dan pengaju klaim.
            </p>

            <div class="mt-5">
                @if ($claim->contact_status === 'pending')
                    <span class="inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                        Menunggu Persetujuan
                    </span>
                @elseif ($claim->contact_status === 'approved')
                    <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                        Kontak Disetujui
                    </span>
                @elseif ($claim->contact_status === 'rejected')
                    <span class="inline-flex rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                        Kontak Ditolak
                    </span>
                @else
                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                        Belum Ada Permintaan Kontak
                    </span>
                @endif
            </div>

            @if ($claim->contact_responded_at)
                <div class="mt-5 border-t border-slate-100 pt-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Waktu Respons Kontak
                    </p>
                    <p class="mt-2 text-sm font-medium text-slate-700">
                        {{ $claim->contact_responded_at->format('d M Y, H:i') }}
                    </p>
                </div>
            @endif

        </section>

        {{-- Konfirmasi Serah Terima --}}
        <section class="temu-card p-5 sm:p-6">

            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Konfirmasi Serah Terima
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Progres konfirmasi pengembalian barang oleh kedua pihak.
                </p>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div class="rounded-xl border border-slate-200 p-5">
                    <p class="font-semibold text-slate-800">
                        Konfirmasi Penemu
                    </p>

                    @if ($claim->finder_confirmed_at)
                        <span class="mt-3 inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                            Sudah Dikonfirmasi
                        </span>
                        <p class="mt-3 text-xs text-slate-500">
                            {{ $claim->finder_confirmed_at->format('d M Y, H:i') }}
                        </p>
                    @else
                        <span class="mt-3 inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                            Belum Dikonfirmasi
                        </span>
                    @endif
                </div>

                <div class="rounded-xl border border-slate-200 p-5">
                    <p class="font-semibold text-slate-800">
                        Konfirmasi Pengaju Klaim
                    </p>

                    @if ($claim->claimant_confirmed_at)
                        <span class="mt-3 inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                            Sudah Dikonfirmasi
                        </span>
                        <p class="mt-3 text-xs text-slate-500">
                            {{ $claim->claimant_confirmed_at->format('d M Y, H:i') }}
                        </p>
                    @else
                        <span class="mt-3 inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                            Belum Dikonfirmasi
                        </span>
                    @endif
                </div>

            </div>

            @if ($claim->status === 'approved' && $claim->finder_confirmed_at && $claim->claimant_confirmed_at)

                <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                    <p class="font-semibold text-emerald-800">
                        Serah terima telah dikonfirmasi oleh kedua pihak.
                    </p>
                    <p class="mt-2 text-sm text-emerald-700">
                        Status barang:
                        {{ ucfirst($claim->itemReport->status ?? '-') }}
                    </p>
                </div>

            @elseif ($claim->status === 'approved')

                <div class="mt-5 rounded-xl border border-amber-200 bg-amber-50 p-5">
                    <p class="font-semibold text-amber-800">
                        Serah terima belum selesai.
                    </p>
                    <p class="mt-2 text-sm leading-6 text-amber-700">
                        Proses masih menunggu konfirmasi dari pihak yang belum menyelesaikan konfirmasi pengembalian barang.
                    </p>
                </div>

            @else

                <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm leading-6 text-slate-600">
                        Konfirmasi serah terima hanya dapat dilakukan setelah pengajuan klaim disetujui.
                    </p>
                </div>

            @endif

        </section>

    </div>
</div>
@endsection
