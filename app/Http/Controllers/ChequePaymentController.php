<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\ChequePayment;
use Illuminate\Http\Request;

class ChequePaymentController extends Controller
{
    public function store(Request $request, Cheque $cheque)
    {
        $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0.01',
            'note' => 'nullable|string',
        ]);

        $cheque->payments()->create($request->all());

        // Update cheque status based on balance
        $totalPaid = $cheque->payments()->sum('amount');
        
        if ($totalPaid >= $cheque->amount) {
            $cheque->update(['status' => 'paid']);
        } elseif ($totalPaid > 0) {
            $cheque->update(['status' => 'partial_paid']);
        }

        return redirect()->route('cheques.show', $cheque)->with('success', 'Payment added successfully.');
    }
}
