<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Services;
use App\Models\TransaksiDetail;
//untuk notif
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\visitor;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $layanan = JenisLayanan::with('services.produk')->get();
        // return view('EU.store.index', compact('layanan'));
    }


    public function history()
    {
        $history = TransaksiDetail::all();
        // return $history;
        return view('Admin.transaction.index');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $today = today();
        $today = date("Y-m-d H:i:s");
        // return $today;
        // return $timestamp; // Output: UNIX timestamp

        transaksi::create([
            'tanggal' => $today,
            'member_id' => $request->member_id,
            'total_bayar' => 0,
            'total' => $request->total,
        ]);
        cart::truncate();


        return view('EU.transaction.pembayaran');
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
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $user = auth()->user()->id;
        $cart = cart::where('member_id', $user)->where('id', $id)->first();
        $cart->delete();
        return redirect()->back();
    }
}
