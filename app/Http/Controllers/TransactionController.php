<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $transactions = Transaction::whereHas('bill', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->with([
                'bill',
                'bill.items',
                'bill.participants',
            ])
            ->latest()
            ->get();

        return view('transaction', compact('transactions'));
    }
}
