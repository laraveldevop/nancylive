<?php

namespace App\Http\Controllers\API;

use App\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $id= $request->header('USER_ID');
//        echo $id; die();
        $history = DB::table('history')->where('user_id',$id)->get();
//        echo $history; die();
        return response()->json(['status' => true, 'message' => 'Data Available', 'data' => $history], 200);

    }
}
