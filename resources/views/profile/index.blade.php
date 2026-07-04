@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold text-[#235347]">
            Profil Pengguna
        </h1>

        <p class="text-gray-500 mt-1">
            Informasi akun dan ringkasan aktivitas Anda.
        </p>
    </div>

    {{-- Profile Card --}}
    <div class="bg-white rounded-3xl shadow-sm p-5 md:p-8">

        <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left">

            {{-- Avatar --}}
            <a
                href="{{ route('profile.index') }}"
                class="hover:opacity-80 transition">

                @if($user->profile_photo)

                    <img
                        src="{{ Storage::url($user->profile_photo) }}"
                        alt="Foto Profil"
                        class="w-14 h-14 rounded-full object-cover border-2 border-[#8EB69E]">

                @else

                    <div
                        class="w-14 h-14 rounded-full bg-[#235347]
                               text-white flex items-center justify-center
                               font-bold text-2xl">

                        {{ strtoupper(substr($user->name, 0, 1)) }}

                    </div>

                @endif

            </a>

            {{-- User Info --}}
            <div>

                <h2 class="text-2xl font-bold">
                    {{ $user->name }}
                </h2>

                <p class="text-gray-500">
                    {{ $user->email }}
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    Bergabung sejak
                    {{ $user->created_at->format('d F Y') }}
                </p>

            </div>

        </div>

    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Total Transaksi
            </p>

            <h3 class="text-3xl font-bold text-[#235347] mt-3">
                {{ $transactionCount }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Total Income
            </p>

            <h3 class="text-3xl font-bold text-green-600 mt-3">
                Rp {{ number_format($totalIncome, 0, ',', '.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Total Expense
            </p>

            <h3 class="text-3xl font-bold text-red-500 mt-3">
                Rp {{ number_format($totalExpense, 0, ',', '.') }}
            </h3>

        </div>

    </div>

    {{-- Informasi Akun --}}
    <div class="bg-white rounded-3xl shadow-sm p-8">

        <h3 class="text-xl font-semibold mb-6">
            Informasi Akun
        </h3>

        <div class="space-y-5">

            <div class="flex justify-between border-b pb-3">

                <span class="text-gray-500">
                    Nama
                </span>

                <span class="font-semibold">
                    {{ $user->name }}
                </span>

            </div>

            <div class="flex justify-between border-b pb-3">

                <span class="text-gray-500">
                    Email
                </span>

                <span class="font-semibold">
                    {{ $user->email }}
                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-500">
                    Status
                </span>

                <span
                    class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                    Active

                </span>

            </div>

        </div>

    </div>

    {{-- Tombol --}}
    <div class="flex justify-end">

        <a href="{{ route('profile.edit') }}">

            <x-ft-button class="w-auto px-8">
                Edit Profil
            </x-ft-button>

        </a>

    </div>

</div>

@endsection