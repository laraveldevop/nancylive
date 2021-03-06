<?php

namespace App\Http\Controllers\API;

use App\AllPackage;
use App\Http\Controllers\Controller;
use App\Package;
use App\PackageVideo;
use App\UserPackage;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::all();

        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $package]);

    }

    // for in user package update video count
    public function packageVideo(Request $request)
    {
        $request->validate([
            'package_id' => 'required',
            'user_id' => 'required',
        ]);
        $package = $request->input('package_id');
        $user = $request->input('user_id');

        $v = UserPackage::where([['package_id', $package],['user_id',$user]])->first();
        $v->video_count = $v['video_count'] - 1;
        $v->save();
        return response()->json(['status' => true, 'message' => 'Update Data Successfully', 'data' => $v]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'package' => 'required',
        ]);
        $pack = $request->input('package');
        $id = $request->input('id');
        $module = DB::table('module')
            ->where('module_name', 'video')
            ->first();
        if ($pack == 4){
            if ($id == null) {

                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'video_id' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                    'time_duration' => 'required',
                    'image' => 'mimes:jpeg,jpg,png',
                ]);
                if ($request->file('image') == null) {
                    $request->validate([
                        'image' => 'required'
                    ]);
                }
                $method = $request->input("custom_method");

                $package = new Package();
                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->module_type = $module->id;
                $package->video_id = $request->input('video_id');
                $package->detail = $request->input('detail');
                $package->time_method = $method;
                $package->video_count = $request->input('video_count');
                $package->count_duration = $request->input('time_duration');
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');
                } else {
                    $package->year = $request->input('time_duration');
                }
                if (!empty($request->file('image'))) {
                    $path = Storage::disk('public')->put('package', $request->file('image'));
                    $package->image = $path;
                }
                $package->stat = 4;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Add Data Successfully', 'data' => $package]);

            } else {
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'video_id' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                    'time_duration' => 'required',
                ]);
                $method = $request->input("custom_method");
                $package = Package::where([['module_type', '!=', null], ['id', '=', $id]])->first();
                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->module_type = $module->id;
                $package->video_id = $request->input('video_id');
                $package->detail = $request->input('detail');
                $package->time_method = $method;
                $package->count_duration = $request->input('time_duration');
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');
                } else {
                    $package->year = $request->input('time_duration');
                }

                if (!empty($request->file('image'))) {
                    if (!empty($package->image)) {
                        $image_path = public_path() . '/storage/' . $package->image;
                        unlink($image_path);
                    }
                    $path = Storage::disk('public')->put('package', $request->file('image'));
                    //Update Image
                    $package->image = $path;
                }
                $package->stat = 4;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->video_count = $request->input('video_count');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Update Data Successfully', 'data' => $package]);

            }
        }
        elseif ($pack == 3) {

            if ($id == null) {

                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'video_count' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                    'time_duration' => 'required',
                    'image' => 'mimes:jpeg,jpg,png'
                ]);
                if ($request->file('image') == null) {
                    $request->validate([
                        'image' => 'required'
                    ]);
                }
                $method = $request->input("custom_method");

                $package = new Package();
                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->module_type = $module->id;
                $package->video_count = $request->input('video_count');
                $package->detail = $request->input('detail');
                $package->time_method = $method;
                $package->count_duration = $request->input('time_duration');
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');
                } else {
                    $package->year = $request->input('time_duration');
                }
                if (!empty($request->file('image'))) {
                    $path = Storage::disk('public')->put('package', $request->file('image'));
                    $package->image = $path;
                }
                $package->stat = 3;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Add Data Successfully', 'data' => $package]);

            } else {
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'video_count' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                    'time_duration' => 'required',
                ]);
                $method = $request->input("custom_method");
                $package = Package::where([['module_type', '!=', null], ['id', '=', $id]])->first();
                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->module_type = $module->id;
                $package->video_count = $request->input('video_count');
                $package->detail = $request->input('detail');
                $package->time_method = $method;
                $package->count_duration = $request->input('time_duration');
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');
                } else {
                    $package->year = $request->input('time_duration');
                }

                if (!empty($request->file('image'))) {
                    if (!empty($package->image)) {
                        $image_path = public_path() . '/storage/' . $package->image;
                        unlink($image_path);
                    }
                    $path = Storage::disk('public')->put('package', $request->file('image'));
                    //Update Image
                    $package->image = $path;
                }
                $package->stat = 3;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Update Data Successfully', 'data' => $package]);

            }
        } elseif ($pack == 2) {
            if ($id == null) {
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                    'time_duration' => 'required',
                    'category_id' => 'required',
                    'image' => 'mimes:jpeg,jpg,png'
                ]);
                if ($request->file('image') == null) {
                    $request->validate([
                        'image' => 'required'
                    ]);
                }
                $ct = $request->input('category_id');
                $method = $request->input("custom_method");

                $package = new Package();
                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->category_id = $ct;
                $package->detail = $request->input('detail');
                $package->time_method = $method;
                $package->count_duration = $request->input('time_duration');
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');
                } else {
                    $package->year = $request->input('time_duration');
                }
                if (!empty($request->file('image'))) {
                    $path = Storage::disk('public')->put('package', $request->file('image'));
                    $package->image = $path;
                }
                $package->stat = 2;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Add Data Successfully', 'data' => $package]);

            } else {
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                    'time_duration' => 'required',
                    'category_id' => 'required',
                    'video_count' => 'required',
                ]);
                $package = Package::where([['category_id', '!=', null], ['id', '=', $id]])->first();

                $ct = $request->input('category_id');
                $method = $request->input("custom_method");

                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->category_id = $ct;
                $package->count_duration = $request->input('time_duration');
                $package->detail = $request->input('detail');
                $package->time_method = $method;
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');
                } else {
                    $package->year = $request->input('time_duration');
                }
                if (!empty($request->file('image'))) {
                    if (!empty($package->image)) {
                        $image_path = public_path() . '/storage/' . $package->image;
                        unlink($image_path);
                    }
                    $path = Storage::disk('public')->put('package', $request->file('image'));

                    //Update Image
                    $package->image = $path;
                }
                $package->stat = 2;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Update Data Successfully', 'data' => $package]);

            }
        } elseif ($pack == 1) {
            if ($id == null) {
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'time_duration' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                ]);
                if ($request->file('image') == null) {
                    $request->validate([
                        'image' => 'required'
                    ]);
                }

                $method = $request->input("custom_method");
                $package = new Package();
                $package->name = $request->input('name');
                $package->price = $request->input('price');
                $package->count_duration = $request->input('time_duration');
                $package->detail = $request->input('detail');

                $package->time_method = $method;
                if ($method == 'day') {
                    $package->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $package->month = $request->input('time_duration');

                } else {
                    $package->year = $request->input('time_duration');

                }
                if (!empty($request->file('image'))) {
                    $path = Storage::disk('public')->put('package', $request->file('image'));
                    $package->image = $path;
                }
                $package->stat = 1;
                $package->status = $request->input('status');
                $package->video_duration = $request->input('video_duration');
                $package->save();
                return response()->json(['status' => true, 'message' => 'Add Data Successfully', 'data' => $package]);

            } else {
                $request->validate([
                    'name' => 'required',
                    'price' => 'required',
                    'time_duration' => 'required',
                    'detail' => 'required',
                    'custom_method' => 'required',
                ]);
                $method = $request->input("custom_method");
                $allPackage = AllPackage::where([['module_type', '==', null], ['category_id', '==', null], ['id', '=', $id]])->first();

                $allPackage->name = $request->input('name');
                $allPackage->price = $request->input('price');
                $allPackage->count_duration = $request->input('time_duration');
                $allPackage->detail = $request->input('detail');
                $allPackage->time_method = $request->input("custom_method");
                if ($method == 'day') {
                    $allPackage->day = $request->input('time_duration');
                } elseif ($method == 'month') {
                    $allPackage->month = $request->input('time_duration');

                } else {
                    $allPackage->year = $request->input('time_duration');

                }
                if (!empty($request->file('image'))) {
                    if (!empty($allPackage->image)) {
                        $image_path = public_path() . '/storage/' . $allPackage->image;
                        unlink($image_path);
                    }
                    $path = Storage::disk('public')->put('package', $request->file('image'));

                    //Update Image
                    $allPackage->image = $path;
                }
                $allPackage->stat = 1;
                $allPackage->status = $request->input('status');
                $allPackage->video_duration = $request->input('video_duration');
                $allPackage->save();
                return response()->json(['status' => true, 'message' => 'Update Data Successfully', 'data' => $allPackage]);

            }
        } else {
            return response()->json(['status' => false, 'message' => 'Not valid',], 422);

        }

    }

    public function destroy(Request $request)
    {
        $allPackage = $request->input('id');
        $pack = Package::where('id', $allPackage)->first();
        if (isset($pack)) {
            if ($pack['image'] != null) {
                $image_path = public_path() . '/storage/' . $pack['image'];
                unlink($image_path);
            }
            Package::destroy($allPackage);
            return response()->json(['status' => true, 'message' => 'Delete Successfully', 'data' => []]);
        } else {
            return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);

        }
    }

    //user_id wise package list
    public function packageList(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $user = $request->input('user_id');
        $user_package = UserPackage::select(DB::raw('package.id as package_id,user_package.id as user_package_id,package.name,package.price as package_price,package.detail,package.status,    user_package.created_at,user_package.expire_date,user_package.transaction_id,user_package.package_id,user_package.payment,user_package.video_id,user_package.single_video_id,user_package.video_count,user_package.category_id,users.name as user_name,users.email,users.mobile,users.city,users.address'))
            ->leftjoin('package', 'package.id', 'user_package.package_id')
            ->leftjoin('users', 'users.id', 'user_package.user_id')
            ->where('user_package.user_id', $user)->get();
        if (!empty($user_package)){
           foreach ($user_package as $item){
               $package_video = PackageVideo::where('user_package_id',$item->user_package_id)->get();
               $item['package_video'] = $package_video;
           }
        }
        return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $user_package]);


    }

}
