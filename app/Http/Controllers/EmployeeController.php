<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where("role_id", "=", 2)->pluck("id");
        $member = Member::whereNotIn("user_id", $user)->get();
        return view('Admin.employee.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.employee.add-employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //insert id member
        $member = Member::count();
        $currentNumber = $member;
        $nextNumber = str_pad(++$currentNumber, 5, '0', STR_PAD_LEFT); // "00002"
        $employee = Member::create([
            'user_id' => $request->user_id,
            'id_member' => $nextNumber,
            'nik' => $request->nik,
            'name' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);
        notify()->success('Data Diri Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Data Diri Berhasil Ditambahkan !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.show', ['user' => $employee->user_id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::find($id);
        $user = User::find($id);
        return view('Admin.employee.employee-detail', compact('member', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::find($id);
        return view('Admin.employee.edit-employee', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Member=Member::find($id);
        $input=$request->all();
        $Member->update($input);
        notify()->success('Profile Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Profile Berhasil Diupdate !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.show', ['user' => $Member->user_id])); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('/user/'.$Member->user_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function hapus($id)
    {
        // Menghapus User yang memiliki id yang sama dengan user_id pada Member
        $member = Member::find($id);
        $user = User::find($id);

        $member->delete();
        $user->delete();

        notify()->success('Profile Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Profile Berhasil Dihapus !!";
        $notification = new NewMessageNotification($message);
        $notification->setUrl(route('user.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);
        return redirect('user');
    }
}
