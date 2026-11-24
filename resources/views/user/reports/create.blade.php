
@extends('layouts.app')

@section('title', 'Buat Laporan | TEMU')

@section('content')
<div class="min-h-screen bg-[#f6f7fb] pb-16">
    <div class="mx-auto max-w-7xl px-4 pt-7 sm:px-6 lg:px-8 lg:pt-10">

        <a href="{{ route('user.dashboard') }}"
           class="group inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#514c94]">
            <svg class="h-4 w-4 transition group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Beranda
        </a>

        {{-- HEADER --}}
        <section class="relative mt-6 overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] text-white shadow-xl shadow-[#142b49]/15">
            <div class="pointer-events-none absolute -right-20 -top-28 h-96 w-96 rounded-full bg-[#8e85ff]/25 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-36 left-1/3 h-80 w-80 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
            <div class="pointer-events-none absolute right-1/3 top-10 h-48 w-48 rounded-full bg-[#f4b6d2]/10 blur-3xl"></div>

            <div class="relative grid gap-8 px-6 py-9 sm:px-9 sm:py-11 lg:grid-cols-[1fr_auto] lg:items-end lg:px-12 lg:py-12">
                <div class="max-w-2xl">
                    <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-[#62e7d0]/20 bg-white/10 px-4 py-2 text-[10px] font-bold uppercase tracking-[0.2em] text-[#a9f4e8] backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                        Pusat Pelaporan TEMU
                    </div>

                    <h1 class="max-w-xl text-3xl font-extrabold leading-tight tracking-tight sm:text-4xl lg:text-5xl">
                        Satu laporan,
                        <span class="font-serif font-medium italic text-[#a9f4e8]">satu langkah</span>
                        menuju temu kembali.
                    </h1>

                    <p class="mt-5 max-w-xl text-sm leading-7 text-white/75 sm:text-base">
                        Ceritakan barang yang hilang atau ditemukan. Informasi yang akurat membantu mempertemukan barang dengan pemiliknya di lingkungan kampus.
                    </p>
                </div>

                <div class="hidden rounded-2xl border border-white/15 bg-white/[0.07] p-5 backdrop-blur-md lg:block">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-white/50">TEMU / REPORT</p>
                    <p class="mt-2 font-serif text-5xl text-[#a9f4e8]">01</p>
                    <p class="mt-2 text-xs tracking-wide text-white/60">Buat laporan baru</p>
                </div>
            </div>

            <div class="relative flex items-center justify-between border-t border-white/10 bg-white/[0.04] px-6 py-3.5 sm:px-9 lg:px-12">
                <p class="text-[10px] font-semibold uppercase tracking-[0.16em] text-white/50">
                    Lost & Found Campus Platform
                </p>
                <p class="text-[10px] font-semibold tracking-[0.12em] text-[#a9f4e8]">TEMU</p>
            </div>
        </section>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50/90 p-5 shadow-sm">
                <div class="flex items-start gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100 text-red-600">
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

            {{-- FORM UTAMA --}}
            <form action="{{ route('user.reports.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="min-w-0 overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/95 shadow-[0_12px_40px_rgba(36,56,94,0.07)] backdrop-blur-xl">

                @csrf

                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5 sm:px-8">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8m-8 4h8m-8 4h5m-8 5h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base font-extrabold tracking-tight text-[#142b49]">Detail Laporan</h2>
                            <p class="mt-1 text-xs text-slate-500">Isi informasi barang dengan lengkap dan benar</p>
                        </div>
                    </div>

                    <span class="hidden text-[10px] font-bold uppercase tracking-[0.16em] text-slate-400 sm:block">
                        Formulir / 01
                    </span>
                </div>

                <div class="space-y-9 px-6 py-7 sm:px-8 sm:py-9">

                    {{-- BAGIAN 01 --}}
                    <section>
                        <div class="mb-5 flex items-start gap-3">
                            <span class="font-serif text-2xl text-[#8e85ff]">01</span>
                            <div>
                                <h3 class="text-sm font-extrabold text-[#142b49]">Identitas Barang</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Mulai dengan menentukan jenis laporan dan mengenali barang.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-5">

                            {{-- PILIHAN JENIS LAPORAN --}}
                            <div
                                x-data="{
                                    open: false,
                                    selected: @js(old('type', '')),
                                    options: [
                                        { value: 'lost', label: 'Barang Hilang', description: 'Saya kehilangan barang', color: 'text-[#b17b32]', bg: 'bg-[#fff1dc]' },
                                        { value: 'found', label: 'Barang Ditemukan', description: 'Saya menemukan barang', color: 'text-[#287d72]', bg: 'bg-[#dffaf5]' }
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
                                    class="flex min-h-[58px] w-full items-center justify-between rounded-xl border border-slate-200 bg-[#f8f9fd] px-4 text-left transition hover:border-[#8e85ff]/60 hover:bg-white focus:border-[#8e85ff] focus:outline-none focus:ring-4 focus:ring-[#8e85ff]/10"
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
                                            class="flex w-full items-center justify-between rounded-lg px-3 py-3 text-left transition hover:bg-[#f6f7fb]"
                                            :class="{ 'bg-[#f6f7fb]': selected === option.value }"
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
                                            <span x-show="selected === option.value" class="pr-2 text-sm font-bold text-[#514c94]">✓</span>
                                        </button>
                                    </template>
                                </div>

                                <p class="mt-2 text-xs leading-5 text-slate-400">
                                    Pilih apakah kamu kehilangan barang atau menemukan barang milik orang lain.
                                </p>
                            </div>

                            {{-- NAMA BARANG --}}
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
                                    class="w-full rounded-xl border border-slate-200 bg-[#f8f9fd] px-4 py-3.5 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-[#8e85ff]/50 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                                >
                            </div>

                            {{-- KATEGORI --}}
                            <div>
                                <label for="category" class="mb-2 block text-xs font-bold text-slate-700">
                                    Kategori Barang <span class="text-red-500">*</span>
                                </label>
                                <select
                                    id="category"
                                    name="category"
                                    required
                                    class="w-full rounded-xl border border-slate-200 bg-[#f8f9fd] px-4 py-3.5 text-sm text-slate-700 outline-none transition hover:border-[#8e85ff]/50 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                                >
                                    <option value="">Pilih kategori</option>
                                    @foreach (['Elektronik', 'Aksesori', 'Dokumen', 'Kunci', 'Tas', 'Pakaian', 'Lainnya'] as $category)
                                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- DESKRIPSI --}}
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
                                    class="w-full resize-y rounded-xl border border-slate-200 bg-[#f8f9fd] px-4 py-3.5 text-sm leading-6 text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-[#8e85ff]/50 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                                >{{ old('description') }}</textarea>
                                <p class="mt-2 text-xs leading-5 text-slate-400">
                                    Minimal 10 karakter. Deskripsi yang spesifik akan membantu proses pencocokan barang.
                                </p>
                            </div>
                        </div>
                    </section>

                    {{-- BAGIAN 02 --}}
                    <section class="border-t border-slate-100 pt-8">
                        <div class="mb-5 flex items-start gap-3">
                            <span class="font-serif text-2xl text-[#8e85ff]">02</span>
                            <div>
                                <h3 class="text-sm font-extrabold text-[#142b49]">Informasi Kejadian</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Tentukan tempat dan waktu barang hilang atau ditemukan.
                                </p>
                            </div>
                        </div>

                        <div class="space-y-5">
                            {{-- LOKASI --}}
                            <div>
                                <label for="location" class="mb-2 block text-xs font-bold text-slate-700">
                                    Lokasi Kejadian <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[#8e85ff]">
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
                                        class="w-full rounded-xl border border-slate-200 bg-[#f8f9fd] py-3.5 pl-12 pr-4 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 hover:border-[#8e85ff]/50 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                                    >
                                </div>
                                <p class="mt-2 text-xs text-slate-400">
                                    Tuliskan lokasi yang spesifik agar memudahkan proses pencarian.
                                </p>
                            </div>

                            {{-- TANGGAL --}}
                            <div>
                                <label for="incident_date" class="mb-2 block text-xs font-bold text-slate-700">
                                    Tanggal Kejadian <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[#8e85ff]">
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
                                        class="w-full rounded-xl border border-slate-200 bg-[#f8f9fd] py-3.5 pl-12 pr-4 text-sm text-slate-700 outline-none transition hover:border-[#8e85ff]/50 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10"
                                    >
                                </div>
                            </div>
                        </div>
                    </section>

                    {{-- BAGIAN 03 --}}
                    <section class="border-t border-slate-100 pt-8">
                        <div class="mb-5 flex items-start gap-3">
                            <span class="font-serif text-2xl text-[#8e85ff]">03</span>
                            <div>
                                <h3 class="text-sm font-extrabold text-[#142b49]">Dokumentasi Barang</h3>
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

                            <div class="rounded-2xl border border-dashed border-[#8e85ff]/40 bg-gradient-to-br from-[#f7f8ff] to-[#f0fffc] p-5 transition hover:border-[#8e85ff] sm:p-7">
                                <div class="flex flex-col items-center text-center">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 16.5V19a1 1 0 001 1h14a1 1 0 001-1v-2.5M12 15V4m0 0L8 8m4-4l4 4"/>
                                        </svg>
                                    </div>

                                    <p class="mt-4 text-sm font-bold text-[#142b49]">Pilih foto barang</p>
                                    <p class="mt-1 text-xs leading-5 text-slate-400">
                                        Gunakan foto yang jelas dan tidak buram
                                    </p>

                                    <label for="photo" class="mt-4 inline-flex cursor-pointer items-center gap-2 rounded-xl bg-gradient-to-r from-[#514c94] to-[#766bd1] px-5 py-3 text-xs font-bold text-white shadow-lg shadow-[#514c94]/15 transition hover:-translate-y-0.5 hover:shadow-xl focus-within:ring-4 focus-within:ring-[#8e85ff]/20">
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

                            {{-- PRATINJAU FOTO --}}
                            <div id="photo-preview-container" class="mt-5 hidden overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                                <div class="flex items-center justify-between border-b border-slate-100 px-4 py-3">
                                    <div>
                                        <p class="text-xs font-bold text-[#142b49]">Pratinjau Foto</p>
                                        <p id="photo-file-name" class="mt-0.5 max-w-[220px] truncate text-[10px] text-slate-400"></p>
                                    </div>
                                    <span class="rounded-md bg-[#dffaf5] px-2.5 py-1 text-[10px] font-bold text-[#287d72]">Foto dipilih</span>
                                </div>
                                <div class="bg-[#f6f7fb] p-3">
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

                {{-- TOMBOL FORM --}}
                <div class="border-t border-slate-100 bg-gradient-to-r from-[#f8f9fd] to-[#f3f2ff] px-6 py-6 sm:px-8">
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <a href="{{ route('user.dashboard') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-600 transition hover:border-[#8e85ff]/40 hover:bg-[#f8f7ff] hover:text-[#514c94]">
                            Batal
                        </a>

                        <button type="submit"
                                class="group inline-flex items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-[#514c94] to-[#766bd1] px-7 py-3.5 text-sm font-bold text-white shadow-lg shadow-[#514c94]/20 transition hover:-translate-y-0.5 hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#8e85ff]/20">
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

            {{-- SIDEBAR PANDUAN --}}
            <aside class="space-y-5 lg:sticky lg:top-6">

                <div class="relative overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] text-white shadow-xl shadow-[#142b49]/15">
                    <div class="pointer-events-none absolute -right-16 -top-16 h-48 w-48 rounded-full bg-[#8e85ff]/25 blur-3xl"></div>
                    <div class="pointer-events-none absolute -bottom-20 -left-16 h-48 w-48 rounded-full bg-[#62e7d0]/15 blur-3xl"></div>

                    <div class="relative border-b border-white/10 px-6 py-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#a9f4e8]">Panduan Pengguna</p>
                        <h2 class="mt-3 font-serif text-2xl leading-tight">Buat laporan yang<br>berarti.</h2>
                        <p class="mt-3 text-xs leading-6 text-white/65">
                            Ikuti beberapa langkah berikut agar informasi barang mudah dipahami.
                        </p>
                    </div>

                    <div class="relative space-y-0 px-6 py-2">
                        <div class="flex gap-4 border-b border-white/10 py-5">
                            <span class="font-serif text-xl text-[#a9f4e8]">01</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Tentukan jenis laporan</h3>
                                <p class="mt-1 text-xs leading-5 text-white/55">
                                    Pilih barang hilang atau barang ditemukan sesuai kondisi sebenarnya.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 border-b border-white/10 py-5">
                            <span class="font-serif text-xl text-[#a9f4e8]">02</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Jelaskan ciri barang</h3>
                                <p class="mt-1 text-xs leading-5 text-white/55">
                                    Cantumkan merek, warna, bentuk, dan detail yang mudah dikenali.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 border-b border-white/10 py-5">
                            <span class="font-serif text-xl text-[#a9f4e8]">03</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Berikan lokasi dan waktu</h3>
                                <p class="mt-1 text-xs leading-5 text-white/55">
                                    Tuliskan tempat dan tanggal kejadian sejelas mungkin.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4 py-5">
                            <span class="font-serif text-xl text-[#a9f4e8]">04</span>
                            <div>
                                <h3 class="text-sm font-bold text-white">Sertakan foto barang</h3>
                                <p class="mt-1 text-xs leading-5 text-white/55">
                                    Foto wajib disertakan untuk laporan barang ditemukan.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="relative border-t border-white/10 bg-white/[0.04] px-6 py-4">
                        <p class="text-[10px] font-semibold uppercase tracking-[0.17em] text-white/45">
                            Make every report count.
                        </p>
                    </div>
                </div>

                {{-- INFORMASI AKURASI --}}
                <div class="rounded-[1.5rem] border border-[#e8c17b]/30 bg-gradient-to-br from-[#fffaf0] to-[#fff3e4] p-5 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#e8c17b]/25 text-[#9a7135]">
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

                {{-- INFORMASI TEMU --}}
                <div class="rounded-[1.5rem] border border-white/80 bg-white/90 p-5 shadow-[0_8px_30px_rgba(36,56,94,0.05)] backdrop-blur-xl">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 11c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm0 0c-2 2-4 3.895-4 5a4 4 0 108 0c0-1.105-2-3-4-5zm0 10a9 9 0 100-18 9 9 0 000 18z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-[#142b49]">Lingkungan Kampus</h3>
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
