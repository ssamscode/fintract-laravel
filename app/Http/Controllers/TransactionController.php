<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $user = auth()->user();

    $search = request('search');

    $transactions = Transaction::where('user_id', $user->id)

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");

            });

        })

        ->latest('transaction_date')
        ->paginate(10)
        ->withQueryString();

    return view('transaksi.index', compact(
        'transactions',
        'search'
    ));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('transaksi.create');
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate(

        [
            'title' => 'required|string|max:255',

            'type' => 'required|in:income,expense',

            'amount' => [
                'required',
                'integer',
                'min:1',
                'max:999999999999',
            ],

            'transaction_date' => 'required|date',

            'description' => 'nullable|string|max:1000',
        ],

        [
            'amount.integer' => 'Nominal harus berupa angka tanpa desimal.',

            'amount.max' => 'Nominal maksimal adalah Rp999.999.999.999.',

            'transaction_date.required' => 'Tanggal transaksi wajib diisi.',
        ]

    );

    $validated['user_id'] = auth()->id();

    Transaction::create($validated);

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Transaksi berhasil ditambahkan.');
}

    /**
     * Display the specified resource.
     */
public function show(Transaction $transaction)
{
    abort_if($transaction->user_id !== auth()->id(), 403);

    return view('transaksi.show', compact('transaction'));
}

    /**
     * Show the form for editing the specified resource.
     */
public function edit(Transaction $transaction)
{
    abort_if($transaction->user_id !== auth()->id(), 403);

    return view('transaksi.edit', compact('transaction'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Transaction $transaction)
{
    abort_if($transaction->user_id !== auth()->id(), 403);

    $validated = $request->validate([
        'title' => 'required|max:255',
        'type' => 'required|in:income,expense',
        'amount' => 'required|numeric|min:1',
        'transaction_date' => 'required|date',
        'description' => 'nullable|max:1000',
    ]);

    $transaction->update($validated);

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Transaksi berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(Transaction $transaction)
{
    abort_if($transaction->user_id !== auth()->id(), 403);

    $transaction->delete();

    return redirect()
        ->route('transactions.index')
        ->with('success', 'Transaksi berhasil dihapus.');
}
}
