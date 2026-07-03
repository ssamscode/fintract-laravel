@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto p-8">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold text-[#235347]">
                Riwayat Transaksi
                <div class="flex justify-between items-center mb-6">

    <form
        action="{{ route('transactions.index') }}"
        method="GET">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari judul atau deskripsi..."
            class="w-80 px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#235347] focus:outline-none">

    </form>

   

</div>
                
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola seluruh transaksi pemasukan dan pengeluaran UMKM Anda.
            </p>

        </div>

        <a href="{{ route('transactions.create') }}">

            <x-ft-button class="w-auto px-8 py-3">

                + Tambah Transaksi

            </x-ft-button>

        </a>

    </div>

    {{-- Card --}}
    <x-ft-card>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-gray-200 text-gray-500 text-sm uppercase tracking-wide">

                        <th class="py-5 text-left">
                            Tanggal
                        </th>

                        <th class="text-left">
                            Judul
                        </th>

                        <th class="text-left">
                            Jenis
                        </th>

                        <th class="text-left">
                            Nominal
                        </th>

                        <th class="text-center">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                @forelse($transactions as $transaction)

                    <tr class="border-b border-gray-100 hover:bg-[#F8FAF9] transition duration-200">

                        {{-- Tanggal --}}
                        <td class="py-6">

                            <span class="font-medium text-gray-700">

                                {{ \Carbon\Carbon::parse($transaction->transaction_date)->translatedFormat('d M Y') }}

                            </span>

                        </td>

                        {{-- Judul --}}
                        <td>

                            <div class="font-semibold text-gray-800">

                                {{ $transaction->title }}

                            </div>

                            @if($transaction->description)

                                <div class="text-sm text-gray-400 mt-1">

                                    {{ \Illuminate\Support\Str::limit($transaction->description,40) }}

                                </div>

                            @endif

                        </td>

                        {{-- Jenis --}}
                        <td>

                            @if($transaction->type=='income')

                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

                                    🟢 Pemasukan

                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

                                    🔴 Pengeluaran

                                </span>

                            @endif

                        </td>

                        {{-- Nominal --}}
                        <td>

                            <span class="font-bold text-[#235347] text-lg">

                                Rp {{ number_format($transaction->amount,0,',','.') }}

                            </span>

                        </td>

                        {{-- Aksi --}}
                        <td>

                            <div class="flex justify-center gap-2">

                                <a
                                    href="{{ route('transactions.show',$transaction) }}"
                                    class="px-3 py-2 rounded-xl bg-[#235347] text-white text-sm font-medium hover:opacity-90 transition">

                                    Detail

                                </a>

                                <a
                                    href="{{ route('transactions.edit',$transaction) }}"
                                    class="px-3 py-2 rounded-xl bg-[#8EB69E] text-[#235347] text-sm font-medium hover:opacity-90 transition">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('transactions.destroy',$transaction) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus transaksi ini?')"
                                        class="px-3 py-2 rounded-xl bg-red-500 text-white text-sm font-medium hover:bg-red-600 transition">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="py-20 text-center">

                            <div class="flex flex-col items-center">

                                <div class="text-6xl mb-4">

                                    📂

                                </div>

                                <h3 class="text-xl font-semibold text-gray-700">

                                    Belum ada transaksi

                                </h3>

                                <p class="text-gray-500 mt-2">

                                    Tambahkan transaksi pertama untuk mulai mencatat keuangan.

                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </x-ft-card>

    {{-- Pagination --}}
    <div class="mt-8">

        {{ $transactions->links() }}

    </div>

</div>

@endsection