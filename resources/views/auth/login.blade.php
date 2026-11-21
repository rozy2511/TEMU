
<x-guest-layout>
    <div class="mb-8">
        <div class="mb-5 flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#172f4f] text-white shadow-lg shadow-[#172f4f]/15">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                          d="M4 5.5A2.5 2.5 0 016.5 3H20v16H6.5A2.5 2.5 0 014 16.5v-11zM4 16h16M8 7h8M8 10h6"/>
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold tracking-tight text-[#172f4f]">TEMU</h1>
                <p class="text-xs text-slate-500">Platform Lost & Found</p>
            </div>
        </div>

        <h2 class="text-3xl font-bold tracking-tight text-slate-900">
            Selamat Datang
        </h2>

        <p class="mt-3 text-sm leading-6 text-slate-500">
            Masuk ke akun TEMU dan lanjutkan langkahmu untuk menemukan atau mengembalikan barang.
        </p>
    </div>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    @if ($errors->any())
        <div class="mb-5 rounded-xl border border-red-200 bg-red-50 p-4">
            <div class="flex gap-3">
                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-red-100 text-red-600">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 9v4m0 4h.01M10.29 3.86l-7.18 12.43A2 2 0 004.84 19h14.32a2 2 0 001.73-2.71L13.71 3.86a2 2 0 00-3.42 0z"/>
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-semibold text-red-800">
                        Login belum berhasil
                    </p>
                    <p class="mt-1 text-sm leading-5 text-red-700">
                        Periksa kembali informasi akun yang kamu masukkan.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700">
                Alamat Email
            </label>

            <div class="relative mt-2">
                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                          d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                </svg>

                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@email.com"
                    class="block w-full rounded-xl border {{ $errors->has('email') ? 'border-red-300 bg-red-50 focus:border-red-500 focus:ring-red-100' : 'border-slate-200 bg-slate-50/50 focus:border-[#172f4f] focus:bg-white focus:ring-[#172f4f]/5' }} py-3.5 pl-12 pr-4 text-sm text-slate-800 placeholder:text-slate-400 transition duration-200 focus:outline-none focus:ring-4"
                >
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div x-data="{ showPassword: false }">
            <div class="flex items-center justify-between gap-3">
                <label for="password" class="block text-sm font-semibold text-slate-700">
                    Kata Sandi
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                       class="text-xs font-semibold text-[#172f4f] transition hover:text-blue-700">
                        Lupa kata sandi?
                    </a>
                @endif
            </div>

            <div class="relative mt-2">
                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                          d="M7 10V7a5 5 0 0110 0v3m-12 0h14a1 1 0 011 1v9a1 1 0 01-1 1H5a1 1 0 01-1-1v-9a1 1 0 011-1zm7 4v3"/>
                </svg>

                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Masukkan kata sandi"
                    class="block w-full rounded-xl border {{ $errors->has('password') ? 'border-red-300 bg-red-50 focus:border-red-500 focus:ring-red-100' : 'border-slate-200 bg-slate-50/50 focus:border-[#172f4f] focus:bg-white focus:ring-[#172f4f]/5' }} py-3.5 pl-12 pr-24 text-sm text-slate-800 placeholder:text-slate-400 transition duration-200 focus:outline-none focus:ring-4"
                >

                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    :aria-pressed="showPassword"
                    :aria-label="showPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'"
                    class="absolute inset-y-0 right-4 inline-flex items-center text-xs font-semibold text-slate-500 transition hover:text-[#172f4f]">

                    <span x-text="showPassword ? 'Sembunyikan' : 'Lihat'"></span>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center">
            <input
                id="remember_me"
                type="checkbox"
                name="remember"
                @checked(old('remember'))
                class="h-4 w-4 rounded border-slate-300 text-[#172f4f] shadow-sm focus:ring-2 focus:ring-[#172f4f] focus:ring-offset-1"
            >

            <label for="remember_me" class="ml-2 cursor-pointer text-sm text-slate-600">
                Ingat saya
            </label>
        </div>

        <button
            type="submit"
            class="group flex w-full items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-md shadow-[#172f4f]/15 transition duration-300 hover:-translate-y-0.5 hover:bg-[#213e63] hover:shadow-lg hover:shadow-[#172f4f]/20 focus:outline-none focus:ring-4 focus:ring-slate-200 active:translate-y-0">

            <span>Masuk ke TEMU</span>

            <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 12h14m-7-7l7 7-7 7"/>
            </svg>
        </button>
    </form>

    <div class="mt-8 border-t border-slate-100 pt-6">
        <div class="text-center">
            <p class="text-sm text-slate-500">
                Belum memiliki akun?
            </p>

            <a
                href="{{ route('register') }}"
                class="mt-2 inline-flex items-center gap-1 text-sm font-bold text-[#172f4f] transition hover:text-blue-700">
                Daftar sekarang
                <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 12h14m-7-7l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-center gap-2 text-xs text-slate-400">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                  d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4zm-3 9l2 2 4-4"/>
        </svg>
        <span>Akses akun yang aman bersama TEMU</span>
    </div>
</x-guest-layout>
