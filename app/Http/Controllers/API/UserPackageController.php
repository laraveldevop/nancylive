<?php

namespace App\Http\Controllers\API;

use App\History;
use App\Http\Controllers\Controller;
use App\Order;
use App\Package;
use App\PackageVideo;
use App\User;
use App\UserPackage;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserPackageController extends Controller
{

    public function addPlusMines(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'add' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()], 422);
        }
        $package = UserPackage::where('user_id', '=', $request['user_id'])->first();
        if (!empty($package)) {
            if ($request->input('add') == 'true') {
                if ($package['video_count'] == null) {
                    return response()->json(['status' => false, 'message' => 'Video Count Not Available', 'data' => $package], 422);

                } elseif ($package['video_count'] == 0) {
                    $package->video_count = 1;
                    $package->save();
                } else {
                    $package->video_count = $package['video_count'] + 1;
                    $package->save();
                }
            } elseif ($request->input('add') == 'false') {
                if ($package['video_count'] == null) {
                    return response()->json(['status' => false, 'message' => 'Video Count Not Available', 'data' => $package], 422);

                } elseif ($package['video_count'] == 0) {
                    $package->video_count = null;
                    $package->save();
                } else {
                    $package->video_count = $package['video_count'] - 1;
                    $package->save();
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Only Allow True Or False', 'data' => []], 422);

            }
        } else {
            return response()->json(['status' => false, 'message' => 'Package Not Found', 'data' => $package], 422);

        }

    }

// add user package
    public function userPackage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'numeric'],
            'package_id' => ['numeric'],
            'video_id' => ['numeric'],
            'single_video_id' => ['numeric'],
            'payment_status' => ['required'],
            'transaction_id' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->all()], 422);
        }

        $package = Package::where('id', $request['package_id'])->first();
        $video = Video::where('id', $request['video_id'])->first();

        if ($request['payment_status'] == 'true') {
            if ($request['package_id'] != null) {
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
                $userPackage->payment = $request['payment_status'];
                $userPackage->transaction_id = $request['transaction_id'];
                $userPackage->price = $request['price'];
                if ($package['stat'] == 2) {
                    $userPackage->stat = 2;
                    $userPackage->category_id = $package['category_id'];
                } elseif ($package['stat'] == 1) {
                    $userPackage->stat = 1;
                } elseif ($package['stat'] == 3) {
                    $userPackage->stat = 3;
                    $userPackage->video_count = $package['video_count'];
                } else {
                    $userPackage->stat = 4;
                    $userPackage->video_id = $package['video_id'];
                    $userPackage->video_count = $package['video_count'];
                }
                $userPackage->created_at =$request['created_at'];
                $userPackage->save();


                $history = new History();
                $history->expire_date = $userPackage->expire_date;
                $history->user_id = $request['user_id'];
                $history->package_id = $request['package_id'];
                $history->stat = $userPackage->stat;
                $history->video_count = $userPackage->video_count;
                $history->category_id = $userPackage->category_id;
                $history->payment = $request['payment_status'];
                $history->transaction_id = $request['transaction_id'];
                $history->price = $request['price'];
                $history->created_at =$request['created_at'];
                $history->save();
                return response()->json(['status' => true, 'message' => 'User Package Create successfully.', 'data' => $userPackage], 200);
            } else {
                $userPackage = new UserPackage();
                $userPackage->user_id = $request['user_id'];
                $userPackage->single_video_id = $request['single_video_id'];
                $userPackage->stat = 5;
                $userPackage->payment = $request['payment_status'];
                $userPackage->transaction_id = $request['transaction_id'];
                $userPackage->price = $request['price'];
                $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $video['day'] . ' day'));
                $userPackage->created_at =$request['created_at'];
                $userPackage->save();

                $history = new History();
                $history->user_id = $userPackage->user_id;
                $history->single_video_id = $userPackage->single_video_id;
                $history->stat = $userPackage->stat;
                $history->expire_date = $userPackage->expire_date;
                $history->payment = $request['payment_status'];
                $history->transaction_id = $request['transaction_id'];
                $history->price = $request['price'];
                $history->created_at =$request['created_at'];
                $history->save();
                return response()->json(['status' => true, 'message' => 'User Package Create successfully.', 'data' => $userPackage], 200);
            }
        } elseif ($request['payment_status'] == 'false') {
            if ($request['package_id'] != null) {
                $userPackage = new History();

                if (!empty($package['year'])) {
                    $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $package['year'] . ' year'));
                } elseif (!empty($package['month'])) {
                    $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $package['month'] . ' month'));
                } else {
                    $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $package['day'] . ' day'));
                }
                $userPackage->user_id = $request['user_id'];
                $userPackage->package_id = $request['package_id'];
                $userPackage->payment = $request['payment_status'];
                $userPackage->transaction_id = $request['transaction_id'];
                $userPackage->price = $request['price'];
                $userPackage->created_at =$request['created_at'];
                if ($package['stat'] == 2) {
                    $userPackage->stat = 2;
                    $userPackage->category_id = $package['category_id'];
                } elseif ($package['stat'] == 1) {
                    $userPackage->stat = 1;
                } elseif ($package['stat'] == 3) {
                    $userPackage->stat = 3;
                    $userPackage->video_count = $package['video_count'];
                } else {
                    $userPackage->stat = 4;
                    $userPackage->video_id = $package['video_id'];
                    $userPackage->video_count = $package['video_count'];
                }
                $userPackage->save();
                return response()->json(['status' => true, 'message' => 'User Package History Create successfully.', 'data' => $userPackage], 200);
            } else {
                $userPackage = new History();
                $userPackage->user_id = $request['user_id'];
                $userPackage->single_video_id = $request['single_video_id'];
                $userPackage->stat = 5;
                $userPackage->payment = $request['payment_status'];
                $userPackage->transaction_id = $request['transaction_id'];
                $userPackage->price = $request['price'];
                $userPackage->created_at =$request['created_at'];
                $userPackage->expire_date = date('Y-m-d', strtotime(today() . '+ ' . $video['day'] . ' day'));
                $userPackage->save();

                return response()->json(['status' => true, 'message' => 'User Package History Create successfully.', 'data' => $userPackage], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'payment status allow only true or false.', 'data' => []], 200);
        }

    }

// user package update for user view video or package
    public
    function userPackageUpdate(Request $request)
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
                $allPackage = UserPackage::where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 1],
                    ['video_count', '==', null],
                    ['category_id', '==', null],
                ])->first();
                $categoryPackage = UserPackage::where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 2],
                    ['video_count', '!=', null],
                    ['category_id', '=', $request['category_id']],
                ])->first();
                $singleVideoPackage = UserPackage::where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 5],
                    ['single_video_id', '=', $request['video_id']],
                    ['category_id', '=', null],
                ])->first();
                $videoPackage = UserPackage::where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 3],
                    ['video_count', '!=', null],
                    ['category_id', '=', null],
                ])->first();
                $videoWisePackage = UserPackage::where([
                    ['user_id', '=', $item['user_id']],
                    ['stat', '=', 4],
                    ['video_count', '!=', null],
                    ['category_id', '=', null],
                ])->whereRaw("FIND_IN_SET('" . $request['video_id'] . "',video_id)")->first();
                if (!empty($allPackage)) {
                    $packageVideo = new PackageVideo();
                    $packageVideo->user_package_id = $allPackage['id'];
                    $packageVideo->package_id = $allPackage['package_id'];
                    $packageVideo->video_id = $request['video_id'];
                    $packageVideo->status = 0;
                    $packageVideo->save();

                    return response()->json(['status' => true, 'message' => 'User All Package available', 'data' => $allPackage], 200);
                } elseif (!empty($categoryPackage)) {

                    if ($categoryPackage->video_count == 0) {
                        $categoryPackage->video_count = null;
                        $categoryPackage->save();
                    } else {

                        $categoryPackage->video_count = $item->video_count - 1;
                        $categoryPackage->save();

                        $packageVideo = new PackageVideo();
                        $packageVideo->user_package_id = $categoryPackage['id'];
                        $packageVideo->package_id = $categoryPackage['package_id'];
                        $packageVideo->category_id = $categoryPackage['category_id'];
                        $packageVideo->video_id = $request['video_id'];
                        $packageVideo->status = 0;
                        $packageVideo->save();
                    }
                    return response()->json(['status' => true, 'message' => 'User Category Package available', 'data' => $categoryPackage], 200);
                } elseif (!empty($singleVideoPackage)) {
                    $packageVideo = new PackageVideo();
                    $packageVideo->user_package_id = $singleVideoPackage['id'];
                    $packageVideo->video_id = $request['video_id'];
                    $packageVideo->status = 0;
                    $packageVideo->save();
                    return response()->json(['status' => true, 'message' => 'User single video Package available', 'data' => $singleVideoPackage], 200);
                } elseif (!empty($videoWisePackage)) {

                    if ($videoWisePackage->video_count == 0) {
                        $videoWisePackage->video_count = null;
                        $videoWisePackage->save();
                    } else {

                        $videoWisePackage->video_count = $item->video_count - 1;
                        $videoWisePackage->save();

                        $packageVideo = new PackageVideo();
                        $packageVideo->user_package_id = $videoWisePackage['id'];
                        $packageVideo->package_id = $videoWisePackage['package_id'];
                        $packageVideo->video_id = $request['video_id'];
                        $packageVideo->status = 0;
                        $packageVideo->save();
                    }
                    return response()->json(['status' => true, 'message' => 'User Module-wise Package available', 'data' => $videoWisePackage], 200);
                } elseif (!empty($videoPackage)) {

                    if ($videoPackage->video_count == 0) {
                        $videoPackage->video_count = null;
                        $videoPackage->save();
                    } else {

                        $videoPackage->video_count = $item->video_count - 1;
                        $videoPackage->save();

                        $packageVideo = new PackageVideo();
                        $packageVideo->user_package_id = $videoPackage['id'];
                        $packageVideo->package_id = $videoPackage['package_id'];
                        $packageVideo->video_id = $request['video_id'];
                        $packageVideo->status = 0;
                        $packageVideo->save();
                    }
                    return response()->json(['status' => true, 'message' => 'User Module-wise Package available', 'data' => $videoPackage], 200);
                }
            } else {
                return response()->json(['status' => false, 'message' => 'Users package Expire.', 'data' => []], 200);
            }
        }


        return response()->json(['status' => false, 'message' => 'User Package Not Found.', 'data' => []], 200);

    }

// list of user package
    public
    function packageBuy(Request $request)
    {
        $request->validate([
            'stat' => 'required',
        ]);
        $stat = $request->input('stat');
        $user_id = $request->input('user_id');
        if ($stat == 1) {
            $package = UserPackage::select(DB::raw('user_package.id,users.name as user_name,users.mobile,user_package.package_id,package.name as package_name,user_package.stat,user_package.payment,user_package.transaction_id'))
                ->leftJoin('users', 'user_package.user_id', '=', 'users.id')
                ->leftJoin('package', 'user_package.package_id', '=', 'package.id')
                ->get();
            return response()->json(['status' => true, 'message' => 'Data Available', 'data' => $package], 200);
        } elseif ($stat == 2) {
            $request->validate([
                'user_id' => 'required',
            ]);
            UserPackage::select(DB::raw('user_package.id,users.name as user_name,users.mobile,user_package.package_id,package.name as package_name,user_package.stat,user_package.payment,user_package.transaction_id'))
                ->where('user_package.user_id', $user_id)
                ->leftJoin('users', 'user_package.user_id', '=', 'users.id')
                ->leftJoin('package', 'user_package.package_id', '=', 'package.id')
                ->get();
        }

    }
}
