<?php

namespace App\Http\Controllers;

use App\Models\request_user;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TransaksiNotification;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

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

            // return $user;
            $company = ['admin', 'owner'];

            $cek_user = auth()->user();
            date_default_timezone_set('Asia/Jakarta');
            $transaksi = Transaksi::whereDate('created_at', '<', today())->where('member_id', $cek_user->member->id)->get();

            $telat = [];
            foreach ($transaksi as $t) {
                $req = request_user::where('transaksi_id', $t->id)->first();
                if ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                    $telat[] = $t;
                } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                    $telat[] = $t;
                }
            }

            if ($telat != null) {
                $message = 'hayolo telat';
                $notif = new TransaksiNotification($message);
                $notif->setUrl(route('transaksi.index'));
                Notification::send($cek_user, $notif);
            }

            if (in_array($user, $company)) {

                return redirect()->intended('dashboard');
            } elseif ($user == ["client"]) {

                return redirect()->intended('/');
            } else {
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
        // return redirect('login')->with('status','anda belum login');
        notify()->success('Anda belum login');
        return redirect('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        notify()->success('Berhasil Logout !!');
        return redirect('/');
    }
}
