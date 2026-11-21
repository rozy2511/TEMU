
@extends('layouts.app')

@section('title', 'Detail Pengguna | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('admin.users.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Daftar Pengguna
        </a>

        <p class="mt-6 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Administrasi / Detail Pengguna
        </p>

        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
            Detail Pengguna
        </h1>

        <p class="mt-3 text-sm text-slate-500 sm:text-base">
            Informasi akun dan aktivitas pengguna di platform TEMU.
        </p>
    </div>

    {{-- Informasi Akun --}}
    <section class="temu-card mb-6 p-5 sm:p-6">

        <div class="flex flex-col gap-4 border-b border-slate-100 pb-5 sm:flex-row sm:items-center">

            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-xl font-bold text-slate-700">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <div>
                <h2 class="text-xl font-bold text-slate-900">
                    {{ $user->name }}
                </h2>
                <p class="mt-1 break-all text-sm text-slate-500">
                    {{ $user->email }}
                </p>
            </div>

            <div class="sm:ml-auto">
                <span class="inline-flex rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                    {{ ucfirst($user->role) }}
                </span>
            </div>

        </div>

        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">

            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Nama Pengguna
                </p>
                <p class="mt-2 font-semibold text-slate-800">
                    {{ $user->name }}
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Alamat Email
                </p>
                <p class="mt-2 break-all font-medium text-slate-700">
                    {{ $user->email }}
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Role Akun
                </p>
                <p class="mt-2 font-medium text-slate-700">
                    {{ ucfirst($user->role) }}
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                    Tanggal Bergabung
                </p>
                <p class="mt-2 font-medium text-slate-700">
                    {{ $user->created_at->format('d M Y, H:i') }}
                </p>
            </div>

        </div>
    </section>

    {{-- Statistik Aktivitas --}}
    <section class="mb-6">

        <div class="mb-4">
            <h2 class="text-lg font-bold text-slate-900">
                Ringkasan Aktivitas
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Statistik laporan yang dibuat oleh pengguna.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">

            <div class="temu-card p-5 sm:p-6">
                <p class="text-sm font-medium text-slate-500">
                    Total Laporan
                </p>
                <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                    {{ $user->itemReports->count() }}
                </p>
                <p class="mt-2 text-xs text-slate-400">
                    Seluruh laporan barang
                </p>
            </div>

            <div class="temu-card p-5 sm:p-6">
                <p class="text-sm font-medium text-slate-500">
                    Laporan Kehilangan
                </p>
                <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                    {{ $user->itemReports->where('type', 'lost')->count() }}
                </p>
                <p class="mt-2 text-xs text-slate-400">
                    Barang yang dilaporkan hilang
                </p>
            </div>

            <div class="temu-card p-5 sm:p-6">
                <p class="text-sm font-medium text-slate-500">
                    Laporan Penemuan
                </p>
                <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">
                    {{ $user->itemReports->where('type', 'found')->count() }}
                </p>
                <p class="mt-2 text-xs text-slate-400">
                    Barang yang dilaporkan ditemukan
                </p>
            </div>

        </div>
    </section>

    {{-- Riwayat Laporan --}}
    <section class="temu-card overflow-hidden">

        <div class="border-b border-slate-100 p-5 sm:p-6">
            <h2 class="text-lg font-bold text-slate-900">
                Riwayat Laporan Barang
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Seluruh laporan kehilangan dan penemuan yang dibuat pengguna.
            </p>
            <p class="mt-3 text-xs font-medium text-slate-500">
                {{ $user->itemReports->count() }} laporan tercatat
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">No.</th>
                        <th class="px-5 py-4 font-semibold">Nama Barang</th>
                        <th class="px-5 py-4 font-semibold">Jenis</th>
                        <th class="px-5 py-4 font-semibold">Lokasi</th>
                        <th class="px-5 py-4 font-semibold">Status Barang</th>
                        <th class="px-5 py-4 font-semibold">Tanggal</th>
                        <th class="px-5 py-4 font-semibold">Jumlah Klaim</th>
                        <th class="px-5 py-4 font-semibold">Moderasi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($user->itemReports as $report)

                        <tr class="transition hover:bg-slate-50/70">

                            <td class="px-5 py-4 text-slate-500">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-800">
                                    {{ $report->item_name }}
                                </p>
                                <p class="mt-1 text-xs text-slate-500">
                                    {{ $report->category }}
                                </p>
                            </td>

                            <td class="px-5 py-4">
                                @if ($report->type === 'lost')
                                    <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        Kehilangan
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        Penemuan
                                    </span>
                                @endif
                            </td>

                            <td class="max-w-[180px] px-5 py-4 text-slate-600">
                                <p class="line-clamp-2">
                                    {{ $report->location }}
                                </p>
                            </td>

                            <td class="px-5 py-4">
                                @if ($report->status === 'active')
                                    <span class="whitespace-nowrap rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">
                                        Aktif
                                    </span>
                                @elseif ($report->status === 'claimed')
                                    <span class="whitespace-nowrap rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                                        Sedang Diklaim
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-slate-500">
                                {{ $report->created_at->format('d M Y') }}
                            </td>

                            <td class="px-5 py-4 text-center font-medium text-slate-700">
                                {{ $report->claims->count() }}
                            </td>

                            <td class="px-5 py-4">
                                @if ($report->moderation_status === 'hidden')
                                    <span class="whitespace-nowrap rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                                        Disembunyikan
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                                        Terlihat
                                    </span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="px-5 py-14 text-center">
                                <p class="font-semibold text-slate-800">
                                    Belum ada laporan barang.
                                </p>
                                <p class="mt-2 text-sm text-slate-500">
                                    Pengguna ini belum pernah membuat laporan kehilangan atau penemuan.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

    </section>

</div>
@endsection
