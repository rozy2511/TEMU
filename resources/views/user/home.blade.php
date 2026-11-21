
@extends('layouts.app')

@section('title', 'Beranda | TEMU')

@section('content')
<main class="temu-container space-y-10 py-8 sm:py-10">

    <section class="relative overflow-hidden rounded-3xl bg-[#172f4f] shadow-xl shadow-slate-900/10">
        <div class="pointer-events-none absolute -right-24 -top-28 h-96 w-96 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute -right-10 -bottom-48 h-96 w-96 rounded-full border border-white/10"></div>
        <div class="pointer-events-none absolute right-1/3 top-0 h-64 w-64 rounded-full bg-blue-400/10 blur-3xl"></div>

        <div class="relative grid items-center gap-10 px-6 py-10 sm:px-10 sm:py-14 lg:grid-cols-[1.3fr_0.7fr] lg:px-14 lg:py-16">
            <div class="max-w-2xl">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-200">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    Campus Lost & Found Platform
                </span>

                <h1 class="mt-7 text-3xl font-bold leading-tight tracking-tight text-white sm:text-4xl lg:text-5xl">
                    Barang Hilang?
                    <span class="mt-1 block text-blue-200">Temukan Kembali Bersama TEMU.</span>
                </h1>

                <p class="mt-5 max-w-xl text-sm leading-7 text-slate-300 sm:text-base">
                    Satu tempat untuk melaporkan barang hilang, menemukan barang yang dicari, dan membantu mengembalikannya kepada pemilik yang tepat.
                </p>

                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('user.reports.create') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-semibold text-[#172f4f] shadow-lg shadow-black/10 transition duration-200 hover:-translate-y-0.5 hover:bg-blue-50">
                        Buat Laporan
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"/>
                        </svg>
                    </a>

                    <a href="#laporan"
                       class="inline-flex items-center justify-center rounded-xl border border-white/20 bg-white/10 px-6 py-3.5 text-sm font-semibold text-white transition duration-200 hover:bg-white/20">
                        Jelajahi Laporan
                    </a>
                </div>
            </div>

            <div class="relative hidden lg:block">
                <div class="rounded-3xl border border-white/20 bg-white/[0.12] p-6 shadow-2xl backdrop-blur-sm">
                    <div class="flex items-center justify-between border-b border-white/15 pb-5">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-blue-100">
                                Cara kerja TEMU
                            </p>
                            <h2 class="mt-1 text-lg font-bold text-white">
                                Temukan dan kembalikan
                            </h2>
                        </div>

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/15 text-white">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M9 12l2 2 4-4m5-3.5A2.5 2.5 0 0117.5 4h-11A2.5 2.5 0 004 6.5v11A2.5 2.5 0 006.5 20h11a2.5 2.5 0 002.5-2.5v-11z"/>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-5 pt-6">
                        <div class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-300/20 text-sm font-bold text-blue-100">
                                01
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Laporkan barang</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-200">
                                    Buat laporan kehilangan atau barang yang ditemukan.
                                </p>
                            </div>
                        </div>

                        <div class="ml-5 h-5 border-l border-dashed border-white/30"></div>

                        <div class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-300/20 text-sm font-bold text-blue-100">
                                02
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Temukan kecocokan</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-200">
                                    Gunakan pencarian dan Smart Item Matching.
                                </p>
                            </div>
                        </div>

                        <div class="ml-5 h-5 border-l border-dashed border-white/30"></div>

                        <div class="flex gap-4">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-300/20 text-sm font-bold text-blue-100">
                                03
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-white">Konfirmasi pengembalian</h3>
                                <p class="mt-1 text-xs leading-5 text-slate-200">
                                    Lakukan verifikasi dan konfirmasi serah terima.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mb-5">
            <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#172f4f]">
                <span class="h-1 w-6 rounded-full bg-[#172f4f]"></span>
                Pencarian
            </div>

            <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                Temukan Barang
            </h2>

            <p class="mt-2 text-sm leading-6 text-slate-500">
                Cari laporan berdasarkan nama barang, jenis laporan, atau kategori.
            </p>
        </div>

        <form id="searchForm"
              action="{{ route('user.dashboard') }}"
              method="GET"
              class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">

            <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-4">

                <div class="lg:col-span-2">
                    <label for="search" class="temu-label">Nama Barang atau Kata Kunci</label>

                    <div class="relative mt-2">
                        <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                        </svg>

                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Contoh: HP, kunci motor, dompet..."
                            class="temu-input pl-12"
                        >
                    </div>
                </div>

                <div>
                    <label for="type" class="temu-label">Jenis Laporan</label>
                    <select id="type" name="type" class="temu-input mt-2">
                        <option value="">Semua Jenis</option>
                        <option value="lost" {{ request('type') === 'lost' ? 'selected' : '' }}>
                            Barang Hilang
                        </option>
                        <option value="found" {{ request('type') === 'found' ? 'selected' : '' }}>
                            Barang Ditemukan
                        </option>
                    </select>
                </div>

                <div>
                    <label for="category" class="temu-label">Kategori Barang</label>
                    <select id="category" name="category" class="temu-input mt-2">
                        <option value="">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-6 flex flex-col gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:items-center">
                <button id="searchButton" type="submit" class="temu-button inline-flex items-center justify-center gap-2">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                    </svg>
                    <span id="searchButtonText">Cari Barang</span>
                </button>

                <a href="{{ route('user.dashboard') }}"
                   class="temu-button-secondary inline-flex items-center justify-center">
                    Reset Filter
                </a>
            </div>
        </form>
    </section>

    <section id="laporan" class="scroll-mt-24">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#172f4f]">
                    <span class="h-1 w-6 rounded-full bg-[#172f4f]"></span>
                    Informasi Komunitas
                </div>

                <h2 id="catalogTitle" class="mt-2 text-2xl font-bold tracking-tight text-slate-900">
                    {{ request()->hasAny(['search', 'type', 'category']) ? 'Hasil Pencarian Barang' : 'Laporan Barang' }}
                </h2>

                <p id="catalogDescription" class="mt-2 text-sm leading-6 text-slate-500">
                    {{ request()->hasAny(['search', 'type', 'category']) ? 'Berikut laporan yang sesuai dengan pencarian kamu.' : 'Jelajahi laporan kehilangan dan penemuan barang dari pengguna TEMU.' }}
                </p>

                @if (request('search'))
                    <p id="searchKeyword" class="mt-2 text-sm font-medium text-[#172f4f]">
                        Kata kunci: "{{ request('search') }}"
                    </p>
                @else
                    <p id="searchKeyword" class="mt-2 hidden text-sm font-medium text-[#172f4f]"></p>
                @endif
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2.5 text-sm text-slate-600 shadow-sm">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                <span>Jumlah hasil:</span>
                <strong id="resultCount" class="font-bold text-slate-900">{{ $reports->total() }}</strong>
            </div>
        </div>

        <div id="reportGrid" class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

            @forelse ($reports as $report)
                <article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-slate-300 hover:shadow-xl hover:shadow-slate-900/5">

                    <div class="relative h-56 overflow-hidden bg-slate-100">
                        @if ($report->photo)
                            <img
                                src="{{ asset('storage/' . $report->photo) }}"
                                alt="Foto {{ $report->item_name }}"
                                loading="lazy"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            >
                        @else
                            <div class="flex h-full flex-col items-center justify-center text-slate-400">
                                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white shadow-sm">
                                    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4-4a2 2 0 012.828 0L16 17m-2-2l1.172-1.172a2 2 0 012.828 0L20 16M5 20h14a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v14a1 1 0 001 1z"/>
                                    </svg>
                                </div>
                                <span class="mt-3 text-xs font-medium">Foto tidak tersedia</span>
                            </div>
                        @endif

                        <div class="absolute left-4 top-4">
                            <span class="inline-flex items-center rounded-lg px-3 py-1.5 text-xs font-semibold shadow-sm {{ $report->type === 'lost' ? 'bg-red-50 text-red-700' : 'bg-emerald-50 text-emerald-700' }}">
                                <span class="mr-2 h-1.5 w-1.5 rounded-full {{ $report->type === 'lost' ? 'bg-red-500' : 'bg-emerald-500' }}"></span>
                                {{ $report->type === 'lost' ? 'Barang Hilang' : 'Barang Ditemukan' }}
                            </span>
                        </div>

                        <div class="absolute bottom-4 right-4">
                            <span class="rounded-lg bg-slate-900/75 px-3 py-1.5 text-xs font-medium text-white backdrop-blur-sm">
                                {{ $report->category }}
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-1 flex-col p-5 sm:p-6">
                        <div class="flex items-center justify-between gap-3">
                            <span class="text-xs font-medium text-slate-400">
                                Dilaporkan {{ $report->created_at->format('d M Y') }}
                            </span>

                            <span class="inline-flex items-center gap-1.5 text-xs font-medium text-emerald-700">
                                <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                Aktif
                            </span>
                        </div>

                        <h3 class="mt-3 text-lg font-bold leading-snug text-slate-900 transition group-hover:text-[#172f4f]">
                            {{ $report->item_name }}
                        </h3>

                        <p class="mt-2 min-h-[3rem] text-sm leading-6 text-slate-500">
                            {{ \Illuminate\Support\Str::limit($report->description, 110) }}
                        </p>

                        <div class="mt-5 space-y-3 border-t border-slate-100 pt-4">
                            <div class="flex items-start gap-3 text-sm text-slate-600">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a2 2 0 01-2.828 0l-4.243-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="leading-5">{{ $report->location }}</span>
                            </div>

                            <div class="flex items-start gap-3 text-sm text-slate-600">
                                <svg class="mt-0.5 h-4 w-4 shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3M4 11h16M5 5h14a1 1 0 01-1 1v13a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1z"/>
                                </svg>
                                <span class="leading-5">{{ $report->incident_date->format('d M Y') }}</span>
                            </div>

                            <div class="flex items-center gap-3 text-sm text-slate-600">
                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-slate-100 text-xs font-bold text-[#172f4f]">
                                    {{ strtoupper(substr($report->user->name, 0, 1)) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="text-[11px] text-slate-400">Dilaporkan oleh</p>
                                    <p class="truncate font-medium text-slate-700">{{ $report->user->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100">
                        <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-4.35-4.35M11 19a8 8 0 110-16 8 8 0 010 16z"/>
                        </svg>
                    </div>

                    <h3 class="mt-5 text-lg font-bold text-slate-900">
                        {{ request()->hasAny(['search', 'type', 'category']) ? 'Barang Tidak Ditemukan' : 'Belum Ada Laporan' }}
                    </h3>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500">
                        @if (request()->hasAny(['search', 'type', 'category']))
                            Tidak ada laporan yang cocok dengan pencarian kamu. Coba gunakan kata kunci atau filter lainnya.
                        @else
                            Belum ada laporan barang yang tersedia. Jadilah pengguna pertama yang membuat laporan di TEMU.
                        @endif
                    </p>

                    <a href="{{ route('user.dashboard') }}"
                       class="mt-6 inline-flex items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                        Tampilkan Semua Laporan
                    </a>
                </div>
            @endforelse

        </div>

        @if ($reports->hasPages())
            <div id="reportPagination" class="mt-8">
                {{ $reports->links() }}
            </div>
        @else
            <div id="reportPagination"></div>
        @endif

    </section>

    <section class="rounded-2xl border border-slate-200 bg-white px-6 py-6 sm:px-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="text-base font-bold text-slate-900">
                    Kehilangan atau menemukan barang?
                </h2>
                <p class="mt-1 text-sm leading-6 text-slate-500">
                    Buat laporan agar pengguna lain dapat membantu menemukan kecocokannya.
                </p>
            </div>

            <a href="{{ route('user.reports.create') }}"
               class="inline-flex shrink-0 items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#213e63]">
                Buat Laporan
                <span class="ml-2">→</span>
            </a>
        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('searchForm');
    const searchButton = document.getElementById('searchButton');
    const searchButtonText = document.getElementById('searchButtonText');

    if (!form) return;

    form.addEventListener('submit', async function (event) {
        event.preventDefault();

        const originalText = searchButtonText.textContent;

        searchButton.disabled = true;
        searchButtonText.textContent = 'Mencari...';

        const params = new URLSearchParams(new FormData(form));
        const url = form.action + '?' + params.toString();

        try {
            const response = await fetch(url, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'text/html'
                }
            });

            if (!response.ok) {
                throw new Error('Pencarian gagal.');
            }

            const html = await response.text();
            const parser = new DOMParser();
            const documentResult = parser.parseFromString(html, 'text/html');

            const newCatalog = documentResult.getElementById('laporan');
            const currentCatalog = document.getElementById('laporan');

            if (!newCatalog || !currentCatalog) {
                throw new Error('Bagian katalog tidak ditemukan.');
            }

            currentCatalog.replaceWith(newCatalog);

            const newUrl = url;
            window.history.pushState({}, '', newUrl);

            const keyword = document.getElementById('searchKeyword');

            if (keyword) {
                const searchValue = document.getElementById('search').value.trim();

                if (searchValue) {
                    keyword.textContent = 'Kata kunci: "' + searchValue + '"';
                    keyword.classList.remove('hidden');
                } else {
                    keyword.textContent = '';
                    keyword.classList.add('hidden');
                }
            }

            document.getElementById('laporan').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

        } catch (error) {
            alert('Pencarian tidak berhasil. Silakan coba kembali.');
            console.error(error);
        } finally {
            searchButton.disabled = false;
            searchButtonText.textContent = originalText;
        }
    });
});
</script>
@endpush
