
@extends('layouts.app')

@section('title', 'Buat Laporan | TEMU')

@section('content')
<div class="temu-container py-7 sm:py-10">
    <div class="mx-auto max-w-6xl">

        <a href="{{ route('user.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-[#172f4f]">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Beranda
        </a>

        <div class="mb-8 mt-6">
            <div class="mb-3 inline-flex items-center rounded-lg bg-slate-100 px-3 py-1.5 text-xs font-semibold text-[#172f4f]">
                Pelaporan Barang
            </div>

            <h1 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Buat Laporan
            </h1>

            <p class="mt-3 max-w-2xl text-sm leading-6 text-slate-500 sm:text-base">
                Bagikan informasi barang hilang atau ditemukan untuk membantu proses pencarian dan pengembalian barang di lingkungan kampus.
            </p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">
                <div class="flex items-start gap-3">
                    <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 2.57h16.94A2 2 0 0022.18 18L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>

                    <div>
                        <h3 class="text-sm font-bold text-red-800">
                            Terdapat kesalahan pada formulir
                        </h3>

                        <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-3">

            <form action="{{ route('user.reports.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm lg:col-span-2">

                @csrf

                <div class="border-b border-slate-100 px-5 py-5 sm:px-7">
                    <div class="flex items-center gap-3">
                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#172f4f] text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7h8m-8 4h8m-8 4h5m-8 5h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>

                        <div>
                            <h2 class="text-base font-bold text-slate-900">
                                Detail Laporan
                            </h2>
                            <p class="mt-1 text-xs text-slate-500">
                                Lengkapi seluruh informasi yang diperlukan
                            </p>
                        </div>
                    </div>
                </div>

                <div class="px-5 py-6 sm:px-7 sm:py-7">

                    <div class="mb-8">
                        <div class="mb-5">
                            <h3 class="text-sm font-bold text-slate-900">
                                Informasi Barang
                            </h3>
                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Tentukan jenis laporan dan identitas barang.
                            </p>
                        </div>

                        <div class="space-y-5">

                            <div
                                x-data="{
                                    open: false,
                                    selected: @js(old('type', '')),
                                    options: [
                                        { value: 'lost', label: 'Barang Hilang' },
                                        { value: 'found', label: 'Barang Ditemukan' }
                                    ],
                                    get selectedLabel() {
                                        const option = this.options.find(item => item.value === this.selected);
                                        return option ? option.label : 'Pilih jenis laporan';
                                    }
                                }"
                                class="relative"
                            >
                                <label class="temu-label">
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
                                    class="temu-input flex w-full items-center justify-between text-left"
                                >
                                    <span x-text="selectedLabel"
                                          :class="selected ? 'text-slate-800' : 'text-slate-400'"></span>

                                    <svg class="h-5 w-5 text-slate-500"
                                         :class="{ 'rotate-180': open }"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <div
                                    x-show="open"
                                    x-transition
                                    role="listbox"
                                    class="absolute z-30 mt-2 w-full overflow-hidden rounded-xl border border-slate-200 bg-white shadow-lg"
                                >
                                    <template x-for="option in options" :key="option.value">
                                        <button
                                            type="button"
                                            role="option"
                                            :aria-selected="selected === option.value"
                                            @click="selected = option.value; open = false; $dispatch('report-type-changed', option.value)"
                                            class="flex w-full items-center justify-between px-4 py-3 text-left text-sm text-slate-700 hover:bg-slate-50"
                                            :class="{ 'bg-slate-50 font-semibold text-[#172f4f]': selected === option.value }"
                                        >
                                            <span x-text="option.label"></span>
                                            <span x-show="selected === option.value" class="text-[#172f4f]">✓</span>
                                        </button>
                                    </template>
                                </div>

                                <p class="mt-2 text-xs text-slate-400">
                                    Pilih apakah kamu kehilangan barang atau menemukan barang milik orang lain.
                                </p>
                            </div>

                            <div>
                                <label for="item_name" class="temu-label">
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
                                    class="temu-input"
                                >
                            </div>

                            <div>
                                <label for="category" class="temu-label">
                                    Kategori Barang <span class="text-red-500">*</span>
                                </label>

                                <select id="category" name="category" required class="temu-input">
                                    <option value="">Pilih kategori</option>

                                    @foreach (['Elektronik', 'Aksesori', 'Dokumen', 'Kunci', 'Tas', 'Pakaian', 'Lainnya'] as $category)
                                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="description" class="temu-label">
                                    Deskripsi dan Ciri-ciri Barang <span class="text-red-500">*</span>
                                </label>

                                <textarea
                                    id="description"
                                    name="description"
                                    rows="4"
                                    maxlength="3000"
                                    required
                                    placeholder="Jelaskan warna, merek, bentuk, kondisi, atau ciri khusus barang..."
                                    class="temu-input"
                                >{{ old('description') }}</textarea>

                                <p class="mt-2 text-xs leading-5 text-slate-400">
                                    Minimal 10 karakter. Deskripsi yang jelas membantu pencocokan barang.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8 border-t border-slate-100 pt-7">
                        <div class="mb-5">
                            <h3 class="text-sm font-bold text-slate-900">
                                Informasi Kejadian
                            </h3>
                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Berikan informasi lokasi dan waktu kejadian.
                            </p>
                        </div>

                        <div class="space-y-5">
                            <div>
                                <label for="location" class="temu-label">
                                    Lokasi Kejadian <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="location"
                                    name="location"
                                    value="{{ old('location') }}"
                                    placeholder="Contoh: Gedung Kuliah, Perpustakaan, Kantin"
                                    maxlength="255"
                                    required
                                    class="temu-input"
                                >

                                <p class="mt-2 text-xs text-slate-400">
                                    Tuliskan lokasi yang spesifik agar memudahkan proses pencarian.
                                </p>
                            </div>

                            <div>
                                <label for="incident_date" class="temu-label">
                                    Tanggal Kejadian <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="date"
                                    id="incident_date"
                                    name="incident_date"
                                    value="{{ old('incident_date') }}"
                                    max="{{ date('Y-m-d') }}"
                                    required
                                    class="temu-input"
                                >
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-slate-100 pt-7">
                        <div class="mb-5">
                            <h3 class="text-sm font-bold text-slate-900">
                                Foto Barang
                            </h3>
                            <p class="mt-1 text-xs leading-5 text-slate-500">
                                Foto membantu pengguna mengenali barang yang dilaporkan.
                            </p>
                        </div>

                        <div
                            x-data="{ reportType: @js(old('type', '')) }"
                            @report-type-changed.window="reportType = $event.detail"
                        >
                            <label for="photo" class="temu-label">
                                Unggah Foto
                                <span
                                    class="font-normal text-red-500"
                                    x-show="reportType === 'found'"
                                >*</span>
                            </label>

                            <div class="mt-2 rounded-xl border border-dashed border-slate-300 bg-slate-50 p-4 transition hover:border-[#172f4f]">
                                <input
                                    type="file"
                                    id="photo"
                                    name="photo"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    :required="reportType === 'found'"
                                    class="block w-full text-sm text-slate-600 file:mr-3 file:rounded-lg file:border-0 file:bg-[#172f4f] file:px-4 file:py-2.5 file:text-xs file:font-semibold file:text-white hover:file:bg-[#213e63]"
                                >

                                <p
                                    class="mt-3 text-xs leading-5"
                                    :class="reportType === 'found' ? 'text-red-500' : 'text-slate-400'"
                                    x-text="reportType === 'found'
                                        ? 'Foto wajib disertakan untuk barang ditemukan. JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.'
                                        : 'JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.'"
                                ></p>
                            </div>

                            <div id="photo-preview-container" class="mt-4 hidden">
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-xs font-semibold text-slate-600">
                                        Pratinjau Foto
                                    </p>
                                </div>

                                <img
                                    id="photo-preview"
                                    src=""
                                    alt="Pratinjau foto barang"
                                    class="max-h-72 w-full rounded-xl border border-slate-200 bg-slate-50 object-contain"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 bg-slate-50 px-5 py-5 sm:px-7">
                    <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
                        <a href="{{ route('user.dashboard') }}"
                           class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-100">
                            Batal
                        </a>

                        <button type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                            Kirim Laporan
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7-7l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>

                    <p class="mt-4 text-xs leading-relaxed text-slate-400 sm:text-right">
                        Pastikan informasi yang dimasukkan sudah benar sebelum mengirim laporan.
                    </p>
                </div>
            </form>

            <aside class="space-y-5 lg:sticky lg:top-6">

                <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="bg-[#172f4f] px-5 py-5 text-white">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>

                            <div>
                                <h2 class="font-bold">Panduan Laporan</h2>
                                <p class="mt-1 text-xs text-slate-300">
                                    Sebelum mengirim laporan
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-5 p-5">
                        <div class="flex gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-sm font-bold text-[#172f4f]">
                                01
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-slate-800">
                                    Pilih jenis laporan
                                </h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Tentukan apakah barang hilang atau barang ditemukan.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-sm font-bold text-[#172f4f]">
                                02
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-slate-800">
                                    Lengkapi detail barang
                                </h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Sertakan nama, kategori, dan ciri-ciri yang mudah dikenali.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-sm font-bold text-[#172f4f]">
                                03
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-slate-800">
                                    Tentukan lokasi dan tanggal
                                </h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Informasi kejadian membantu proses pencocokan laporan.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-sm font-bold text-[#172f4f]">
                                04
                            </div>

                            <div>
                                <h3 class="text-sm font-semibold text-slate-800">
                                    Tambahkan foto
                                </h3>
                                <p class="mt-1 text-xs leading-5 text-slate-500">
                                    Foto wajib untuk barang ditemukan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                    <div class="flex items-start gap-3">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-[#172f4f]">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 11c0-1.105.895-2 2-2s2 .895 2 2-2 3-4 5c-2-2-4-3.895-4-5a2 2 0 114 0zm0 10a9 9 0 100-18 9 9 0 000 18z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="text-sm font-bold text-slate-800">
                                Tips Pelaporan
                            </h3>

                            <p class="mt-2 text-xs leading-6 text-slate-500">
                                Hindari deskripsi yang terlalu umum. Sebutkan warna, merek, bentuk, atau ciri khas barang agar lebih mudah ditemukan.
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
                return;
            }

            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto maksimal 2 MB.');
                this.value = '';
                previewContainer.classList.add('hidden');
                photoPreview.src = '';
                return;
            }

            const allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!allowedTypes.includes(file.type)) {
                alert('Format foto harus JPG, JPEG, PNG, atau WEBP.');
                this.value = '';
                previewContainer.classList.add('hidden');
                photoPreview.src = '';
                return;
            }

            previewUrl = URL.createObjectURL(file);
            photoPreview.src = previewUrl;
            previewContainer.classList.remove('hidden');
        });
    }
</script>
@endpush
