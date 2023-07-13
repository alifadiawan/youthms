<?php

namespace App\Http\Controllers;

use App\Models\Request_user;
use App\Models\Member;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TransaksiNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class RequestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trxid = $request->trxid;
        $auth = auth()->user();
        $user = $auth->id;
        $member = Member::where('user_id', $user)->pluck('id')->first();
        $user_role = $auth->role->role;
        // return $user_role;

        $requestUser = Request_user::all();
        $all = Transaksi::where('member_id', $member)->get();
        // $pending = request_user::where('transaksi_id', $trxid)->get();

        if ($user_role == "client") {
            return redirect()->route('transaksi.show', $trxid);
        }

        $request_user = Request_user::all();
        $compact = ['request_user', 'member', 'user'];
        return view('Admin.transaction.acc', compact($compact));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request_user $request_user, $request)
    {
        $reqid = $request;

        $request_user = Request_user::where('id', $reqid)->get();;

        $totaltermin = 0;
        foreach ($request_user as $r) {
            $trxid = $r->transaksi_id;
            $status = $r->status;

            $termin = Pembayaran::where('request_user_id', $reqid)->get();
            if (!is_null($termin) && !$termin->isEmpty()) {
                foreach ($termin as $t) {
                    $totaltermin +=  $t->harga;
                }
            }
        }



        // mengambil kolom transaksi 
        $transaksi = Transaksi::where('id', $trxid)->get();

        // mengambil semua kolom detail transaksi yang berforeign sama seperti $trxid
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();

        // menjabarkan semua kolom, lalu dijumlahkan
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        // mencari harga admin
        $admin = $total * 0.11;

        // mencari harga total
        $grandtotal = $total + $admin;


        $req = Request_user::where('id', $reqid)->value('transaksi_id');
        $trx = Transaksi::where('id', $req)->value('member_id');
        $mid = Member::where('id', $trx)->value('user_id');
        $userid = User::where('id', $mid)->value('id');
        $user = User::find($userid);
        // return $user;

        // $admin = 
        $compact = ['request_user', 'detail', 'transaksi', 'total', 'grandtotal', 'admin', 'status', 'termin', 'totaltermin', 'user'];
        return view('Admin.transaction.YesNo', compact($compact));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(request_user $request_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Request_user $request_user)
    {
        $reqid = $request->requser_id;
        // return $reqid;
        $request_user = Request_user::find($reqid);
        $request_user->update([
            'status' => $request->status,
            'note_admin' => $request->note,
        ]);



        notify()->success('Status Berhasil Diperbarui !!');
        // mengirim notifikasi
        $uid = $request->user_id;
        $user = User::find($uid);
        if ($request_user->status == 'accept') {
            $message = "Pengajuan Kreditmu Telah Diterima\nSilahkan Hubungi Admin\nUntuk Info Lebih Lanjut";
        } else {
            $message = "Maaf Ajuan Kreditmu Ditolak Karena\n" . $request_user->note_admin;
        }
        $notification = new TransaksiNotification($message);
        $notification->setUrl(route('transaksi.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        return redirect()->route('requestuser.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request_user $request_user)
    {
        //
    }
}
