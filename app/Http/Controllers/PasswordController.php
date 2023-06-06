<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function forgotIndex()
    {
        return view('forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', '=', $data['email'])->get();
        // return $user;
        if ($user->isNotEmpty()) {
            return redirect('/reset-password');
        } else {
            return back()->withErrors([
                'email' => 'Email Tidak Ditemukan !!',
            ]);
        }
    }

    public function resetIndex()
    {
        return view('reset-password');
    }

    public function resetPassword(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password-confirm' => 'required'
        ]);

        $user = User::where('email', '=', $data['email'])->first();
        
        if ($user) {
            if ($data['password'] == $data['password-confirm']) {
                $user->password = bcrypt($data['password']);
                $user->save();
                return redirect('login')->with('status', 'Berhasil Reset Password');
            }
            else {
                return back()->withErrors([
                    'password' => 'Password Confirm Salah !!',
                ]);
            }
        }
        else {
            return back()->withErrors([
                'email' => 'Email Tidak Ditemukan !!',
            ]);
        }
    }
}
