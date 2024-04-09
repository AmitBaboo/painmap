<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasPaid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if ($request->user()->account_type == 2 && !$request->user()->subscribed('PhysioPlan')) {
        if ($request->user()->account_type == 2 && !$request->user()->subscribed('default')) {
            return redirect("/plan-payment");
        }

        return $next($request);
    }
}
