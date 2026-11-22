
@extends('layouts.app')

@section('title', 'Detail Klaim | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.claims.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-[#b58a43]">
            <span class="text-lg">&larr;</span>
            Kembali ke Manajemen Klaim
        </a>

        <div class="relative mt-6 overflow-hidden rounded-3xl bg-[#172f4f] p-6 text-white shadow-xl sm:p-8">
            <div class="absolute -right-16 -top-24 h-64 w-64 rounded-full border border-white/10"></div>
            <div class="absolute -right-5 -top-12 h-44 w-44 rounded-full border border-[#d5a34a]/20"></div>

            <div class="relative flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#e8c17b]">
                        Administrasi / Detail Klaim
                    </p>
                    <h1 class="mt-3 text-2xl font-bold tracking-tight sm:text-4xl">
                        Detail Pengajuan Klaim
                    </h1>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-300">
                        Tinjau informasi barang, identitas kedua pihak, persetujuan kontak, dan proses serah terima.
                    </p>
                </div>

                <div class="w-fit rounded-xl border border-white/15 bg-white/10 px-4 py-3 backdrop-blur-sm">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-300">
                        Nomor Pengajuan
                    </p>
                    <p class="mt-1 text-xl font-bold text-[#e8c17b]">
                        #{{ $claim->id }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- RINGKASAN STATUS --}}
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Status Klaim</p>
            <div class="mt-3">
                @if ($claim->status === 'pending')
                    <span class="inline-flex items-center gap-2 rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                        Menunggu
                    </span>
                @elseif ($claim->status === 'approved')
                    <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                        Disetujui
                    </span>
                @else
                    <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">
                        <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                        Ditolak
                    </span>
                @endif
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Persetujuan Kontak</p>
            <div class="mt-3">
                @if ($claim->contact_status === 'pending')
                    <span class="inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Menunggu Persetujuan</span>
                @elseif ($claim->contact_status === 'approved')
                    <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Disetujui</span>
                @elseif ($claim->contact_status === 'rejected')
                    <span class="inline-flex rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">Ditolak</span>
                @else
                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">Belum Ada Permintaan</span>
                @endif
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Serah Terima</p>
            <div class="mt-3">
                @if ($claim->status === 'approved' && $claim->finder_confirmed_at && $claim->claimant_confirmed_at)
                    <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Selesai</span>
                @elseif ($claim->status === 'approved')
                    <span class="inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Dalam Proses</span>
                @else
                    <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">Belum Dimulai</span>
                @endif
            </div>
        </div>
    </section>

    {{-- INFORMASI BARANG --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f] text-sm font-bold text-[#e8c17b]">01</div>
                <div>
                    <h2 class="font-bold text-slate-900">Informasi Barang</h2>
                    <p class="mt-1 text-xs text-slate-500">Data barang yang menjadi objek pengajuan klaim.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            @if ($claim->itemReport)
                <div class="grid grid-cols-1 gap-7 lg:grid-cols-[300px_1fr]">
                    <div>
                        @if ($claim->itemReport->photo)
                            <img
                                src="{{ asset('storage/' . $claim->itemReport->photo) }}"
                                alt="Foto {{ $claim->itemReport->item_name }}"
                                class="aspect-[4/3] w-full rounded-2xl border border-slate-200 bg-slate-100 object-cover"
                            >
                        @else
                            <div class="flex aspect-[4/3] items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-slate-50 text-sm text-slate-400">
                                Tidak ada foto barang
                            </div>
                        @endif
                    </div>

                    <div>
                        <div class="flex flex-wrap gap-2">
                            @if ($claim->itemReport->type === 'lost')
                                <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Kehilangan</span>
                            @else
                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Penemuan</span>
                            @endif

                            @if ($claim->itemReport->status === 'active')
                                <span class="rounded-full bg-blue-50 px-3 py-1.5 text-xs font-semibold text-blue-700">Aktif</span>
                            @elseif ($claim->itemReport->status === 'claimed')
                                <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Sedang Diklaim</span>
                            @else
                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Dikembalikan</span>
                            @endif
                        </div>

                        <h3 class="mt-4 text-2xl font-bold tracking-tight text-[#172f4f]">
                            {{ $claim->itemReport->item_name }}
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $claim->itemReport->category }}</p>

                        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Lokasi Kejadian</p>
                                <p class="mt-2 text-sm font-medium text-slate-800">{{ $claim->itemReport->location }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Tanggal Kejadian</p>
                                <p class="mt-2 text-sm font-medium text-slate-800">{{ $claim->itemReport->incident_date->format('d M Y') }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Status Barang</p>
                                <p class="mt-2 text-sm font-medium text-slate-800">{{ ucfirst($claim->itemReport->status) }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Status Moderasi</p>
                                <p class="mt-2 text-sm font-medium text-slate-800">
                                    {{ $claim->itemReport->moderation_status === 'hidden' ? 'Disembunyikan' : 'Terlihat' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-7 border-t border-slate-100 pt-6">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Deskripsi Barang</p>
                    <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">{{ $claim->itemReport->description }}</p>
                </div>
            @else
                <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                    Laporan barang yang terkait dengan klaim ini tidak tersedia.
                </div>
            @endif
        </div>
    </section>

    {{-- INFORMASI KEDUA PIHAK --}}
    <section class="space-y-4">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f] text-sm font-bold text-[#e8c17b]">02</div>
            <div>
                <h2 class="font-bold text-slate-900">Informasi Kedua Pihak</h2>
                <p class="mt-1 text-xs text-slate-500">Identitas pengguna yang terlibat dalam pengajuan klaim.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="border-b border-slate-100 pb-4">
                    <p class="text-[11px] font-semibold uppercase tracking-widest text-[#b58a43]">Pihak Pertama</p>
                    <h3 class="mt-2 text-lg font-bold text-[#172f4f]">Penemu Barang</h3>
                    <p class="mt-1 text-xs text-slate-500">Pengguna yang membuat laporan penemuan barang.</p>
                </div>

                <div class="mt-5 space-y-5">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Nama Penemu</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->user->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Email Penemu</p>
                        <p class="mt-2 break-all text-sm text-slate-700">{{ $claim->itemReport->user->email ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="border-b border-slate-100 pb-4">
                    <p class="text-[11px] font-semibold uppercase tracking-widest text-[#b58a43]">Pihak Kedua</p>
                    <h3 class="mt-2 text-lg font-bold text-[#172f4f]">Pengaju Klaim</h3>
                    <p class="mt-1 text-xs text-slate-500">Pengguna yang mengajukan klaim kepemilikan barang.</p>
                </div>

                <div class="mt-5 space-y-5">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Nama Pengaju</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->claimant->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Email Pengaju</p>
                        <p class="mt-2 break-all text-sm text-slate-700">{{ $claim->claimant->email ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- INFORMASI PENGAJUAN --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f] text-sm font-bold text-[#e8c17b]">03</div>
                <div>
                    <h2 class="font-bold text-slate-900">Informasi Pengajuan Klaim</h2>
                    <p class="mt-1 text-xs text-slate-500">Waktu pengajuan, respons, dan alasan klaim.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Tanggal Pengajuan</p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->created_at->format('d M Y, H:i') }}</p>
                </div>

                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Status Klaim</p>
                    <div class="mt-2">
                        @if ($claim->status === 'pending')
                            <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Menunggu</span>
                        @elseif ($claim->status === 'approved')
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Disetujui</span>
                        @else
                            <span class="rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">Ditolak</span>
                        @endif
                    </div>
                </div>

                @if ($claim->responded_at)
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Waktu Respons Klaim</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->responded_at->format('d M Y, H:i') }}</p>
                    </div>
                @endif
            </div>

            <div class="mt-6 rounded-xl bg-slate-50 p-5">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Alasan Klaim</p>
                <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">{{ $claim->reason }}</p>
            </div>
        </div>
    </section>

    {{-- PERSETUJUAN KONTAK --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f] text-sm font-bold text-[#e8c17b]">04</div>
                <div>
                    <h2 class="font-bold text-slate-900">Persetujuan Kontak</h2>
                    <p class="mt-1 text-xs text-slate-500">Status permintaan komunikasi antara penemu dan pengaju klaim.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            @if ($claim->contact_status === 'pending')
                <span class="inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Menunggu Persetujuan</span>
            @elseif ($claim->contact_status === 'approved')
                <span class="inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Kontak Disetujui</span>
            @elseif ($claim->contact_status === 'rejected')
                <span class="inline-flex rounded-full bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-700">Kontak Ditolak</span>
            @else
                <span class="inline-flex rounded-full bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">Belum Ada Permintaan Kontak</span>
            @endif

            @if ($claim->contact_responded_at)
                <div class="mt-5 border-t border-slate-100 pt-4">
                    <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-400">Waktu Respons Kontak</p>
                    <p class="mt-2 text-sm font-medium text-slate-700">{{ $claim->contact_responded_at->format('d M Y, H:i') }}</p>
                </div>
            @endif
        </div>
    </section>

    {{-- KONFIRMASI SERAH TERIMA --}}
    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f] text-sm font-bold text-[#e8c17b]">05</div>
                <div>
                    <h2 class="font-bold text-slate-900">Konfirmasi Serah Terima</h2>
                    <p class="mt-1 text-xs text-slate-500">Progres konfirmasi pengembalian barang oleh kedua pihak.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="rounded-xl border border-slate-200 p-5">
                    <p class="text-sm font-semibold text-slate-800">Konfirmasi Penemu</p>

                    @if ($claim->finder_confirmed_at)
                        <span class="mt-3 inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Sudah Dikonfirmasi</span>
                        <p class="mt-3 text-xs text-slate-500">{{ $claim->finder_confirmed_at->format('d M Y, H:i') }}</p>
                    @else
                        <span class="mt-3 inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Belum Dikonfirmasi</span>
                    @endif
                </div>

                <div class="rounded-xl border border-slate-200 p-5">
                    <p class="text-sm font-semibold text-slate-800">Konfirmasi Pengaju Klaim</p>

                    @if ($claim->claimant_confirmed_at)
                        <span class="mt-3 inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-semibold text-emerald-700">Sudah Dikonfirmasi</span>
                        <p class="mt-3 text-xs text-slate-500">{{ $claim->claimant_confirmed_at->format('d M Y, H:i') }}</p>
                    @else
                        <span class="mt-3 inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-semibold text-amber-700">Belum Dikonfirmasi</span>
                    @endif
                </div>
            </div>

            @if ($claim->status === 'approved' && $claim->finder_confirmed_at && $claim->claimant_confirmed_at)
                <div class="mt-5 rounded-xl border border-emerald-200 bg-emerald-50 p-5">
                    <p class="font-semibold text-emerald-800">Serah terima telah dikonfirmasi oleh kedua pihak.</p>
                    <p class="mt-2 text-sm text-emerald-700">
                        Status barang: {{ ucfirst($claim->itemReport->status ?? '-') }}
                    </p>
                </div>
            @elseif ($claim->status === 'approved')
                <div class="mt-5 rounded-xl border border-amber-200 bg-amber-50 p-5">
                    <p class="font-semibold text-amber-800">Serah terima belum selesai.</p>
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
        </div>
    </section>

    <div class="flex justify-start border-t border-slate-200 pt-5">
        <a href="{{ route('admin.claims.index') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#244565]">
            <span>&larr;</span>
            Kembali ke Manajemen Klaim
        </a>
    </div>

</div>
@endsection
