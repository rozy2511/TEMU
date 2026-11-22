
@extends('layouts.app')

@section('title', 'Klaim Saya | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    {{-- HEADER --}}
    <section class="relative mb-9 overflow-hidden rounded-3xl bg-[#172f4f] px-6 py-8 text-white shadow-xl shadow-slate-900/10 sm:px-9 sm:py-10">
        <div class="absolute -right-16 -top-24 h-72 w-72 rounded-full border border-white/10"></div>
        <div class="absolute -right-5 -top-12 h-52 w-52 rounded-full border border-white/10"></div>
        <div class="absolute -bottom-24 right-28 h-48 w-48 rounded-full bg-[#d5a34a]/10 blur-2xl"></div>

        <div class="relative">
            <a href="{{ route('user.dashboard') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-slate-300 transition hover:text-white">
                <span aria-hidden="true">&larr;</span>
                Kembali ke Beranda
            </a>

            <div class="mt-8 max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5">
                    <span class="h-1.5 w-1.5 rounded-full bg-[#e8c17b]"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#f0d7a7]">
                        Riwayat Pengajuan
                    </span>
                </div>

                <h1 class="mt-4 text-3xl font-bold tracking-tight sm:text-4xl">
                    Klaim Saya
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                    Pantau perkembangan pengajuan kepemilikan barang dan lanjutkan proses pengembalian setelah klaim disetujui.
                </p>
            </div>

            <div class="mt-7 flex flex-wrap items-center gap-3 text-xs text-slate-300">
                <span class="inline-flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-amber-400"></span>
                    Menunggu konfirmasi
                </span>
                <span class="text-white/30">|</span>
                <span class="inline-flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Disetujui
                </span>
                <span class="text-white/30">|</span>
                <span class="inline-flex items-center gap-2">
                    <span class="h-2 w-2 rounded-full bg-red-400"></span>
                    Ditolak
                </span>
            </div>
        </div>
    </section>

    {{-- NOTIFICATION --}}
    @if (session('success'))
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    @if (session('error'))
        <div class="mb-6 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{-- CLAIM LIST --}}
    <div class="space-y-6">
        @forelse ($claims as $claim)

            @php
                $statusConfig = [
                    'pending' => [
                        'label' => 'Menunggu Konfirmasi',
                        'dot' => 'bg-amber-500',
                        'badge' => 'border-amber-200 bg-amber-50 text-amber-800',
                        'panel' => 'border-amber-200 bg-amber-50',
                        'heading' => 'text-amber-900',
                        'description' => 'text-amber-800',
                        'title' => 'Menunggu Konfirmasi Penemu',
                        'message' => 'Pengajuan kamu sedang diperiksa oleh penemu barang. Tunggu keputusan melalui halaman ini.',
                    ],
                    'approved' => [
                        'label' => 'Disetujui',
                        'dot' => 'bg-emerald-500',
                        'badge' => 'border-emerald-200 bg-emerald-50 text-emerald-800',
                        'panel' => 'border-emerald-200 bg-emerald-50',
                        'heading' => 'text-emerald-900',
                        'description' => 'text-emerald-800',
                        'title' => 'Pengajuan Klaim Disetujui',
                        'message' => 'Penemu telah menyetujui klaim kamu. Lanjutkan proses komunikasi dan konfirmasi pengembalian melalui halaman serah terima.',
                    ],
                    'rejected' => [
                        'label' => 'Ditolak',
                        'dot' => 'bg-red-500',
                        'badge' => 'border-red-200 bg-red-50 text-red-800',
                        'panel' => 'border-red-200 bg-red-50',
                        'heading' => 'text-red-900',
                        'description' => 'text-red-800',
                        'title' => 'Pengajuan Ditolak',
                        'message' => 'Pengajuan klaim ini telah ditolak oleh penemu barang.',
                    ],
                ];

                $status = $statusConfig[$claim->status] ?? $statusConfig['pending'];
            @endphp

            <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:shadow-lg hover:shadow-slate-900/5">

                {{-- CARD HEADER --}}
                <div class="flex flex-col gap-4 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
                    <div class="flex items-start gap-3">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#172f4f]/5 text-[#172f4f]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                      d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.17em] text-slate-400">
                                Barang yang Diklaim
                            </p>
                            <h2 class="mt-1 text-lg font-bold tracking-tight text-[#172f4f] sm:text-xl">
                                {{ $claim->itemReport->item_name }}
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Penemu: {{ $claim->itemReport->user->name }}
                            </p>
                        </div>
                    </div>

                    <span class="inline-flex w-fit items-center gap-2 rounded-full border px-3.5 py-2 text-xs font-bold {{ $status['badge'] }}">
                        <span class="h-1.5 w-1.5 rounded-full {{ $status['dot'] }}"></span>
                        {{ $status['label'] }}
                    </span>
                </div>

                <div class="p-5 sm:p-7">

                    {{-- ITEM PHOTO --}}
                    @if ($claim->itemReport->photo)
                        <div class="relative mb-7 overflow-hidden rounded-2xl border border-slate-200 bg-slate-100">
                            <img
                                src="{{ asset('storage/' . $claim->itemReport->photo) }}"
                                alt="Foto {{ $claim->itemReport->item_name }}"
                                class="h-56 w-full object-cover sm:h-72"
                            >
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/45 to-transparent px-5 pb-4 pt-12">
                                <p class="text-xs font-medium text-white/80">Foto barang</p>
                                <p class="mt-1 text-sm font-bold text-white">
                                    {{ $claim->itemReport->item_name }}
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- ITEM INFORMATION --}}
                    <div>
                        <div class="mb-4 flex items-center gap-3">
                            <h3 class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">
                                Informasi Barang
                            </h3>
                            <div class="h-px flex-1 bg-slate-100"></div>
                        </div>

                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl bg-[#f7f8fa] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Kategori</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->category }}</p>
                            </div>

                            <div class="rounded-2xl bg-[#f7f8fa] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Lokasi</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->location }}</p>
                            </div>

                            <div class="rounded-2xl bg-[#f7f8fa] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tanggal Kejadian</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->incident_date->format('d M Y') }}</p>
                            </div>

                            <div class="rounded-2xl bg-[#f7f8fa] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tanggal Pengajuan</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- CLAIM REASON --}}
                    <div class="mt-7">
                        <div class="mb-3 flex items-center gap-3">
                            <h3 class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">
                                Alasan dan Bukti Kepemilikan
                            </h3>
                            <div class="h-px flex-1 bg-slate-100"></div>
                        </div>

                        <div class="rounded-2xl border border-slate-200 bg-white p-4 sm:p-5">
                            <p class="whitespace-pre-line text-sm leading-7 text-slate-600">{{ $claim->reason }}</p>
                        </div>
                    </div>

                    {{-- RESPONSE DATE --}}
                    @if ($claim->responded_at)
                        <div class="mt-4 flex items-center gap-2 text-xs text-slate-400">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Diproses pada: {{ $claim->responded_at->format('d M Y, H:i') }}
                        </div>
                    @endif

                    {{-- STATUS MESSAGE --}}
                    <div class="mt-7 rounded-2xl border p-5 {{ $status['panel'] }}">
                        <div class="flex items-start gap-3">
                            <div class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-white/70">
                                @if ($claim->status === 'approved')
                                    <svg class="h-4 w-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @elseif ($claim->status === 'pending')
                                    <svg class="h-4 w-4 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                @else
                                    <svg class="h-4 w-4 text-red-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                @endif
                            </div>

                            <div>
                                <h3 class="text-sm font-bold {{ $status['heading'] }}">
                                    {{ $status['title'] }}
                                </h3>
                                <p class="mt-1.5 text-sm leading-6 {{ $status['description'] }}">
                                    {{ $status['message'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- HANDOFF ACTION --}}
                    @if ($claim->status === 'approved')
                        <div class="mt-5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                            <p class="text-xs leading-relaxed text-slate-500">
                                Lanjutkan ke tahap komunikasi dan konfirmasi serah terima barang.
                            </p>

                            <a href="{{ route('user.reports.claims.handoff', [$claim->item_report_id, $claim->id]) }}"
                               class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white shadow-md shadow-[#172f4f]/15 transition hover:bg-[#213f63] focus:outline-none focus:ring-2 focus:ring-[#172f4f] focus:ring-offset-2">
                                Buka Proses Serah Terima
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                                </svg>
                            </a>
                        </div>
                    @endif

                </div>
            </article>

        @empty

            {{-- EMPTY STATE --}}
            <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white px-6 py-14 text-center shadow-sm sm:py-20">
                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#172f4f]/5 text-[#172f4f]">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>
                </div>

                <p class="mt-6 text-[10px] font-bold uppercase tracking-[0.2em] text-[#b58a42]">
                    Riwayat Klaim
                </p>

                <h2 class="mt-2 text-xl font-bold tracking-tight text-[#172f4f] sm:text-2xl">
                    Belum Ada Pengajuan Klaim
                </h2>

                <p class="mx-auto mt-3 max-w-md text-sm leading-7 text-slate-500">
                    Kamu belum mengajukan klaim kepemilikan barang. Ketika menemukan laporan yang berpotensi cocok, kamu dapat mengajukan klaim melalui halaman Smart Matching.
                </p>

                <a href="{{ route('user.dashboard') }}"
                   class="mt-7 inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-6 py-3 text-sm font-semibold text-white shadow-md shadow-[#172f4f]/15 transition hover:bg-[#213f63]">
                    Cari Barang
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                    </svg>
                </a>
            </div>

        @endforelse
    </div>

    {{-- PAGINATION --}}
    @if ($claims->hasPages())
        <div class="mt-8">
            {{ $claims->links() }}
        </div>
    @endif

</div>
@endsection
