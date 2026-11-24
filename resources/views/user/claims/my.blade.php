
@extends('layouts.app')

@section('title', 'Klaim Saya | TEMU')

@section('content')
<div class="temu-container space-y-8 py-8 sm:py-10">

    {{-- HEADER --}}
    <section class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] px-6 py-8 text-white shadow-xl sm:px-9 sm:py-10">
        <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
        <div class="pointer-events-none absolute right-1/4 top-10 h-40 w-40 rounded-full bg-[#f4b6d2]/15 blur-3xl"></div>

        <div class="relative">
            <a href="{{ route('user.dashboard') }}"
               class="inline-flex items-center gap-2 text-sm font-medium text-white/65 transition hover:text-white">
                <span aria-hidden="true">&larr;</span>
                Kembali ke Beranda
            </a>

            <div class="mt-8 max-w-2xl">
                <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 backdrop-blur-md">
                    <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                    <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#a9f4e8]">
                        Riwayat Pengajuan
                    </span>
                </div>

                <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Klaim Saya
                </h1>

                <p class="mt-3 max-w-xl text-sm leading-7 text-white/70 sm:text-base">
                    Pantau perkembangan pengajuan kepemilikan barang dan lanjutkan proses pengembalian setelah klaim disetujui.
                </p>
            </div>

            <div class="mt-7 flex flex-wrap gap-3">
                <span class="inline-flex items-center gap-2 rounded-full border border-amber-300/20 bg-amber-300/10 px-3 py-2 text-xs font-semibold text-amber-100">
                    <span class="h-2 w-2 rounded-full bg-amber-300"></span>
                    Menunggu konfirmasi
                </span>
                <span class="inline-flex items-center gap-2 rounded-full border border-emerald-300/20 bg-emerald-300/10 px-3 py-2 text-xs font-semibold text-emerald-100">
                    <span class="h-2 w-2 rounded-full bg-emerald-300"></span>
                    Disetujui
                </span>
                <span class="inline-flex items-center gap-2 rounded-full border border-rose-300/20 bg-rose-300/10 px-3 py-2 text-xs font-semibold text-rose-100">
                    <span class="h-2 w-2 rounded-full bg-rose-300"></span>
                    Ditolak
                </span>
            </div>
        </div>
    </section>

    {{-- NOTIFICATION --}}
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
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{-- CLAIM LIST --}}
    <div class="space-y-7">
        @forelse ($claims as $claim)

            @php
                $statusConfig = [
                    'pending' => [
                        'label' => 'Menunggu Konfirmasi',
                        'dot' => 'bg-amber-500',
                        'badge' => 'border-amber-200 bg-amber-50 text-amber-800',
                        'panel' => 'border-amber-200 bg-gradient-to-br from-amber-50 to-[#fff9ed]',
                        'heading' => 'text-amber-900',
                        'description' => 'text-amber-800',
                        'title' => 'Menunggu Konfirmasi Penemu',
                        'message' => 'Pengajuan kamu sedang diperiksa oleh penemu barang. Tunggu keputusan melalui halaman ini.',
                    ],
                    'approved' => [
                        'label' => 'Disetujui',
                        'dot' => 'bg-emerald-500',
                        'badge' => 'border-emerald-200 bg-emerald-50 text-emerald-800',
                        'panel' => 'border-emerald-200 bg-gradient-to-br from-emerald-50 to-[#e4faf5]',
                        'heading' => 'text-emerald-900',
                        'description' => 'text-emerald-800',
                        'title' => 'Pengajuan Klaim Disetujui',
                        'message' => 'Penemu telah menyetujui klaim kamu. Lanjutkan proses komunikasi dan konfirmasi pengembalian melalui halaman serah terima.',
                    ],
                    'rejected' => [
                        'label' => 'Ditolak',
                        'dot' => 'bg-rose-500',
                        'badge' => 'border-rose-200 bg-rose-50 text-rose-800',
                        'panel' => 'border-rose-200 bg-gradient-to-br from-rose-50 to-[#fff1f5]',
                        'heading' => 'text-rose-900',
                        'description' => 'text-rose-800',
                        'title' => 'Pengajuan Ditolak',
                        'message' => 'Pengajuan klaim ini telah ditolak oleh penemu barang.',
                    ],
                ];

                $status = $statusConfig[$claim->status] ?? $statusConfig['pending'];
            @endphp

            <article class="group overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_16px_45px_rgba(36,56,94,0.10)]">

                {{-- CARD HEADER --}}
                <div class="relative overflow-hidden border-b border-slate-100 bg-gradient-to-r from-[#f4f7fc] via-white to-[#f3f0ff] px-5 py-5 sm:px-7">
                    <div class="pointer-events-none absolute -right-10 -top-16 h-36 w-36 rounded-full bg-[#8e85ff]/10 blur-2xl"></div>

                    <div class="relative flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex min-w-0 items-start gap-3">
                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94] shadow-sm">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>

                            <div class="min-w-0">
                                <p class="text-[10px] font-bold uppercase tracking-[0.17em] text-slate-400">
                                    Barang yang Diklaim
                                </p>
                                <h2 class="mt-1 break-words text-lg font-extrabold tracking-tight text-[#142b49] sm:text-xl">
                                    {{ $claim->itemReport->item_name }}
                                </h2>
                                <p class="mt-1 text-xs text-slate-500">
                                    Penemu: {{ $claim->itemReport->user->name }}
                                </p>
                            </div>
                        </div>

                        <span class="inline-flex w-fit shrink-0 items-center gap-2 rounded-full border px-3.5 py-2 text-xs font-bold {{ $status['badge'] }}">
                            <span class="h-1.5 w-1.5 rounded-full {{ $status['dot'] }}"></span>
                            {{ $status['label'] }}
                        </span>
                    </div>
                </div>

                <div class="p-5 sm:p-7">

                    {{-- ITEM PHOTO --}}
                    @if ($claim->itemReport->photo)
                        <div class="group/photo relative mb-7 overflow-hidden rounded-2xl border border-slate-200/80 bg-gradient-to-br from-[#e4faf5] to-[#eeeaff]">
                            <img
                                src="{{ asset('storage/' . $claim->itemReport->photo) }}"
                                alt="Foto {{ $claim->itemReport->item_name }}"
                                class="h-56 w-full object-cover transition duration-500 group-hover/photo:scale-[1.02] sm:h-72"
                            >
                            <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-[#142b49]/85 via-[#142b49]/30 to-transparent px-5 pb-4 pt-16">
                                <p class="text-xs font-medium text-white/70">Foto barang</p>
                                <p class="mt-1 text-sm font-bold text-white">
                                    {{ $claim->itemReport->item_name }}
                                </p>
                            </div>
                        </div>
                    @endif

                    {{-- ITEM INFORMATION --}}
                    <div>
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-[#e9e5ff] text-[#514c94]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 5h16v14H4zM8 9h8M8 13h5"/>
                                </svg>
                            </div>
                            <h3 class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#142b49]">
                                Informasi Barang
                            </h3>
                            <div class="h-px flex-1 bg-gradient-to-r from-[#8e85ff]/30 to-transparent"></div>
                        </div>

                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <div class="rounded-2xl border border-[#8e85ff]/10 bg-gradient-to-br from-white to-[#f3f0ff] p-4 transition hover:-translate-y-0.5 hover:shadow-sm">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Kategori</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->category }}</p>
                            </div>

                            <div class="rounded-2xl border border-[#62e7d0]/15 bg-gradient-to-br from-white to-[#eafbf7] p-4 transition hover:-translate-y-0.5 hover:shadow-sm">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Lokasi</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->location }}</p>
                            </div>

                            <div class="rounded-2xl border border-[#e8c17b]/20 bg-gradient-to-br from-white to-[#fff8eb] p-4 transition hover:-translate-y-0.5 hover:shadow-sm">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tanggal Kejadian</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->itemReport->incident_date->format('d M Y') }}</p>
                            </div>

                            <div class="rounded-2xl border border-[#8bcfff]/20 bg-gradient-to-br from-white to-[#eef8ff] p-4 transition hover:-translate-y-0.5 hover:shadow-sm">
                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">Tanggal Pengajuan</p>
                                <p class="mt-2 text-sm font-semibold text-slate-800">{{ $claim->created_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- CLAIM REASON --}}
                    <div class="mt-7">
                        <div class="mb-4 flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-xl bg-[#dffaf5] text-[#287d72]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M8 10h8M8 14h5M5 3h14a2 2 0 012 2v14l-4-3H5a2 2 0 01-2-2V5a2 2 0 012-2z"/>
                                </svg>
                            </div>
                            <h3 class="text-xs font-extrabold uppercase tracking-[0.16em] text-[#142b49]">
                                Alasan dan Bukti Kepemilikan
                            </h3>
                            <div class="h-px flex-1 bg-gradient-to-r from-[#62e7d0]/40 to-transparent"></div>
                        </div>

                        <div class="rounded-2xl border border-slate-200/80 bg-gradient-to-br from-white to-[#f7f8fc] p-4 sm:p-5">
                            <p class="whitespace-pre-line text-sm leading-7 text-slate-600">{{ $claim->reason }}</p>
                        </div>
                    </div>

                    {{-- RESPONSE DATE --}}
                    @if ($claim->responded_at)
                        <div class="mt-5 inline-flex items-center gap-2 rounded-xl bg-[#f3f0ff] px-4 py-2.5 text-xs font-semibold text-[#514c94]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Diproses pada: {{ $claim->responded_at->format('d M Y, H:i') }}
                        </div>
                    @endif

                    {{-- STATUS MESSAGE --}}
                    <div class="mt-7 rounded-2xl border p-5 {{ $status['panel'] }}">
                        <div class="flex items-start gap-3">
                            <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white/80 shadow-sm">
                                @if ($claim->status === 'approved')
                                    <svg class="h-4 w-4 text-emerald-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                @elseif ($claim->status === 'pending')
                                    <svg class="h-4 w-4 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                @else
                                    <svg class="h-4 w-4 text-rose-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                @endif
                            </div>

                            <div>
                                <h3 class="text-sm font-extrabold {{ $status['heading'] }}">
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
                        <div class="mt-5 flex flex-col gap-4 rounded-2xl border border-[#8e85ff]/15 bg-gradient-to-r from-[#f3f0ff] via-white to-[#eafbf7] p-5 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm font-bold text-[#142b49]">
                                    Lanjutkan proses pengembalian
                                </p>
                                <p class="mt-1 text-xs leading-relaxed text-slate-500">
                                    Lanjutkan ke tahap komunikasi dan konfirmasi serah terima barang.
                                </p>
                            </div>

                            <a href="{{ route('user.reports.claims.handoff', [$claim->item_report_id, $claim->id]) }}"
                               class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#514c94] to-[#746bd0] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-[#514c94]/20 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-[#8e85ff] focus:ring-offset-2">
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
            <div class="relative overflow-hidden rounded-[2rem] border border-white/80 bg-white/90 px-6 py-14 text-center shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl sm:py-20">
                <div class="pointer-events-none absolute -right-16 -top-20 h-56 w-56 rounded-full bg-[#8e85ff]/10 blur-3xl"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-16 h-56 w-56 rounded-full bg-[#62e7d0]/15 blur-3xl"></div>

                <div class="relative">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94] shadow-sm">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 12l2 2 4-4m5 2a8 8 0 11-16 0 8 8 0 0116 0z"/>
                        </svg>
                    </div>

                    <p class="mt-6 text-[10px] font-extrabold uppercase tracking-[0.2em] text-[#746bd0]">
                        Riwayat Klaim
                    </p>

                    <h2 class="mt-2 text-xl font-extrabold tracking-tight text-[#142b49] sm:text-2xl">
                        Belum Ada Pengajuan Klaim
                    </h2>

                    <p class="mx-auto mt-3 max-w-md text-sm leading-7 text-slate-500">
                        Kamu belum mengajukan klaim kepemilikan barang. Ketika menemukan laporan yang berpotensi cocok, kamu dapat mengajukan klaim melalui halaman Smart Matching.
                    </p>

                    <a href="{{ route('user.dashboard') }}"
                       class="mt-7 inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#514c94] to-[#746bd0] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-[#514c94]/20 transition duration-300 hover:-translate-y-0.5 hover:shadow-xl">
                        Cari Barang
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6"/>
                        </svg>
                    </a>
                </div>
            </div>

        @endforelse
    </div>

    {{-- PAGINATION --}}
    @if ($claims->hasPages())
        <div class="rounded-2xl border border-white/80 bg-white/80 p-4 shadow-sm backdrop-blur-xl">
            {{ $claims->links() }}
        </div>
    @endif

</div>
@endsection
