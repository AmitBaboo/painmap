<?php

namespace App\Http\Middleware;

use App\Models\UserPlan;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasPlan
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
        $user_plan = UserPlan::where('user_id', $request->user()->id)->first();

        if ($request->user()->account_type == 2 && !isset($user_plan->user_id)) {
            return redirect("/show-plans");
        }

        return $next($request);
    }
}
