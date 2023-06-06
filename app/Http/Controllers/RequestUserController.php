<?php

namespace App\Http\Controllers;

use App\Models\request_user;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use App\Notifications\TransaksiNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\termin;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;

class RequestUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $trxid = $request->trxid;
        $auth = auth()->user();
        $user = $auth->id;
        $member = member::where('user_id', $user)->pluck('id')->first();
        $user_role = $auth->role->role;
        // return $user_role;

        $requestUser = request_user::all();
        $all = transaksi::where('member_id', $member)->get();
        // $pending = request_user::where('transaksi_id', $trxid)->get();

        if ($user_role == "client") {
            $compact = [];
            // return view('EU.transaction.kredit', compact($compact));
            return redirect()->route('transaksi.history');
        }

        $request_user = request_user::all();
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
    public function show(request_user $request_user, $request)
    {
        $reqid = $request;
        
        $request_user = request_user::where('id', $reqid)->get();;

        foreach($request_user as $r){
            $trxid = $r->transaksi_id;
            $status = $r->status;
            
            $termin = termin::where('requser_id',$reqid)->get();
        }
        
        $totaltermin = 0;
        foreach ($termin as $t ) {
            $totaltermin +=  $t->harga;
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

        
        // $trx = transaksi::where)

        // $admin = 
        $compact = ['request_user', 'detail', 'transaksi','total','grandtotal','admin','status','termin','totaltermin'];
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
    public function update(Request $request, request_user $request_user)
    {
        // return $request;
        $reqid = $request->requser_id;
        return User::where('id', $reqid);
        // return $reqid;
        $request_user = request_user::find($reqid);
        $request_user->update([
            'status' => $request->status,
            'note_admin' => $request->note, 
        ]);


        notify()->success('Status Berhasil Diperbarui !!');
        // mengirim notifikasi
        $user = auth()->user()->id;
        if ($request_user->status == 'accept') {
            $message = "Pengajuan Kreditmu Telah Diterima\nSilahkan Hubungi Admin\nUntuk Info Lebih Lanjut";
        } else {
            $message = "Maaf Ajuan Kreditmu Ditolak Karena\n".$request_user->note_admin;
        }
        $notification = new TransaksiNotification($message);
        $notification->setUrl(route('transaksi.history')); // Ganti dengan rute yang sesuai
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
