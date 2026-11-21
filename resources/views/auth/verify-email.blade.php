
<x-guest-layout>
    <div class="mb-8">
        <div class="mb-5 flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-[#172f4f]">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                    d="M3 8l9 6 9-6M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
            Verifikasi Email
        </h2>

        <p class="mt-2 text-sm leading-6 text-slate-500">
            Terima kasih telah mendaftar di TEMU. Sebelum melanjutkan, silakan verifikasi alamat email melalui tautan yang telah kami kirimkan.
        </p>

        <p class="mt-3 text-sm leading-6 text-slate-500">
            Jika belum menerima email, kamu dapat meminta pengiriman tautan verifikasi baru.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm leading-6 text-emerald-700">
            Tautan verifikasi baru berhasil dikirim ke alamat email yang kamu daftarkan.
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button
                type="submit"
                class="flex w-full items-center justify-center rounded-xl bg-[#172f4f] px-5 py-3.5 text-sm font-semibold text-white shadow-sm transition duration-200 hover:bg-[#213e63] focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3.5 text-sm font-semibold text-slate-600 transition duration-200 hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-300 focus:ring-offset-2">
                Keluar dari Akun
            </button>
        </form>
    </div>
</x-guest-layout>
