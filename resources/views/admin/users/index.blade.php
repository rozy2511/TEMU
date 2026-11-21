
@extends('layouts.app')

@section('title', 'Manajemen Pengguna | TEMU')

@section('content')
<div class="temu-container py-8 sm:py-12">

    <div class="mb-8">
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 transition hover:text-slate-900">
            <span>&larr;</span>
            Kembali ke Dashboard
        </a>

        <p class="mt-6 text-xs font-semibold uppercase tracking-widest text-slate-500">
            Administrasi
        </p>

        <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
            Manajemen Pengguna
        </h1>

        <p class="mt-3 max-w-2xl text-sm leading-relaxed text-slate-500 sm:text-base">
            Kelola dan pantau akun pengguna yang terdaftar di platform TEMU.
        </p>
    </div>

    {{-- Pencarian --}}
    <section class="temu-card mb-6 p-5 sm:p-6">

        <div class="mb-4">
            <h2 class="font-bold text-slate-900">
                Cari Pengguna
            </h2>
            <p class="mt-1 text-sm text-slate-500">
                Cari berdasarkan nama atau alamat email pengguna.
            </p>
        </div>

        <form method="GET" action="{{ route('admin.users.index') }}"
              class="flex flex-col gap-3 sm:flex-row">

            <div class="flex-1">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Masukkan nama atau email pengguna..."
                    class="temu-input"
                >
            </div>

            <div class="flex flex-col gap-2 sm:flex-row">
                <button type="submit" class="temu-button">
                    Cari Pengguna
                </button>

                <a href="{{ route('admin.users.index') }}"
                   class="temu-button-secondary">
                    Reset
                </a>
            </div>

        </form>
    </section>

    {{-- Daftar Pengguna --}}
    <section class="temu-card overflow-hidden">

        <div class="flex flex-col gap-2 border-b border-slate-100 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6">
            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Data Pengguna
                </h2>
                <p class="mt-1 text-sm text-slate-500">
                    Daftar akun pengguna yang telah terdaftar di TEMU.
                </p>
            </div>

            <span class="w-fit rounded-lg bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600">
                {{ $users->total() }} Pengguna
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[700px] text-left text-sm">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                    <tr>
                        <th class="px-5 py-4 font-semibold">No.</th>
                        <th class="px-5 py-4 font-semibold">Nama Pengguna</th>
                        <th class="px-5 py-4 font-semibold">Email</th>
                        <th class="px-5 py-4 font-semibold">Tanggal Daftar</th>
                        <th class="px-5 py-4 font-semibold">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse ($users as $user)

                        <tr class="transition hover:bg-slate-50/70">

                            <td class="px-5 py-4 text-slate-500">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="px-5 py-4">
                                <p class="font-semibold text-slate-800">
                                    {{ $user->name }}
                                </p>
                            </td>

                            <td class="px-5 py-4 text-slate-600">
                                {{ $user->email }}
                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-slate-500">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <td class="px-5 py-4">
                                <a
                                    href="{{ route('admin.users.show', $user->id) }}"
                                    class="inline-flex whitespace-nowrap rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-700 transition hover:bg-slate-100">
                                    Lihat Detail
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="5" class="px-5 py-14 text-center">

                                <p class="font-semibold text-slate-800">
                                    Pengguna tidak ditemukan.
                                </p>

                                <p class="mt-2 text-sm text-slate-500">
                                    Coba gunakan kata kunci pencarian yang berbeda.
                                </p>

                                @if (request()->filled('search'))
                                    <a href="{{ route('admin.users.index') }}"
                                       class="mt-4 inline-flex text-sm font-semibold text-slate-700 underline underline-offset-4 hover:text-slate-950">
                                        Hapus pencarian
                                    </a>
                                @endif

                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        @if ($users->hasPages())
            <div class="border-t border-slate-100 p-5 sm:p-6">
                {{ $users->links() }}
            </div>
        @endif

    </section>

</div>
@endsection
