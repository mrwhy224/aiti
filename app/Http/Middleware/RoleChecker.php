<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {
//        Auth::user()
        if ($role=="owner" && Auth::user()->roles->first()->role_group=="site_owner" ||
            $role=="company" && Auth::user()->roles->first()->role_group=="company_member" ||
        $role=="default" && Auth::user()->roles->first()->role_group=="default")
        return $next($request);
        abort(404);
    }
}
