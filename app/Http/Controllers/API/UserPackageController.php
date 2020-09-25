<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
use App\UserPackage;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserPackageController extends Controller
{
    public function userPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'package_id' => ['numeric'],
            'video_id' => ['numeric']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()], 422);
        }

        if ($request['package_id'] != null) {
            $package = Package::where('id', $request['package_id'])->first();

            $userPackage = new UserPackage();

            if (!empty($package['year'])) {
                $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $package['year'] . ' year'));
            } elseif (!empty($package['month'])) {
                $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $package['month'] . ' month'));
            } else {
                $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $package['day'] . ' day'));
            }
            $userPackage->user_id = $request['user_id'];
            $userPackage->package_id = $request['package_id'];
            if (!empty($package['category_id'])) {
                $userPackage->stat = 2;
                $userPackage->category_id = $package['category_id'];
            } elseif (empty($package['category_id']) && empty($package['content_count'])) {
                $userPackage->stat = 1;
            } else {
                $userPackage->stat = 3;
                $userPackage->video_count = $package['content_count'];
            }
            $userPackage->save();

            return response()->json(['status' => true, 'message' => 'User Package Create successfully.', 'data' => $userPackage], 200);
        } else {
            $video = Video::where('id', $request['video_id'])->first();
            $userPackage = new UserPackage();
            $userPackage->user_id = $request['user_id'];
            $userPackage->single_video_id = $request['video_id'];
            $userPackage->stat = 4;
            $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $video['day'] . ' day'));
            $userPackage->save();

            return response()->json(['status' => true, 'message' => 'User Package Create successfully.', 'data' => $userPackage], 200);
        }

    }

    public function userPackageUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'video_id' => ['required', 'numeric'],
            'category_id' => ['numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()], 422);
        }

        $package = UserPackage::where('user_id', '=', $request['user_id'])->get();
        $a = [];

        foreach ($package as $item) {
            array_push($a, ['stat' => $item->stat, 'video_count' => $item->video_count, 'category_id' => $item->category_id]);
            if ($item->expire_date > today()) {
                $allPackage = DB::table('user_package')->where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', '1'],
                    ['video_count', '=', null],
                    ['category_id', '=', null],
                ])->first();
                $categoryPackage = DB::table('user_package')->where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 2],
                    ['video_count', '=', null],
                    ['category_id', '=', $request['category_id']],
                ])->first();

                $singleVideoPackage = DB::table('user_package')->where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 4],
                    ['single_video_id', '=', $request['video_id']],
                    ['category_id', '=' , null],
                ])->first();
                $videoPackage = DB::table('user_package')->where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 3],
                    ['video_count', '!=', null],
                    ['category_id', '=', null],
                ])->first();


                if (!empty($allPackage)) {
                    return response()->json(['status' => true, 'message' => 'User All Package available', 'data' => $allPackage], 200);
                } elseif (!empty($categoryPackage)) {
                    return response()->json(['status' => true, 'message' => 'User Category Package available', 'data' => $categoryPackage], 200);
                } elseif (!empty($singleVideoPackage)) {
                    return response()->json(['status' => true, 'message' => 'User single video Package available', 'data' => $singleVideoPackage], 200);
                } elseif (!empty($videoPackage)) {
                        $video = UserPackage::where([
                            ['user_id', $request['user_id']],
                            ['video_count', '=', $item->video_count],
                            ['stat', '=', 3],
                            ['category_id', '=', null],
                        ])->first();
                    if ($video->video_count == 0){
                        UserPackage::destroy($video->id);
                    }
                        $vu= $video->video_id.','.$request['video_id'];

                        $video->video_id = $vu;
                        $video->video_count = $item->video_count - 1;
                        $video->save();
                    return response()->json(['status' => true, 'message' => 'User Module-wise Package available', 'data' => $video], 200);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Users package Expire.', 'data' => []], 200);
            }
        }


        return response()->json(['status' => true, 'message' => 'User Package Create successfully.', 'data' => $a], 200);

    }
}
