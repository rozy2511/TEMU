
@extends('layouts.app')

@section('title', 'Buat Laporan | TEMU')

@section('content')
<div class="min-h-screen bg-[#f3f5f7] pb-16">
    <div class="mx-auto max-w-7xl px-4 pt-7 sm:px-6 lg:px-8 lg:pt-10">

        <a href="{{ route('user.dashboard') }}"
           class="group inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#172f4f]">
            <svg class="h-4 w-4 transition group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Beranda
        </a>

        <section class="relative mt-6 overflow-hidden rounded-[26px] bg-[#102640] text-white shadow-xl shadow-slate-900/10">
            <div class="pointer-events-none absolute -right-20 -top-32 h-96 w-96 rounded-full border border-white/10"></div>
            <div class="pointer-events-none absolute -right-8 -top-20 h-72 w-72 rounded-full border border-white/10"></div>
            <div class="pointer-events-none absolute -bottom-36 right-1/4 h-72 w-72 rounded-full bg-[#315f91]/20 blur-3xl"></div>

            <div class="relative grid gap-8 px-6 py-9 sm:px-9 sm:py-11 lg:grid-cols-[1fr_auto] lg:items-end lg:px-12 lg:py-12">
                <div class="max-w-2xl">
                    <div class="mb-5 inline-flex items-center gap-2 border border-[#e2b76c]/30 bg-[#e2b76c]/10 px-3 py-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#f0cc8d]">
                        <span class="h-1.5 w-1.5 rounded-full bg-[#e2b76c]"></span>
                        Pusat Pelaporan TEMU
                    </div>

                    <h1 class="max-w-xl text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                        Satu laporan,
                        <span class="font-serif font-medium italic text-[#e2b76c]">satu langkah</span>
                        menuju temu kembali.
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                        Ceritakan barang yang hilang atau ditemukan. Informasi yang akurat membantu mempertemukan barang dengan pemiliknya di lingkungan kampus.
                    </p>
                </div>

                <div class="hidden border-l border-white/15 pl-7 lg:block">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-slate-400">TEMU / REPORT</p>
                    <p class="mt-2 font-serif text-5xl text-[#e2b76c]">01</p>
                    <p class="mt-2 text-xs tracking-wide text-slate-400">Buat laporan baru</p>
                </div>
            </div>

            <div class="relative flex items-center justify-between border-t border-white/10 bg-white/[0.035] px-6 py-3.5 sm:px-9 lg:px-12">
                <p class="text-[10px] font-semibold uppercase tracking-[0.16em] text-slate-400">
                    Lost & Found Campus Platform
                </p>
                <p class="text-[10px] font-semibold tracking-[0.12em] text-[#e2b76c]">
                    TEMU
                </p>
            </div>
        </section>

        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 p-5">
                <div class="flex items-start gap-3">
                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                        </svg>
                    </div>

                    <div>
                        <h3 class="text-sm font-bold text-red-800">Periksa kembali formulir kamu</h3>
                        <ul class="mt-2 list-disc space-y-1 pl-5 text-sm leading-6 text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="mt-8 grid grid-cols-1 items-start gap-6 lg:grid-cols-[minmax(0,1fr)_340px] lg:gap-8">

            <form action="{{ route('user.reports.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="min-w-0 overflow-hidden rounded-[22px] border border-slate-200/80 bg-white shadow-sm">

                @csrf

                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5 sm:px-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#102640] text-[#e2b76c]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8m-8 4h8m-8 4h5m-8 5h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-extrabold tracking-tight text-[#172f4f]">Detail Laporan</h2>
                            <p class="mt-1 text-xs text-slate-500">Isi informasi barang dengan lengkap dan benar</p>
                        </div>
                    </div>

                    <span class="hidden text-[10px] font-bold uppercase tracking-[0.16em] text-slate-400 sm:block">
                        Formulir / 01
                    </span>
                </div>

                <div class="space-y-9 px-6 py-7 sm:px-8 sm:py-9">

                    <section>
                        <div class="mb-5 flex items-start gap-3">
                            <span class="font-serif text-2xl text-[#d5a34a]">01</span>
                            <div>
                                <h3 class="text-sm font-extrabold text-[#172f4f]">Identitas Barang</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Mulai dengan menentukan jenis laporan dan mengenali barang.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-5">

                            <div
                                x-data="{
                                    open: false,
                                    selected: @js(old('type', '')),
                                    options: [
                                        { value: 'lost', label: 'Barang Hilang', description: 'Saya kehilangan barang', color: 'text-[#d85f56]', bg: 'bg-[#fff0ee]' },
                                        { value: 'found', label: 'Barang Ditemukan', description: 'Saya menemukan barang', color: 'text-[#269b7b]', bg: 'bg-[#eaf7f2]' }
                                    ],
                                    get selectedOption() {
                                        return this.options.find(item => item.value === this.selected);
                                    },
                                    get selectedLabel() {
                                        return this.selectedOption ? this.selectedOption.label : 'Pilih jenis laporan';
                                    }
                                }"
                                class="relative"
                            >
                                <label class="mb-2 block text-xs font-bold text-slate-700">
                                    Jenis Laporan <span class="text-red-500">*</span>
                                </label>

                                <input type="hidden" name="type" :value="selected">

                                <button
                                    type="button"
                                    @click="open = !open"
                                    @click.outside="open = false"
                                    @keydown.escape="open = false"
                                    :aria-expanded="open"
                                    aria-haspopup="listbox"
                                    class="flex min-h-[58px] w-full items-center justify-between rounded-xl border border-slate-200 bg-slate-50 px-4 text-left transition hover:border-[#315f91] hover:bg-white focus:border-[#315f91] focus:outline-none focus:ring-4 focus:ring-[#315f91]/10"
                                >
                                    <span class="flex items-center gap-3">
                                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-white text-slate-400 shadow-sm" :class="selectedOption ? selectedOption.bg + ' ' + selectedOption.color : ''">
                                            <svg x-show="selected === 'lost'" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4m0 4h.01M5.5 20h13a2 2 0 001.8-2.9l-6.5-12a2 2 0 00-3.6 0l-6.5 12a2 2 0 001.8 2.9z"/>
                                            </svg>
                                            <svg x-show="selected === 'found'" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <svg x-show="!selected" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 5v14m-7-7h14"/>
                                            </svg>
                                        </span>
                                        <span class="text-sm font-semibold" :class="selected ? 'text-slate-800' : 'text-slate-400'" x-text="selectedLabel"></span>
                                    </span>

                                    <svg class="h-5 w-5 text-slate-400 transition" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <div
                                    x-show="open"
                                    x-transition
                                    role="listbox"
                                    class="absolute z-30 mt-2 w-full overflow-hidden rounded-xl border border-slate-200 bg-white p-1.5 shadow-xl shadow-slate-900/10"
                                >
                                    <template x-for="option in options" :key="option.value">
                                        <button
                                            type="button"
                                            role="option"
                                            :aria-selected="selected === option.value"
                                            @click="selected = option.value; open = false; $dispatch('report-type-changed', option.value)"
                                            class="flex w-full items-center justify-between rounded-lg px-3 py-3 text-left transition hover:bg-slate-50"
                                            :class="{ 'bg-slate-50': selected === option.value }"
                                        >
                                            <span class="flex items-center gap-3">
                                                <span class="flex h-9 w-9 items-center justify-center rounded-lg" :class="option.bg + ' ' + option.color">
                                                    <svg x-show="option.value === 'lost'" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4m0 4h.01M5.5 20h13a2 2 0 001.8-2.9l-6.5-12a2 2 0 00-3.6 0l-6.5 12a2 2 0 001.8 2.9z"/>
                                                    </svg>
                                                    <svg x-show="option.value === 'found'" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </span>
                                                <span>
                                                    <span class="block text-sm font-bold text-slate-800" x-text="option.label"></span>
                                                    <span class="mt-0.5 block text-xs text-slate-400" x-text="option.description"></span>
                                                </span>
                                            </span>
                                            <span x-show="selected === option.value" class="pr-2 text-sm font-bold text-[#315f91]">✓</span>
                                        </button>
                                    </template>
                                </div>

                                <p class="mt-2 text-xs leading-5 text-slate-400">
                                    Pilih apakah kamu kehilangan barang atau menemukan barang milik orang lain.
                                </p>
                            </div>

                            <div>
                                <label for="item_name" class="mb-2 block text-xs font-bold text-slate-700">
                                    Nama Barang <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="item_name"
                                    name="item_name"
                                    value="{{ old('item_name') }}"
                                    placeholder="Contoh: iPhone 13, Kunci Motor, Dompet"
                                    maxlength="255"
                                    required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-[#315f91] focus:bg-white focus:ring-4 focus:ring-[#315f91]/10"
                                >
                            </div>

                            <div>
                                <label for="category" class="mb-2 block text-xs font-bold text-slate-700">
                                    Kategori Barang <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="category"
                                    name="category"
                                    required
                                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm text-slate-700 outline-none transition hover:border-slate-300 focus:border-[#315f91] focus:bg-white focus:ring-4 focus:ring-[#315f91]/10"
                                >
                                    <option value="">Pilih kategori</option>
                                    @foreach (['Elektronik', 'Aksesori', 'Dokumen', 'Kunci', 'Tas', 'Pakaian', 'Lainnya'] as $category)
                                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <div class="mb-2 flex items-center justify-between gap-3">
                                    <label for="description" class="block text-xs font-bold text-slate-700">
                                        Deskripsi dan Ciri-ciri Barang <span class="text-red-500">*</span>
                                    </label>
                                    <span class="text-[10px] font-medium text-slate-400">Maks. 3000 karakter</span>
                                </div>
                                <textarea
                                    id="description"
                                    name="description"
                                    rows="5"
                                    maxlength="3000"
                                    required
                                    placeholder="Jelaskan warna, merek, bentuk, kondisi, atau ciri khusus barang..."
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-sm leading-6 text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-[#315f91] focus:bg-white focus:ring-4 focus:ring-[#315f91]/10"
                                >{{ old('description') }}</textarea>
                                <p class="mt-2 text-xs leading-5 text-slate-400">
                                    Minimal 10 karakter. Deskripsi yang spesifik akan membantu proses pencocokan barang.
                                </p>
                            </div>
                        </div>
                    </section>

                    <section class="border-t border-slate-100 pt-8">
                        <div class="mb-5 flex items-start gap-3">
                            <span class="font-serif text-2xl text-[#d5a34a]">02</span>
                            <div>
                                <h3 class="text-sm font-extrabold text-[#172f4f]">Informasi Kejadian</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Tentukan tempat dan waktu barang hilang atau ditemukan.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label for="location" class="mb-2 block text-xs font-bold text-slate-700">
                                    Lokasi Kejadian <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </span>
                                    <input
                                        type="text"
                                        id="location"
                                        name="location"
                                        value="{{ old('location') }}"
                                        placeholder="Contoh: Gedung Kuliah, Perpustakaan, Kantin"
                                        maxlength="255"
                                        required
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-slate-300 focus:border-[#315f91] focus:bg-white focus:ring-4 focus:ring-[#315f91]/10"
                                    >
                                </div>
                                <p class="mt-2 text-xs text-slate-400">
                                    Tuliskan lokasi yang spesifik agar memudahkan proses pencarian.
                                </p>
                            </div>

                            <div>
                                <label for="incident_date" class="mb-2 block text-xs font-bold text-slate-700">
                                    Tanggal Kejadian <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 011 1v14H4V6a1 1 0 011-1z"/>
                                        </svg>
                                    </span>
                                    <input
                                        type="date"
                                        id="incident_date"
                                        name="incident_date"
                                        value="{{ old('incident_date') }}"
                                        max="{{ date('Y-m-d') }}"
                                        required
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3.5 pl-12 pr-4 text-sm text-slate-700 outline-none transition hover:border-slate-300 focus:border-[#315f91] focus:bg-white focus:ring-4 focus:ring-[#315f91]/10"
                                    >
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="border-t border-slate-100 pt-8">
                        <div class="mb-5 flex items-start gap-3">
                            <span class="font-serif text-2xl text-[#d5a34a]">03</span>
                            <div>
                                <h3 class="text-sm font-extrabold text-[#172f4f]">Dokumentasi Barang</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Sertakan foto agar barang lebih mudah dikenali.
                                </p>
                            </div>
                        </div>

                        <div
                            x-data="{ reportType: @js(old('type', '')) }"
                            @report-type-changed.window="reportType = $event.detail"
                        >
                            <label for="photo" class="mb-2 flex items-center gap-2 text-xs font-bold text-slate-700">
                                Foto Barang
                                <span class="text-red-500" x-show="reportType === 'found'">*</span>
                                <span class="rounded-md bg-slate-100 px-2 py-1 text-[9px] font-bold uppercase tracking-wider text-slate-500" x-show="reportType !== 'found'">Opsional</span>
                                <span class="rounded-md bg-red-50 px-2 py-1 text-[9px] font-bold uppercase tracking-wider text-red-600" x-show="reportType === 'found'">Wajib</span>
                            </label>

                            <div class="rounded-2xl border border-dashed border-slate-300 bg-[#f8fafc] p-5 transition hover:border-[#315f91] hover:bg-[#f5f8fc] sm:p-7">
                                <div class="flex flex-col items-center text-center">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#e9eef4] text-[#315f91]">
                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 16.5V19a1 1 0 001 1h14a1 1 0 001-1v-2.5M12 15V4m0 0L8 8m4-4l4 4"/>
                                        </svg>
                                    </div>

                                    <p class="mt-4 text-sm font-bold text-slate-800">Pilih foto barang</p>
                                    <p class="mt-1 text-xs leading-5 text-slate-400">
                                        Gunakan foto yang jelas dan tidak buram
                                    </p>

                                    <label for="photo" class="mt-4 inline-flex cursor-pointer items-center gap-2 rounded-lg bg-[#172f4f] px-5 py-2.5 text-xs font-bold text-white transition hover:bg-[#25496f] focus-within:ring-4 focus-within:ring-[#315f91]/20">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m-7-7h14"/>
                                        </svg>
                                        Pilih File
                                    </label>

                                    <input
                                        type="file"
                                        id="photo"
                                        name="photo"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        :required="reportType === 'found'"
                                        class="sr-only"
                                    >

                                    <p
                                        class="mt-4 text-[11px] leading-5"
                                        :class="reportType === 'found' ? 'font-semibold text-red-500' : 'text-slate-400'"
                                        x-text="reportType === 'found'
                                            ? 'Foto wajib untuk barang ditemukan · JPG, JPEG, PNG, WEBP · Maksimal 2 MB'
                                            : 'JPG, JPEG, PNG, WEBP · Maksimal 2 MB'"
                                    ></p>
                                </div>
                            </div>

                            <div id="photo-preview-container" class="mt-5 hidden overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                <div class="flex items-center justify-between border-b border-slate-100 px-4 py-3">
                                    <div>
                                        <p class="text-xs font-bold text-slate-700">Pratinjau Foto</p>
                                        <p id="photo-file-name" class="mt-0.5 max-w-[220px] truncate text-[10px] text-slate-400"></p>
                                    </div>
                                    <span class="rounded-md bg-emerald-50 px-2.5 py-1 text-[10px] font-bold text-emerald-700">Foto dipilih</span>
                                </div>
                                <div class="bg-slate-50 p-3">
                                    <img
                                        id="photo-preview"
                                        src=""
                                        alt="Pratinjau foto barang"
                                        class="max-h-80 w-full rounded-xl object-contain"
                                    >
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="border-t border-slate-100 bg-[#f8fafc] px-6 py-6 sm:px-8">
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('user.dashboard') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-600 transition hover:border-slate-300 hover:bg-slate-50">
                            Batal
                        </a>

                        <button type="submit"
                                class="group inline-flex items-center justify-center gap-3 rounded-xl bg-[#172f4f] px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#172f4f]/15 transition hover:-translate-y-0.5 hover:bg-[#25496f] hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#315f91]/20">
                            Kirim Laporan
                            <svg class="h-4 w-4 transition group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    <p class="mt-4 text-[11px] leading-5 text-slate-400 sm:text-right">
                        Dengan mengirim laporan, pastikan seluruh informasi yang kamu berikan sudah benar.
                    </p>
                </div>
            </form>

            <aside class="space-y-5 lg:sticky lg:top-6">

                <div class="overflow-hidden rounded-[22px] bg-[#102640] text-white shadow-lg shadow-slate-900/10">
                    <div class="border-b border-white/10 px-6 py-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#e2b76c]">Panduan Pengguna</p>
                        <h2 class="mt-3 font-serif text-2xl leading-tight">Buat laporan yang<br>berarti.</h2>
                        <p class="mt-3 text-xs leading-6 text-slate-300">
                            Ikuti beberapa langkah berikut agar informasi barang mudah dipahami.
                        </p>
                    </div>

                    <div class="space-y-0 px-6 py-2">
                        <div class="flex gap-4 border-b border-white/10 py-5">
                            <span class="font-serif text-xl text-[#e2b76c]">01</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Tentukan jenis laporan</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-400">
                                    Pilih barang hilang atau barang ditemukan sesuai kondisi sebenarnya.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 border-b border-white/10 py-5">
                            <span class="font-serif text-xl text-[#e2b76c]">02</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Jelaskan ciri barang</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-400">
                                    Cantumkan merek, warna, bentuk, dan detail yang mudah dikenali.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 border-b border-white/10 py-5">
                            <span class="font-serif text-xl text-[#e2b76c]">03</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Berikan lokasi dan waktu</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-400">
                                    Tuliskan tempat dan tanggal kejadian sejelas mungkin.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 py-5">
                            <span class="font-serif text-xl text-[#e2b76c]">04</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Sertakan foto barang</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-400">
                                    Foto wajib disertakan untuk laporan barang ditemukan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-white/10 bg-white/[0.04] px-6 py-4">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.17em] text-slate-400">
                            Make every report count.
                        </p>
                    </div>
                </div>

                <div class="rounded-[22px] border border-[#e7dfcf] bg-[#f8f4eb] p-5">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#eadfc9] text-[#8d6a32]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v3m0 4h.01M10.3 3.9L1.9 18a2 2 0 001.7 2.6h16.8a2 2 0 001.7-2.6L13.7 3.9a2 2 0 00-3.4 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-extrabold text-[#59472c]">Jaga Informasi Tetap Akurat</h3>
                            <p class="mt-2 text-xs leading-6 text-[#806d50]">
                                Hindari informasi yang tidak pasti. Pastikan deskripsi, lokasi, dan tanggal kejadian sesuai dengan keadaan sebenarnya.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[22px] border border-slate-200 bg-white p-5">
                    <div class="flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#edf2f7] text-[#315f91]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 11c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm0 0c-2 2-4 3.895-4 5a4 4 0 108 0c0-1.105-2-3-4-5zm0 10a9 9 0 100-18 9 9 0 000 18z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-[#172f4f]">Lingkungan Kampus</h3>
                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                TEMU membantu mempertemukan informasi barang hilang dan ditemukan dalam satu tempat.
                            </p>
                        </div>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const photoInput = document.getElementById('photo');
    const previewContainer = document.getElementById('photo-preview-container');
    const photoPreview = document.getElementById('photo-preview');
    const photoFileName = document.getElementById('photo-file-name');

    if (photoInput && previewContainer && photoPreview) {
        let previewUrl = null;

        photoInput.addEventListener('change', function () {
            const file = this.files[0];

            if (previewUrl) {
                URL.revokeObjectURL(previewUrl);
                previewUrl = null;
            }

            if (!file) {
                previewContainer.classList.add('hidden');
                photoPreview.src = '';
                if (photoFileName) photoFileName.textContent = '';
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB.');
                this.value = '';
                previewContainer.classList.add('hidden');
                photoPreview.src = '';
                if (photoFileName) photoFileName.textContent = '';
                return;
            }

            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!allowedTypes.includes(file.type)) {
                alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');
                this.value = '';
                previewContainer.classList.add('hidden');
                photoPreview.src = '';
                if (photoFileName) photoFileName.textContent = '';
                return;
            }

            previewUrl = URL.createObjectURL(file);
            photoPreview.src = previewUrl;
            if (photoFileName) photoFileName.textContent = file.name;
            previewContainer.classList.remove('hidden');
        });
    }
</script>
@endpush
