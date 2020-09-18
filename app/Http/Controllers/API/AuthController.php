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
use \Illuminate\Support\Facades\Session;

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
            'password' => ['required', 'string', 'confirmed'],
            'image' => ['required','mimes:jpeg,jpg,png,gif'],
            'device_id'=>['required','string']
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
        $user->device_id = $request['device_id'];
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
                $token = $user->createToken('MyApp')->accessToken;
//
                DB::table('oauth_access_tokens')
                    ->where('user_id', $data->id)
                    ->update(['remember_token'=>$token]);
                return response()->json(['status' => true, 'message' => 'Login SuccessFull', 'data' =>$data,'token'=>$token],200);
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
                ->update(['device_id' => null]);
            DB::table('oauth_access_tokens')->where('user_id', $device_id->id)->delete();
            return response()->json(['status' => true, 'message' => 'Successfully Log-Out']);
        }
        return response(['status'=>false,'message' => 'Invalid Credentials']);

    }

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|numeric|min:10|exists:users'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all(),'data'=>[]], 401);
        }
        else{
            $user = User::where('mobile',$request['mobile'])->first();
            $otp =  mt_rand(1000, 9999);
            $OPT_SMS = urlencode($otp)." verification code. UserId ". $user->id;
            $to = $request['mobile'];
            $name = 'karan';
            $msg = $OPT_SMS;
            $authKey = '';
            $sender = 'DIALME';
            $route = 4;
            $postData = $request->all();

            $url =  "http://www.alots.in/sms-panel/api/http/index.php?username=" . $name . "&apikey=DAEF6-BE96B&apirequest=Text&sender=" . $sender . "&mobile=" . $to . "&message=" . $msg . "&route=TRANS&format=JSON";
            $url = preg_replace("/ /", "%20", $url);
            $response = file_get_contents($url);
            // Process your response here
            // echo $response;
            // die;
            if (!empty($response)) {
                $user->otp = $otp;
                $user->save();
                return response()->json(['status' => true, 'message' => 'Send SuccessFull','data'=>$OPT_SMS,'otp'=>$otp,'user_id'=>$user->id]);

            }
            return FALSE;
        }
    }

    public function verify_otp(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'otp' => 'required|numeric',
            'id' => 'required|numeric|exists:users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all(),'data'=>[]], 401);
        }

        else{
            $user = DB::table('users')->where([
                ['id', '=', $request['id']],
                ['otp', '=', $request['otp']],
            ])->first();
            if (!empty($user)){
                $users=  User::where('id',$request['id'])->first();
                $users->forgot_password_stat = 1;
                $users->otp = null;
                $users->password =  Hash::make($request['otp']);
                $users->save();
                return response()->json(['status' => true, 'message' => 'OTP Verified','data'=>$users]);
            }
            return response()->json(['status' => true, 'message' => 'Invalid Credentials','data'=>$user]);

        }
    }

    public function check_user(Request $request) {
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
//        $OPT_SMS = urlencode($otp)." verification code.";
//        $to = $request['mobile'];
//        $name = 'karan';
//        $msg = $OPT_SMS;
//        $authKey = '';
//        $sender = 'DIALME';
//        $route = 4;
//        $postData = $request->all();

//        $url =  "http://www.alots.in/sms-panel/api/http/index.php?username=" . $name . "&apikey=DAEF6-BE96B&apirequest=Text&sender=" . $sender . "&mobile=" . $to . "&message=" . $msg . "&route=TRANS&format=JSON";
//        $url = preg_replace("/ /", "%20", $url);
//        $response = file_get_contents($url);
        // Process your response here
        // echo $response;
        // die;
//        if (!empty($response)) {
            return response()->json(['status' => true, 'message' => ' SuccessFull','otp'=>$otp]);
//        }
//        return response()->json(['status' => false]);

    }






}
