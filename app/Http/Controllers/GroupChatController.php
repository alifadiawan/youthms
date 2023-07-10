<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupMessageSent;
use App\Models\GroupMessage;
use App\Models\Group;
use Illuminate\Support\Str;
use App\Models\User;

class GroupChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = GroupMessage::create([
            'group_id' => $request->input('group_id'),
            'user_id' => auth()->user()->id,
            'message' => $request->input('message')
        ]);

        // event(new GroupMessageSent($message));

        return response()->json(['success' => true]);
    }

    public function loadNewMessage(Group $group)
    {
        $messages = $group->group_messages;
        return view('EU.chat.new-message', compact('messages'));
    }

    public function index()
    {
        $group = Group::whereHas('users', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
        // $group = Group::all();
        // return $group;

        return view('EU.chat.index', compact('group'));
    }

    public function store(Request $request)
    {
        $random = Str::random(7);
        $group = Group::create([
            'group' => $request->input('group'),
            'kode' => $random,
        ]);
        $group->admin()->attach(auth()->user()->id);
        $group->users()->attach(auth()->user()->id);
        return redirect()->route('gc.index');
    }

    public function addUser(Group $group, Request $request)
    {
        $userid = $request->input('users');
        $group->users()->attach($userid);
        return redirect()->route('gc.index');
    }

    public function addAdmin(Group $group, Request $request)
    {
        $userid = $request->input('users');
        $group->admin()->attach($userid);
        return redirect()->route('gc.index');
    }

    public function removeUser(Group $group, User $user)
    {
        $group->users()->detach($user->id);
        return redirect()->route('groups.show', $group->id);
    }

    public function showMessage(Group $group)
    {
        $messages = $group->group_messages;
        $users = User::whereDoesntHave('groups', function ($query) use ($group) {
            $query->where('group_id', $group->id);
        })->get();
        return view('EU.chat.chat-show', compact('group', 'messages', 'users'));
    }

    public function joinGroup(Request $request)
    {
        $kode = $request->input('kode');
        // return $kode;
        $group = Group::whereHas('users', function ($query) use ($kode) {
            $query->where('user_id', '!=' ,auth()->user()->id);
        })->where('kode', $kode)->get();
        // return $group;
        if ($group->count() > 0) {
            $group->first()->users()->attach(auth()->user()->id);
            return redirect('/group-chat');
        }
        else {
            return redirect()->back()->with('error', 'Kode Yang Anda Masukkan Salah !!');
        }
    }
}
