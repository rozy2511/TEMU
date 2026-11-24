<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">Verifikasi Kode OTP</h2>
        <p class="mt-2 text-sm leading-6 text-slate-500">Masukkan kode OTP yang dikirim ke email Anda.</p>
    </div>

    <x-auth-session-status class="mb-5" :status="session('status')" />

    <form method="POST" action="{{ route('password.otp.verify') }}" class="space-y-5">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <div>
            <x-input-label for="otp" value="Kode OTP" />
        <div class="mt-2 flex justify-center gap-3">
            @for ($i = 0; $i < 6; $i++)
                <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]" class="otp-digit h-12 w-10 border-0 border-b-2 border-slate-300 bg-transparent text-center text-2xl font-semibold text-slate-800 focus:border-[#172f4f] focus:ring-0" />
            @endfor
        </div>
        <input type="hidden" name="otp" id="otp" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <button type="submit" class="flex w-full items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
            Verifikasi
        </button>
    </form>

    <script>
        const digits = document.querySelectorAll('.otp-digit');
        const hidden = document.getElementById('otp');
        digits.forEach((d, i) => {
            d.addEventListener('input', () => {
                d.value = d.value.replace(/[^0-9]/g, '').slice(0,1);
                if (d.value && i < digits.length - 1) digits[i+1].focus();
                hidden.value = Array.from(digits).map(x => x.value).join('');
            });
            d.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !d.value && i > 0) digits[i-1].focus();
            });
        });
    </script>

    <div class="mt-7 border-t border-slate-100 pt-6 text-center">
        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-[#172f4f] transition hover:text-slate-600">
            <span aria-hidden="true">&larr;</span>
            Kembali ke halaman login
        </a>
    </div>
</x-guest-layout>
