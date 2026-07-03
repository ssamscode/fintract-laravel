@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto p-6">

    <x-ft-card>

        <h1 class="text-2xl font-bold mb-6">
            Tambah Transaksi
        </h1>

        <form action="{{ route('transactions.store') }}" method="POST">

            @csrf

            <div class="space-y-5">

                <div>

                    <label class="block mb-2 font-medium">
                        Judul
                    </label>

                    <x-ft-input
                        name="title"
                        type="text"
                        :value="old('title')"
                        required />

                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Jenis Transaksi
                    </label>

                    <select
                        name="type"
                        class="w-full rounded-xl border-gray-300">

                        <option value="">Pilih</option>
                        <option value="income">Pemasukan</option>
                        <option value="expense">Pengeluaran</option>

                    </select>

                    @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Nominal
                    </label>

                    <x-ft-input
                        name="amount"
                        type="number"
                        :value="old('amount')"
                        required />

                    @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Tanggal
                    </label>

                    <x-ft-input
                        name="transaction_date"
                        type="date"
                        :value="old('transaction_date')"
                        required />

                    @error('transaction_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror

                </div>

                <div>

                    <label class="block mb-2 font-medium">
                        Deskripsi
                    </label>

                    <textarea
                        name="description"
                        rows="4"
                        class="w-full rounded-xl border-gray-300">{{ old('description') }}</textarea>

                </div>

                <div class="flex justify-end">

                    <x-ft-button class="w-auto px-8">
                        Simpan Transaksi
                    </x-ft-button>

                </div>

            </div>

        </form>

    </x-ft-card>

</div>

@endsection