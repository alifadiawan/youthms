<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupMessageSent;
use App\Models\GroupMessage;
use App\Models\Group;
use App\Models\User;

class GroupChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = GroupMessage::create([
            'group_id' => $request->input('group_id'),
            'user_id' => $request->input('user_id'),
            'message' => $request->input('message')
        ]);

        event(new GroupMessageSent($message));

        return response()->json(['status' => 'Message sent']);
    }

    public function index()
    {
        $group = Group::all();

        return view('EU.chat.index', compact('group'));
    }

    public function store(Request $request)
    {
        $group = Group::create([
            'group' => $request->input('group'),
            'admin_id' => auth()->user()->id,
        ]);
        $group->users()->attach(auth()->user()->id);
        return redirect()->route('gc.index');
    }

    public function addUser(Group $group, User $user)
    {
        $group->users()->attach($user->id);
        return redirect()->route('groups.show', ['group' => $group->id]);
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
}
