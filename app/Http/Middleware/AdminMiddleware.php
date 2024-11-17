<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && Auth::user()->role == 1) {
        //     return $next($request);
        // }

        // debug
        // dd(auth::user() == null ? 'value1' : auth::user()->role);

        if (auth::user() && auth::user()->role == 1) {
            return $next($request);
        }

        return redirect('/login');
    }
}
