
@extends('layouts.app')

@section('title', 'Detail Klaim | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.claims.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#6258c9]">
            <span>&larr;</span>
            Kembali ke Manajemen Klaim
        </a>

        <div class="aurora-panel relative mt-6 overflow-hidden rounded-[28px] p-6 sm:p-9">
            <div class="pointer-events-none absolute -right-24 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/25 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-24 right-1/3 h-60 w-60 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#7b72e8]">
                        Administrasi / Detail Klaim
                    </p>
                    <h1 class="mt-3 text-3xl font-bold tracking-tight text-[#142b49] sm:text-4xl">
                        Detail Pengajuan Klaim
                    </h1>
                    <p class="mt-3 max-w-xl text-sm leading-7 text-slate-500">
                        Tinjau informasi barang, identitas kedua pihak, persetujuan kontak, dan proses serah terima.
                    </p>
                </div>

                <div class="rounded-2xl border border-[#8e85ff]/20 bg-white/70 px-5 py-4 shadow-sm backdrop-blur-xl">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400">
                        Nomor Pengajuan
                    </p>
                    <p class="mt-1 text-2xl font-bold text-[#6258c9]">
                        #{{ $claim->id }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- RINGKASAN STATUS --}}
    <section class="grid grid-cols-1 gap-4 sm:grid-cols-3">

        <div class="aurora-card rounded-2xl p-5 sm:p-6">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Status Klaim</p>
            <div class="mt-4">
                @if ($claim->status === 'pending')
                    <span class="rounded-full border border-amber-200 bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700">Menunggu</span>
                @elseif ($claim->status === 'approved')
                    <span class="rounded-full border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700">Disetujui</span>
                @else
                    <span class="rounded-full border border-rose-200 bg-rose-50 px-3 py-2 text-xs font-bold text-rose-700">Ditolak</span>
                @endif
            </div>
        </div>

        <div class="aurora-card rounded-2xl p-5 sm:p-6">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Persetujuan Kontak</p>
            <div class="mt-4">
                @if ($claim->contact_status === 'pending')
                    <span class="rounded-full bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700">Menunggu Persetujuan</span>
                @elseif ($claim->contact_status === 'approved')
                    <span class="rounded-full bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700">Disetujui</span>
                @elseif ($claim->contact_status === 'rejected')
                    <span class="rounded-full bg-rose-50 px-3 py-2 text-xs font-bold text-rose-700">Ditolak</span>
                @else
                    <span class="rounded-full bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600">Belum Ada Permintaan</span>
                @endif
            </div>
        </div>

        <div class="aurora-card rounded-2xl p-5 sm:p-6">
            <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Serah Terima</p>
            <div class="mt-4">
                @if ($claim->status === 'approved' && $claim->finder_confirmed_at && $claim->claimant_confirmed_at)
                    <span class="rounded-full bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700">Selesai</span>
                @elseif ($claim->status === 'approved')
                    <span class="rounded-full bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700">Dalam Proses</span>
                @else
                    <span class="rounded-full bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600">Belum Dimulai</span>
                @endif
            </div>
        </div>

    </section>

    {{-- INFORMASI BARANG --}}
    <section class="aurora-card overflow-hidden rounded-3xl">
        <div class="border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#8e85ff]/20 to-[#62e7d0]/30 text-sm font-bold text-[#6258c9]">01</div>
                <div>
                    <h2 class="font-bold text-[#142b49]">Informasi Barang</h2>
                    <p class="mt-1 text-xs text-slate-500">Data barang yang menjadi objek pengajuan klaim.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            @if ($claim->itemReport)
                <div class="grid grid-cols-1 gap-7 lg:grid-cols-[300px_1fr]">
                    <div>
                        @if ($claim->itemReport->photo)
                            <div class="group overflow-hidden rounded-2xl border border-white/60 bg-slate-100 shadow-sm">
                                <img
                                    src="{{ asset('storage/' . $claim->itemReport->photo) }}"
                                    alt="Foto {{ $claim->itemReport->item_name }}"
                                    class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"
                                >
                            </div>
                        @else
                            <div class="flex aspect-[4/3] items-center justify-center rounded-2xl border border-dashed border-slate-300 bg-slate-50 text-sm text-slate-400">
                                Tidak ada foto barang
                            </div>
                        @endif
                    </div>

                    <div>
                        <div class="flex flex-wrap gap-2">
                            @if ($claim->itemReport->type === 'lost')
                                <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">Kehilangan</span>
                            @else
                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">Penemuan</span>
                            @endif

                            @if ($claim->itemReport->status === 'active')
                                <span class="rounded-full bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-700">Aktif</span>
                            @elseif ($claim->itemReport->status === 'claimed')
                                <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">Sedang Diklaim</span>
                            @else
                                <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">Dikembalikan</span>
                            @endif
                        </div>

                        <h3 class="mt-4 text-2xl font-bold tracking-tight text-[#142b49]">
                            {{ $claim->itemReport->item_name }}
                        </h3>
                        <p class="mt-1 text-sm text-slate-500">{{ $claim->itemReport->category }}</p>

                        <div class="mt-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Lokasi Kejadian</p>
                                <p class="mt-2 text-sm font-semibold text-slate-700">{{ $claim->itemReport->location }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tanggal Kejadian</p>
                                <p class="mt-2 text-sm font-semibold text-slate-700">{{ $claim->itemReport->incident_date->format('d M Y') }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Status Barang</p>
                                <p class="mt-2 text-sm font-semibold text-slate-700">{{ ucfirst($claim->itemReport->status) }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Status Moderasi</p>
                                <p class="mt-2 text-sm font-semibold text-slate-700">
                                    {{ $claim->itemReport->moderation_status === 'hidden' ? 'Disembunyikan' : 'Terlihat' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-7 rounded-2xl bg-gradient-to-br from-[#8e85ff]/[0.07] to-[#62e7d0]/[0.10] p-5 sm:p-6">
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Deskripsi Barang</p>
                    <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">{{ $claim->itemReport->description }}</p>
                </div>
            @else
                <div class="rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                    Laporan barang yang terkait dengan klaim ini tidak tersedia.
                </div>
            @endif
        </div>
    </section>

    {{-- INFORMASI KEDUA PIHAK --}}
    <section class="space-y-4">
        <div class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#8e85ff]/20 to-[#62e7d0]/30 text-sm font-bold text-[#6258c9]">02</div>
            <div>
                <h2 class="font-bold text-[#142b49]">Informasi Kedua Pihak</h2>
                <p class="mt-1 text-xs text-slate-500">Identitas pengguna yang terlibat dalam pengajuan klaim.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">

            {{-- PENEMU --}}
            <div class="aurora-card rounded-3xl p-5 sm:p-6">
                <div class="border-b border-slate-100 pb-4">
                    <p class="text-[11px] font-bold uppercase tracking-widest text-[#6258c9]">Pihak Pertama</p>
                    <h3 class="mt-2 text-lg font-bold text-[#142b49]">Penemu Barang</h3>
                    <p class="mt-1 text-xs text-slate-500">Pengguna yang membuat laporan penemuan barang.</p>
                </div>

                <div class="mt-5 space-y-5">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Nama Penemu</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->user->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Email Penemu</p>
                        <p class="mt-2 break-all text-sm text-slate-700">{{ $claim->itemReport->user->email ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- PENGAJU --}}
            <div class="aurora-card rounded-3xl p-5 sm:p-6">
                <div class="border-b border-slate-100 pb-4">
                    <p class="text-[11px] font-bold uppercase tracking-widest text-[#6258c9]">Pihak Kedua</p>
                    <h3 class="mt-2 text-lg font-bold text-[#142b49]">Pengaju Klaim</h3>
                    <p class="mt-1 text-xs text-slate-500">Pengguna yang mengajukan klaim kepemilikan barang.</p>
                </div>

                <div class="mt-5 space-y-5">
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Nama Pengaju</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->claimant->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Email Pengaju</p>
                        <p class="mt-2 break-all text-sm text-slate-700">{{ $claim->claimant->email ?? '-' }}</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- INFORMASI PENGAJUAN --}}
    <section class="aurora-card overflow-hidden rounded-3xl">
        <div class="border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#8e85ff]/20 to-[#62e7d0]/30 text-sm font-bold text-[#6258c9]">03</div>
                <div>
                    <h2 class="font-bold text-[#142b49]">Informasi Pengajuan Klaim</h2>
                    <p class="mt-1 text-xs text-slate-500">Waktu pengajuan, respons, dan alasan klaim.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Tanggal Pengajuan</p>
                    <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->created_at->format('d M Y, H:i') }}</p>
                </div>

                <div>
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Status Klaim</p>
                    <div class="mt-2">
                        @if ($claim->status === 'pending')
                            <span class="rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">Menunggu</span>
                        @elseif ($claim->status === 'approved')
                            <span class="rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">Disetujui</span>
                        @else
                            <span class="rounded-full bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700">Ditolak</span>
                        @endif
                    </div>
                </div>

                @if ($claim->responded_at)
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Waktu Respons Klaim</p>
                        <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->responded_at->format('d M Y, H:i') }}</p>
                    </div>
                @endif
            </div>

            <div class="mt-6 rounded-2xl bg-slate-50/80 p-5 sm:p-6">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Alasan Klaim</p>
                <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">{{ $claim->reason }}</p>
            </div>
        </div>
    </section>

    {{-- PERSETUJUAN KONTAK --}}
    <section class="aurora-card overflow-hidden rounded-3xl">
        <div class="border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#8e85ff]/20 to-[#62e7d0]/30 text-sm font-bold text-[#6258c9]">04</div>
                <div>
                    <h2 class="font-bold text-[#142b49]">Persetujuan Kontak</h2>
                    <p class="mt-1 text-xs text-slate-500">Status permintaan komunikasi antara penemu dan pengaju klaim.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            @if ($claim->contact_status === 'pending')
                <span class="rounded-full bg-amber-50 px-3 py-2 text-xs font-bold text-amber-700">Menunggu Persetujuan</span>
            @elseif ($claim->contact_status === 'approved')
                <span class="rounded-full bg-emerald-50 px-3 py-2 text-xs font-bold text-emerald-700">Kontak Disetujui</span>
            @elseif ($claim->contact_status === 'rejected')
                <span class="rounded-full bg-rose-50 px-3 py-2 text-xs font-bold text-rose-700">Kontak Ditolak</span>
            @else
                <span class="rounded-full bg-slate-100 px-3 py-2 text-xs font-bold text-slate-600">Belum Ada Permintaan Kontak</span>
            @endif

            @if ($claim->contact_responded_at)
                <div class="mt-5 border-t border-slate-100 pt-4">
                    <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Waktu Respons Kontak</p>
                    <p class="mt-2 text-sm font-semibold text-slate-700">{{ $claim->contact_responded_at->format('d M Y, H:i') }}</p>
                </div>
            @endif
        </div>
    </section>

    {{-- KONFIRMASI SERAH TERIMA --}}
    <section class="aurora-card overflow-hidden rounded-3xl">
        <div class="border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#8e85ff]/20 to-[#62e7d0]/30 text-sm font-bold text-[#6258c9]">05</div>
                <div>
                    <h2 class="font-bold text-[#142b49]">Konfirmasi Serah Terima</h2>
                    <p class="mt-1 text-xs text-slate-500">Progres konfirmasi pengembalian barang oleh kedua pihak.</p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                <div class="rounded-2xl border border-[#8e85ff]/15 bg-gradient-to-br from-[#8e85ff]/[0.05] to-white p-5">
                    <p class="text-sm font-bold text-[#142b49]">Konfirmasi Penemu</p>

                    @if ($claim->finder_confirmed_at)
                        <span class="mt-3 inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">Sudah Dikonfirmasi</span>
                        <p class="mt-3 text-xs text-slate-500">{{ $claim->finder_confirmed_at->format('d M Y, H:i') }}</p>
                    @else
                        <span class="mt-3 inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">Belum Dikonfirmasi</span>
                    @endif
                </div>

                <div class="rounded-2xl border border-[#62e7d0]/20 bg-gradient-to-br from-[#62e7d0]/[0.06] to-white p-5">
                    <p class="text-sm font-bold text-[#142b49]">Konfirmasi Pengaju Klaim</p>

                    @if ($claim->claimant_confirmed_at)
                        <span class="mt-3 inline-flex rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">Sudah Dikonfirmasi</span>
                        <p class="mt-3 text-xs text-slate-500">{{ $claim->claimant_confirmed_at->format('d M Y, H:i') }}</p>
                    @else
                        <span class="mt-3 inline-flex rounded-full bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">Belum Dikonfirmasi</span>
                    @endif
                </div>

            </div>

            @if ($claim->status === 'approved' && $claim->finder_confirmed_at && $claim->claimant_confirmed_at)
                <div class="mt-5 rounded-2xl border border-emerald-200 bg-gradient-to-br from-emerald-50 to-[#62e7d0]/[0.08] p-5">
                    <p class="font-bold text-emerald-800">Serah terima telah dikonfirmasi oleh kedua pihak.</p>
                    <p class="mt-2 text-sm text-emerald-700">
                        Status barang: {{ ucfirst($claim->itemReport->status ?? '-') }}
                    </p>
                </div>
            @elseif ($claim->status === 'approved')
                <div class="mt-5 rounded-2xl border border-amber-200 bg-gradient-to-br from-amber-50 to-[#e8c17b]/[0.08] p-5">
                    <p class="font-bold text-amber-800">Serah terima belum selesai.</p>
                    <p class="mt-2 text-sm leading-6 text-amber-700">
                        Proses masih menunggu konfirmasi dari pihak yang belum menyelesaikan konfirmasi pengembalian barang.
                    </p>
                </div>
            @else
                <div class="mt-5 rounded-2xl border border-slate-200 bg-slate-50 p-5">
                    <p class="text-sm leading-6 text-slate-600">
                        Konfirmasi serah terima hanya dapat dilakukan setelah pengajuan klaim disetujui.
                    </p>
                </div>
            @endif
        </div>
    </section>

    {{-- FOOTER ACTION --}}
    <div class="border-t border-slate-200/70 pt-5">
        <a href="{{ route('admin.claims.index') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#6258c9] to-[#8e85ff] px-5 py-3 text-sm font-bold text-white shadow-md shadow-[#8e85ff]/20 transition hover:-translate-y-0.5 hover:shadow-lg">
            <span>&larr;</span>
            Kembali ke Manajemen Klaim
        </a>
    </div>

</div>
@endsection
