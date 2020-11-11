<?php

namespace App\Http\Controllers;
use App\Notifications\SendNotify;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Notifications\Notifiable;
use App\Notifications\TaskComplete;
use NotificationChannels\OneSignal\OneSignalMessage;

class NotificationController extends Controller
{
    use Notifiable;
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index()
    {
        return view('container.notification.create');

    }

    public function sendOfferNotification(Request $request) {
//      Notification::send();
        $title= $request->input('title');
        $body= $request->input('message');

//        $user = User::first();
//        $user->notify(new TaskComplete($title));
        $playerIds = 'fa68eeb7-e4b3-49d9-a3db-997045cce38b';
        $key = 'MzE2YmQ2NjYtZTI2OS00MmUwLWI2YzEtZWYzNWFkM2M5ZjRk'; // add one single key
        $message = $title;

        $title = '';
        $ids = array($playerIds);
        $content = array(
            "en" => 'English Message',
            "title" => $title,
            "message" => $body,
        );
        $fields = array(
            'app_id' => "5bee468b-1748-4717-a7f6-e0afb7e451d7", // add one single app_id
            // 'included_segments' => array('All'),
            'large_icon' => "ic_launcher.png",
            'small_icon' => "ic_launcher_small.png",
            'include_player_ids' => $ids,
            'contents' => $content
        );

        $fields = json_encode($fields);
        //var_dump($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ' . $key));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);
        //print("\nJSON sent:\n");
        print($response);
        die;
       return redirect('notification');
    }
}
