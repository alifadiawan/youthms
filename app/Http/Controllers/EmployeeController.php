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
        Member::create([
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
        Notification::send($user, new NewMessageNotification($message));
        return redirect('employee');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
        // code...
    }
}
