<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   

        if (Auth::check()) {
            $u = auth()->user()->role->role;
            $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
            // cek apakah pengguna terdaftar sebagai klien
            if (in_array($u, $staff)) {
                return $next($request);
            }
            elseif (Auth::user()->role->role =='client') {
                return $next($request);
            }
            else {
                return redirect()->back();
            }
        } else {
            // jika pengguna tidak terotentikasi, lewati middleware dan izinkan akses ke rute
            return $next($request);
        }

        return redirect('/returnan');
    }
}