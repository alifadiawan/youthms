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
            // $u = auth()->user()->roles->pluck('role')->toArray();
            $user_role = auth()->user()->roles->pluck('role')->toArray();
            $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
            // cek apakah pengguna terdaftar sebagai klien
            if (count(array_intersect_assoc($user_role, $staff)) > 0) {
                return $next($request);
            } elseif (in_array('client', $user_role)) {
                return $next($request);
            } else {
                return redirect()->back();
            }
        } else {
            // jika pengguna tidak terotentikasi, lewati middleware dan izinkan akses ke rute
            return $next($request);
        }

        return redirect('/returnan');
    }
}
