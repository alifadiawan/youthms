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
use App\Models\Member;
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

    

    public function store(Request $request)
    {
        return true;
    }


    public function storeindex()
    {
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->get();

        $layanan = JenisLayanan::with('services.produk')->get();
        // return $layanan;
        // $layanan = JenisLayanan::all();
        // $jenis_layanan =  JenisLayanan::where('layanan', $type)->first();

        // return $member;

        // $jl = JenisLayanan::where('layanan',$type)->first();
        
        $cek = produk::doesnthave('cart')->pluck('id')->toarray();
        $cart = produk::has('cart')->get('id');

        $c = produk::wherein('id', $cart)->get('id');


        return view('EU.store.index', compact('layanan', 'c','user','member'));
    }
    
    public function show(EU $eU, $type)
    {
        $layanan = JenisLayanan::all();
        $jenis_layanan =  JenisLayanan::where('layanan', $type)->first();

        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->get();
        // return $member;

        $jl = JenisLayanan::where('layanan',$type)->first();
        $services = $jl->services;

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

        return view('EU.store.show', compact('layanan', 'produk', 'jenis_layanan', 'c','user','member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

    public function editprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

    public function updateprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

    public function hapusprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

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
