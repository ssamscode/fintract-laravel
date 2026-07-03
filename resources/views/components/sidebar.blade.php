<aside
    class="w-72 bg-[#235347] text-white min-h-screen flex flex-col shadow-xl">

    {{-- Logo --}}
    <div class="px-8 py-8 flex items-center gap-4">

        <img
            src="{{ asset('images/fintrack-logo.png') }}"
            class="w-12">

        <div>

            <h1 class="text-3xl font-bold">

                FinTrack

            </h1>

        </div>

    </div>

    {{-- Menu --}}

    <nav class="mt-6 flex-1">

        <div class="px-6">

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 rounded-xl bg-white/10 px-5 py-4 mb-3 hover:bg-white/20 duration-300">

                <span>🏠</span>

                Dashboard

            </a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 mb-3 hover:bg-white/10 duration-300">

                <span>👤</span>

                Profil Pengguna

            </a>

        </div>

        <div class="px-6 mt-8">

            <p class="text-xs uppercase tracking-widest text-green-200 mb-4">

                Transaksi

            </p>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 hover:bg-white/10">

                ➕

                Tambah Transaksi

            </a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 hover:bg-white/10">

                📄

                Riwayat Transaksi

            </a>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 hover:bg-white/10">

                📊

                Laporan Keuangan

            </a>

        </div>

        <div class="px-6 mt-8">

            <p class="text-xs uppercase tracking-widest text-green-200 mb-4">

                Pengaturan

            </p>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 hover:bg-white/10">

                ⚙️

                Edit Profile

            </a>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button
                    class="flex items-center gap-3 rounded-xl px-5 py-4 w-full hover:bg-white/10">

                    🚪

                    Logout

                </button>

            </form>

        </div>

        <div class="px-6 mt-8">

            <p class="text-xs uppercase tracking-widest text-green-200 mb-4">

                Bantuan

            </p>

            <a href="#"
                class="flex items-center gap-3 rounded-xl px-5 py-4 hover:bg-white/10">

                ☎️

                Kontak

            </a>

        </div>

    </nav>

</aside>