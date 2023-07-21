<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Redirect;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role,$roles)){
            return $next($request);
        }
        if(Auth::user()->role == 'user'){
            return redirect::to('/dashboard');
        } elseif (Auth::user()->role == 'admin'){
            return redirect::to('/dashboardadmin');
        }    }
}
