<?php

namespace App\Http\Controllers;

use App\Models\PaymentHistory;
use Illuminate\Http\Request;
use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;

class SubscriptionController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function create(Request $request)
    {
        $plan = Plan::findOrFail($request->plan);

        $user = $request->user();
        $paymentMethod = $request->paymentMethod;

        $result = DB::transaction(function () use ($user, $paymentMethod, $plan) {
            $user->createOrGetStripeCustomer();
            $user->updateDefaultPaymentMethod($paymentMethod);
            $user->newSubscription('default', $plan->stripe_id)
                ->create($paymentMethod, [
                    'email' => $user->email,
                ]);
            return 1;
        });

        if ($result) {
            $user->status = 2;
            $user->payment_date = Carbon::now();
        }

        // saves payment in history table
        if ($user->save()) {
            PaymentHistory::create([
                'user_id' => $user->id,
                'plan_id' => $plan->id,
                'card_brand' => $user->card_brand,
                'payment_date' => $user->payment_date,
                'amount_paid' => $plan->cost,
                'created_at' => Carbon::now()
            ]);

            $payment_saved = 1;
        }

        if ($payment_saved) {
            return redirect('/dashboard');
            // return redirect()->back()->with('success', 'Your plan subscribed successfully');
        } else {
            return back()->withErrors('fail', 'Your plan payment was not successful.');
        }
    }


    public function createPlan()
    {
        return view('plans.create');
    }

    public function cancelSubscription(Request $request)
    {
        $user = $request->user();

        $response = $user->subscription('default')->cancel();

        if ($response) {
            $user->status = 1;
            $user->save();
            $response_code = Response::HTTP_OK;
            $response_message = "Subscription cancelled successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }
}
