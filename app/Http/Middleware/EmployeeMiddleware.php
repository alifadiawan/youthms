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
            $user_role = auth()->user()->role->role;
            $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
            $client = ["client"];
            // cek apakah pengguna terdaftar sebagai klien
            if (in_array($user_role, $staff)) {
                return $next($request);
<<<<<<< HEAD
            } elseif ($user_role == "client") {
=======
            } elseif ($user_role == 'client') {
>>>>>>> 09e1f0325a70c5062fbb85a05e3ce3df22f3c0fd
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
