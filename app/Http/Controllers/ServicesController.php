<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Services;
use App\Models\User;
use Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Services::paginate(9);
        $jenis_layanan = JenisLayanan::all();
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
        return view('Admin.services.index', compact('services', 'jenis_layanan', 'notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_layanan = JenisLayanan::all();
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
        return view('Admin.services.tambah', compact('jenis_layanan', 'notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function id_services()
    {

    }

    public function store(Request $request)
    {
        $services = Services::count();
        $currentNumber = $services;
        $nextNumber = str_pad(++$currentNumber, 5, '0', STR_PAD_LEFT); // "00002"

        $data = $request->all();
        Services::create($data);

        notify()->success('Berhasil ditambahkan',$request->judul);
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Layanan Berhasil ditambahkan";
        Notification::send($user, new NewMessageNotification($message));

        return redirect('services');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $services = Services::find($id);
        $jenis_layanan = JenisLayanan::find($id);
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
        return view('Admin.services.detail', compact('services', 'jenis_layanan', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $services = Services::find($id);
        $jenis_layanan = JenisLayanan::all();
        $users = Auth::user();
        $notifications = $users->unreadNotifications;
        return view('Admin.services.edit', compact('services', 'jenis_layanan', 'notifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $services = Services::find($id);
        $input = $request->all();

        $services->fill($input)->save();

        notify()->success('Perubahan telah tersimpan');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Perubahan telah tersimpan";
        Notification::send($user, new NewMessageNotification($message));

        return redirect('/services');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $services = Services::find($id);
        $services->delete();

        return redirect('/services');
    }

    public function hapus($id)
    {
        $services = Services::find($id);
        $services->delete();

        notify()->success('Layanan telah dihapus');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Layanan telah dihapus";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('/services');
    }
}
