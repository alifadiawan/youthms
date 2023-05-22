<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read(Request $request)
    {
        $user = Auth::user();
        $url = $request->input('notificationUrl');

        // Temukan notifikasi dengan URL yang sesuai dan tandai sebagai "dibaca"
        $notification = $user->unreadNotifications()->where('data->url', $url)->first();
        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['success' => true]);

    }

    public function read_chat($notifId)
    {
        // Temukan notifikasi berdasarkan ID
            $notification = Auth::user()->notifications()->findOrFail($notifId);

            // Ubah status notifikasi menjadi "dibaca"
            $notification->markAsRead();

            // Arahkan pengguna ke URL room chat
            $roomUrl = $notification->data['room_url'];

            // Mengembalikan respons JSON dengan URL room chat
            return response()->json([
                'redirectUrl' => $roomUrl,
            ]);
    }
}
