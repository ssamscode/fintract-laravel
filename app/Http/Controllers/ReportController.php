<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $transactions = Transaction::where('user_id', $user->id)
            ->latest('transaction_date')
            ->paginate(10);

        $totalIncome = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $transactionCount = Transaction::where('user_id', $user->id)
            ->count();

        $chartData = Transaction::selectRaw("
                MONTH(transaction_date) as month,
                SUM(CASE WHEN type='income' THEN amount ELSE 0 END) as income,
                SUM(CASE WHEN type='expense' THEN amount ELSE 0 END) as expense
            ")
            ->where('user_id', $user->id)
            ->groupBy(DB::raw('MONTH(transaction_date)'))
            ->orderBy('month')
            ->get();

        return view('laporan.index', compact(
            'transactions',
            'totalIncome',
            'totalExpense',
            'balance',
            'transactionCount',
            'chartData'
        ));
    }

    public function exportPdf()
    {
        $user = auth()->user();

        $transactions = Transaction::where('user_id', $user->id)
            ->orderBy('transaction_date', 'desc')
            ->get();

        $totalIncome = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        $pdf = Pdf::loadView('laporan.pdf', compact(
            'transactions',
            'totalIncome',
            'totalExpense',
            'balance',
            'user'
        ));

        return $pdf->download('Laporan-FinTrack.pdf');
    }
}