
@extends('layouts.app')

@section('title', 'Detail Laporan | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('admin.reports.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Daftar Laporan
        </a>

        <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-widest text-slate-500">
                    Administrasi / Detail Laporan
                </p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                    Detail Laporan
                </h1>
                <p class="mt-2 text-sm text-slate-500">
                    Informasi barang, pelapor, moderasi, dan riwayat klaim.
                </p>
            </div>

            <span class="w-fit rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600">
                ID Laporan #{{ $report->id }}
            </span>
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
            <p class="mb-2 font-semibold">Terdapat kesalahan:</p>
            <ul class="list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="space-y-6">

        {{-- Informasi Barang --}}
        <section class="temu-card overflow-hidden">

            <div class="border-b border-slate-100 p-5 sm:p-6">
                <h2 class="text-lg font-bold text-slate-900">
                    Informasi Barang
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Data barang yang dilaporkan oleh pengguna.
                </p>
            </div>

            <div class="p-5 sm:p-6">

                <div class="grid grid-cols-1 gap-6 lg:grid-cols-[280px_1fr]">

                    <div>
                        @if ($report->photo)
                            <img
                                src="{{ asset('storage/' . $report->photo) }}"
                                alt="Foto {{ $report->item_name }}"
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
                            @if ($report->type === 'lost')
                                <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                    Laporan Kehilangan
                                </span>
                            @else
                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                    Laporan Penemuan
                                </span>
                            @endif

                            @if ($report->status === 'active')
                                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                    Aktif
                                </span>
                            @elseif ($report->status === 'claimed')
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
                            {{ $report->item_name }}
                        </h3>

                        <p class="mt-2 text-sm text-slate-500">
                            {{ $report->category }}
                        </p>

                        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Lokasi Kejadian
                                </p>
                                <p class="mt-1 text-sm font-medium text-slate-800">
                                    {{ $report->location }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Tanggal Kejadian
                                </p>
                                <p class="mt-1 text-sm font-medium text-slate-800">
                                    {{ $report->incident_date->format('d M Y') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Tanggal Dibuat
                                </p>
                                <p class="mt-1 text-sm font-medium text-slate-800">
                                    {{ $report->created_at->format('d M Y, H:i') }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Status Moderasi
                                </p>
                                <p class="mt-1 text-sm font-medium text-slate-800">
                                    {{ $report->moderation_status === 'hidden' ? 'Disembunyikan' : 'Terlihat' }}
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
                        {{ $report->description }}
                    </p>
                </div>

            </div>
        </section>

        {{-- Informasi Pelapor --}}
        <section class="temu-card p-5 sm:p-6">

            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Informasi Pelapor
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Informasi akun pengguna yang membuat laporan.
                </p>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Nama Pengguna
                    </p>
                    <p class="mt-2 font-semibold text-slate-800">
                        {{ $report->user->name ?? 'Pengguna tidak tersedia' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Email
                    </p>
                    <p class="mt-2 break-all font-medium text-slate-700">
                        {{ $report->user->email ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                        Waktu Pelaporan
                    </p>
                    <p class="mt-2 font-medium text-slate-700">
                        {{ $report->created_at->format('d M Y, H:i') }}
                    </p>
                </div>

            </div>
        </section>

        {{-- Moderasi --}}
        <section class="temu-card p-5 sm:p-6">

            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Moderasi Laporan
                </h2>
                <p class="mt-1 text-sm leading-relaxed text-slate-500">
                    Kelola visibilitas laporan apabila terdapat informasi yang tidak sesuai atau melanggar ketentuan.
                </p>
            </div>

            <div class="mt-5 flex flex-wrap items-center gap-3">
                <span class="text-sm font-medium text-slate-600">
                    Status saat ini:
                </span>

                @if ($report->moderation_status === 'hidden')
                    <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                        Disembunyikan
                    </span>
                @else
                    <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                        Terlihat
                    </span>
                @endif
            </div>

            @if ($report->moderation_status === 'hidden')

                <div class="mt-5 rounded-xl border border-slate-200 bg-slate-50 p-5">
                    <div class="space-y-4">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                Alasan Moderasi
                            </p>
                            <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-700">
                                {{ $report->moderation_reason ?? '-' }}
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Dimoderasi Oleh
                                </p>
                                <p class="mt-2 text-sm font-medium text-slate-800">
                                    {{ $report->moderator->name ?? 'Admin tidak tersedia' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Waktu Moderasi
                                </p>
                                <p class="mt-2 text-sm font-medium text-slate-800">
                                    {{ $report->moderated_at?->format('d M Y, H:i') ?? '-' }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

                <form
                    method="POST"
                    action="{{ route('admin.reports.unhide', $report->id) }}"
                    onsubmit="return confirm('Tampilkan kembali laporan ini?')"
                    class="mt-5">
                    @csrf

                    <button type="submit" class="temu-button">
                        Tampilkan Kembali Laporan
                    </button>
                </form>

            @else

                <form
                    method="POST"
                    action="{{ route('admin.reports.hide', $report->id) }}"
                    onsubmit="return confirm('Sembunyikan laporan ini?')"
                    class="mt-6">
                    @csrf

                    <div class="mb-4">
                        <label for="moderation_reason" class="temu-label">
                            Alasan Menyembunyikan Laporan
                        </label>

                        <textarea
                            id="moderation_reason"
                            name="moderation_reason"
                            rows="4"
                            required
                            minlength="5"
                            maxlength="1000"
                            class="temu-input"
                            placeholder="Tuliskan alasan moderasi laporan...">{{ old('moderation_reason') }}</textarea>

                        <p class="mt-2 text-xs text-slate-400">
                            Jelaskan alasan moderasi secara singkat dan jelas.
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-xl bg-red-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Sembunyikan Laporan
                    </button>
                </form>

            @endif
        </section>

        {{-- Riwayat Klaim --}}
        <section class="temu-card overflow-hidden">

            <div class="border-b border-slate-100 p-5 sm:p-6">
                <h2 class="text-lg font-bold text-slate-900">
                    Riwayat Pengajuan Klaim
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Daftar pengguna yang pernah mengajukan klaim terhadap laporan ini.
                </p>
                <p class="mt-3 text-xs font-medium text-slate-500">
                    {{ $report->claims->count() }} pengajuan klaim
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left text-sm">

                    <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                        <tr>
                            <th class="px-5 py-4 font-semibold">Pengaju Klaim</th>
                            <th class="px-5 py-4 font-semibold">Alasan</th>
                            <th class="px-5 py-4 font-semibold">Status</th>
                            <th class="px-5 py-4 font-semibold">Tanggal</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($report->claims as $claim)

                            <tr class="transition hover:bg-slate-50/70">

                                <td class="px-5 py-4">
                                    <p class="font-semibold text-slate-800">
                                        {{ $claim->claimant->name ?? '-' }}
                                    </p>
                                </td>

                                <td class="max-w-md whitespace-pre-line px-5 py-4 leading-6 text-slate-600">
                                    {{ $claim->reason }}
                                </td>

                                <td class="px-5 py-4">
                                    @if ($claim->status === 'pending')
                                        <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                            Menunggu
                                        </span>
                                    @elseif ($claim->status === 'approved')
                                        <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                            Disetujui
                                        </span>
                                    @else
                                        <span class="whitespace-nowrap rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-5 py-4 text-slate-500">
                                    {{ $claim->created_at->format('d M Y') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="4" class="px-5 py-12 text-center">
                                    <p class="font-medium text-slate-700">
                                        Belum ada pengajuan klaim.
                                    </p>
                                    <p class="mt-2 text-sm text-slate-400">
                                        Riwayat klaim untuk laporan ini akan ditampilkan di sini.
                                    </p>
                                </td>
                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

        </section>

    </div>
</div>
@endsection
