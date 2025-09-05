<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()->notifications()->paginate(5);

        return view('pages.notifications', compact('notifications'));
    }

    public function read($postId)
    {
        $notification = Auth::user()
            ->unreadNotifications
            ->where('data.id', $postId)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->route('posts.show', $postId);
    }

    public function destroy()
    {
        Auth::user()->notifications()->delete();

        return redirect()->back();
    }
}
