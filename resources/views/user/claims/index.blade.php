
@extends('layouts.app')

@section('title', 'Klaim Masuk | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('user.reports.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Laporan Saya
        </a>

        <div class="mt-7">
            <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">
                Manajemen Klaim
            </p>

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Pengajuan Klaim Masuk
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">
                Periksa bukti kepemilikan yang diajukan pengguna untuk barang yang kamu temukan.
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
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
            <h3 class="font-semibold text-red-800">
                Terdapat kesalahan
            </h3>

            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="temu-card mb-10 overflow-hidden p-5 sm:p-7">

        <div class="mb-6">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                Informasi Barang
            </p>

            <h2 class="mt-2 text-xl font-bold text-slate-900">
                {{ $report->item_name }}
            </h2>
        </div>

        @if ($report->photo)
            <div class="mb-6 overflow-hidden rounded-xl border border-slate-200 bg-slate-100">
                <img
                    src="{{ asset('storage/' . $report->photo) }}"
                    alt="Foto {{ $report->item_name }}"
                    class="h-56 w-full object-cover sm:h-64"
                >
            </div>
        @endif

        <div class="mb-5 flex flex-wrap gap-2">
            <span class="rounded-full bg-slate-900 px-3 py-1.5 text-xs font-semibold text-white">
                Barang Ditemukan
            </span>

            <span class="rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                {{ $report->category }}
            </span>

            <span class="rounded-full px-3 py-1.5 text-xs font-semibold
                {{ $report->status === 'active' ? 'bg-blue-50 text-blue-700' : '' }}
                {{ $report->status === 'claimed' ? 'bg-amber-50 text-amber-700' : '' }}
                {{ $report->status === 'returned' ? 'bg-emerald-50 text-emerald-700' : '' }}">
                {{ $report->status === 'active' ? 'Aktif' : ($report->status === 'claimed' ? 'Dalam Proses Klaim' : 'Telah Dikembalikan') }}
            </span>
        </div>

        <div class="grid grid-cols-1 gap-5 border-t border-slate-100 pt-5 sm:grid-cols-2">
            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Lokasi Ditemukan
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $report->location }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Tanggal Ditemukan
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $report->incident_date->format('d M Y') }}
                </p>
            </div>

            <div>
                <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                    Status Barang
                </p>
                <p class="mt-1 text-sm font-semibold text-slate-700">
                    {{ $report->status === 'active' ? 'Menunggu Klaim' : ($report->status === 'claimed' ? 'Sedang Diproses' : 'Selesai') }}
                </p>
            </div>
        </div>
    </section>

    <section>
        <div class="mb-6">
            <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">
                Daftar Pengajuan
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Tinjau setiap pengajuan sebelum mengambil keputusan.
            </p>
        </div>

        <div class="space-y-5">
            @forelse ($claims as $claim)
                <article class="temu-card p-5 sm:p-7">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Pengaju Klaim
                            </p>

                            <h3 class="mt-2 text-xl font-bold text-slate-900">
                                {{ $claim->claimant->name }}
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Diajukan {{ $claim->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>

                        <span class="w-fit rounded-full px-3 py-1.5 text-xs font-semibold
                            {{ $claim->status === 'pending' ? 'bg-amber-50 text-amber-700' : '' }}
                            {{ $claim->status === 'approved' ? 'bg-emerald-50 text-emerald-700' : '' }}
                            {{ $claim->status === 'rejected' ? 'bg-red-50 text-red-700' : '' }}">
                            {{ $claim->status === 'pending' ? 'Menunggu Konfirmasi' : ($claim->status === 'approved' ? 'Disetujui' : 'Ditolak') }}
                        </span>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-sm font-bold text-slate-800">
                            Alasan dan Bukti Kepemilikan
                        </h4>

                        <div class="mt-3 rounded-xl border border-slate-200 bg-slate-50 p-4 sm:p-5">
                            <p class="whitespace-pre-line text-sm leading-relaxed text-slate-600">{{ $claim->reason }}</p>
                        </div>
                    </div>

                    <div class="mt-5 space-y-1">
                        <p class="text-xs text-slate-400">
                            Diajukan pada: {{ $claim->created_at->format('d M Y, H:i') }}
                        </p>

                        @if ($claim->responded_at)
                            <p class="text-xs text-slate-400">
                                Diproses pada: {{ $claim->responded_at->format('d M Y, H:i') }}
                            </p>
                        @endif
                    </div>

                    @if ($claim->status === 'pending' && $report->status === 'active')
                        <div class="mt-6 border-t border-slate-200 pt-6">
                            <p class="text-sm leading-relaxed text-slate-500">
                                Pastikan informasi yang diberikan sesuai dengan ciri barang sebelum menyetujui pengajuan.
                            </p>

                            <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                                <form
                                    action="{{ route('user.reports.claims.approve', [$report->id, $claim->id]) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button type="submit" class="temu-button w-full">
                                        Setujui Klaim
                                    </button>
                                </form>

                                <form
                                    action="{{ route('user.reports.claims.reject', [$report->id, $claim->id]) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button type="submit" class="temu-button-secondary w-full">
                                        Tolak Klaim
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif

                    @if ($claim->status === 'approved')
                        <div class="mt-6 border-t border-slate-200 pt-6">
                            <h4 class="text-sm font-bold text-slate-900">
                                Permintaan Akses Kontak
                            </h4>

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
                                    Keputusan kontak pada:
                                    {{ $claim->contact_responded_at->format('d M Y, H:i') }}
                                </p>
                            @endif
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('user.reports.claims.handoff', [$report->id, $claim->id]) }}"
                               class="temu-button-secondary">
                                Buka Proses Serah Terima
                            </a>
                        </div>
                    @endif

                </article>
            @empty
                <div class="temu-card px-6 py-12 text-center sm:py-16">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">
                        <svg class="h-7 w-7 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                        </svg>
                    </div>

                    <h3 class="mt-4 text-lg font-bold text-slate-900">
                        Belum Ada Pengajuan Klaim
                    </h3>

                    <p class="mx-auto mt-2 max-w-lg text-sm leading-relaxed text-slate-500">
                        Belum ada pengguna yang mengajukan klaim kepemilikan untuk barang ini. Pengajuan akan muncul di halaman ini ketika seseorang mengirim klaim.
                    </p>

                    <a href="{{ route('user.reports.index') }}" class="temu-button mt-6 inline-flex">
                        Kembali ke Laporan Saya
                    </a>
                </div>
            @endforelse
        </div>
    </section>

</div>
@endsection
