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
        $user = User::paginate(5);
        $role = Role::all();

        $u = auth()->user()->roles->pluck('role')->toArray();
        // return $u;
        $uid = auth()->user()->id;
        $users = User::where('id', $uid)->get();
        // return $email;

        $staff = ["admin", "owner"];
        if (count(array_intersect($u, $staff))>0) {

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
        // $u = User::create([
        //     'username' => $request->username,
        //     'role_id' => $request->role_id,
        //     'password' => bcrypt($request->password),
        //     'email' => $request->email,
        // ]);

        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        $user->roles()->attach($request->input('role_id'));

        notify()->success('Akun Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Akun Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.show', ['user' => $user->id])); // Ganti dengan rute yang sesuai
        Notification::send($users, $notification);
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
        $Member = member::where('user_id', $user->id)->get();

        $u = auth()->user()->roles->pluck('role')->toArray();
        $staff = ['admin', 'owner'];
        if (count(array_intersect_assoc($u, $staff))>0) {

            return view('Admin.user.user-detail', compact('user', 'Member'));
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

        $u = auth()->user()->roles->pluck('role')->toArray();
        $staff = ['admin', 'owner'];
        $uid = auth()->user()->id;

        $users = user::where('id', $uid)->get();
        $member = member::where('user_id', $uid)->get();
        // return $member;

        // pembuatan id_member
        $m = Member::count();
        $currentNumber = $m;
        $nextNumber = str_pad(++$currentNumber, 5, '0', STR_PAD_LEFT); // "00002"

        if (count(array_intersect_assoc($u, $staff))>0) {

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
        $u = auth()->user()->roles->pluck('role')->toArray();
        $staff = ['admin', 'owner'];

        if (count(array_intersect_assoc($u, $staff))>0) {
            if ($request->password == null) {
                $roles = Role::whereIn('id', $request->role_id)->get();
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                ]);
                $user->roles()->sync($roles);
            } else {
                $roles = Role::whereIn('id', $request->role_id)->get();
                $user->update([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                ]);
                $user->roles()->sync($roles);
            }
            notify()->success('Akun Berhasil Diupdate !!');
            // mengirim notifikasi
            $users = User::whereHas('roles', function ($query) {
                $query->whereIn('role', ['admin', 'owner']);
            })->get();
            $message = "Akun Berhasil Diupdate !!";
            $notification = new NewMessageNotification($message);
            $notification->setUrl(route('user.show', ['user' => $user->id])); // Ganti dengan rute yang sesuai
            Notification::send($users, $notification);
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

        notify()->success('Akun Berhasil Dihapus !!');

        // mengirim notifikasi
        $users = User::whereHas('roles', function ($query) {
            $query->whereIn('role', ['admin', 'owner']);
        })->get();
        $message = "Akun Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.index')); // Ganti dengan rute yang sesuai
        Notification::send($users, $notification);
        return redirect('user');
    }

    public function filterUsers(Request $request)
    {
        // return $roles;

        if ($request->role_id == null) {
            $user = User::whereHas('roles')->with('role')->get();
            $activeRoleName = ''; // Tidak ada filter aktif, roleName kosong
        }
        else {
            $roles = $request->role_id;
            $user = User::whereHas('roles', function ($query) use ($roles) {
                $query->whereIn('role_id', $roles);
            })->with('roles')->get();
            $activeRoleNames = Role::whereIn('id', $roles)->pluck('role')->toArray();
            $activeRoleName = implode(', ', $activeRoleNames); // Menggabungkan nama role jika role_id valid
        }

        // Menggunakan array asosiatif untuk mengirim data ke AJAX
        $response = [
            'user' => $user,
            'activeRoleName' => $activeRoleName
        ];
        // return $response;

        return response()->json($response); // Mengirimkan respons dalam format JSON
    }
}
