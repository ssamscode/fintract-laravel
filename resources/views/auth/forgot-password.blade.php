<x-guest-layout>

<div class="min-h-screen grid lg:grid-cols-2">

    {{-- LEFT SIDE --}}
    <div
        class="hidden lg:flex flex-col justify-center items-center px-20 text-white"
        style="background: linear-gradient(180deg,#235347,#8EB69E);">

        <img
            src="{{ asset('images/fintrack-logo.png') }}"
            class="w-48 mb-8">

        <h1 class="text-5xl font-bold mb-8">

            Forgot Password?

        </h1>

        <p class="text-xl leading-9 text-center max-w-md">

            Enter your registered email address to create a new password for your FinTrack account.

        </p>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="flex items-center justify-center bg-gray-100 px-6 py-10">

        <div class="auth-card w-full max-w-lg p-10">

            <img
                src="{{ asset('images/fintrack-logo.png') }}"
                class="w-24 mx-auto">

            <h2 class="text-4xl font-bold text-center mt-6">

                Forgot Password

            </h2>

            <p class="text-center text-gray-500 mt-3">

                Enter your email below.

            </p>

            <form
                method="POST"
                action="{{ route('password.check') }}"
                class="mt-10 space-y-6">

                @csrf

                <div>

                    <label class="block mb-2 font-medium">

                        Email Address

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="w-full rounded-xl border border-gray-300 px-5 py-4 focus:border-[#235347] focus:ring-[#235347]">

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"/>

                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-[#235347] py-4 text-lg font-semibold text-white hover:bg-[#1B4332] transition">

                    Continue

                </button>

                <div class="text-center">

                    <a
                        href="{{ route('login') }}"
                        class="text-[#235347] font-semibold hover:underline">

                        Back to Login

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-guest-layout>