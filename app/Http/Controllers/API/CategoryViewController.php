<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use App\Pdf;
use App\Product;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            if ($request['status'] == 1) {
                $category_video = DB::table('category')
                    ->select(array('cat_id', 'cat_name', 'cat_image'))
                    ->leftJoin('module', 'category.module_id', '=', 'module.id')
                    ->where('module.module_name', '=', 'video')
                    ->get()
                    ->toArray();
                foreach ($category_video as $item) {
                    $qu = DB::table('video')
                        ->select(array('video_name', 'url', 'video', 'image'))
                        ->where('cat_id', $item->cat_id)
                        ->get()
                        ->toArray();
                    $v_d = count($qu);
                    array_push($v, ['category_id' => $item->cat_id, 'Category' => $item->cat_name, 'category_image' => $item->cat_image, 'item_count' => $v_d]);
                }
            }
            elseif ($request['status'] == 2) {
            $category_pdf = DB::table('category')
                ->select(array('cat_id', 'cat_name', 'cat_image'))
                ->leftJoin('module', 'category.module_id', '=', 'module.id')
                ->where('module.module_name', '=', 'pdf')
                ->get()
                ->toArray();

            foreach ($category_pdf as $item) {
                $qu = DB::table('pdf')
                    ->select(array('pdf_name', 'file'))
                    ->where('cat_id', $item->cat_id)
                    ->get()
                    ->toArray();
                $p_d = count($qu);
                array_push($v, ['category_id' => $item->cat_id, 'Category' => $item->cat_name, 'category_image' => $item->cat_image, 'item_count' => $p_d]);
            }
            } elseif ($request['status'] == 3) {
                $product = [];
                $category_product = DB::table('category')
                    ->select(array('cat_id', 'cat_name', 'cat_image'))
                    ->leftJoin('module', 'category.module_id', '=', 'module.id')
                    ->where('module.module_name', '=', 'product')
                    ->get()
                    ->toArray();
                foreach ($category_product as $item) {
                    $qu = DB::table('product')
                        ->select(array('product_name', 'detail'))
                        ->where('cat_id', $item->cat_id)
                        ->get()
                        ->toArray();
                    $pd = count($qu);
                    array_push($v, ['category_id' => $item->cat_id, 'Category' => $item->cat_name, 'category_image' => $item->cat_image, 'item_count' => $pd]);
                }
            }
            else {
                return response()->json(['status' => false, 'message' => 'Status Not valid', 'data' => []]);

            }
        }
        else {
            if ($request['status'] == 1) {
                $video = Video::where('cat_id', $request['cat_id'])
                    ->leftjoin('artist','artist_id','=','artist.id')
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
