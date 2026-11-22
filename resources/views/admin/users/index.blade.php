
@extends('layouts.app')

@section('title', 'Manajemen Pengguna | TEMU')

@section('content')
<div class="temu-container space-y-7 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#172f4f]">
            <span class="text-lg">&larr;</span>
            Kembali ke Dashboard
        </a>

        <div class="relative mt-6 overflow-hidden rounded-3xl bg-[#172f4f] px-6 py-8 text-white shadow-sm sm:px-8 sm:py-9">
            <div class="absolute -right-16 -top-24 h-64 w-64 rounded-full border-[35px] border-white/[0.04]"></div>
            <div class="absolute -bottom-28 right-32 h-56 w-56 rounded-full bg-[#d5a34a]/10 blur-3xl"></div>

            <div class="relative flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.22em] text-[#e8c17b]">
                        Administrasi / Pengguna
                    </p>
                    <h1 class="mt-3 text-3xl font-bold tracking-tight sm:text-4xl">
                        Manajemen Pengguna
                    </h1>
                    <p class="mt-3 max-w-xl text-sm leading-6 text-slate-300">
                        Kelola dan pantau akun pengguna yang terdaftar di platform TEMU.
                    </p>
                </div>

                <div class="w-fit rounded-xl border border-white/15 bg-white/10 px-4 py-3 backdrop-blur-sm">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-300">
                        Total Pengguna
                    </p>
                    <p class="mt-1 text-2xl font-bold text-[#e8c17b]">
                        {{ $users->total() }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- PENCARIAN --}}
    <section class="rounded-3xl border border-slate-200/80 bg-white p-5 shadow-sm sm:p-6">
        <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-[#172f4f]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <circle cx="11" cy="11" r="7"/>
                    <path stroke-linecap="round" d="m16 16 4 4"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-bold text-[#172f4f]">Cari Pengguna</h2>
                <p class="mt-0.5 text-xs text-slate-500">
                    Temukan akun berdasarkan nama atau alamat email.
                </p>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.users.index') }}"
              class="mt-6 flex flex-col gap-3 sm:flex-row">

            <div class="relative flex-1">
                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                     fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                    <circle cx="11" cy="11" r="7"/>
                    <path stroke-linecap="round" d="m16 16 4 4"/>
                </svg>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Masukkan nama atau email pengguna..."
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 py-3 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#172f4f] focus:bg-white focus:ring-2 focus:ring-[#172f4f]/10"
                >
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#244768] sm:flex-none">
                    Cari Pengguna
                </button>

                <a href="{{ route('admin.users.index') }}"
                   class="inline-flex flex-1 items-center justify-center rounded-xl border border-slate-200 px-5 py-3 text-sm font-semibold text-slate-600 transition hover:bg-slate-50 sm:flex-none">
                    Reset
                </a>
            </div>
        </form>
    </section>

    {{-- DAFTAR PENGGUNA --}}
    <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

        <div class="flex flex-col gap-3 border-b border-slate-100 px-5 py-5 sm:flex-row sm:items-center sm:justify-between sm:px-7">
            <div>
                <h2 class="text-lg font-bold text-[#172f4f]">Data Pengguna</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Daftar akun pengguna yang telah terdaftar di TEMU.
                </p>
            </div>

            <div class="w-fit rounded-xl bg-[#172f4f]/[0.06] px-4 py-2">
                <p class="text-xs font-bold text-[#172f4f]">
                    {{ $users->total() }} Pengguna Terdaftar
                </p>
            </div>
        </div>

        {{-- TABEL DESKTOP --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead class="bg-slate-50">
                    <tr class="text-[10px] font-bold uppercase tracking-[0.15em] text-slate-400">
                        <th class="px-6 py-4">No.</th>
                        <th class="px-6 py-4">Nama Pengguna</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Tanggal Daftar</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($users as $user)
                        <tr class="transition hover:bg-slate-50/70">
                            <td class="px-6 py-5 text-slate-400">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#172f4f]/[0.07] text-sm font-bold text-[#172f4f]">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <p class="font-bold text-slate-800">
                                        {{ $user->name }}
                                    </p>
                                </div>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                {{ $user->email }}
                            </td>

                            <td class="whitespace-nowrap px-6 py-5 text-slate-500">
                                {{ $user->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-5">
                                <a href="{{ route('admin.users.show', $user->id) }}"
                                   class="inline-flex items-center gap-2 rounded-xl border border-[#172f4f]/15 px-3.5 py-2 text-xs font-bold text-[#172f4f] transition hover:border-[#172f4f] hover:bg-[#172f4f] hover:text-white">
                                    Lihat Detail
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <circle cx="11" cy="8" r="4"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-2a7 7 0 0114 0v2M19 8v6m3-3h-6"/>
                                    </svg>
                                </div>

                                <p class="mt-4 text-sm font-bold text-slate-700">
                                    Pengguna Tidak Ditemukan
                                </p>
                                <p class="mt-1 text-xs text-slate-400">
                                    Coba gunakan kata kunci pencarian yang berbeda.
                                </p>

                                @if (request()->filled('search'))
                                    <a href="{{ route('admin.users.index') }}"
                                       class="mt-4 inline-flex text-xs font-bold text-[#172f4f] underline underline-offset-4 hover:text-[#d5a34a]">
                                        Hapus pencarian
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- KARTU MOBILE --}}
        <div class="space-y-3 p-4 md:hidden">
            @forelse ($users as $user)
                <article class="rounded-2xl border border-slate-100 bg-slate-50/70 p-4">
                    <div class="flex items-start gap-3">
                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#172f4f]/[0.08] font-bold text-[#172f4f]">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="break-words text-sm font-bold text-slate-800">
                                {{ $user->name }}
                            </p>
                            <p class="mt-1 break-all text-xs text-slate-500">
                                {{ $user->email }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-4 flex items-center justify-between gap-3 border-t border-slate-200/70 pt-3">
                        <div>
                            <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                Tanggal Daftar
                            </p>
                            <p class="mt-1 text-xs font-semibold text-slate-600">
                                {{ $user->created_at->format('d M Y') }}
                            </p>
                        </div>

                        <a href="{{ route('admin.users.show', $user->id) }}"
                           class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-[#172f4f] px-3.5 py-2.5 text-xs font-bold text-white transition hover:bg-[#244768]">
                            Lihat Detail
                            <span>&rarr;</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="py-10 text-center">
                    <p class="text-sm font-bold text-slate-700">
                        Pengguna Tidak Ditemukan
                    </p>
                    <p class="mt-2 text-xs text-slate-400">
                        Coba gunakan kata kunci pencarian yang berbeda.
                    </p>

                    @if (request()->filled('search'))
                        <a href="{{ route('admin.users.index') }}"
                           class="mt-4 inline-flex text-xs font-bold text-[#172f4f] underline underline-offset-4">
                            Hapus pencarian
                        </a>
                    @endif
                </div>
            @endforelse
        </div>

        {{-- PAGINATION --}}
        @if ($users->hasPages())
            <div class="border-t border-slate-100 px-5 py-5 sm:px-7">
                {{ $users->links() }}
            </div>
        @endif
    </section>

</div>
@endsection
