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
    public function index()
    {
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(request_user $request_user, $request)
    {
        // return $request_user;
        // return $request;
        $trxid = $request;
        $request_user = request_user::where('transaksi_id', $trxid)->get();
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();
        $transaksi = Transaksi::where('id', $trxid)->get();
        foreach ($transaksi as $t) {
            $total = $t->total;
        }
        // return $total;
        $asli = $total;
        
        // $admin = 
        $compact = ['request_user', 'detail', 'transaksi'];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(request_user $request_user)
    {
        //
    }
}
