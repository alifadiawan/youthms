<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Member;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $role = Role::all();

        $u = auth()->user()->role->role;
        $uid = auth()->user()->id;
        $users = user::where('id', $uid)->get();
        // return $email;

        $staff = ['admin', 'owner', 'employee'];
        if (in_array($u, $staff)) {

            return view('Admin.user.index', compact('user', 'role'));
            // return view('Admin.user.user-detail', compact('user'));
        } else {

            return view('EU.user.index', compact('uid', 'users'));
        }
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
        $u = User::create([
            'username' => $request->username,
            'role_id' => $request->role_id,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);
        notify()->success('Akun Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Akun Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.show', ['user' => $u->id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $uid = auth()->user()->id;
        $users = user::where('id', $uid)->get();
        $member = member::where('user_id', $uid)->get();

        $u = auth()->user()->role->role;
        $staff = ['admin', 'owner', 'employee'];
        if (in_array($u, $staff)) {

            return view('Admin.user.user-detail', compact('user'));
        } else {

            return view('EU.user.index', compact('uid', 'users', 'member','users'));
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
        $uid = auth()->user()->id;

        $users = user::where('id', $uid)->get();
        $member = member::where('user_id', $uid)->get();
        // return $member;

        // pembuatan id_member
        $m = Member::count();
        $currentNumber = $m;
        $nextNumber = str_pad(++$currentNumber, 5, '0', STR_PAD_LEFT); // "00002"

        if (in_array($u, $staff)) {

            return view('Admin.user.edit-user', compact('user', 'role'));
        } else {

            return view('EU.user.edit', compact('uid', 'member', 'users', 'nextNumber'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $u = auth()->user()->role->role;
        $staff = ['admin', 'employee', 'owner'];

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
            notify()->success('Akun Berhasil Diupdate !!');
            // mengirim notifikasi
            $user = Auth::user();
            $message = "Akun Berhasil Diupdate !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('user.show', ['user' => $user->id])); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);
            return redirect('user/' . $id);
        } else {
            // return $request;

            // tabel user
            if ($request->password == null) {
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                ]);
            } else {
                $user->update([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                ]);
            }

            // tabel member
            // pesan
            $msg = [
                'required' => ':attribute tidak boleh kosong!'
            ];

            // validasi
            $this->validate($request, [
                'name' => 'required',
                'nik' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required'
            ], $msg);

            $idm = $request->id_member;

            // return $request;
            member::updateorcreate([
                'user_id' => $id,
            ], [
                'id_member' => $request->id_member != null ? $request->id_member : null,
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'nik' => $request->nik,
                'alamat' => $request->alamat
            ]);
            return redirect()->route('user.show',$id);
        }
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
        $message = "Akun Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('user');
    }
}
