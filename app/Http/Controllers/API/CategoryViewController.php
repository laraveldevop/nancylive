<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Pdf;
use App\Product;
use App\ProductImage;
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
            'status'=> 'required|numeric'
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }
        $v=[];
        $data=[];
        if ($request['cat_id'] == null){
            if ($request['status'] == 1){
                $video= DB::table('category')
                    ->select(array('cat_id', 'category.cat_name','category.cat_image','module.module_name'))
                    ->leftJoin('module','category.module_id', '=', 'module.id')
                    ->where('module.module_name', '=', 'video')
                    ->orderBy('cat_name', 'ASC')
                    ->get()
                    ->toArray();
                $v = $video;
            }
            elseif ($request['status'] == 2){
                $pdf=   DB::table('category')
                    ->select(array('cat_id', 'category.cat_name','category.cat_image','module.module_name'))
                    ->leftJoin('module','category.module_id', '=', 'module.id')
                    ->where('module.module_name', '=', 'pdf')
                    ->orderBy('cat_name', 'ASC')
                    ->get()
                    ->toArray();
                $v = $pdf;
            }
            elseif($request['status'] == 3){
                $product=  DB::table('category')
                    ->select(array('cat_id', 'category.cat_name','category.cat_image','module.module_name'))
                    ->leftJoin('module','category.module_id', '=', 'module.id')
                    ->where('module.module_name', '=', 'product')
                    ->orderBy('cat_name', 'ASC')
                    ->get()
                    ->toArray();

                $v = $product;
            }
            else{
                return response()->json(['status' => false, 'message' => 'Status Not valid', 'data' => []]);

            }
        }
        else {
            if ($request['status'] == 1) {
                $video = Video::where('cat_id', $request['cat_id'])
                    ->paginate(15);
                $v = [$video];
            } elseif ($request['status'] == 2) {
                $pdf = Pdf::where('cat_id', $request['cat_id'])
                    ->paginate(15);
                $v = [$pdf];
            } elseif ($request['status'] == 3) {
                $product = Product::where('cat_id', $request['cat_id'])->paginate(15);
                $product_view=[];
                foreach ($product as $item) {
                    $images= DB::table('product_image')
                        ->select('image')
                        ->where('product_id',$item->id)
                        ->get();
                    $item['image'] = $images;
                    array_push($product_view,['product_name'=>$item]);
                }

                $v = $product;
            } else {
                return response()->json(['status' => false, 'message' => 'Status Not valid', 'data' => []]);

            }
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' =>$v]);
    }



}
