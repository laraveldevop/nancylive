<?php

namespace App\Http\Controllers;
use App\Notifications\SendNotify;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Notifications\Notification;
use App\Notifications\TaskComplete;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('container.notification.create');

    }

    public function sendOfferNotification() {

        auth()->user()->notify(new SendNotify());

       return redirect('notification');
    }
}
