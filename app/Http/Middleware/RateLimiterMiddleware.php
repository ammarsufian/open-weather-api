<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Symfony\Component\HttpFoundation\Response;

class RateLimiterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (RateLimiter::tooManyAttempts('check-weather:'.$request->ip(), $perMinute = 5)) {
            return  response()->json(['message'=> 'Too many attempts!'],Response::HTTP_TOO_MANY_REQUESTS);
        }

        RateLimiter::increment('check-weather:'.$request->ip());

        return $next($request);
    }
}
