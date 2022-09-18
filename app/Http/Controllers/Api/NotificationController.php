<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notifications;
use App\Traits\GeneralTrait;

class NotificationController extends Controller
{
    use GeneralTrait;

    public function notifications($id) {
        $notifications = Notifications::where('user_id', $id)->get();
        return $this->sendResponse('notifications', $notifications, 'Notifications');
    }

    public function updateToken(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['device_token' => $request->token]);
        return $this->sendSuccess('token saved successfully.');
    }

    public function seenNotification($id) {
        $notification = Notification::findOrFail($id);
        $notification->update(['seen' => true]);
        return $this->sendSuccess('updated successfully.');
    }
}
