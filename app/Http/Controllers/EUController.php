<?php

namespace App\Http\Controllers;

use App\Models\EU;
use Illuminate\Http\Request;
use App\Models\visitor;
use App\Models\Services;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisLayanan;
use App\Models\User;
use App\Models\Cart;
use Mckenziearts\Notify\LaravelNotify;

class EUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        $visitor = visitor::firstOrCreate(['ip_address' => $ip]);
        $visitor->increment('visits');
        $visitor->save();


        return view('landing-page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth::check()) {
            return 'eu';
        } else {
            notify()->success('Anda belum login');
            return redirect(route('login'));
        }

        // return view('EU.transaction.pembayaran');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function storeindex()
    {
        $layanan = JenisLayanan::with('services.produk')->get();
        return view('EU.store.index', compact('layanan'));
    }

    public function store(Request $request)
    {
        return true;
    }

    /**
     * Display the specified resource.
     */
    public function show(EU $eU, $id)
    {
        $layanan = JenisLayanan::all();

        $jenis_layanan = JenisLayanan::find($id);
        $services = $jenis_layanan->services;

        foreach ($services as $s) {
            foreach ($s->produk as $serv) {
                $pr[$serv->id] = $serv->id;
                $z[$serv->id] = $serv;
            }
        }
        $cek = produk::doesnthave('cart')->pluck('id')->toarray();
        $cart = produk::has('cart')->get('id');

        $irisan_produk = array_intersect_key($pr, array_flip($cek));
        $produk = produk::wherein('id', $pr)->get();
        $p = produk::wherein('id', $pr)->get('id');
        $c = produk::wherein('id', $cart)->get('id');
        
        $pcart = [];
        foreach ($p as $pp) {
            $idp = $pp->id;

            $pc = $c->where('id', $idp)->first();
            if ($pc) {
                $pcart[]= $pc;
            } else {
                $pproduk[] =$pp;
            }
        }

        // return $pproduk;
        // return $pcart;

        return view('EU.store.show', compact('layanan', 'produk', 'jenis_layanan', 'c'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EU $eU)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EU $eU)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EU $eU)
    {
        //
    }
}
