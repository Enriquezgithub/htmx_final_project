<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Charge;
use Illuminate\Http\Request;

class ChargeController extends Controller
{

    public function index()
    {
        $char = Charge::orderBy('id');
        return view('billing-statement', compact('char'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        // Retrieve the account
        $account = Account::findOrFail($request->account_id);

        // Create the charge
        $charge = new Charge();
        $charge->account_id = $account->id;
        $charge->title = $request->title;
        $charge->amount = $request->amount;
        $charge->save();

        return view('/billing-statement', compact('charge'));
    }

    public function destroy($id)
    {
        $charge = Charge::find($id);
        $charge->delete();

        return view('/account');
    }
}
