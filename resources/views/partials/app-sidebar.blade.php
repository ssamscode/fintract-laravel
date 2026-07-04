<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
    class="fixed top-0 left-0 z-50
           w-72 h-screen
           bg-[#235347]
           text-white
           flex flex-col
           shadow-xl
           transform transition-transform duration-300
           overflow-y-auto">

    {{-- Logo --}}
   <div class="px-6 py-6 border-b border-white/10">

        <a href="{{ route('dashboard') }}" class="flex items-center gap-4">

            <img
                src="{{ asset('images/fintrack-logo.png') }}"
                class="w-12 h-12 rounded-xl"
                alt="FinTrack">

            <div>

                <h1 class="text-2xl font-bold">
                    FinTrack
                </h1>

                <p class="text-sm text-green-100">
                    Financial Management
                </p>

            </div>

        </a>

    </div>

    {{-- Menu --}}
   <nav class="flex-1 px-5 py-6 overflow-y-auto">

        {{-- Main Menu --}}
        <p class="text-xs uppercase tracking-widest text-green-200 mb-4">
            Main Menu
        </p>

        <div class="space-y-2">

            {{-- Dashboard --}}
            <a href="{{ route('dashboard') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-5 py-4 rounded-xl transition
                {{ request()->routeIs('dashboard')
                    ? 'bg-[#8EB69E] text-[#235347] font-semibold'
                    : 'hover:bg-white/10' }}">

                📊 Dashboard

            </a>

            {{-- Tambah Transaksi --}}
            <a href="{{ route('transactions.create') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-5 py-4 rounded-xl transition
                {{ request()->routeIs('transactions.create')
                    ? 'bg-[#8EB69E] text-[#235347] font-semibold'
                    : 'hover:bg-white/10' }}">

                ➕ Tambah Transaksi

            </a>

            {{-- Riwayat Transaksi --}}
            <a href="{{ route('transactions.index') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-5 py-4 rounded-xl transition
                {{ request()->routeIs('transactions.index')
                    ? 'bg-[#8EB69E] text-[#235347] font-semibold'
                    : 'hover:bg-white/10' }}">

                💰 Riwayat Transaksi

            </a>

            {{-- Laporan --}}
            <a href="{{ route('laporan.index') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-5 py-4 rounded-xl transition
                {{ request()->routeIs('laporan.*')
                    ? 'bg-[#8EB69E] text-[#235347] font-semibold'
                    : 'hover:bg-white/10' }}">

                📈 Laporan

            </a>

        </div>

        {{-- Account --}}
        <p class="text-xs uppercase tracking-widest text-green-200 mt-10 mb-4">
            Account
        </p>

        <div class="space-y-2">

            {{-- Profil Saya --}}
            <a href="{{ route('profile.index') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-5 py-4 rounded-xl transition
                {{ request()->routeIs('profile.index')
                    ? 'bg-[#8EB69E] text-[#235347] font-semibold'
                    : 'hover:bg-white/10' }}">

                👤 Profil Saya

            </a>

            {{-- Pengaturan Akun --}}
            <a href="{{ route('profile.edit') }}"
                @click="sidebarOpen = false"
                class="flex items-center gap-3 px-5 py-4 rounded-xl transition
                {{ request()->routeIs('profile.edit')
                    ? 'bg-[#8EB69E] text-[#235347] font-semibold'
                    : 'hover:bg-white/10' }}">

                ⚙️ Pengaturan Akun

            </a>

            {{-- Logout --}}
            <div x-data="{ logoutModal: false }">

                <button
                    @click="logoutModal = true"
                    type="button"
                    class="w-full text-left flex items-center gap-3 px-5 py-4 rounded-xl transition hover:bg-red-500">

                    🚪 Logout

                </button>

                {{-- Modal --}}
                <div
                    x-show="logoutModal"
                    x-transition
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
                    style="display:none;">

                    <div
                        @click.away="logoutModal = false"
                        class="bg-white rounded-3xl w-full max-w-md p-8 shadow-2xl">

                        <div class="text-center">

                            <div class="w-20 h-20 mx-auto rounded-full bg-red-100 flex items-center justify-center text-4xl mb-5">

                                🚪

                            </div>

                            <h2 class="text-2xl font-bold text-gray-800">

                                Logout?

                            </h2>

                            <p class="text-gray-500 mt-3">

                                Apakah Anda yakin ingin keluar dari akun FinTrack?

                            </p>

                        </div>

                        <div class="flex justify-end gap-3 mt-8">

                            <button
                                @click="logoutModal = false"
                                class="px-5 py-3 rounded-xl bg-gray-200 text-gray-700 hover:bg-gray-300 transition">

                                Batal

                            </button>

                            <form method="POST" action="{{ route('logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="px-5 py-3 rounded-xl bg-red-500 text-white hover:bg-red-600">

                                    Ya, Logout

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </nav>

    {{-- Footer --}}
    <div class="p-6 border-t border-white/10 mt-auto">

        <p class="text-sm text-green-200 text-center">
            © {{ date('Y') }} FinTrack
        </p>

    </div>

</aside>