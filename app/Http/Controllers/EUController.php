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
        // return true;

        // Transaksi::create([
        //     'total' => '',
        //     'total_bayar' =>0,
        //     'member_id' =>'aowe'
        // ]);
        // return true;
        if (auth::check()) {
            return true;
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
        $layanan = JenisLayanan::all();
        // return true;
        // return $layanan;
        return view('EU.store.index', compact('layanan'));
    }

    public function store(Request $request)
    {
        return true;


        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EU $eU, $type)
    {
        $jenis_layanan = JenisLayanan::where('layanan', $type)->first();
            
        if (!$jenis_layanan) {
            abort(404); // Tambahkan penanganan jika jenis layanan tidak ditemukan
        }

        // $s = Services::all();
        // $layanan = JenisLayanan::all();
        // $services = Services::where('jenis_layanan_id', $id)->get();
        // $idservices = $services->pluck('id');
        // $jenis_layanan = JenisLayanan::find($id);
        // // return $jenis_layanan;
        // foreach ($services as $serv) {
        //     $produk[$serv->id] = produk::where('services_id', $serv->id)->with('services')->get();
        // }
        // $produk = collect($produk)->flatten();

        $s = Services::all();
        $layanan = JenisLayanan::all();
        $services = Services::where('jenis_layanan_id', $jenis_layanan->id)->get();
        $idservices = $services->pluck('id');

        $produk = [];
            
        foreach ($services as $serv) {
            $produk[$serv->id] = Produk::where('services_id', $serv->id)->with('services')->get();
        }
            
        $produk = collect($produk)->flatten();

        return view('EU.store.show', compact('layanan', 'produk', 'jenis_layanan'));
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
