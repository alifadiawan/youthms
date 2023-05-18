<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Produk;
use App\Models\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Produk::all();
        $services = Services::all();
        
        return view('Admin.store.index' , compact('product' , 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_services = Services::all();    
        
        return view('Admin.store.tambah' , compact('jenis_services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk_baru = $request->all();
        $produk = Produk::create($produk_baru);

        notify()->success('Berhasil ditambahkan',$request->nama_produk,);
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Produk Berhasil ditambahkan";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('adm_store.show', ['adm_store' => $produk->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/adm_store');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Produk::find($id);
        
        return view('Admin.store.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Produk::find($id);
        $services = Services::all();
        
        return view('Admin.store.edit' , compact('product' , 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Produk::find($id);
        $input = $request->all();
        
        $product->update($input);

        notify()->success('Produk berhasil diupdate');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Produk Berhasil diupdate";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('adm_store.show', ['adm_store' => $product->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/adm_store');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function hapus($id)
    {
        $products = Produk::find($id);
        $product = $products->delete();

        notify()->success('Produk berhasil dihapus');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Produk Berhasil dihapus";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('adm_store.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/adm_store');

    }
}
