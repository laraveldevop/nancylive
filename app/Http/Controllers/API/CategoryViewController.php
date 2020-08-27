<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Pdf;
use App\Product;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Facades\Validator;

class CategoryViewController extends Controller
{
    public function categoryDetail(Request  $request)
    {
        $validator = Validator::make($request->all(),[
            'status'=> ['required','numeric'],
            'cat_id'=> ['required','numeric'],
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }
        if ($request['status'] == 1){
            $video= Video::where('cat_id',$request['cat_id'])
                ->paginate();
            $v = [$video];
        }
        elseif ($request['status'] == 2){
            $pdf= Pdf::where('cat_id',$request['cat_id'])
                ->paginate();
            $v = [$pdf];
        }
        elseif($request['status'] == 3){
            $product= Product::where('cat_id',$request['cat_id'])
                ->paginate();
            $v = [$product];
        }
        else{
            return response()->json(['status' => false, 'message' => 'Status Not valid', 'data' => []]);

        }

        return response()->json(['status' => true, 'message' => 'Available Data', 'data' =>$v]);
    }

}
