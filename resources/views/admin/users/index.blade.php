
@extends('layouts.app')

@section('title', 'Manajemen Pengguna | TEMU')

@section('content')
<div class="temu-container space-y-8 py-8 sm:py-10">

    {{-- HEADER --}}
    <section>
        <a href="{{ route('admin.dashboard') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-[#635bdb]">
            <span>&larr;</span>
            Kembali ke Dashboard
        </a>

        <div class="aurora-panel relative mt-6 overflow-hidden rounded-[2rem] border border-white/70 bg-gradient-to-br from-[#142b49] via-[#263d68] to-[#514c94] px-6 py-8 text-white shadow-xl sm:px-9 sm:py-10">
            <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-[#8e85ff]/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-[#62e7d0]/20 blur-3xl"></div>
            <div class="pointer-events-none absolute right-20 top-20 h-40 w-40 rounded-full bg-[#f4b6d2]/20 blur-3xl"></div>

            <div class="relative flex flex-col gap-7 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 py-1.5 text-xs font-semibold text-[#a9f4e8] backdrop-blur-md">
                        <span class="h-2 w-2 rounded-full bg-[#62e7d0]"></span>
                        Administrasi Pengguna
                    </div>

                    <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
                        Manajemen Pengguna
                    </h1>

                    <p class="mt-3 max-w-xl text-sm leading-7 text-white/70">
                        Kelola, telusuri, dan pantau akun pengguna yang terdaftar pada platform TEMU.
                    </p>
                </div>

                <div class="group relative overflow-hidden rounded-2xl border border-white/15 bg-white/10 px-5 py-4 backdrop-blur-xl transition hover:bg-white/15">
                    <div class="absolute -right-6 -top-6 h-20 w-20 rounded-full bg-[#62e7d0]/20 blur-2xl"></div>
                    <div class="relative">
                        <p class="text-xs font-semibold tracking-wide text-white/60">
                            Total Pengguna
                        </p>
                        <p class="mt-1 text-3xl font-extrabold text-[#a9f4e8]">
                            {{ $users->total() }}
                        </p>
                        <p class="mt-1 text-xs text-white/50">
                            Akun terdaftar
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PENCARIAN --}}
    <section class="rounded-[1.75rem] border border-white/80 bg-white/85 p-5 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl sm:p-7">
        <div class="flex items-center gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-[#514c94]">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <circle cx="11" cy="11" r="7"/>
                    <path stroke-linecap="round" d="m16 16 4 4"/>
                </svg>
            </div>

            <div>
                <h2 class="text-base font-bold text-[#142b49]">
                    Cari Pengguna
                </h2>
                <p class="mt-1 text-xs leading-5 text-slate-500">
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
                    class="w-full rounded-2xl border border-slate-200/80 bg-[#f6f7fb] py-3.5 pl-11 pr-4 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-[#8e85ff] focus:bg-white focus:ring-4 focus:ring-[#8e85ff]/10">
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="inline-flex flex-1 items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#514c94] to-[#8077e8] px-5 py-3.5 text-sm font-bold text-white shadow-md shadow-[#514c94]/15 transition hover:-translate-y-0.5 hover:shadow-lg sm:flex-none">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="7"/>
                        <path stroke-linecap="round" d="m16 16 4 4"/>
                    </svg>
                    Cari
                </button>

                <a href="{{ route('admin.users.index') }}"
                   class="inline-flex flex-1 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 py-3.5 text-sm font-semibold text-slate-600 transition hover:bg-[#f6f7fb] sm:flex-none">
                    Reset
                </a>
            </div>
        </form>
    </section>

    {{-- DAFTAR PENGGUNA --}}
    <section class="overflow-hidden rounded-[1.75rem] border border-white/80 bg-white/90 shadow-[0_8px_35px_rgba(36,56,94,0.06)] backdrop-blur-xl">

        <div class="flex flex-col gap-4 border-b border-slate-100 px-5 py-6 sm:flex-row sm:items-center sm:justify-between sm:px-7">
            <div>
                <div class="flex items-center gap-2">
                    <span class="h-2.5 w-2.5 rounded-full bg-gradient-to-r from-[#62e7d0] to-[#8e85ff]"></span>
                    <h2 class="text-lg font-bold text-[#142b49]">
                        Data Pengguna
                    </h2>
                </div>
                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Daftar akun pengguna yang telah terdaftar di TEMU.
                </p>
            </div>

            <div class="inline-flex w-fit items-center gap-2 rounded-2xl bg-gradient-to-r from-[#e4faf5] to-[#eeeaff] px-4 py-2.5">
                <svg class="h-4 w-4 text-[#514c94]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2m16-11a4 4 0 100-8 4 4 0 000 8zM8 11a4 4 0 100-8 4 4 0 000 8z"/>
                </svg>
                <span class="text-xs font-bold text-[#514c94]">
                    {{ $users->total() }} Pengguna
                </span>
            </div>
        </div>

        {{-- TABEL DESKTOP --}}
        <div class="hidden overflow-x-auto md:block">
            <table class="w-full min-w-[700px] text-left text-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-[#f5f7fc] to-[#f0efff] text-[10px] font-bold uppercase tracking-[0.15em] text-slate-500">
                        <th class="px-6 py-4">No.</th>
                        <th class="px-6 py-4">Nama Pengguna</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Tanggal Daftar</th>
                        <th class="px-6 py-4">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse ($users as $user)
                        <tr class="transition duration-200 hover:bg-gradient-to-r hover:from-[#f5fffc] hover:to-[#f8f6ff]">
                            <td class="px-6 py-5 text-slate-400">
                                {{ $users->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] text-sm font-extrabold text-[#514c94] shadow-sm">
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
                                   class="inline-flex items-center gap-2 rounded-xl border border-[#8e85ff]/20 bg-[#f3f1ff] px-3.5 py-2.5 text-xs font-bold text-[#514c94] transition hover:-translate-y-0.5 hover:border-[#8e85ff]/40 hover:bg-gradient-to-r hover:from-[#514c94] hover:to-[#8077e8] hover:text-white hover:shadow-md">
                                    Lihat Detail
                                    <span>&rarr;</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <circle cx="11" cy="8" r="4"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-2a7 7 0 0114 0v2M19 8v6m3-3h-6"/>
                                    </svg>
                                </div>

                                <p class="mt-4 text-sm font-bold text-slate-700">
                                    Pengguna Tidak Ditemukan
                                </p>
                                <p class="mt-2 text-xs text-slate-400">
                                    Coba gunakan kata kunci pencarian yang berbeda.
                                </p>

                                @if (request()->filled('search'))
                                    <a href="{{ route('admin.users.index') }}"
                                       class="mt-4 inline-flex text-xs font-bold text-[#514c94] underline underline-offset-4 hover:text-[#8077e8]">
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
                <article class="group rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f7f8fc] p-4 transition duration-200 hover:-translate-y-0.5 hover:shadow-md">
                    <div class="flex items-start gap-3">
                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#dffaf5] to-[#e9e5ff] font-extrabold text-[#514c94] shadow-sm">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="break-words text-sm font-bold text-slate-800">
                                {{ $user->name }}
                            </p>
                            <p class="mt-1 break-all text-xs leading-5 text-slate-500">
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
                           class="inline-flex shrink-0 items-center gap-2 rounded-xl bg-gradient-to-r from-[#514c94] to-[#8077e8] px-3.5 py-2.5 text-xs font-bold text-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">
                            Lihat Detail
                            <span>&rarr;</span>
                        </a>
                    </div>
                </article>
            @empty
                <div class="py-10 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#e4faf5] to-[#eeeaff] text-[#514c94]">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <circle cx="11" cy="8" r="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 21v-2a7 7 0 0114 0v2M19 8v6m3-3h-6"/>
                        </svg>
                    </div>

                    <p class="mt-4 text-sm font-bold text-slate-700">
                        Pengguna Tidak Ditemukan
                    </p>
                    <p class="mt-2 text-xs text-slate-400">
                        Coba gunakan kata kunci pencarian yang berbeda.
                    </p>

                    @if (request()->filled('search'))
                        <a href="{{ route('admin.users.index') }}"
                           class="mt-4 inline-flex text-xs font-bold text-[#514c94] underline underline-offset-4">
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
