
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User | TEMU</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">

    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-900">TEMU</h1>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="px-4 py-2 rounded-lg border border-slate-300 text-slate-600 hover:bg-slate-100">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-6 py-12">

        <div class="mb-10">
            <p class="text-sm font-medium text-blue-700">USER DASHBOARD</p>
            <h2 class="text-3xl font-bold text-slate-900 mt-2">
                Selamat datang, {{ Auth::user()->name }}.
            </h2>
            <p class="text-slate-500 mt-2">
                Temukan kembali barang yang hilang atau bantu orang lain menemukan barangnya.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-blue-900 font-bold text-xl">
                    +
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-5">
                    Buat Laporan
                </h3>

                <p class="text-slate-500 mt-2 leading-relaxed">
                    Laporkan barang yang hilang atau barang yang kamu temukan di lingkungan kampus.
                </p>

                <a href="{{ route('user.reports.create') }}"
                   class="inline-block mt-6 px-5 py-3 rounded-lg bg-blue-900 text-white font-semibold hover:bg-blue-800">
                    Buat Laporan
                </a>
            </div>

            <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">
                <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-slate-700 font-bold text-xl">
                    ≡
                </div>

                <h3 class="text-xl font-bold text-slate-900 mt-5">
                    Laporan Saya
                </h3>

                <p class="text-slate-500 mt-2 leading-relaxed">
                    Lihat dan pantau laporan barang hilang maupun ditemukan yang sudah kamu buat.
                </p>

                <a href="{{ route('user.reports.index') }}"
                   class="inline-block mt-6 px-5 py-3 rounded-lg border border-blue-900 text-blue-900 font-semibold hover:bg-blue-50">
                    Lihat Laporan
                </a>
            </div>

        </div>

        <div class="mt-10 rounded-2xl bg-blue-900 p-8 text-white">
            <h3 class="text-xl font-bold">Tentang TEMU</h3>
            <p class="mt-2 text-blue-100 leading-relaxed">
                TEMU merupakan platform Lost & Found yang membantu civitas akademika
                melaporkan, mencari, dan mengembalikan barang hilang secara lebih mudah
                dan terorganisir.
            </p>
        </div>

    </main>

</body>
</html>
