
<x-guest-layout>
    <div class="mb-8">
        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-[#172f4f]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 00-9 0v3.75m-.75 0h10.5c.828 0 1.5.672 1.5 1.5v7.5c0 .828-.672 1.5-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V12c0-.828.672-1.5 1.5-1.5z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Konfirmasi Kata Sandi
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Halaman ini merupakan area yang dilindungi. Silakan konfirmasi kata sandi akun sebelum melanjutkan.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
        @csrf

        <div x-data="{ showPassword: false }">
            <x-input-label for="password" value="Kata Sandi" />

            <div class="relative mt-2">
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    name="password"
                    required
                    autofocus
                    autocomplete="current-password"
                    placeholder="Masukkan kata sandi"
                    class="block w-full rounded-xl border border-slate-200 px-4 py-3 pr-24 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200"
                >

                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    :aria-pressed="showPassword"
                    :aria-label="showPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'"
                    class="absolute inset-y-0 right-4 text-xs font-semibold text-slate-500 transition hover:text-slate-900">
                    <span x-text="showPassword ? 'Sembunyikan' : 'Lihat'"></span>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="flex w-full items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
            Konfirmasi dan Lanjutkan
        </button>
    </form>
</x-guest-layout>
