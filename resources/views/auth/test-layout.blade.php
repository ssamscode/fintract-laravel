<x-guest-layout>

<div class="min-h-screen grid lg:grid-cols-2">

    <!-- LEFT SIDE -->
    <div
        class="hidden lg:flex flex-col justify-center items-center text-white px-20"
        style="background:linear-gradient(180deg,#235347,#8EB69E);">

        <img
            src="{{ asset('images/fintrack-logo.png') }}"
            class="w-44 mb-8">

        <h1 class="text-5xl font-bold mb-6">

            FinTrack

        </h1>

        <p class="text-xl text-center leading-9">

            Manage your finances smarter,
            track your expenses,
            and grow your savings.

        </p>

    </div>

    <!-- RIGHT SIDE -->
    <div
        class="flex items-center justify-center p-10">

        <div class="auth-card w-full max-w-lg p-10">

            <img
                src="{{ asset('images/fintrack-logo.png') }}"
                class="w-24 mx-auto">

            <h2
                class="text-4xl font-bold text-center mt-6">

                Welcome Back

            </h2>

            <p
                class="text-center text-gray-500 mt-2">

                Sign in to continue to FinTrack

            </p>

        </div>

    </div>

</div>

</x-guest-layout>