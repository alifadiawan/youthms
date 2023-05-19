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

    public function cart()
    {
        $user = auth()->user()->id;
        $cart = cart::where('member_id',$user)->get()->sortByDesc('cart.created_at');
        // $cart = produk::has('cart')->get()->sortByDesc('cart.created_at');
        // return $cart;   
        return view('EU.transaction.cart',compact('cart'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view("EU.transaction.index", compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return 'berhasil ditambahkan';
        // return $request;
        cart::create($request->all());
        return redirect()->back();
        // notify()->success('produk berhasil ditambahkan');    
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
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
