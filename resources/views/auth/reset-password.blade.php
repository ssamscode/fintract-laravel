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

            Create New Password

        </h1>

        <p class="text-xl leading-9 text-center max-w-md">

            Choose a strong password to secure your FinTrack account and continue managing your finances safely.

        </p>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="flex items-center justify-center bg-gray-100 px-6 py-10">

        <div class="auth-card w-full max-w-lg p-10">

            {{-- Logo --}}
            <img
                src="{{ asset('images/fintrack-logo.png') }}"
                class="w-24 mx-auto">

            <h2 class="text-4xl font-bold text-center mt-6">

                Reset Password

            </h2>

            <p class="text-center text-gray-500 mt-3">

                Please enter your new password.

            </p>

            <form
    method="POST"
    action="{{ route('password.reset.update', $user) }}"
>
    @csrf

                {{-- Password --}}
                <div x-data="{ show:false }">

                    <label class="block mb-2 font-medium">

                        New Password

                    </label>

                    <div class="relative">

                        <input
                            :type="show ? 'text' : 'password'"
                            name="password"
                            required
                            class="w-full rounded-xl border border-gray-300 px-5 py-4 pr-14 focus:border-[#235347] focus:ring-[#235347]">

                        <button
                            type="button"
                            @click="show=!show"
                            class="absolute inset-y-0 right-4 flex items-center text-gray-500 hover:text-[#235347]">

                            <svg
                                x-show="!show"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="w-6 h-6">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"/>

                            </svg>

                            <svg
                                x-show="show"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="w-6 h-6">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 3l18 18"/>

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M10.58 10.58A2 2 0 0012 14a2 2 0 001.42-.58M9.88 5.09A9.77 9.77 0 0112 5c4.48 0 8.27 2.94 9.54 7a9.96 9.96 0 01-4.04 5.14M6.23 6.23A9.96 9.96 0 002.46 12c1.27 4.06 5.06 7 9.54 7a9.8 9.8 0 004.28-.97"/>

                            </svg>

                        </button>

                    </div>

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"/>

                </div>

                {{-- Confirm Password --}}
                <div x-data="{ show:false }">

                    <label class="block mb-2 font-medium">

                        Confirm Password

                    </label>

                    <div class="relative">

                        <input
                            :type="show ? 'text' : 'password'"
                            name="password_confirmation"
                            required
                            class="w-full rounded-xl border border-gray-300 px-5 py-4 pr-14 focus:border-[#235347] focus:ring-[#235347]">

                        <button
                            type="button"
                            @click="show=!show"
                            class="absolute inset-y-0 right-4 flex items-center text-gray-500 hover:text-[#235347]">

                            <svg
                                x-show="!show"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="w-6 h-6">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"/>

                            </svg>

                            <svg
                                x-show="show"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                                class="w-6 h-6">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M3 3l18 18"/>

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M10.58 10.58A2 2 0 0012 14a2 2 0 001.42-.58"/>

                            </svg>

                        </button>

                    </div>

                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-[#235347] py-4 text-lg font-semibold text-white hover:bg-[#1B4332] transition">

                    Update Password

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