<?php

namespace App\Http\Controllers;
use App\Notifications\SendNotify;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use App\Notifications\TaskComplete;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;

class NotificationController extends Controller
{
    use Notifiable;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('container.notification.create');

    }

    public function sendOfferNotification(Request $request, TaskComplete $taskComplete) {
//      Notification::send();
      Notification::send();
       return redirect('notification');
    }
}
