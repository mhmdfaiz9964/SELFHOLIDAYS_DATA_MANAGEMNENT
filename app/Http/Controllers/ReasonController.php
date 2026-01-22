<?php

namespace App\Http\Controllers;

use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:reasons,name',
        ]);

        $reason = Reason::create($request->all());

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Reason created successfully.',
                'data' => $reason
            ]);
        }

        return back()->with('success', 'Reason created successfully.');
    }
}
