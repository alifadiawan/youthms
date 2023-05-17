<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read($notificationId)
    {
        
        $user = Auth::user();
            
            // Dapatkan notifikasi berdasarkan ID
            $notification = $user->notifications()->find($notificationId);
            
            // Periksa apakah notifikasi ditemukan
            if (!$notification) {
                // Lakukan tindakan jika notifikasi tidak ditemukan
                // Misalnya, tampilkan pesan error atau kembalikan respons error
                return response()->json(['error' => 'Notifikasi tidak ditemukan'], 404);
            }

            // Tandai notifikasi sebagai "dibaca"
            $notification->markAsRead();

            // Lakukan tindakan lain yang diinginkan setelah notifikasi dibaca
            // Misalnya, arahkan pengguna ke halaman terkait, tampilkan pesan sukses, dll.
            // return redirect()->back();
            return response()->json(['message' => 'Notifikasi telah ditandai sebagai dibaca']);

    }
}
