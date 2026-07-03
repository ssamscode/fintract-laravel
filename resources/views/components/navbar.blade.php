<header
    class="bg-white shadow-sm border-b">

    <div
        class="flex justify-between items-center px-8 py-5">

        {{-- Search --}}

        <input
            type="text"
            placeholder="Cari sesuatu..."
            class="w-96 rounded-xl border border-gray-300 px-5 py-3 focus:border-[#235347] focus:ring-[#235347]">

        {{-- User --}}

        <div
            class="flex items-center gap-4">

            <div
                class="w-11 h-11 rounded-full bg-[#235347] text-white flex items-center justify-center font-bold">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

            <div>

                <h3 class="font-semibold">

                    {{ Auth::user()->name }}

                </h3>

                <p class="text-sm text-gray-500">

                    {{ Auth::user()->email }}

                </p>

            </div>

        </div>

    </div>

</header>