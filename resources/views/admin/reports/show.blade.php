
@extends('layouts.app')

@section('title', 'Detail Laporan | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.reports.index') }}"
           class="inline-flex items-center gap-2 rounded-full border border-white/70 bg-white/70 px-4 py-2 text-sm font-semibold text-slate-500 shadow-sm backdrop-blur-md transition hover:border-[#8e85ff]/30 hover:text-[#7165c8]">
            <span>&larr;</span>
            Kembali ke Daftar Laporan
        </a>

        <div class="relative mt-6 overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#142b49] via-[#253d67] to-[#7165c8] px-6 py-8 text-white shadow-xl sm:px-8 sm:py-9">
            <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-28 -left-20 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#8be9d7]">
                        Administrasi / Laporan
                    </p>
                    <h1 class="mt-3 text-3xl font-extrabold tracking-tight sm:text-4xl">
                        Detail Laporan
                    </h1>
                    <p class="mt-3 max-w-xl text-sm leading-7 text-white/75">
                        Tinjau informasi barang, identitas pelapor, status moderasi, dan riwayat pengajuan klaim.
                    </p>
                </div>

                <div class="w-full rounded-2xl border border-white/20 bg-white/10 p-4 backdrop-blur-xl sm:w-auto sm:min-w-44">
                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-white/60">
                        ID Laporan
                    </p>
                    <p class="mt-2 text-2xl font-extrabold">
                        #{{ $report->id }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="flex items-start gap-3 rounded-2xl border border-emerald-200/70 bg-gradient-to-r from-emerald-50 to-[#e8faf6] p-4 text-sm text-emerald-800 shadow-sm">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-emerald-100 font-bold">✓</div>
            <span class="pt-1">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="flex items-start gap-3 rounded-2xl border border-rose-200/70 bg-gradient-to-r from-rose-50 to-[#fff0f5] p-4 text-sm text-rose-800 shadow-sm">
            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-rose-100 font-bold">!</div>
            <span class="pt-1">{{ session('error') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-2xl border border-rose-200/70 bg-gradient-to-r from-rose-50 to-[#fff0f5] p-5 text-sm text-rose-800 shadow-sm">
            <p class="font-bold">Terdapat kesalahan pada pengisian:</p>
            <ul class="mt-2 list-disc space-y-1 pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- INFORMASI BARANG --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/85 shadow-[0_12px_40px_rgba(35,55,90,0.06)] backdrop-blur-xl">

        <div class="flex items-center gap-4 border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf4] to-[#e8e4ff] text-[#334d75]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-[#172f4f]">Informasi Barang</h2>
                <p class="mt-0.5 text-xs text-slate-500">Detail barang yang dilaporkan oleh pengguna.</p>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="grid grid-cols-1 gap-7 lg:grid-cols-[340px_1fr]">

                {{-- FOTO --}}
                <div>
                    @if ($report->photo)
                        <div class="group overflow-hidden rounded-3xl border border-white bg-gradient-to-br from-[#e5f8f4] to-[#ece9ff] shadow-sm">
                            <img
                                src="{{ asset('storage/' . $report->photo) }}"
                                alt="Foto {{ $report->item_name }}"
                                class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-[1.03]"
                            >
                        </div>
                    @else
                        <div class="flex aspect-[4/3] w-full flex-col items-center justify-center rounded-3xl border border-dashed border-[#8e85ff]/30 bg-gradient-to-br from-[#e5f8f4] to-[#ece9ff] text-slate-400">
                            <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.4">
                                <rect x="3" y="3" width="18" height="18" rx="2"/>
                                <circle cx="8.5" cy="8.5" r="1.5"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 15l-5-5L5 21"/>
                            </svg>
                            <p class="mt-3 text-sm font-medium">Tidak ada foto barang</p>
                        </div>
                    @endif
                </div>

                {{-- DETAIL --}}
                <div class="min-w-0">
                    <div class="flex flex-wrap gap-2">
                        @if ($report->type === 'lost')
                            <span class="rounded-full border border-amber-100 bg-gradient-to-r from-amber-50 to-orange-50 px-3 py-1.5 text-xs font-bold text-amber-700">
                                Laporan Kehilangan
                            </span>
                        @else
                            <span class="rounded-full border border-emerald-100 bg-gradient-to-r from-emerald-50 to-[#e5faf5] px-3 py-1.5 text-xs font-bold text-emerald-700">
                                Laporan Penemuan
                            </span>
                        @endif

                        @if ($report->status === 'active')
                            <span class="rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-bold text-sky-700">
                                Aktif
                            </span>
                        @elseif ($report->status === 'claimed')
                            <span class="rounded-full border border-amber-100 bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">
                                Sedang Diklaim
                            </span>
                        @else
                            <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                Dikembalikan
                            </span>
                        @endif
                    </div>

                    <h3 class="mt-5 break-words text-2xl font-extrabold tracking-tight text-[#172f4f] sm:text-3xl">
                        {{ $report->item_name }}
                    </h3>

                    <p class="mt-2 inline-flex rounded-xl bg-gradient-to-r from-[#eafaf6] to-[#f0edff] px-3 py-1.5 text-sm font-semibold text-[#59658b]">
                        {{ $report->category }}
                    </p>

                    <div class="mt-7 grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div class="rounded-2xl border border-slate-100 bg-gradient-to-br from-[#f8faff] to-[#f3f1ff] p-4">
                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Lokasi Kejadian
                            </p>
                            <p class="mt-2 text-sm font-semibold leading-6 text-slate-800">
                                {{ $report->location }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-100 bg-gradient-to-br from-[#f8faff] to-[#eafaf6] p-4">
                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Tanggal Kejadian
                            </p>
                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $report->incident_date->format('d M Y') }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-100 bg-white p-4">
                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Tanggal Dibuat
                            </p>
                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $report->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>

                        <div class="rounded-2xl border border-slate-100 bg-white p-4">
                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Status Moderasi
                            </p>
                            <div class="mt-2">
                                @if ($report->moderation_status === 'hidden')
                                    <span class="rounded-full border border-rose-100 bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700">
                                        Disembunyikan
                                    </span>
                                @else
                                    <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                        Terlihat
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- DESKRIPSI --}}
            <div class="mt-8 rounded-2xl border border-slate-100 bg-gradient-to-br from-[#f8faff] to-[#f5f3ff] p-5 sm:p-6">
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#7165c8]">
                    Deskripsi Barang
                </p>
                <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-600">
                    {{ $report->description }}
                </p>
            </div>
        </div>
    </section>

    {{-- INFORMASI PELAPOR --}}
    <section class="rounded-[1.75rem] border border-white/70 bg-white/85 p-5 shadow-[0_12px_40px_rgba(35,55,90,0.06)] backdrop-blur-xl sm:p-7">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf4] to-[#e8e4ff] text-[#334d75]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2m12-13a4 4 0 11-8 0 4 4 0 018 0zm2 5a4 4 0 014 4v4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg font-bold text-[#172f4f]">Informasi Pelapor</h2>
                <p class="mt-0.5 text-xs text-slate-500">Identitas akun pengguna yang membuat laporan.</p>
            </div>
        </div>

        <div class="mt-7 grid grid-cols-1 gap-4 border-t border-slate-100 pt-6 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-2xl bg-gradient-to-br from-[#f8faff] to-[#f3f1ff] p-4">
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Nama Pengguna
                </p>
                <p class="mt-2 break-words text-sm font-bold text-slate-800">
                    {{ $report->user->name ?? 'Pengguna tidak tersedia' }}
                </p>
            </div>

            <div class="rounded-2xl bg-gradient-to-br from-[#f8faff] to-[#eafaf6] p-4">
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Email
                </p>
                <p class="mt-2 break-all text-sm font-medium text-slate-700">
                    {{ $report->user->email ?? '-' }}
                </p>
            </div>

            <div class="rounded-2xl bg-white p-4 ring-1 ring-slate-100">
                <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                    Waktu Pelaporan
                </p>
                <p class="mt-2 text-sm font-medium text-slate-700">
                    {{ $report->created_at->format('d M Y, H:i') }}
                </p>
            </div>
        </div>
    </section>

    {{-- MODERASI --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/85 shadow-[0_12px_40px_rgba(35,55,90,0.06)] backdrop-blur-xl">
        <div class="border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e8e4ff] to-[#dffaf4] text-[#334d75]">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-[#172f4f]">Moderasi Laporan</h2>
                    <p class="mt-0.5 text-xs leading-5 text-slate-500">
                        Kelola visibilitas laporan apabila terdapat informasi yang tidak sesuai atau melanggar ketentuan.
                    </p>
                </div>
            </div>
        </div>

        <div class="p-5 sm:p-7">
            <div class="flex flex-wrap items-center gap-3">
                <span class="text-sm font-semibold text-slate-600">Status saat ini:</span>

                @if ($report->moderation_status === 'hidden')
                    <span class="rounded-full border border-rose-100 bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700">
                        Disembunyikan
                    </span>
                @else
                    <span class="rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                        Terlihat
                    </span>
                @endif
            </div>

            @if ($report->moderation_status === 'hidden')

                <div class="mt-6 rounded-2xl border border-rose-100 bg-gradient-to-br from-rose-50 to-[#fff4f7] p-5 sm:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-rose-500">
                        Alasan Moderasi
                    </p>
                    <p class="mt-3 whitespace-pre-line text-sm leading-7 text-slate-700">
                        {{ $report->moderation_reason ?? '-' }}
                    </p>

                    <div class="mt-5 grid grid-cols-1 gap-4 border-t border-rose-100 pt-5 sm:grid-cols-2">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Dimoderasi Oleh
                            </p>
                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $report->moderator->name ?? 'Admin tidak tersedia' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                                Waktu Moderasi
                            </p>
                            <p class="mt-2 text-sm font-semibold text-slate-800">
                                {{ $report->moderated_at?->format('d M Y, H:i') ?? '-' }}
                            </p>
                        </div>
                    </div>
                </div>

                <form
                    method="POST"
                    action="{{ route('admin.reports.unhide', $report->id) }}"
                    onsubmit="return confirm('Tampilkan kembali laporan ini?')"
                    class="mt-6">
                    @csrf

                    <button type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#253d67] to-[#7165c8] px-5 py-3 text-sm font-bold text-white shadow-md shadow-[#7165c8]/20 transition hover:-translate-y-0.5 hover:shadow-lg sm:w-auto">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12a9 9 0 019-9 9 9 0 016.36 2.64M21 12a9 9 0 01-9 9 9 9 0 01-6.36-2.64M3 3v6h6M21 21v-6h-6"/>
                        </svg>
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

                    <div>
                        <label for="moderation_reason"
                               class="mb-2 block text-sm font-bold text-slate-700">
                            Alasan Menyembunyikan Laporan
                        </label>

                        <textarea
                            id="moderation_reason"
                            name="moderation_reason"
                            rows="4"
                            required
                            minlength="5"
                            maxlength="1000"
                            class="w-full rounded-2xl border border-slate-200 bg-[#f8faff] px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                            placeholder="Tuliskan alasan moderasi laporan...">{{ old('moderation_reason') }}</textarea>

                        <p class="mt-2 text-xs text-slate-400">
                            Jelaskan alasan moderasi secara singkat dan jelas.
                        </p>
                    </div>

                    <button
                        type="submit"
                        class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-rose-500 to-[#e76b91] px-5 py-3 text-sm font-bold text-white shadow-md shadow-rose-200/50 transition hover:-translate-y-0.5 hover:shadow-lg sm:w-auto">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4z"/>
                        </svg>
                        Sembunyikan Laporan
                    </button>
                </form>

            @endif
        </div>
    </section>

    {{-- RIWAYAT KLAIM --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/70 bg-white/85 shadow-[0_12px_40px_rgba(35,55,90,0.06)] backdrop-blur-xl">
        <div class="border-b border-slate-100/80 px-5 py-5 sm:px-7">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e8e4ff] to-[#dffaf4] text-[#334d75]">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-[#172f4f]">Riwayat Pengajuan Klaim</h2>
                        <p class="mt-0.5 text-xs text-slate-500">
                            Daftar pengguna yang pernah mengajukan klaim terhadap laporan ini.
                        </p>
                    </div>
                </div>

                <div class="w-fit rounded-2xl border border-[#8e85ff]/10 bg-gradient-to-r from-[#eafaf6] to-[#f0edff] px-4 py-3">
                    <p class="text-xs font-bold text-[#42557c]">
                        {{ $report->claims->count() }} Pengajuan Klaim
                    </p>
                </div>
            </div>
        </div>

        {{-- TABEL DESKTOP --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead class="bg-gradient-to-r from-[#f1f8ff] via-[#f5f3ff] to-[#effcf9]">
                    <tr class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-500">
                        <th class="px-6 py-4">Pengaju Klaim</th>
                        <th class="px-6 py-4">Alasan</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Tanggal</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100/80">
                    @forelse ($report->claims as $claim)
                        <tr class="transition duration-200 hover:bg-gradient-to-r hover:from-[#f0fbf8]/70 hover:to-[#f4f2ff]/70">
                            <td class="px-6 py-5">
                                <p class="font-bold text-[#172f4f]">
                                    {{ $claim->claimant->name ?? '-' }}
                                </p>
                            </td>

                            <td class="max-w-md whitespace-pre-line px-6 py-5 leading-6 text-slate-600">
                                {{ $claim->reason }}
                            </td>

                            <td class="px-6 py-5">
                                @if ($claim->status === 'pending')
                                    <span class="whitespace-nowrap rounded-full border border-amber-100 bg-amber-50 px-3 py-1.5 text-xs font-bold text-amber-700">
                                        Menunggu
                                    </span>
                                @elseif ($claim->status === 'approved')
                                    <span class="whitespace-nowrap rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-xs font-bold text-emerald-700">
                                        Disetujui
                                    </span>
                                @else
                                    <span class="whitespace-nowrap rounded-full border border-rose-100 bg-rose-50 px-3 py-1.5 text-xs font-bold text-rose-700">
                                        Ditolak
                                    </span>
                                @endif
                            </td>

                            <td class="whitespace-nowrap px-6 py-5 text-slate-500">
                                {{ $claim->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-14 text-center">
                                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e5f8f4] to-[#ece9ff] text-slate-400">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12M8 12h12M8 17h12M4 7h.01M4 12h.01M4 17h.01"/>
                                    </svg>
                                </div>
                                <p class="mt-4 text-sm font-bold text-slate-700">
                                    Belum Ada Pengajuan Klaim
                                </p>
                                <p class="mt-1 text-xs text-slate-400">
                                    Riwayat klaim untuk laporan ini akan ditampilkan di sini.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- KARTU MOBILE --}}
        <div class="space-y-4 p-4 md:hidden">
            @forelse ($report->claims as $claim)
                <article class="rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f8faff] p-4 shadow-sm transition hover:shadow-md">
                    <div class="flex items-start justify-between gap-3">
                        <div class="min-w-0">
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Pengaju Klaim
                            </p>
                            <p class="mt-1 break-words text-sm font-bold text-[#172f4f]">
                                {{ $claim->claimant->name ?? '-' }}
                            </p>
                        </div>

                        @if ($claim->status === 'pending')
                            <span class="shrink-0 rounded-full border border-amber-100 bg-amber-50 px-3 py-1.5 text-[10px] font-bold text-amber-700">
                                Menunggu
                            </span>
                        @elseif ($claim->status === 'approved')
                            <span class="shrink-0 rounded-full border border-emerald-100 bg-emerald-50 px-3 py-1.5 text-[10px] font-bold text-emerald-700">
                                Disetujui
                            </span>
                        @else
                            <span class="shrink-0 rounded-full border border-rose-100 bg-rose-50 px-3 py-1.5 text-[10px] font-bold text-rose-700">
                                Ditolak
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 rounded-2xl bg-white/80 p-3">
                        <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                            Alasan Klaim
                        </p>
                        <p class="mt-2 whitespace-pre-line text-sm leading-6 text-slate-600">
                            {{ $claim->reason }}
                        </p>
                    </div>

                    <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-3">
                        <span class="text-xs font-medium text-slate-400">Tanggal Pengajuan</span>
                        <span class="text-xs font-semibold text-slate-600">
                            {{ $claim->created_at->format('d M Y') }}
                        </span>
                    </div>
                </article>
            @empty
                <div class="py-10 text-center">
                    <p class="text-sm font-bold text-slate-700">
                        Belum Ada Pengajuan Klaim
                    </p>
                    <p class="mt-2 text-xs text-slate-400">
                        Riwayat klaim untuk laporan ini akan ditampilkan di sini.
                    </p>
                </div>
            @endforelse
        </div>
    </section>

</div>
@endsection
