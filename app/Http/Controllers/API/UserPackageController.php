<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserPackageController extends Controller
{
    public function userPackage(Request  $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id' => ['required', 'numeric'],
            'package_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all()], 422);
        }

        $userPackage =new UserPackage();
        $userPackage->user_id = $request['user_id'];
        $userPackage->package_id = $request['package_id'];
        $userPackage->save();
        return response()->json(['status'=>true,'message'=>'User Package Create successfully.' ,'data'=>$userPackage ],200);

    }
}
