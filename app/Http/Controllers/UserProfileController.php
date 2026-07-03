<?php

namespace App\Http\Controllers;

use App\Models\Transaction;

class UserProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $transactionCount = Transaction::where('user_id',$user->id)->count();

        $totalIncome = Transaction::where('user_id',$user->id)
            ->where('type','income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id',$user->id)
            ->where('type','expense')
            ->sum('amount');

        return view('profile.index',compact(
            'user',
            'transactionCount',
            'totalIncome',
            'totalExpense'
        ));
    }
}