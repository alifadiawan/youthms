<?php

namespace App\Http\Controllers;

use App\Models\EU;
use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Services;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisLayanan;
use App\Models\User;
use App\Models\Member;
use App\Models\Paket;
use App\Models\Cart;
use App\Models\LandingData;
use App\Models\LandingIllustration;
use App\Models\LandingPartner;
use Mckenziearts\Notify\LaravelNotify;
use App\Models\LandingText;

class EUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ip = $request->ip();
        $visitor = Visitor::firstOrCreate(['ip_address' => $ip]);
        $visitor->increment('visits');
        $visitor->save();

        //tagline
        $text = LandingText::all();

        //illustration
        $illustration = LandingIllustration::all();

        //partners
        $partner = LandingPartner::all();

        //testi
        $testi = LandingData::all();

        //jenis layanan
        $jenis_layanan = JenisLayanan::all();

        //paket
        $paket = Paket::with('produk');
        // $produk = paket_produk::where('paket_id',$p->id)->get();
        
        if (auth()->check()) {
            $uid = auth()->user()->id;

            $m = Member::where('user_id', $uid);
            $mid = $m->pluck('id')->first();
            $member = $m->get();

            $cart = Cart::where('member_id', $mid)->get();

            return view('landing-page', compact('text', 'illustration', 'partner', 'paket', 'testi', 'jenis_layanan', 'member', 'cart'));
        }

        return view('landing-page', compact('text', 'illustration', 'partner', 'paket', 'testi', 'jenis_layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
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

        $layanan = JenisLayanan::with('services.produk')->get();

        $cek = Produk::doesntHave('cart')->pluck('id')->toArray();
        $cart = Produk::has('cart')->get('id');

        $c = Produk::whereIn('id', $cart)->get('id');

        $compact = ['layanan', 'c'];

        if (Auth::check()) {
            $user = auth()->user()->id;
            $member = Member::where('user_id', $user)->get();
            $compact = array_merge($compact, ['user', 'member']);
        }
        return view('EU.store.index', compact($compact));
    }

    public function show(EU $eU, $type)
    {
        $layanan = JenisLayanan::all();
        $jenis_layanan =  JenisLayanan::where('layanan', $type)->first();

        // $user = auth()->user()->id;
        // $member = Member::where('user_id', $user)->get();
        // return $member;

        $jl = JenisLayanan::where('layanan', $type)->first();
        $services = $jl->services;

        foreach ($services as $s) {
            foreach ($s->produk as $serv) {
                $pr[$serv->id] = $serv->id;
                $z[$serv->id] = $serv;
            }
        }
        $cek = Produk::doesntHave('cart')->pluck('id')->toArray();
        $cart = Produk::has('cart')->get('id');

        $irisan_produk = array_intersect_key($pr, array_flip($cek));
        $produk = Produk::whereIn('id', $pr)->get();
        $p = Produk::whereIn('id', $pr)->get('id');
        $c = Produk::whereIn('id', $cart)->get('id');

        $compact = ['layanan', 'produk', 'jenis_layanan', 'c'];
        if (Auth::check()) {
            $user = auth()->user()->id;
            $member = Member::where('user_id', $user)->get();
            $compact = array_merge($compact, ['user', 'member']);
        }

        return view('EU.store.show', compact($compact));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function showprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = Member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

    public function editprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = Member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

    public function updateprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = Member::where('user_id', $user)->get();

        return view('EU.user.index', compact('member'));
    }

    public function hapusprofile()
    {
        // return true;
        $user = auth()->user()->id;
        $member = Member::where('user_id', $user)->get();

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
