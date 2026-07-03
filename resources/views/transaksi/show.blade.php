@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <x-ft-card>

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-2xl font-bold text-[#235347]">

                Detail Transaksi

            </h1>

            <a href="{{ route('transactions.index') }}">

                <x-ft-button class="w-auto px-6">

                    Kembali

                </x-ft-button>

            </a>

        </div>

        <div class="grid grid-cols-2 gap-6">

            <div>

                <p class="text-gray-500 text-sm">
                    Judul
                </p>

                <p class="font-semibold text-lg">
                    {{ $transaction->title }}
                </p>

            </div>

            <div>

                <p class="text-gray-500 text-sm">
                    Jenis
                </p>

                <p class="font-semibold">

                    @if($transaction->type=='income')

                        <span class="text-green-600">

                            Pemasukan

                        </span>

                    @else

                        <span class="text-red-600">

                            Pengeluaran

                        </span>

                    @endif

                </p>

            </div>

            <div>

                <p class="text-gray-500 text-sm">
                    Nominal
                </p>

                <p class="font-semibold">

                    Rp {{ number_format($transaction->amount,0,',','.') }}

                </p>

            </div>

            <div>

                <p class="text-gray-500 text-sm">
                    Tanggal
                </p>

                <p class="font-semibold">

                    {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }}

                </p>

            </div>

        </div>

        <div class="mt-8">

            <p class="text-gray-500 text-sm mb-2">

                Deskripsi

            </p>

            <div class="bg-gray-50 rounded-xl p-5">

                {{ $transaction->description ?: '-' }}

            </div>

        </div>

    </x-ft-card>

</div>

@endsection