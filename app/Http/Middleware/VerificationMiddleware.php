<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Support\Facades\Gate;

class VerificationMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (! auth()->user()->verified) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('global.verifyYourEmail'));
            }
        }

        if (auth()->check()) {
            if (! auth()->user()->active) {
                auth()->logout();

                return redirect()->route('login')->with('message', trans('global.yourAccountIsDisabled'));
            }
        }

        return $next($request);
    }
}
