<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Reset Kata Sandi</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Masukkan kata sandi baru Anda.</p>
    </div>

    <form method="POST" action="{{ route('password.otp.reset') }}" class="space-y-5">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="hidden" name="otp" value="{{ $otp }}">

        <div>
            <x-input-label for="password" value="Kata Sandi Baru" />
            <x-text-input id="password" class="mt-2 block w-full rounded-xl border-slate-200 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-slate-500 focus:ring-2 focus:ring-slate-200" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Kata Sandi" />
            <x-text-input id="password_confirmation" class="mt-2 block w-full rounded-xl border-slate-200 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 focus:border-slate-500 focus:ring-2 focus:ring-slate-200" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
        </div>

        <button type="submit" class="flex w-full items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
            Reset Kata Sandi
        </button>
    </form>

    <div class="mt-7 border-t border-slate-100 pt-6 text-center">
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#172f4f] transition hover:text-slate-600">
            <span aria-hidden="true">&larr;</span>
            Kembali ke halaman login
        </a>
    </div>
</x-guest-layout>
