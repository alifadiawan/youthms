<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Pembayaran;
use App\Models\Request_user;
use App\Models\TransaksiDetail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(5);
        $role = Role::all();

        $u = auth()->user()->role->role;
        // return $u
        $uid = auth()->user()->id;
        $users = User::where('id', $uid)->get();
        // return $email;

        $staff = ["admin", "owner"];
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
        $user->role_id = $request->input('role_id');
        $user->save();

        notify()->success('Akun Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $users = User::whereHas('role', function ($query) {
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
        $users = User::where('id', $uid)->get();
        $member = Member::where('user_id', $uid)->get();
        $mid = $member->value('id');
        $cart = Cart::where('member_id', $mid)->get();
        $transaksi = Transaksi::where('member_id', $mid)->get();
        $checking = [];
        $pending = [];
        $kredit = [];
        $declined = [];
        $lunas = [];
        $utang = [];

        foreach ($transaksi as $t) {
            $acum[] =  $t->id;
            $pemb = Pembayaran::where('transaksi_id', $t->id)->first();
            $req = Request_user::where('transaksi_id', $t->id)->first();
            $pembayaran_checking = $t->pembayaran()->where('status', 'checking')->exists();
            if ($t->total_bayar == 0  && $pemb && $pemb->status == "checking") {
                $checking[] = $t;
            } elseif ($t->total > $t->total_bayar && $req && $req->status == "accept") {
                $kredit[] = $t;
            } elseif ($t->total_bayar == 0 && $req && $req->status == "accept") {
                $kredit[] = $t;
            } elseif ($t->total_bayar == 0 && $req && $req->status == "pending") {
                $pending[] = $t;
            } elseif ($t->total_bayar == 0 && $req && $req->status == "declined") {
                $declined[] = $t;
            } elseif ($t->total_bayar == 0 && !$req) {
                $utang[] = $t;
            } elseif ($t->total_bayar >= $t->total && $req && $req->status == "accept") {
                $lunas[] = $t;
            } elseif ($t->total_bayar >= $t->total && $pemb && $pemb->status == "checked") {
                $lunas[] = $t;
            }elseif ($t->total_bayar > 0 && $pembayaran_checking) {
                $checking[] =  $t;
            }
        }

        $cc = count($checking);
        $cu = count($utang);
        $ck = count($kredit);
        $cp = count($pending);
        $cl = count($lunas);
        $cd = count($declined);

        
        $trx_berjalan = $cc + $cu + $cp;
        $trx_kredit = $ck;
        $trx_riwayat = $cl + $cd;
     
        
        $u = auth()->user()->role->role;
        $staff = ['admin', 'owner'];
        if (in_array($u, $staff)) {

            return view('Admin.user.user-detail', compact('user', 'member'));
        } else {

            return view('EU.user.index', compact('uid', 'users', 'member', 'users','trx_berjalan','trx_kredit','trx_riwayat'));
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
        $staff = ['admin', 'owner'];
        $uid = auth()->user()->id;

        $users = User::where('id', $uid)->get();
        $member = Member::where('user_id', $uid)->get();
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
        $staff = ['admin', 'owner'];

        if (in_array($u, $staff)) {
            if ($request->password == null) {
                // $roles = Role::whereIn('id', $request->role_id)->get();
                $user->update([
                    'username' => $request->username,
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                ]);
                // $user->roles()->sync($roles);
            } else {
                // $roles = Role::whereIn('id', $request->role_id)->get();
                $user->update([
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                ]);
                // $user->roles()->sync($roles);
            }
            notify()->success('Akun Berhasil Diupdate !!');
            // mengirim notifikasi
            $users = User::whereHas('role', function ($query) {
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
            Member::updateorcreate([
                'user_id' => $id,
            ], [
                'id_member' => $request->id_member != null ? $request->id_member : null,
                'name' => $request->name,
                'no_hp' => $request->no_hp,
                'nik' => $request->nik,
                'alamat' => $request->alamat
            ]);
            return redirect()->route('user.show', $id);
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
        $users = User::whereHas('role', function ($query) {
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
            $user = User::whereHas('role')->with('role')->get();
            $activeRoleName = ''; // Tidak ada filter aktif, roleName kosong
        } else {
            $roles = $request->role_id;
            $user = User::where('role_id', '=', $roles)->with('role')->get();
            // return $user;
            $r = Role::where('id', '=', $roles)->first();
            // return $r;
            $activeRoleName = $r ? $r->role : ''; // Mengambil roleName jika role_id valid
            // return $activeRoleName;
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
