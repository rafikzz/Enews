<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return abort(403);
        }

        $roles = is_array($role)
            ? [$role]
            : explode('|', $role);


        if (! in_array(Auth::guard($guard)->user()->role ,$roles)) {
            return abort(403);

        }

        return $next($request);
    }
}
