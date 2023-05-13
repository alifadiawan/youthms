<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewMessageNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Auth;

class NotificationController extends Controller
{
    public function read()
    {
        $users = Auth::user();
        $notifications = $users->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
