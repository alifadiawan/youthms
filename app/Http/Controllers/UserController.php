<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Auth;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $role = Role::all();
        
        return view('Admin.user.index', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();
        
        return view('Admin.user.add-user', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'username'=>$request->username,
            'role_id'=>$request->role_id,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
        ]);
        notify()->success('User Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "User Baru Telah Ditambahkan !";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        
        return view('Admin.user.user-detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $role = Role::all();
        
        return view('Admin.user.edit-user', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($request->password == null) {
            $user->update([
                'username'=>$request->username,
                'role_id'=>$request->role_id,
                'email'=>$request->email,
            ]);
        }

        else {
            $user->update([
                'username'=>$request->username,
                'role_id'=>$request->role_id,
                'password'=>bcrypt($request->password),
                'email'=>$request->email,
            ]);
        }
        notify()->success('User Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "User Telah Diubah!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('user/'.$id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function hapus(string $id)
    {
        $user = User::find($id);
        $user->delete();
        notify()->success('User Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "User Telah Dihapus!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('user');
    }
}
