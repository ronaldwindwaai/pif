<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TimeBasedRestriction
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
        // if not working hours, access forbidden
        if (!now()->isBetween('09:00:00', '16:30:00')) {
            return response()->json([
                'message' => 'Day is over, come back tomorrow'
            ], 403); // Status forbidden
        }
        return $next($request);
    }
}
