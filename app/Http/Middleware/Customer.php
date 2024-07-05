<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Customer extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('customer_login');
        }
    }

    // public function handle($request, Closure $next, ...$guards)
    // {
    //     if (Auth::check()) {
    //         session(['user_id' => Auth::id()]);
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect($this->redirectTo($request))->with('error', 'You need to login first.');
        }

        // Store user ID in session if authenticated
        session(['user_id' => Auth::guard('customer')->id()]);

        return $next($request);
    }
}
