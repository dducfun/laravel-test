<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class AuthAdmin extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        $isAuthenticatedAdmin = (Auth::guard('admin')->check());

        //This will be excecuted if the new authentication fails.
        if (!$isAuthenticatedAdmin){
            return redirect()->route('admin.login')->with('message', 'Authentication Error.');
        }
        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! Auth::guard('admin')->check()) {
            return route('admin.login');
        }
    }
}
