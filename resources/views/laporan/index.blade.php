@extends('layouts.app')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
   <div class="flex justify-between items-center">

    <div>

        <h1 class="text-3xl font-bold text-[#235347]">

            Laporan Keuangan

        </h1>

        <p class="text-gray-500 mt-1">

            Ringkasan kondisi keuangan bisnis Anda.

        </p>

    </div>

    <a href="{{ route('laporan.pdf') }}">

        <x-ft-button class="w-auto px-6">

            Export PDF

        </x-ft-button>

    </a>

</div>

    {{-- Stat Card --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Total Balance
            </p>

            <h3 class="text-3xl font-bold text-[#235347] mt-3">
                Rp {{ number_format($balance,0,',','.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Total Income
            </p>

            <h3 class="text-3xl font-bold text-green-600 mt-3">
                Rp {{ number_format($totalIncome,0,',','.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Total Expense
            </p>

            <h3 class="text-3xl font-bold text-red-500 mt-3">
                Rp {{ number_format($totalExpense,0,',','.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-6">

            <p class="text-gray-500">
                Transactions
            </p>

            <h3 class="text-3xl font-bold text-blue-600 mt-3">
                {{ $transactionCount }}
            </h3>

        </div>

    </div>

    {{-- Chart + Summary --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm p-5 md:p-8">

            <h3 class="text-xl font-semibold mb-6">

                Grafik Keuangan

            </h3>

            <div class="relative h-80">

                <canvas id="reportChart"></canvas>

            </div>

        </div>

        <div class="bg-white rounded-3xl shadow-sm p-8">

            <h3 class="text-xl font-semibold mb-6">

                Ringkasan

            </h3>

            <div class="space-y-5">

                <div class="flex justify-between">

                    <span>Total Income</span>

                    <span class="font-semibold text-green-600">

                        Rp {{ number_format($totalIncome,0,',','.') }}

                    </span>

                </div>

                <div class="flex justify-between">

                    <span>Total Expense</span>

                    <span class="font-semibold text-red-500">

                        Rp {{ number_format($totalExpense,0,',','.') }}

                    </span>

                </div>

                <hr>

                <div class="flex justify-between text-lg font-bold">

                    <span>Balance</span>

                    <span class="text-[#235347]">

                        Rp {{ number_format($balance,0,',','.') }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- Riwayat --}}
    <div class="bg-white rounded-3xl shadow-sm p-5 md:p-8">

        <h3 class="text-xl font-semibold mb-6">

            Riwayat Transaksi

        </h3>

        <div class="overflow-x-auto">

            <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-3 text-left">Tanggal</th>

                    <th class="text-left">Judul</th>

                    <th class="text-left">Jenis</th>

                    <th class="text-right">Nominal</th>

                </tr>

            </thead>

            <tbody>

            @forelse($transactions as $transaction)

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-4">

                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}

                    </td>

                    <td>

                        {{ $transaction->title }}

                    </td>

                    <td>

                        @if($transaction->type=='income')

                            <span class="text-green-600 font-medium">

                                Income

                            </span>

                        @else

                            <span class="text-red-500 font-medium">

                                Expense

                            </span>

                        @endif

                    </td>

                    <td class="text-right font-semibold">

                        Rp {{ number_format($transaction->amount,0,',','.') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="4" class="text-center py-10 text-gray-500">

                        Belum ada transaksi.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

        </div>

        <div class="mt-6">

            {{ $transactions->links() }}

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded',function(){

    const labels=[
        'Jan','Feb','Mar','Apr','Mei','Jun',
        'Jul','Agu','Sep','Okt','Nov','Des'
    ];

    const income=Array(12).fill(0);
    const expense=Array(12).fill(0);

    @foreach($chartData as $item)

        income[{{ $item->month-1 }}]= {{ (float)$item->income }};
        expense[{{ $item->month-1 }}]= {{ (float)$item->expense }};

    @endforeach

    new window.Chart(document.getElementById('reportChart'),{

        type:'line',

        data:{

            labels,

            datasets:[

                {
                    label:'Income',
                    data:income,
                    borderColor:'#22c55e',
                    backgroundColor:'#22c55e',
                    tension:.4
                },

                {
                    label:'Expense',
                    data:expense,
                    borderColor:'#ef4444',
                    backgroundColor:'#ef4444',
                    tension:.4
                }

            ]

        },

        options:{

            responsive:true,

            maintainAspectRatio:false

        }

    });

});

</script>

@endpush