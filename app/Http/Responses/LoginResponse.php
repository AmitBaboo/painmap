<?php

namespace App\Http\Responses;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // dd($request);
        $user = User::findOrFail(Auth::id());
        // $role = Auth::user()->status;

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }

        if ($user->status == 1) {
            return redirect('/redirect');
        }

        if (!$user->subscribed()) {
            return redirect("/plan-payment");
        } else {
            return redirect('/dashboard');
        }
    }
}
