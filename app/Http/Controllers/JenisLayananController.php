<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $input = $request->all();
        JenisLayanan::create($input);
        notify()->success('Jenis Layanan Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Jenis Layanan Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        return redirect('/services');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisLayanan $jenisLayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisLayanan $jenisLayanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = JenisLayanan::find($id);
        $jenis->deskripsi = $request->deskripsi;
        $jenis->save();
        notify()->success('Jenis Layanan Berhasil Diedit !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Jenis Layanan Berhasil Diedit !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('services.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisLayanan $jenisLayanan)
    {
        //
    }

    public function hapus($id)
    {
        $jenis_layanan = JenisLayanan::find($id);
        $jenis_layanan->delete();
        notify()->success('Jenis Layanan Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Jenis Layanan Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('services.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect()->back();
    }
}
