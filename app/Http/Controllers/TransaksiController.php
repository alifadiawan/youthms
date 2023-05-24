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
        $auth = auth()->user();
        $user_role = $auth->role->role;
        $user = $auth->id;
        $member = member::where('user_id', $user)->pluck('id')->first();
        // return $member;



        $utang = transaksi::where('member_id', $member)->where('total_bayar', 0)->get();
        $kredit = transaksi::where('member_id', $member)->whereColumn('total', '>', 'total_bayar')->where('total_bayar', '>', '0')->get();
        $lunas = transaksi::where('member_id', $member)->where(function ($lunas) {
            $lunas->whereColumn('total', '<', 'total_bayar')->orWhereColumn('total_bayar', 'total');
        })->get();


        $staff_super = ['admin', 'owner'];
        $staff = ['programmer', 'ui/ux', 'sekretariat', 'reborn'];
        $status = ['utang', 'kredit', 'lunas'];
        $compact = ['staff_super', 'staff', $status];

        // $compact = array_merge($compact,$status);

        // return $compact;
        if ($user_role == 'client') {
            return view('EU.history.index', compact($compact));
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

        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->pluck('id')->first();

        $total = $request->total;
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;
        // return $request->member_id;

        $cart = cart::where('member_id', $member)->get();
        $trx = transaksi::create([
            'tanggal' => $today,
            'member_id' => $request->member_id,
            'total_bayar' => 0,
            'total' => $grandtotal,
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
        $member = member::where('user_id', $user)->pluck('id')->first();
        // return $member;

        $trxid = transaksi::where('member_id', $member)->latest()->value('id');
        // return $trxid;
        // return $user;
        // return $trxid;
        $detail = TransaksiDetail::where('transaksi_id', $trxid)->get();
        // return $detail;
        $total = 0;
        foreach ($detail as $d) {
            $total += $d->produk->harga * $d->quantity;
        }
        $admin = $total * 0.11;
        $grandtotal = $total + $admin;
        // return $total;


        $compact = ['detail', 'total', 'grandtotal', 'admin'];
        return view('EU.transaction.pembayaran', compact($compact));
    }

    public function bayar()
    {
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
        return 'halodek';
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
    }
}
