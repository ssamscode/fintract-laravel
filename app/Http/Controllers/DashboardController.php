<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalIncome = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $transactionCount = Transaction::where('user_id', $user->id)
            ->count();

        $recentTransactions = Transaction::where('user_id', $user->id)
            ->latest('transaction_date')
            ->take(5)
            ->get();

        $latestTransactions = Transaction::where('user_id', $user->id)
            ->latest('transaction_date')
            ->take(5)
            ->get();

$chartData = Transaction::select(
        DB::raw("MONTH(transaction_date) as month"),
        DB::raw("SUM(CASE WHEN type='income' THEN amount ELSE 0 END) as income"),
        DB::raw("SUM(CASE WHEN type='expense' THEN amount ELSE 0 END) as expense")
    )
    ->where('user_id', $user->id)
    ->groupBy(DB::raw("MONTH(transaction_date)"))
    ->orderBy("month")
    ->get();


return view('dashboard.index', compact(
    'totalIncome',
    'totalExpense',
    'balance',
    'transactionCount',
    'chartData',
    'latestTransactions'
));

    

    }
}