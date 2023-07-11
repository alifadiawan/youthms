<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket = Paket::with('paket_produk')->get();
        $produk = Produk::all();
        // return $paket;
        return view('Admin.paket.index', compact('paket', 'produk'));
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
        // return $request->isi_paket;
        // Buat objek paket baru
        $paket = new Paket;
        $paket->nama_paket = $request->nama_paket;
        $paket->save();

        // Attach produk yang dipilih ke paket
        $paket->produk()->attach($request->isi_paket);

        notify()->success('Paket Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Paket Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('paket.index', ['paket'=> $paket->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        //
    }

    public function hapus(Paket $paket)
    {
        $paket = Paket::findOrFail($paket->id);
        $paket->delete();
        notify()->success('Paket Telah Dihapus !!');
        return redirect()->back();
    }
}
