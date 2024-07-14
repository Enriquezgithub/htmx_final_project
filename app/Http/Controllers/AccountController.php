<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Charge;
use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account()
    {
        $student = Student::get();
        return view('account.index', compact('student'));
    }

    public function index()
    {
        $acc = Account::orderBy('id');
        return view('template._account-list', compact('acc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'section' => 'required',
            'remarks' => 'nullable|required',
        ]);


        $acc = Account::create($request->all());
        // $stud = Student::get();

        return view('template._account-list', compact('acc'));


        // dd('gana');
    }

    public function find($id)
    {
        // dd('gana');
        $acc = Account::find($id);
        // dd($stud);

        return view('template._single-account-list', ['acc' => $acc]);
    }

    public function billing($id)
    {
        // dd($id);
        $acc = Account::findOrFail($id);
        $char = $acc->charges;
        $pay = $acc->payments;
        // dd($pay);
        // dd($char);
        // $acc->with('charges', 'payments')->get();

        // dd($acc);
        // $charge = Charge::get();
        // $payment = Payment::get();
        return view('billing-statement', compact('acc', 'char', 'pay'));
    }
}
