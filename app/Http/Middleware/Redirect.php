<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Redirect
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
        if (Auth::user()){
            if (Auth::user()->user_type == 2 || Auth::user()->user_type == 1) {
                return $next($request);
            }
            return redirect()->route('front.home');
        }   

        return redirect()->route('front.home');

        // return $next($request);
    }
}
