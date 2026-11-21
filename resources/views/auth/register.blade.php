
<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Buat Akun TEMU
        </h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">
            Daftarkan diri untuk mulai menggunakan platform Lost & Found kampus.
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="name" value="Nama Lengkap" />

            <x-text-input
                id="name"
                class="mt-2 block w-full rounded-xl border-slate-200 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
                placeholder="Masukkan nama lengkap"
            />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="email" value="Alamat Email" />

            <x-text-input
                id="email"
                class="mt-2 block w-full rounded-xl border-slate-200 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
                placeholder="nama@email.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div x-data="{ showPassword: false }">
            <x-input-label for="password" value="Kata Sandi" />

            <div class="relative mt-2">
                <input
                    id="password"
                    :type="showPassword ? 'text' : 'password'"
                    name="password"
                    required
                    autocomplete="new-password"
                    placeholder="Buat kata sandi"
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

        <div x-data="{ showPassword: false }">
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />

            <div class="relative mt-2">
                <input
                    id="password_confirmation"
                    :type="showPassword ? 'text' : 'password'"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                    placeholder="Masukkan ulang kata sandi"
                    class="block w-full rounded-xl border border-slate-200 px-4 py-3 pr-24 text-sm text-slate-800 placeholder:text-slate-400 transition focus:border-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-200"
                >

                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    :aria-pressed="showPassword"
                    :aria-label="showPassword ? 'Sembunyikan konfirmasi kata sandi' : 'Tampilkan konfirmasi kata sandi'"
                    class="absolute inset-y-0 right-4 text-xs font-semibold text-slate-500 transition hover:text-slate-900">
                    <span x-text="showPassword ? 'Sembunyikan' : 'Lihat'"></span>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="flex w-full items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
            Daftar Akun
        </button>
    </form>

    <div class="mt-7 border-t border-slate-100 pt-6 text-center">
        <p class="text-sm text-slate-500">
            Sudah memiliki akun?
            <a
                href="{{ route('login') }}"
                class="font-semibold text-[#172f4f] transition hover:text-slate-600">
                Masuk sekarang
            </a>
        </p>
    </div>
</x-guest-layout>
