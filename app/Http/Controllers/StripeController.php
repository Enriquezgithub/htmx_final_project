<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        $stripe = new StripeClient(config('stripe.stripe_sk'));

        $response = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'php',
                        'product_data' => [
                            'name' => 'Payment for Account ID ' . $request->account_id,
                        ],
                        'unit_amount' => $request->amount * 100, // amount in cents
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success', ['account_id' => $request->account_id, 'date_time' => $request->date_time, 'amount' => $request->amount]) . '&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancle'),
        ]);

        return redirect($response->url);
    }

    public function success(Request $request)
    {
        // Retrieve the payment session to ensure it exists
        $stripe = new StripeClient(config('stripe.stripe_sk'));
        $session = $stripe->checkout->sessions->retrieve($request->get('session_id'));

        if ($session && $session->payment_status === 'paid') {
            // Create the payment record in the database
            Payment::create([
                'account_id' => $request->get('account_id'),
                'date_time' => $request->get('date_time'),
                'amount' => $request->get('amount'),
            ]);

            $pay = Payment::orderBy('id');
            return view('template._payment-list', compact('pay')); // or whatever view you want to return
        }

        return redirect()->route('cancle');
    }

    public function cancle()
    {
        return view('cancle'); // or whatever view you want to return
    }
}
