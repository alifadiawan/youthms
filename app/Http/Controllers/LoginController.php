<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        
        // jika user telah mengisi data
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            notify()->success('Berhasil Login !!');
            
            // cek role suatu user
            $user = auth()->user()->role->role;
            $company = ['admin','owner','employee'];
            
            if (in_array($user,$company)) {
                // return true;
                return redirect()->intended('dashboard');
            } elseif ($user == 'client') {
                // return redirect('/');
                return redirect()->intended('/');
            }else{
                // return redirect('dashboard');
                return redirect()->intended('/');
            }

        } else {
            return back()->withErrors([
                'email' => 'Email Salah!!',
                'password' => 'Password Salah!!',
            ]);
        }
    }

    public function authcheck()
    {
        return redirect('login')->with('status','anda belum login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        notify()->success('Berhasil Logout !!');
        return redirect('login');
    }
}
