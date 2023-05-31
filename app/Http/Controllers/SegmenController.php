<?php

namespace App\Http\Controllers;

use App\Models\Segmen;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class SegmenController extends Controller
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
        Segmen::create($input);
        notify()->success('Segmen Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Segmen Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blog.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(Segmen $segmen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Segmen $segmen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Segmen $segmen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Segmen $segmen)
    {
        //
    }

    public function hapus($id)
    {
        $segmen = Segmen::find($id);
        $segmen->delete();
        
        notify()->success('Segmen Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = User::whereHas('role', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Segmen Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('blog.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect()->back();
    }
}
