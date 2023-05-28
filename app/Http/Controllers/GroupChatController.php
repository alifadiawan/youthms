<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\GroupMessageSent;
use App\Models\GroupMessage;
use App\Models\Group;

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

    public function showMessage($id)
    {
        $group = Group::find($id);
        $gm = GroupMessage::where('group_id', $group->id)->get();

        return response()->json(['messages' => $gm]);
    }
}
