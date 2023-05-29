<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User:
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;

class RoleController extends Controller
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
        Role::create($request->all());
        notify()->success('Role Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Role Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }

    public function hapus($id)
    {
        $Role = Role::find($id);
        $Role->delete();
        notify()->success('Role Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Role Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('user');
    }

}
