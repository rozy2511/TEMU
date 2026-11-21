
@extends('layouts.app')

@section('title', 'Smart Matching | TEMU')

@section('content')
<main class="temu-container space-y-8 py-8 sm:py-10">

    <section>
        <a href="{{ route('user.reports.index') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-[#172f4f]">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Laporan Saya
        </a>

        <div class="mt-7">
            <span class="text-xs font-semibold uppercase tracking-[0.18em] text-[#172f4f]">
                Smart Item Matching
            </span>

            <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Hasil Pencocokan
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                Temukan laporan barang yang berpotensi cocok berdasarkan kategori, lokasi, tanggal, dan deskripsi barang.
            </p>
        </div>
    </section>

    @if (session('success'))
        <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-5">
            <h3 class="text-sm font-bold text-red-800">
                Pengajuan belum dapat diproses
            </h3>
            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-[#172f4f]">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="font-bold text-slate-900">Laporan Acuan</h2>
                    <p class="mt-0.5 text-xs text-slate-500">Laporan milik kamu yang digunakan untuk pencocokan</p>
                </div>
            </div>
        </div>

        <div class="grid gap-5 p-5 sm:grid-cols-2 sm:p-7">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Nama Barang</p>
                <p class="mt-1.5 font-semibold text-slate-900">{{ $report->item_name }}</p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Jenis Laporan</p>
                <p class="mt-1.5 font-semibold text-slate-900">
                    {{ $report->type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Kategori</p>
                <p class="mt-1.5 font-semibold text-slate-900">{{ $report->category }}</p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Lokasi</p>
                <p class="mt-1.5 font-semibold text-slate-900">{{ $report->location }}</p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Tanggal Kejadian</p>
                <p class="mt-1.5 font-semibold text-slate-900">{{ $report->incident_date->format('d M Y') }}</p>
            </div>
        </div>
    </section>

    <section>
        <div class="mb-5">
            <h2 class="text-xl font-bold text-slate-900 sm:text-2xl">
                Laporan yang Berpotensi Cocok
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Hasil diurutkan berdasarkan tingkat kemiripan tertinggi.
            </p>
        </div>

        <div class="space-y-6">
            @forelse ($matches as $match)
                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

                    <div class="grid lg:grid-cols-[1fr_190px]">

                        <div class="min-w-0 p-5 sm:p-7">

                            <div class="mb-5 flex flex-wrap items-center gap-2">
                                <span class="rounded-lg px-3 py-1.5 text-xs font-semibold
                                    {{ $match['report']->type === 'found' ? 'bg-emerald-50 text-emerald-700' : 'bg-red-50 text-red-700' }}">
                                    {{ $match['report']->type === 'found' ? 'Barang Ditemukan' : 'Barang Hilang' }}
                                </span>

                                <span class="rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-slate-600">
                                    {{ $match['report']->category }}
                                </span>
                            </div>

                            <div class="flex flex-col gap-5 sm:flex-row">
                                @if ($match['report']->photo)
                                    <div class="h-52 w-full shrink-0 overflow-hidden rounded-xl bg-slate-100 sm:h-40 sm:w-44">
                                        <img
                                            src="{{ asset('storage/' . $match['report']->photo) }}"
                                            alt="Foto {{ $match['report']->item_name }}"
                                            loading="lazy"
                                            class="h-full w-full object-cover"
                                        >
                                    </div>
                                @endif

                                <div class="min-w-0 flex-1">
                                    <h3 class="text-xl font-bold tracking-tight text-slate-900">
                                        {{ $match['report']->item_name }}
                                    </h3>

                                    <p class="mt-3 whitespace-pre-line text-sm leading-6 text-slate-600">{{ $match['report']->description }}</p>

                                    <div class="mt-5 flex flex-wrap gap-x-6 gap-y-3 text-sm text-slate-500">
                                        <span class="inline-flex items-center gap-2">
                                            <svg class="h-4 w-4 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $match['report']->location }}
                                        </span>

                                        <span class="inline-flex items-center gap-2">
                                            <svg class="h-4 w-4 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                            </svg>
                                            {{ $match['report']->incident_date->format('d M Y') }}
                                        </span>
                                    </div>

                                    <div class="mt-4 border-t border-slate-100 pt-4">
                                        <p class="text-xs text-slate-400">Dilaporkan oleh</p>
                                        <p class="mt-1 text-sm font-semibold text-slate-700">
                                            {{ $match['report']->user->name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <aside class="flex flex-col justify-center border-t border-slate-100 bg-slate-50 p-5 sm:p-6 lg:border-l lg:border-t-0">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Tingkat Kemiripan
                            </p>

                            <div class="mt-2 flex items-baseline gap-1">
                                <span class="text-4xl font-bold tracking-tight text-[#172f4f]">
                                    {{ $match['score'] }}
                                </span>
                                <span class="text-lg font-semibold text-slate-400">%</span>
                            </div>

                            <div class="mt-4 h-2.5 w-full overflow-hidden rounded-full bg-slate-200">
                                <div
                                    class="h-full rounded-full bg-[#172f4f]"
                                    style="width: {{ $match['score'] }}%"
                                ></div>
                            </div>

                            <p class="mt-3 text-xs leading-5 text-slate-500">
                                Skor dihitung dari kemiripan informasi kedua laporan.
                            </p>
                        </aside>
                    </div>

                    @if ($report->type === 'lost' && $match['report']->type === 'found')
                        <div class="border-t border-slate-200 bg-slate-50/70 p-5 sm:p-7">
                            <div class="max-w-2xl">
                                <span class="text-xs font-semibold uppercase tracking-wider text-[#172f4f]">
                                    Langkah Selanjutnya
                                </span>

                                <h4 class="mt-2 text-lg font-bold text-slate-900">
                                    Ajukan Klaim Kepemilikan
                                </h4>

                                <p class="mt-2 text-sm leading-6 text-slate-600">
                                    Jika barang ini kemungkinan milik kamu, jelaskan ciri khusus atau bukti kepemilikan yang dapat membantu penemu melakukan verifikasi.
                                </p>

                                <form
                                    action="{{ route('user.reports.claims.store', $match['report']->id) }}"
                                    method="POST"
                                    class="mt-5"
                                >
                                    @csrf

                                    <label for="reason-{{ $match['report']->id }}" class="temu-label">
                                        Alasan dan Bukti Kepemilikan
                                    </label>

                                    <textarea
                                        id="reason-{{ $match['report']->id }}"
                                        name="reason"
                                        rows="4"
                                        required
                                        minlength="20"
                                        maxlength="2000"
                                        placeholder="Jelaskan ciri khusus barang, isi, tanda, atau informasi yang hanya diketahui pemilik..."
                                        class="temu-input"
                                    >{{ old('reason') }}</textarea>

                                    <p class="mt-2 text-xs leading-relaxed text-slate-400">
                                        Minimal 20 karakter. Informasi ini akan digunakan penemu untuk memverifikasi klaim kamu.
                                    </p>

                                    <button type="submit"
                                            class="mt-5 inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                                        Kirim Pengajuan Klaim
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif

                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-14 text-center sm:py-16">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                        <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 text-lg font-bold text-slate-900">
                        Belum Ada Laporan yang Cocok
                    </h3>

                    <p class="mx-auto mt-2 max-w-lg text-sm leading-6 text-slate-500">
                        Sistem belum menemukan laporan dengan tingkat kemiripan yang cukup. Laporan kamu tetap tersimpan dan dapat dicocokkan dengan laporan baru di kemudian hari.
                    </p>

                    <a href="{{ route('user.dashboard') }}"
                       class="mt-6 inline-flex items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                        Kembali ke Beranda
                    </a>
                </div>
            @endforelse
        </div>
    </section>

    <section class="rounded-2xl border border-slate-200 bg-white p-5 sm:p-6">
        <div class="flex items-start gap-3">
            <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-[#172f4f]">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 18h.01M12 14a4 4 0 10-4-4"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 22a10 10 0 110-20 10 10 0 010 20z"/>
                </svg>
            </div>

            <div>
                <h3 class="text-sm font-bold text-slate-900">
                    Tentang Smart Item Matching
                </h3>

                <p class="mt-2 text-sm leading-6 text-slate-600">
                    Persentase kemiripan dihitung berdasarkan kategori (35%), lokasi (25%), tanggal kejadian (20%), dan deskripsi barang (20%). Hasil pencocokan merupakan rekomendasi awal, bukan bukti kepemilikan. Verifikasi tetap diperlukan sebelum barang dikembalikan.
                </p>
            </div>
        </div>
    </section>

</main>
@endsection
