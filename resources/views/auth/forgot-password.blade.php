
<x-guest-layout>
    <div class="mb-8">
        <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-[#172f4f]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 00-9 0v3.75m-.75 0h10.5c.828 0 1.5.672 1.5 1.5v7.5c0 .828-.672 1.5-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V12c0-.828.672-1.5 1.5-1.5z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Lupa Kata Sandi?
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Jangan khawatir. Masukkan alamat email akun TEMU kamu untuk menerima kode OTP untuk pengaturan ulang kata sandi.
        </p>
    </div>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" value="Alamat Email" />

            <x-text-input
                id="email"
                class="mt-2 block w-full rounded-xl border-slate-200 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="email"
                placeholder="nama@email.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <button
            type="submit"
            class="flex w-full items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
            Kirim Kode OTP
        </button>
    </form>

    <div class="mt-7 border-t border-slate-100 pt-6 text-center">
        <a
            href="{{ route('login') }}"
            class="inline-flex items-center gap-2 text-sm font-semibold text-[#172f4f] transition hover:text-slate-600">
            <span aria-hidden="true">&larr;</span>
            Kembali ke halaman login
        </a>
    </div>
</x-guest-layout>
