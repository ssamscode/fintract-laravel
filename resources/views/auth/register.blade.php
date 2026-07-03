<x-guest-layout>

<div class="min-h-screen grid lg:grid-cols-2">

    {{-- LEFT SIDE --}}
    <div
        class="hidden lg:flex flex-col justify-center items-center px-20 text-white"
        style="background: linear-gradient(180deg,#235347,#8EB69E);">

        <x-ft-logo class="w-48 mb-8"/>

        <h1 class="text-5xl font-bold mb-8">

            Join FinTrack

        </h1>

        <p class="text-xl leading-9 text-center max-w-md">

            Create your account and start managing your finances
            more efficiently with FinTrack.

        </p>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="flex items-center justify-center bg-gray-100 px-6 py-10">

        <x-ft-card class="w-full max-w-lg">

            <x-ft-logo class="w-24 mx-auto"/>

            <h2 class="text-4xl font-bold text-center mt-6">

                Create Account

            </h2>

            <p class="text-center text-gray-500 mt-2">

                Fill in the information below

            </p>

            <form
                method="POST"
                action="{{ route('register') }}"
                class="mt-10 space-y-5">

                @csrf

                <div>

    <label class="block mb-2 font-medium">

        Full Name

    </label>

    <x-ft-input
        type="text"
        name="name"
        :value="old('name')"
        required
        autofocus
        autocomplete="name"/>

    <x-input-error
        :messages="$errors->get('name')"
        class="mt-2"/>

</div>


<div>

    <label class="block mb-2 font-medium">

        Email

    </label>

    <x-ft-input
        type="email"
        name="email"
        :value="old('email')"
        required
        autocomplete="username"/>

    <x-input-error
        :messages="$errors->get('email')"
        class="mt-2"/>

</div>


<div>

    <label class="block mb-2 font-medium">

        Password

    </label>

    <x-ft-input
        type="password"
        name="password"
        required
        autocomplete="new-password"/>

    <x-input-error
        :messages="$errors->get('password')"
        class="mt-2"/>

</div>


<div>

    <label class="block mb-2 font-medium">

        Confirm Password

    </label>

    <x-ft-input
        type="password"
        name="password_confirmation"
        required
        autocomplete="new-password"/>

</div>

<x-ft-button
    type="submit">

    Create Account

</x-ft-button>


<div class="text-center">

    <span class="text-gray-500">

        Already have an account?

    </span>

    <a
        href="{{ route('login') }}"
        class="ml-2 font-semibold text-[#235347]">

        Login

    </a>

</div>

            </form>

        </x-ft-card>

    </div>

</div>

</x-guest-layout>