<header class="bg-white border-b border-gray-200 px-8 py-5">

    <div class="flex items-center">

        {{-- Judul hanya tampil di Dashboard --}}
        @if(request()->routeIs('dashboard'))

            <div>

                <h2 class="text-2xl font-bold text-[#235347]">
                    Dashboard
                </h2>

                <p class="text-gray-500 text-sm">
                    Welcome back, {{ Auth::user()->name }}
                </p>

            </div>

        @endif

        {{-- Right Menu --}}
        <div class="ml-auto flex items-center gap-6">

            {{-- Search --}}
            <form action="{{ route('transactions.index') }}" method="GET">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari transaksi..."
                    class="w-80 px-5 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#8EB69E]">

            </form>

            {{-- Bantuan --}}
            <a
                href="{{ route('help.index') }}"
                class="w-12 h-12 rounded-xl bg-gray-100 hover:bg-gray-200 flex items-center justify-center transition">

                ❓

            </a>

            {{-- User --}}
            <a
                href="{{ route('profile.index') }}"
                class="flex items-center gap-3 hover:opacity-80 transition">

               @if(Auth::user()->profile_photo)

    <img
        src="{{ Storage::url(Auth::user()->profile_photo) }}"
        alt="Profile"
        class="w-14 h-14 rounded-full object-cover border-2 border-[#8EB69E]">

@else

    <div
        class="w-14 h-14 rounded-full bg-[#235347]
               text-white flex items-center justify-center
               font-bold text-2xl">

        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

    </div>

@endif

                <div>

                    <p class="font-semibold text-gray-800">

                        {{ Auth::user()->name }}

                    </p>

                    <p class="text-xs text-gray-500">

                        View Profile

                    </p>

                </div>

            </a>

        </div>

    </div>

</header>