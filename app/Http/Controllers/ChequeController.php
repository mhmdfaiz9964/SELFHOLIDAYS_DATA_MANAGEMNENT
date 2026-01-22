<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use App\Models\Bank;
use App\Models\Reason;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    public function index(Request $request)
    {
        $query = Cheque::with(['bank', 'reason']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('cheque_number', 'like', "%{$search}%")
                  ->orWhere('payer_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date')) {
            $query->whereDate('cheque_date', $request->date);
        }

        $cheques = $query->latest()->paginate(10);

        return view('cheques.index', compact('cheques'));
    }

    public function create()
    {
        $banks = Bank::all();
        $reasons = Reason::all();
        return view('cheques.create', compact('banks', 'reasons'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cheque_number' => 'required',
            'cheque_date' => 'required|date',
            'bank_id' => 'required|exists:banks,id',
            'amount' => 'required|numeric|min:0',
            'payer_name' => 'required',
            'reason_id' => 'required|exists:reasons,id',
        ]);

        Cheque::create($request->all());

        return redirect()->route('cheques.index')->with('success', 'Cheque created successfully.');
    }

    public function show(Cheque $cheque)
    {
        $cheque->load(['bank', 'reason', 'payments']);
        return view('cheques.show', compact('cheque'));
    }

    public function edit(Cheque $cheque)
    {
        $banks = Bank::all();
        $reasons = Reason::all();
        return view('cheques.edit', compact('cheque', 'banks', 'reasons'));
    }

    public function update(Request $request, Cheque $cheque)
    {
        $request->validate([
            'cheque_number' => 'required',
            'cheque_date' => 'required|date',
            'bank_id' => 'required|exists:banks,id',
            'amount' => 'required|numeric|min:0',
            'payer_name' => 'required',
            'reason_id' => 'required|exists:reasons,id',
            'status' => 'required|in:pending,paid,partial_paid',
        ]);

        $cheque->update($request->all());

        return redirect()->route('cheques.index')->with('success', 'Cheque updated successfully.');
    }

    public function destroy(Cheque $cheque)
    {
        $cheque->delete();
        return redirect()->route('cheques.index')->with('success', 'Cheque deleted successfully.');
    }
}
