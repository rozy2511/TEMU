
<x-guest-layout>
    <div class="mb-6">
        <p class="mb-2 text-xs font-bold uppercase tracking-[0.16em] text-[#496783]">
            Akun TEMU
        </p>

        <h2 class="text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">
            Selamat Datang
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Masuk ke akunmu untuk mencari atau mengembalikan barang.
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    @if ($errors->any())
        <div class="mb-4 rounded-xl border border-red-200 bg-red-50 p-3">
            <div class="flex items-start gap-3">
                <svg class="mt-0.5 h-5 w-5 shrink-0 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v4m0 4h.01M10.29 3.86l-7.18 12.43A2 2 0 004.84 19h14.32a2 2 0 001.73-2.71L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>

                <div>
                    <p class="text-sm font-semibold text-red-800">Login belum berhasil</p>
                    <p class="mt-1 text-xs leading-5 text-red-700">
                        Periksa kembali informasi akun yang kamu masukkan.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-slate-700">
                Alamat Email
            </label>

            <div class="relative mt-1.5">
                <svg class="pointer-events-none absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
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
                    class="block w-full rounded-xl border {{ $errors->has('email') ? 'border-red-300 bg-red-50 focus:border-red-500 focus:ring-red-100' : 'border-slate-200 bg-slate-50 focus:border-[#172f4f] focus:bg-white focus:ring-[#172f4f]/5' }} py-3 pl-11 pr-4 text-sm text-slate-800 placeholder:text-slate-400 transition focus:outline-none focus:ring-4"
                >
            </div>

            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
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

            <div class="relative mt-1.5">
                <svg class="pointer-events-none absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400"
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
                    class="block w-full rounded-xl border {{ $errors->has('password') ? 'border-red-300 bg-red-50 focus:border-red-500 focus:ring-red-100' : 'border-slate-200 bg-slate-50 focus:border-[#172f4f] focus:bg-white focus:ring-[#172f4f]/5' }} py-3 pl-11 pr-20 text-sm text-slate-800 placeholder:text-slate-400 transition focus:outline-none focus:ring-4"
                >

                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    :aria-pressed="showPassword"
                    :aria-label="showPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'"
                    class="absolute inset-y-0 right-3 flex items-center text-xs font-semibold text-slate-500 transition hover:text-[#172f4f]">
                    <span x-text="showPassword ? 'Sembunyikan' : 'Lihat'"></span>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
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
            class="group flex w-full items-center justify-center gap-2 rounded-xl bg-[#172f4f] px-5 py-3 text-sm font-semibold text-white shadow-md shadow-[#172f4f]/15 transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-4 focus:ring-slate-200 active:scale-[0.99]">

            <span>Masuk ke TEMU</span>

            <svg class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1"
                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 12h14m-7-7l7 7-7 7"/>
            </svg>
        </button>
    </form>

    <div class="mt-6 border-t border-slate-100 pt-5 text-center">
        <p class="text-sm text-slate-500">
            Belum memiliki akun?
            <a href="{{ route('register') }}"
               class="ml-1 font-bold text-[#172f4f] transition hover:text-blue-700">
                Daftar sekarang
            </a>
        </p>
    </div>

    <div class="mt-4 flex items-center justify-center gap-2 text-xs text-slate-400">
        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                  d="M12 3l8 4v5c0 5-3.5 8-8 9-4.5-1-8-4-8-9V7l8-4zm-3 9l2 2 4-4"/>
        </svg>
        <span>Akses akun yang aman bersama TEMU</span>
    </div>
</x-guest-layout>
