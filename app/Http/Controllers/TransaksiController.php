<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\Services;

//untuk notif
use App\Models\User;
// use Auth;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $services = Services::all();
        $jenis_layanan = JenisLayanan::all();
        // $Produk = Produk::where()->get();
        // $Produk = Produk::all();
        // $produk = DB::table('produk')
        //     ->join('services', 'produk.jenis_services_id', '=', 'services.id')
        //     ->select('produk.jenis_services_id', 'services.id')
        //     ->get();
            $p= produk::where('jenis_services_id', '>', '0')->with('services')->get();
            return $p;
        // $Produk = Produk::where()->with('services')->get();
        // return $produk;
        // return $Produk;

        //untuk menampilkan notifikasi di topbar
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
        return view("Admin.transaction.index", compact('p', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = JenisLayanan::all();
        $produk = produk::all();
        $services = Services::all();
        // return $services;
        //untuk menampilkan notifikasi di topbar
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
        return view("EU.transaction.index", compact('produk', 'notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //untuk menampilkan notifikasi di topbar
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //untuk menampilkan notifikasi di topbar
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
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
