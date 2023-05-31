<?php

namespace App\Http\Controllers;

use App\Models\request_user;
use App\Models\Member;
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
        $user_role = $auth->roles->pluck('role')->toarray();

        $requestUser = request_user::all();
        $all = transaksi::where('member_id', $member)->get();
        $pending = request_user::where('transaksi_id', $trxid)->get();
        // return $pending;

        if (in_array('client', $user_role)) {
            $compact = [];
            return view('EU.transaction.kredit', compact($compact));
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
        
        $request_user = request_user::where('id', $reqid)->get();
        
        foreach($request_user as $r){
            $trxid = $r->transaksi_id;
        }
        // return $trxid;
        $transaksi = Transaksi::where('id', $trxid)->get();
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();

        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        $admin = $total * 0.11;
        $grandtotal = $total + $admin;

        // $admin = 
        $compact = ['request_user', 'detail', 'transaksi','total','grandtotal','admin'];
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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request_user $request_user)
    {
        //
    }
}
