<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Customer;
use App\Models\Partner;
use App\Models\SubscribeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response()->json(Partner::all());
        $user_type = Auth::user()->account_type;
        if ($user_type == 2) {
            $customers = Customer::where("therapist_id", Auth::id())->count();
        } else {
            $customers = Customer::count();
        }

        $therapists = User::where(
            'account_type',
            2
        )->count();

        $contact_us = ContactUs::count();
        $email_subscribers = SubscribeEmail::count();

        $users = new User;
        $usersOnline = $users->allOnline()->count();
        // $usersOnline = 0;

        // foreach ($users as $user) {
        //     if ($user->online_status == 1) {
        //         $usersOnline += 1;
        //     }
        // }


        return view(
            'pages.back.dashboard',
            [
                'title' => 'Pain Map',
                'page_uri' => 'dashboard',
                'customers' => $customers,
                'therapists' => $therapists,
                'contact_us' => $contact_us,
                'email_subscribers' => $email_subscribers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
