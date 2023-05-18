<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $u = auth()->user()->role->role;
        // if (auth()->check() && $u == 'client') {
        //     return $next($request);
        // };

        if (Auth::check()) {
            // cek apakah pengguna terdaftar sebagai klien
            if (Auth::user()->role->role =='client') {
                return $next($request);
            }
        } else {
            // jika pengguna tidak terotentikasi, lewati middleware dan izinkan akses ke rute
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak diizinkan mengakses halaman ini.');

        // return redirect()->back();

        // return redirect('/returnan')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    
    }
}
