@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <x-ft-card>

        <h1 class="text-2xl font-bold text-[#235347] mb-6">
            Edit Transaksi
        </h1>

        <form action="{{ route('transactions.update', $transaction) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="space-y-5">

                {{-- Judul --}}
                <div>

                    <x-input-label for="title" value="Judul Transaksi" />

                    <x-ft-input
                        id="title"
                        name="title"
                        type="text"
                        :value="old('title', $transaction->title)"
                        required />

                    <x-input-error
                        :messages="$errors->get('title')"
                        class="mt-2" />

                </div>

                {{-- Jenis --}}
                <div>

                    <x-input-label for="type" value="Jenis Transaksi" />

                    <select
                        id="type"
                        name="type"
                        class="ft-input w-full">

                        <option value="">Pilih Jenis</option>

                        <option value="income"
                            @selected(old('type', $transaction->type) == 'income')>
                            Pemasukan
                        </option>

                        <option value="expense"
                            @selected(old('type', $transaction->type) == 'expense')>
                            Pengeluaran
                        </option>

                    </select>

                    <x-input-error
                        :messages="$errors->get('type')"
                        class="mt-2" />

                </div>

                {{-- Nominal --}}
                <div>

                    <x-input-label for="amount" value="Nominal" />

                    <x-ft-input
                        id="amount"
                        name="amount"
                        type="number"
                        :value="old('amount', $transaction->amount)"
                        required />

                    <x-input-error
                        :messages="$errors->get('amount')"
                        class="mt-2" />

                </div>

                {{-- Tanggal --}}
                <div>

                    <x-input-label for="transaction_date" value="Tanggal Transaksi" />

                    <x-ft-input
                        id="transaction_date"
                        name="transaction_date"
                        type="date"
                        :value="old('transaction_date', $transaction->transaction_date)"
                        required />

                    <x-input-error
                        :messages="$errors->get('transaction_date')"
                        class="mt-2" />

                </div>

                {{-- Deskripsi --}}
                <div>

                    <x-input-label for="description" value="Deskripsi" />

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="ft-input w-full">{{ old('description', $transaction->description) }}</textarea>

                    <x-input-error
                        :messages="$errors->get('description')"
                        class="mt-2" />

                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-3">

                    <a href="{{ route('transactions.index') }}">

                        <x-ft-button
                            type="button"
                            class="w-auto px-6 bg-gray-300 text-gray-700">

                            Batal

                        </x-ft-button>

                    </a>

                    <x-ft-button
                        type="submit"
                        class="w-auto px-8">

                        Update Transaksi

                    </x-ft-button>

                </div>

            </div>

        </form>

    </x-ft-card>

</div>

@endsection