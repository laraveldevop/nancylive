<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
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
        $package= Package::where('id',$request['package_id'])->first();

        $userPackage =new UserPackage();
        $userPackage->user_id = $request['user_id'];
        $userPackage->package_id = $request['package_id'];
        $userPackage->video_count = $package['content_count'];
        if(!empty($package['year'])) {
            $userPackage->expire_date = date('Y-m-d', strtotime($package['created_at'] . '+ ' . $package['year'] . ' year'));
        }elseif (!empty($package['month'])) {
            $userPackage->expire_date = date('Y-m-d', strtotime($package['created_at'] . '+ ' . $package['month'] . ' month'));
        }else {
            $userPackage->expire_date = date('Y-m-d', strtotime($package['created_at'] . '+ ' . $package['day'] . ' day'));
        }
        if (!empty($package['category_id'])) {
            $userPackage->stat = 2;
            $userPackage->category_id = $package['category_id'];
        }elseif (empty($package['category_id'] && $package['content_count'])) {
            $userPackage->stat = 1;
        }else {
            $userPackage->stat = 3;
            $userPackage->video_count = $package['content_count'];

        }
        $userPackage->save();
        return response()->json(['status'=>true,'message'=>'User Package Create successfully.' ,'data'=>$userPackage ],200);

    }

    public function userPackageUpdate(Request $request){
        $validator = Validator::make($request->all(),[
            'user_id' => ['required', 'numeric'],
            'video_id' => ['required', 'numeric'],
            'package_id' => ['required', 'numeric'],
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all()], 422);
        }
        $user = UserPackage::where('user_id',$request['user_id'])->first();
        $user->video_id = $request['video_id'];
        $user->save();
        return response()->json(['status'=>true,'message'=>'User Package Create successfully.' ,'data'=>$user ],200);

    }
}
