<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\UserPlan;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Stripe\StripeClient;

class PlanController extends Controller
{
    protected $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        $plans = Plan::all();

        return view('pages.back.plans.plans', [
            'plans' => $plans,
            'page_uri' => 'plans',
            'parent' => 'features'
        ]);
    }

    /**
     * Show the Plan.
     *
     * @return mixed
     */
    public function show(Request $request)
    {
        $plan_id = UserPlan::select('plan_id')->where('user_id', Auth::id())->first()->plan_id;

        $intent = $request->user()->createSetupIntent();

        return view("pages.back.account_setup.payment", [
            'plan' => Plan::where('id', $plan_id)->first(),
            'intent' => $intent
        ]);
    }

    public function showPlan(int $id)
    {
        $plan = Plan::findOrFail($id);

        if ($plan) {
            $response_code = Response::HTTP_OK;
            $response_data = $plan;
            $response_message = "Data saved successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_data = (object)[];
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_data" => $response_data,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function storePlan(Request $request)
    {
        $data = $request->except('_token');

        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] * 100;

        $result = DB::transaction(function () use ($price, $data) {
            //create stripe product
            $stripeProduct = $this->stripe->products->create([
                'name' => $data['name'],
            ]);

            //Stripe Plan Creation
            if (isset($stripeProduct->id)) {
                $stripePlanCreation = $this->stripe->plans->create([
                    'amount' => $price,
                    'currency' => 'gbp',
                    'interval' => 'month', //  it can be day,week,month or year
                    'product' => $stripeProduct->id,
                ]);

                if (isset($stripePlanCreation->id)) {
                    $data['stripe_plan'] = $stripeProduct->id;
                    $data['stripe_id'] = $stripePlanCreation->id;

                    Plan::create($data);

                    return 1;
                }
            }
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Plan has been created successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function updatePlan(Request $request, int $id)
    {
        $plan = Plan::findOrFail($id);
        $data = $request->except('_token');

        $data['slug'] = strtolower($data['name']);
        $price = $data['cost'] * 100;

        $result = DB::transaction(function () use ($price, $data, $plan) {
            //create stripe product
            $stripeProduct = $this->stripe->products->update($plan->stripe_plan, [
                'name' => $data['name'],
            ]);

            //Stripe Plan Update
            if (isset($stripeProduct->id)) {
                // $deletePlan = $this->stripe->plans->delete($plan->stripe_id, []);
                // if ($deletePlan->deleted == 'true') {
                //     $stripePlanCreation = $this->stripe->plans->create([
                //         'amount' => $price,
                //         'currency' => 'gbp',
                //         'interval' => 'month', //  it can be day,week,month or year
                //         'product' => $stripeProduct->id,
                //     ]);

                // if (isset($stripePlanCreation->id)) {
                // $data['stripe_plan'] = $stripeProduct->id;
                // $data['stripe_id'] = $stripePlanCreation->id;

                return $plan->update($data);
                // }
                // }
            }
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Plan has been updated successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }

    public function deletePlan(int $id)
    {
        $plan = Plan::findOrFail($id);

        //create stripe product
        $result = DB::transaction(function () use (&$plan) {
            $delete_plan = $this->stripe->plans->delete($plan->stripe_id, []);

            //Stripe Plan Update
            if ($delete_plan->deleted == 'true') {
                $product_deleted = $this->stripe->products->delete($plan->stripe_plan, []);
                if ($product_deleted->deleted == 'true') {
                    return $plan->delete();
                }
            }
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Plan deleted successfully.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json(
            [
                "response_code" => $response_code,
                "response_message" => $response_message
            ],
            $response_code
        );
    }
}
