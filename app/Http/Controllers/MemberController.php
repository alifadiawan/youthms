<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where("role_id", "=", 2)->pluck("id");
        $member = Member::whereIn("user_id", $user)->get();
        return view('Admin.member.index', compact('member'));    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.member.add-member');
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
        notify()->success('Member Berhasil Ditambahkan !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Member Berhasil Ditambahkan !!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('member');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = auth()->user()->id;
        return $user;
        
        $member = Member::find($id);
        $user = User::find($id);
        return view('Admin.member.member-detail', compact('member', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $member = Member::find($id);
        return view('Admin.member.edit-member', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $Member=Member::find($id);
        $input=$request->all();
        $Member->update($input);
        notify()->success('Member Berhasil Diupdate !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Member Berhasil Diupdate !!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('member');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }

    public function hapus($id)
    {
        // $member = Member::find($id);
        // $user = User::where();
        // dd($user);
        // $member->delete();

        // Menghapus User yang memiliki id yang sama dengan user_id pada Member
        $member = Member::find($id);
        $user = User::find($id);

        $member->delete();
        $user->delete();

        notify()->success('Member Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Member Berhasil Dihapus !!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('member');
    }
}
