<header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-sm">

    <div class="max-w-7xl mx-auto px-8">

        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="/" class="flex items-center gap-3">

                <img src="{{ asset('images/fintrack-logo.png') }}"
                     alt="FinTrack"
                     class="w-12 h-12">

                <div>

                    <h1 class="text-2xl font-bold text-[#235347]">
                        FinTrack
                    </h1>

                    <p class="text-xs text-gray-500">
                        Financial Management
                    </p>

                </div>

            </a>

            {{-- Menu --}}
            <nav class="hidden md:flex items-center gap-10">

                <a href="#home"
                   class="font-medium text-gray-700 hover:text-[#235347] transition">
                    Home
                </a>

                <a href="#features"
                   class="font-medium text-gray-700 hover:text-[#235347] transition">
                    Features
                </a>

                <a href="#about"
                   class="font-medium text-gray-700 hover:text-[#235347] transition">
                    About
                </a>

            </nav>

            {{-- Button --}}
            <div class="flex items-center gap-4">

                <a href="{{ route('login') }}"
                   class="font-semibold text-[#235347] hover:text-[#8EB69E] transition">

                    Login

                </a>

                <a href="{{ route('register') }}"
                   class="px-6 py-3 rounded-xl bg-[#235347] text-white hover:bg-[#1c4339] transition">

                    Register

                </a>

            </div>

        </div>

    </div>

</header>