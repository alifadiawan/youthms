<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
            'username' => $request->username,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
            'email' => $request->email,
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

        $u = auth()->user()->role->role;
        $staff = ['admin', 'owner', 'employee'];
        if (in_array($u, $staff)) {

            return view('Admin.user.user-detail', compact('user'));
        } else {

            return view('EU.user.index', compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $user = User::find($id);
        $role = Role::all();


        $u = auth()->user()->role->role;
        $staff = ['admin', 'owner', 'employee'];
        if (in_array($u, $staff)) {

            return view('Admin.user.edit-user', compact('user', 'role'));
        } else {

            return view('EU.user.edit', compact('user'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $u = auth()->user()->role->role;
        $staff = ['admin', 'owner', 'employee'];
        if (in_array($u, $staff)) {
            if ($request->password == null) {
                $user->update([
                    'username' => $request->username,
                    'role_id' => $request->role_id,
                    'email' => $request->email,
                ]);
            } else {
                $user->update([
                    'username' => $request->username,
                    'role_id' => $request->role_id,
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                ]);
            }
            $user = Auth::user();
            $message = "User Telah Diubah!";
            Notification::send($user, new NewMessageNotification($message));
            notify()->success('User Berhasil Diupdate !!');
            return redirect('user/' . $id);
        } else {

            // update profile client
        }


        // mengirim notifikasi
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
        $u = auth()->user()->id;
        $user = User::find($id);
        $user_id = User::where('id', $id)->pluck('id')->first();
        $user->delete();
        // jika user yang akan dihapus adalah user itu sendiri maka otomatis kelogout
        if ($u == $user_id) {
            return redirect('login');
        }

        notify()->success('User Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "User Telah Dihapus!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('user');
    }
}
