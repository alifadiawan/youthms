<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $u = auth()->user()->role->role;
        if (auth()->check() && in_array($u, ['admin', 'owner', 'employee'])) {
            return $next($request);
        }

        else {
            return redirect()->back();
        }
    
        // Redirect ke halaman lain jika peran tidak cocok
        return redirect('/returnan')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
