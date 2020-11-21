<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Pdf;
use App\Product;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
                    ->get();
                foreach ($video as $item){
                    if ($item->price == null){
                        $item['payment_status'] = 'free';

                    }
                    else{
                        $item['payment_status']= 'payable';
                    }
                    $artist = Artist::where('id',$item->artist_id)->get();
                    $item['artist']= $artist;

                }
                $v = [$video];
            } elseif ($request['status'] == 2) {
                $pdf = Pdf::where('cat_id', $request['cat_id'])
                    ->get();
                $v = [$pdf];
            } elseif ($request['status'] == 3) {
                $product = Product::where('cat_id', $request['cat_id'])->get();
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


    public function addCategory(Request $request){
        $validator = Validator::make($request->all(),[
            'module_id'=> 'required',
            'cat_name' => ['required','unique:category'],
            'image'=> 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }
        $category = new  Category();
        $category->cat_name = $request->input('cat_name');
        $category->module_id = $request->input('module_id');

            $path = Storage::disk('public')->put('category', $request->file('image'));
        $thumbnailpath = public_path('storage/'.$path);
        $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save($thumbnailpath);
            $category->cat_image = $path;
        $category->save();
        return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' =>$category]);

    }



}
