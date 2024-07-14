<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment()
    {
        $acc = Account::get();
        return view('payment.index', compact('acc'));
    }

    public function index()
    {
        $pay = Payment::orderBy('id');
        return view('template._payment-list', compact('pay'));
    }

    public function store(Request $request)
    {
        // dd('gana');
        $request->validate([
            'account_id' => 'required',
            'date_time' => 'required',
            'amount' => 'required',
        ]);


        $pay = Payment::create($request->all());

        return view('template._payment-list', compact('pay'));
    }
}
