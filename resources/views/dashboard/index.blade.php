@extends('layouts.app')

@section('title', 'Dashboard')

@section('subtitle')
Welcome back, {{ Auth::user()->name }}
@endsection

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-bold text-[#235347]">
            Financial Overview
        </h1>

        <p class="text-gray-500 mt-1">
            Monitor your business finances in real time.
        </p>

    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-4 gap-6">

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-gray-500">
                Total Balance
            </p>

            <h3 class="text-3xl font-bold mt-3 text-[#235347]">
                Rp {{ number_format($balance,0,',','.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-gray-500">
                Total Income
            </p>

            <h3 class="text-3xl font-bold mt-3 text-green-600">
                Rp {{ number_format($totalIncome,0,',','.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-gray-500">
                Total Expense
            </p>

            <h3 class="text-3xl font-bold mt-3 text-red-500">
                Rp {{ number_format($totalExpense,0,',','.') }}
            </h3>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-gray-500">
                Transactions
            </p>

            <h3 class="text-3xl font-bold mt-3 text-blue-600">
                {{ $transactionCount }}
            </h3>

        </div>

    </div>

    {{-- Row 2 --}}
{{-- Row 2 --}}
<div class="grid grid-cols-3 gap-6">

    {{-- Financial Chart --}}
    <div class="col-span-2 bg-white rounded-3xl p-8 shadow-sm">

        <h3 class="text-xl font-semibold mb-6">
            Financial Chart
        </h3>

        <div class="relative h-80">

            <canvas id="financeChart"></canvas>

        </div>

    </div>

    {{-- Quick Summary --}}
    <div class="bg-white rounded-3xl p-8 shadow-sm">

        <h3 class="text-xl font-semibold mb-6">
            Quick Summary
        </h3>

        <div class="space-y-5">

            <div class="flex justify-between">

                <span>Income</span>

                <span class="font-semibold text-green-600">
                    Rp {{ number_format($totalIncome,0,',','.') }}
                </span>

            </div>

            <div class="flex justify-between">

                <span>Expense</span>

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

{{-- Row 3 --}}
<div class="grid grid-cols-3 gap-6">

    {{-- Latest Transactions --}}
    <div class="col-span-2 bg-white rounded-3xl p-8 shadow-sm">

        <div class="flex justify-between items-center mb-6">

            <h3 class="text-xl font-semibold">
                Latest Transactions
            </h3>

            <a href="{{ route('transactions.index') }}"
               class="text-[#235347] font-semibold hover:underline">

                View All

            </a>

        </div>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-3 text-left">
                        Date
                    </th>

                    <th class="text-left">
                        Title
                    </th>

                    <th class="text-left">
                        Type
                    </th>

                    <th class="text-right">
                        Amount
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($latestTransactions as $transaction)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-4">
                            {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}
                        </td>

                        <td>
                            {{ $transaction->title }}
                        </td>

                        <td>

                            @if($transaction->type == 'income')

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

                        <td colspan="4" class="text-center py-8 text-gray-500">

                            No transactions yet.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

{{-- Calendar --}}
<div class="bg-white rounded-3xl shadow-sm p-8">

    <h3 class="text-xl font-semibold mb-6">
        Calendar
    </h3>

    <div id="calendar"></div>

</div>

</div>

@endsection

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Financial Chart
    |--------------------------------------------------------------------------
    */

    const canvas = document.getElementById('financeChart');

    if (canvas) {

        const labels = [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ];

        const income = Array(12).fill(0);
        const expense = Array(12).fill(0);

        @foreach($chartData as $item)

            income[{{ $item->month - 1 }}] = {{ (float)$item->income }};
            expense[{{ $item->month - 1 }}] = {{ (float)$item->expense }};

        @endforeach

        new window.Chart(canvas, {

            type: 'bar',

            data: {

                labels,

                datasets: [

                    {
                        label: 'Income',
                        data: income,
                        backgroundColor: '#22c55e',
                        borderRadius: 8
                    },

                    {
                        label: 'Expense',
                        data: expense,
                        backgroundColor: '#ef4444',
                        borderRadius: 8
                    }

                ]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {

                        position: 'top'

                    }

                }

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | Calendar
    |--------------------------------------------------------------------------
    */
const calendarEl = document.getElementById('calendar');

if (calendarEl) {

    const calendar = new window.FullCalendar.Calendar(calendarEl, {

        plugins: [window.FullCalendar.dayGridPlugin],

        initialView: 'dayGridMonth',

        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: ''
        },

        height: 360

    });

    calendar.render();

}

});

</script>

@endpush