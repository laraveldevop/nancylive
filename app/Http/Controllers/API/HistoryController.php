<?php

namespace App\Http\Controllers\API;

use App\History;
use App\Http\Controllers\Controller;
use App\PackageVideo;
use App\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $id= $request->input('user_id');

        $history = History::where('user_id',$id)->get();
        foreach ($history as $value){
            $video = DB::table('history')
                ->leftJoin('video','history.single_video_id','=','video.id')
                ->where('user_id',$value->user_id)
                ->where('single_video_id',$value->single_video_id)
                ->select('video.video_name as name')->first();
            $package = DB::table('history')
                ->leftJoin('package','history.package_id','=','package.id')
                ->where('user_id',$value->user_id)
                ->where('package_id',$value->package_id)
                ->select('package.name')->first();
            $q =  DB::table('history')
                ->leftJoin('product','history.product_id','=','product.id')
                ->where('user_id',$value->user_id)
                ->where('product_id',$value->product_id)
                ->select('product.product_name as name')->first();
            if ($value->single_video_id != null){
                $yourDate = $value['created_at'];
                $value['create'] = Carbon::createFromFormat('Y-m-d H:i:s', $yourDate)->format('Y-m-d');
                $value['video_name'] = $video->name ;
                $value['cat'] = 'Single Video' ;

            }
            if ($value->package_id != null){
                $yourDate = $value['created_at'];
                $value['create'] = Carbon::createFromFormat('Y-m-d H:i:s', $yourDate)->format('Y-m-d');
                $value['package_name'] = $package->name ;
                $value['cat'] = 'Package' ;
            }
            if($value->product_id != null) {
                $yourDate = $value['created_at'];
                $value['create'] = Carbon::createFromFormat('Y-m-d H:i:s', $yourDate)->format('Y-m-d');
                $value['product_name'] = $q->name;
                $value['cat'] = 'Product' ;
            }
            $value['user_package_history']=PackageVideo::where('package_id',$value->package_id)->get();
        }

//        echo $history; die();

        return response()->json(['status' => true, 'message' => 'Data Available', 'data' => $history], 200);
    }

    public function userPackageHistory(Request $request)
    {
        $package = UserPackage::where('package_id',$request['package_id'])->get();
        if ($request['package_id'] == null){
            $allPackage = UserPackage::all();
            return response()->json(['status' => true, 'message' => 'Data Available', 'data' => $allPackage], 200);

        }
        else{
            return response()->json(['status' => true, 'message' => 'Data Available', 'data' => $package], 200);

        }
    }
}
