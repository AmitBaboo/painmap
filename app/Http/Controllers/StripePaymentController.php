<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, Plan $plan)
    {
        try {
            $plan = Plan::findOrFail($request->get('plan'));

            $user = User::findOrFail(Auth::id());
            $user->status = 2;
            $user->payment_date = date('Y-m-d', strtotime(now()));
            $user->save();

            // saves payment in history table
            $result = DB::transaction(function () use ($user, $plan) {
                return PaymentHistory::create([
                    'user_id' => $user->id,
                    'plan_id' => $plan->id,
                    'card_brand' => $user->card_brand,
                    'payment_date' => $user->payment_date,
                    'amount_paid' => $plan->cost,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            });

            // print_r($plan->cost); exit;
            // Stripe::setApiKey(env('STRIPE_SECRET'));
            // $stripe = Charge::create([
            //     "amount" => $plan->cost * 100,
            //     "currency" => "usd",
            //     "source" => $request->stripeToken,
            //     "description" => "Test payment from itsolutionstuff.com."
            // ]);

            // Session::flash('success', 'Payment successful!');
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect('dashboard'); 
    }
}
