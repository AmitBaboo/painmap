<?php

namespace App\Http\Responses;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;

class TwoFactorLoginResponse implements TwoFactorLoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = User::findOrFail(Auth::id);

        if ($request->wantsJson()) {
            return response('', 204);
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
