<?php

namespace App\Http\Controllers\API;

use App\History;
use App\Http\Controllers\Controller;
use App\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $id= $request->header('USER_ID');
        $history = DB::table('history')->where('user_id',$id)->get();
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
