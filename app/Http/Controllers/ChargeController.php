<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    public function charge()
    {
        $acc = Account::get();
        return view('charge.index', compact('acc'));
    }

    public function index()
    {
        $char = Charge::orderBy('id');
        return view('template._charge-list', compact('char'));
    }

    public function store(Request $request)
    {
        // dd('gana');
        $request->validate([
            'account_id' => 'required',
            'title' => 'required',
            'amount' => 'required',
        ]);


        $char = Charge::create($request->all());

        return view('template._charge-list', compact('char'));
    }
}
