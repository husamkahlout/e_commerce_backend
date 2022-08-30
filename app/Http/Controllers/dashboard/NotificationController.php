<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public function index()
    {
        return view('dashboard.notifications');
    }

    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function sendNotification(Request $request)
    {
        // return response()->json(['token saved successfully.']);
        $deviceToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $users = User::whereNotNull('device_token')->get();
        $SERVER_API_KEY = 'AAAA-UW6o9Y:APA91bF3ADThr9m2vIxbSXZfcTvGWzUFvzKDBFnroO5fUz7ZuEszj58NclodRwkkktXry4bI4orB0-lPousbTFCwfAGIK-yg6seyIsareHiiDl5pyH9thng0W2_6sIxlJbBY340YIRLS';

        $data = [
            "registration_ids" => $deviceToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ],
            "priority" => "high",
            "data" => [
                "clickaction" => "FLUTTERNOTIFICATIONCLICK",
                "status" => "done"
            ],
            // "to" => "/topics/all"
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

        $response = curl_exec($ch);
        if (curl_error($ch)) {
            $error_msg = curl_error($ch);
            return redirect()->back()->with('error', $error_msg);
        }
        if($request->hasFile('notification_image')) {
            $uploadImage = $request->file('notification_image');
            $nameImage   = time() . '.' . $uploadImage->getClientOriginalExtension();
            $direction   = public_path('image/');
            $uploadImage->move($direction , $nameImage);
            $pathImage   = '/image/' . $nameImage;

            // $request['image'] = $pathImage;
        }
        foreach ($users as $user) {
            Notifications::create([
                "user_id"   => $user->id,
                "title"     => $request->title,
                "body"      => $request->body,
                "image"     => $pathImage
            ]);
        }
        // return $response;
        return redirect()->back()->with('success', __('message.add_success'));
    }
}
