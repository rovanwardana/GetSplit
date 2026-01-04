<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\Bill;
use App\Models\BillParticipant;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Total bills created by user
        $totalBills = Bill::where('user_id', $userId)->count();

        // Get bill IDs with partially paid transactions
        $partialBillIds = Transaction::where('status', 'Partially')
            ->pluck('bill_id')
            ->toArray();

        // Bills waiting for payment (partially paid)
        $waitingBills = Bill::where('user_id', $userId)
            ->whereIn('id', $partialBillIds)
            ->with(['participants'])
            ->latest()
            ->get()
            ->map(function ($bill) {
                $bill->pending_participants = $bill->participants()
                    ->where('payment_status', 'Pending')
                    ->count();
                $bill->total_pending = $bill->participants()
                    ->where('payment_status', 'Pending')
                    ->sum('amount_to_pay');
                return $bill;
            });

        // Quick stats
        $pendingCount = Transaction::whereHas('bill', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->where('status', 'Pending')->count();

        $completedCount = Transaction::whereHas('bill', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->where('status', 'Completed')->count();

        $monthlyCount = Bill::where('user_id', $userId)
            ->whereMonth('bill_date', now()->month)
            ->whereYear('bill_date', now()->year)
            ->count();

        // Total amounts
        $totalPendingAmount = BillParticipant::whereHas('bill', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->where('payment_status', 'Pending')
          ->sum('amount_to_pay');

        // Get completed bill IDs
        $completedBillIds = Transaction::where('status', 'Completed')
            ->pluck('bill_id')
            ->toArray();

        $totalCompletedAmount = Bill::where('user_id', $userId)
            ->whereIn('id', $completedBillIds)
            ->sum('total_amount');

        return view('dashboard', compact(
            'totalBills',
            'waitingBills',
            'pendingCount',
            'completedCount',
            'monthlyCount',
            'totalPendingAmount',
            'totalCompletedAmount'
        ));
    }
}