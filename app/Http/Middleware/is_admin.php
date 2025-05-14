<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class is_admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() && ( auth()->user()->role !== 'admin' || auth()->user()->role !== 'su' ) ) {
          abort(403, 'Not an Admin or super user');
        }
        return $next($request);
    }
}


// !check && (!admin || !su)
//admin -> !1 !1 !0
//user -> !1 !0 !0
