<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class NotificationsComposer{
    public function compose(View $view){
        $user = Auth::user();
        // Fetch all notifications for the authenticated user with pagination
        $notifications = $user->notifications()->paginate(5);

        //Fetch unread notifications for the authenticated user
        $unreadNotificationCount = $user->unreadNotifications->count();

        //Count unread notifications for the authenticated user
        // $unreadCount = $unreadNotifications->count();

        $view->with([
            'allNotificationsCount' => $user->notifications()->count(),
            'notifications' => $notifications,
            // 'unreadCount' => $unreadCount,
            'unreadNotificationCount' => $unreadNotificationCount,
        ]);
    }
}