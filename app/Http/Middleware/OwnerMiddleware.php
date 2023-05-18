<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $u = auth()->user()->role->role;
        if (auth()->check() && $u == 'owner') {
            return $next($request);
        };
        return redirect('/returnan')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
