<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check()){
            $u = auth()->user()->role->role;
            $staff = ['admin', 'owner'];
            if (auth()->check() && in_array($u, $staff)) {
                return $next($request);
            }
            else {
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }

        return redirect('/returnan')->with('message', 'Kamu dilemparkan ke /returnan dikarenakan tidak cocok dengan role admin/owner');

        // Redirect ke halaman lain jika peran tidak cocok
        // return redirect('/returnan')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
