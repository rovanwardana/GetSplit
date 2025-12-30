<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillParticipant;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBillRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BillController extends Controller
{
    /* =========================
     * INDEX (TRANSACTION LIST)
     * ========================= */
    public function index()
    {
        $userId = Auth::id();

        $transactions = Transaction::whereHas('bill', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })
            ->with([
                'bill',
                'bill.items',
                'bill.participants'
            ])
            ->get();

        return view('transaction.index', compact('transactions'));
    }

    /* =========================
 * CREATE (SHOW FORM)
 * ========================= */
    public function create()
    {
        return view('bills.create');
    }

    /* =========================
     * STORE (CREATE BILL)
     * ========================= */
    public function store(StoreBillRequest $request)
    {
        DB::transaction(function () use ($request) {

            // 1. Bill
            $bill = Bill::create([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'type' => $request->type,
                'split_method' => $request->split_method,
                'bill_date' => now(),
                'due_date' => $request->due_date,
                'tax' => $request->tax ?? 0,
                'discount' => $request->discount ?? 0,
                'notes' => $request->notes ?? null,
            ]);

            // 2. Items
            $items = [];
            $subtotal = 0;

            foreach ($request->items as $item) {
                $subtotalItem = $item['qty'] * $item['price'];

                $items[] = $bill->items()->create([
                    'name' => $item['name'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $subtotalItem,
                ]);

                $subtotal += $subtotalItem;
            }

            $taxAmount = (($subtotal - $bill->discount) * $bill->tax) / 100;
            $grandTotal = $subtotal - $bill->discount + $taxAmount;


            // 3. Participants
            $participants = [];

            foreach ($request->participants as $p) {
                $participants[] = $bill->participants()->create([
                    'name' => $p['name'],
                    'payment_status' => 'Pending',
                ]);
            }

            // 4. Split
            if ($bill->split_method === 'equal') {
                $participantCount = count($participants);

                $base = $subtotal / $participantCount;
                $taxPer = $taxAmount / $participantCount;
                $discountPer = $bill->discount / $participantCount;

                foreach ($participants as $participant) {
                    $participant->update([
                        'amount_to_pay' => round($base + $taxPer - $discountPer, 2),
                    ]);
                }
            } else {
                foreach ($items as $itemIndex => $item) {
                    $usedQty = 0;

                    foreach ($request->participants as $p) {
                        $usedQty += $p['items'][$itemIndex]['qty'] ?? 0;
                    }

                    if ($usedQty > $item->qty) {
                        throw ValidationException::withMessages([
                            'custom_split' => "Qty {$item->name} melebihi jumlah tersedia"
                        ]);
                    }
                }

                $participantSubtotals = [];
                $totalUsedSubtotal = 0;

                foreach ($request->participants as $pIndex => $p) {
                    $participantSubtotal = 0;

                    foreach ($items as $itemIndex => $item) {
                        $qty = $p['items'][$itemIndex]['qty'] ?? 0;

                        if ($qty > 0) {
                            $participantSubtotal += $qty * $item->price;
                        }
                    }

                    $participantSubtotals[$pIndex] = $participantSubtotal;
                    $totalUsedSubtotal += $participantSubtotal;
                }

                foreach ($participants as $pIndex => $participant) {
                    $proporsi = $totalUsedSubtotal > 0
                        ? $participantSubtotals[$pIndex] / $totalUsedSubtotal
                        : 0;

                    $finalAmount =
                        $participantSubtotals[$pIndex]
                        + ($taxAmount * $proporsi)
                        - ($bill->discount * $proporsi);

                    $participant->update([
                        'amount_to_pay' => round($finalAmount, 2),
                    ]);
                }
            }

            // 5. Update bill total
            $bill->update([
                'subtotal' => $subtotal,
                'total_amount' => round($subtotal - $bill->discount + $taxAmount, 2),
            ]);

            // 6. Transaction
            Transaction::create([
                'bill_id' => $bill->id,
                'status' => 'Pending',
                'date' => now(),
            ]);
        });

        return redirect()->route('transaction.index')
            ->with('success', 'Bill berhasil dibuat');
    }

    /* =========================
     * UPDATE PARTICIPANT STATUS
     * ========================= */
    public function updateParticipantStatus(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:bill_participants,id',
            'status' => 'required|in:Pending,Paid',
        ]);

        $participant = BillParticipant::findOrFail($request->participant_id);
        $participant->update(['payment_status' => $request->status]);

        $bill = $participant->bill;
        $transaction = Transaction::where('bill_id', $bill->id)->first();

        $statuses = $bill->participants->pluck('payment_status');

        if ($statuses->every(fn($s) => $s === 'Paid')) {
            $transaction->update(['status' => 'Completed']);
        } elseif ($statuses->contains('Paid')) {
            $transaction->update(['status' => 'Partially']);
        } else {
            $transaction->update(['status' => 'Pending']);
        }

        return response()->json(['success' => true]);
    }

    /* =========================
     * SHOW BILL DETAIL
     * ========================= */
    public function show($id)
    {
        $bill = Bill::with(['items', 'participants'])->findOrFail($id);

        return view('bill.show', compact('bill'));
    }

    /* =========================
     * DELETE BILL
     * ========================= */
    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);

        $bill->participants()->delete();
        $bill->items()->delete();
        $bill->delete();

        Transaction::where('bill_id', $id)->delete();

        return response()->json(['success' => true]);
    }
}
