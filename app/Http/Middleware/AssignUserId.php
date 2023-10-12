<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AssignUserId
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $request->merge(['user_id' => Auth::id()]);
        }

        return $next($request);
    }
}
