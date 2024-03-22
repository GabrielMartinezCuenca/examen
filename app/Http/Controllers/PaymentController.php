<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{


    public function create($loan)
    {
        return view('payments.create', compact('loan'));
    }


    public function store(Request $request, $loan)
    {
        Payment::create([
            'loan_id' => $loan,
            'amount' => $request->amount
        ]);
        return redirect()->route('loans.index');
    }

    public function show(Payment $payment)
    {
        //
    }


    public function edit(Payment $payment)
    {
        //
    }


    public function update(Request $request, Payment $payment)
    {
        //
    }


    public function destroy(Payment $payment)
    {
        //
    }
}
