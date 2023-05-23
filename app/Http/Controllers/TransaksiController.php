<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Services;
use App\Models\TransaksiDetail;
use App\Models\Member;
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
        $user_role = auth()->user()->role->role;
        $staff_super = ['admin', 'owner'];
        $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
        $compact = ['staff_super', 'staff'];

        // $status = transaksi::all();
        $utang = transaksi::where('total_bayar', '=', 0)->get();
        $kredit = transaksi::where('total', '>', 'total_bayar')->orwhere('total_bayar', '>', '0')->get();
        $lunas = transaksi::where('total', '=', 'total_bayar')->orwhere('total_bayar', '>', 'total')->get();
        

        if ($user_role == 'client') {
            return view('EU.history.index',compact($compact));
        }
        return view('Admin.transaction.index', compact($compact));
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
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        $cart = cart::where('member_id', $member)->get();
        $trx = transaksi::create([
            'tanggal' => $today,
            'member_id' => $request->member_id,
            'total_bayar' => 0,
            'total' => $request->total,
        ]);

        $trxid = $trx->id;

        $transaksi = transaksi::where('id', $trxid)->first();

        foreach ($cart as $c) {
            TransaksiDetail::insert([
                'transaksi_id' => $trxid,
                'produk_id' => $c->produk_id,
                'quantity' => $c->quantity,
                'subtotal' => $c->quantity * $c->produk->harga,
            ]);
        }
        cart::truncate();

        $total = 0;
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        // return $detail;
        $compact = ['detail', 'total', 'transaksi'];

        // return $transaksi;
        // return redirect('EU.transaction.pembayaran', compact($compact));
        return redirect()->route('transaksi.pembayaran')->with(compact($compact));
    }


    public function pembayaran()
    {
        $user = auth()->user()->id;
        $member = member::where('user_id',$user)->pluck('id')->first();
        
        $trxid = transaksi::where('member_id',$user)->get();
        // return $user;
        // return $trxid;
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }

        $compact = ['detail','total'];
        return view('EU.transaction.pembayaran',compact($compact));    
    }

    public function cek()
    {
        return redirect()->back();  
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
