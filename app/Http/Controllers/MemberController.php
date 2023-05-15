<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Auth;
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
        $member = Member::all();
        
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
        Member::create([
            'id_member' => $request->id_member,
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'role' => $request->role,
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
        $member = Member::find($id);
        
        return view('Admin.member.member-detail', compact('member'));
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
        $member = Member::find($id);
        $member->delete();
        notify()->success('Member Berhasil Dihapus !!');
        // mengirim notifikasi
        $user = Auth::user();
        $message = "Member Berhasil Dihapus !!";
        Notification::send($user, new NewMessageNotification($message));
        return redirect('member');
    }
}
