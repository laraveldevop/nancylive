<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\OauthAccessToken;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function userRegister(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'mobile' => ['required','numeric','min:10',  'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => ['required','mimes:jpeg,jpg,png,gif'],
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }


        $user = new User();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->city = $request['city'];
        $user->address = $request['address'];
        $user->mobile = $request['mobile'];
        $user->business_name = $request['business_name'];
        $user->password = Hash::make($request['password']);
        $user->email_verified_at = now();
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('user', $request->file('image'));
            $user->image = $path;

        }
        $user->save();
        $token = $user->createToken('MyApp')->accessToken;
        DB::table('oauth_access_tokens')
            ->where('user_id', $user->id)
            ->update(['remember_token'=>$token]);
        return response()->json(['status'=> true,
           'message'=>'User Register SuccessFull','data'=>$user, 'token'=>$token],200);

    }

    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required',
            'device_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 401);
        }
        $user = User::where('email', '=', $request['email'])->first();
        $device_id = User::where([['device_id', null], ['email', $request['email']]])->first();

        if (isset($device_id)) {

            if (Hash::check($request->password, $user->password)) {
                $data=User::where('email', '=', $request['email'])->first();
                $data->device_id = $request['device_id'];
                $data->save();
                $token =OauthAccessToken::where('user_id',$data->id)->first();
//                echo  $token['remember_token'];die();
//                DB::table('users')
//                    ->where([['device_id', null], ['email', $request['email']]])
//                    ->update(['device_id' => $request['device_id']]);
                return response()->json(['status' => true, 'message' => 'Login SuccessFull', 'data' =>$data,'token'=>$token['remember_token']],200);
            } else {
                $response = "Password miss match";
                return response()->json([
                    'status' => false,'message'=>$response,'data'=>''],422);
            }

        }  elseif ($request['device_id'] == $user['device_id']) {
            if (Hash::check($request->password, $user->password)) {
                $data=User::where('email', '=', $request['email'])->first();
                $token =OauthAccessToken::where('user_id',$data->id)->first();

            return response()->json(['status' => true, 'message' => 'Login SuccessFull', 'data' =>$data,'token'=>$token['remember_token']],200);
            } else {
                $response = "Password miss match";
                return response()->json([
                    'status' => false,'message'=>$response,'data'=>''],422);
            }
        }
        else {
            $response = 'User does not exist';
            return response()->json([
                'status' => false,'message'=>$response,'data'=>''],422);
        }

    }
    public function logout (Request $request) {
        $device_id = User::where([['device_id', $request['device_id']], ['email', $request['email']]])->first();
        if (isset($device_id)) {
            DB::table('users')
                ->where([['device_id', $request['device_id']], ['email', $request['email']]])
                ->update(['device_id' => null,'token'=> null]);
            return response()->json(['status' => true, 'message' => 'Successfully Log-Out']);
        }
        return response(['status'=>false,'message' => 'Invalid Credentials']);

    }


    public function check_user(Request $request) {
//        echo 'tes';die();
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric|min:10|unique:users'
        ]);
//        echo 'test';die();
        if ($validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all(),'data'=>[]], 401);
        }
        $otp =  mt_rand(1000, 9999);
//        $mobile = $request['mobile'];
//        $encodeMassage = urlencode($otp);
//        $authKey = '';
//        $senderId = '';
//        $route = 4;
//        $postData = $request->all();
//
//        $data = array(
//            'authKey'=>$authKey,
//            'mobile'=>$mobile,
//            'message'=> $encodeMassage,
//            'sender'=> $senderId,
//            'route'=>$route
//        );
//        $url = '';
//        $ch = curl_init();
//        curl_setopt_array($ch, array(
//            CURLOPT_URL => $url,
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_PORT => true,
//            CURLOPT_POSTFIELDS => $postData
//        ));
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $output = curl_exec($ch);
//        if (curl_errno($ch)) {
//            echo 'error:' . curl_error($ch);
//        }
//        curl_close($ch);

//        if (!empty($output)) {
//            return response()->json(['status' => true, 'message' => ' SuccessFull','otp'=>$otp]);
//        }


        return response()->json(['status' => true, 'message' => ' SuccessFull','otp'=>$otp]);

    }






}
