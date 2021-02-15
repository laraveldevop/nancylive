<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class NotificationController extends Controller
{

    public function notification(Request $request)
    {
        $title = $request->input('title');
        $body = $request->input('description');
        $image = $request->file('image');
        $role = $request->input('role');
        $Subrole = $request->input('subrole');
        if ($role != null) {
            $user = User::where('role_id', $role)->get();
            foreach ($user as $value) {
                if ($value->device_id != null) {
                    $playerIds = $value->device_id;
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
                }
            }

            return response()->json(['status'=> true,
                'message'=>'Notification Send Successfully','data'=>$user],200);
        } elseif ($Subrole != null) {
            $user = User::where('sub_role_id', $Subrole)->get();
            foreach ($user as $value) {
                if ($value->device_id != null) {
                    $playerIds = $value->device_id;
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
                }
            }
            return response()->json(['status'=> true,
                'message'=>'Notification  Send Successfully','data'=>$user],200);
        } elseif ($role == null && $Subrole == null) {
            $user = User::all();
            foreach ($user as $value) {
                if ($value->device_id != null) {
                    $playerIds = $value->device_id;
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

                }
            }
            return response()->json(['status'=> true,
                'message'=>'Notification  Send Successfully','data'=>$user],200);

        }
        else{
            return response()->json(['status'=> true,
                'message'=>'User Not Found','data'=>[]],200);
        }
        die();
    }

}
