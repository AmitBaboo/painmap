<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Mail\MailSubscription;
use App\Models\ContactUs;
use App\Models\Customer;
use App\Models\SubscribeEmail;
use App\Models\ViewCustomer;
use App\Notifications\SendFirstNotification;
use App\Notifications\SendSecondNotification;
use App\Notifications\SendThirdNotification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EmailSubscriptionController extends Controller
{

    public function getEmailSubscription()
    {
        $subscribed_email = SubscribeEmail::orderBy('created_at', 'desc')->get();

        foreach ($subscribed_email as $key) {
            $domain = explode('@', $key->email_address)[1];
            $key->domain = $domain;
        }

        return view("pages.back.email_subscription", [
            'page_uri' => 'email',
            'parent' => 'features',
            'emails' => $subscribed_email
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email_address' => 'required|email|unique:email_subscription'
        ]);

        $result = DB::transaction(function () use ($request) {
            return SubscribeEmail::create($request->all());
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "You have successfully subscribed to this email service.";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }

    public function sendSubscriptionEmail(Request $request)
    {
        $email_data = SubscribeEmail::all();
        $email_content = $request->all();

        $result = DB::transaction(function () use ($email_data, $email_content) {
            foreach ($email_data as $key) {
                Mail::to($key->email)->send(new MailSubscription($email_content));
                return 1;
            }
        });

        if ($result) {
            $response_code = Response::HTTP_OK;
            $response_message = "Subscription email has been sent successfully";
        } else {
            $response_code = Response::HTTP_INTERNAL_SERVER_ERROR;
            $response_message = "Sorry! An error occured.";
        }

        return response()->json([
            "response_code" => $response_code,
            "response_message" => $response_message
        ], $response_code);
    }

    // Automated email methods
    public function sendFollowUpEmails(int $day)
    {
        try {
            $customers = ViewCustomer::select(['id', 'full_name', 'email', 'days'])
                ->where('email', '<>', null)
                ->where('can_email', 1)
                ->where('days', $day)
                ->get();

            foreach ($customers as $key) {
                $customer = Customer::findOrFail($key->id);
                if ($day == 2) {
                    $customer->notify(new SendFirstNotification($key));
                }

                if ($day == 5) {
                    $customer->notify(new SendSecondNotification($key));
                }

                if ($day == 10) {
                    $customer->notify(new SendThirdNotification($key));
                }
            }

            switch ($day) {
                case '2':
                    $message = 'First';
                    break;

                case '5':
                    $message = 'Second';
                    break;

                default:
                    $message = 'Third';
                    break;
            }

            return $message . ' email sent!';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
