<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Pdf;
use App\Product;

use App\ProductImage;
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
            'cat_name' => ['required'],
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }
        $category_id= $request->input('id');
        if ($category_id == null){
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png|required',
                'cat_name' => ['unique:category'],

            ]);
            $category = new  Category();
            $category->cat_name = $request->input('cat_name');
            $category->module_id = $request->input('module_id');

            $path = Storage::disk('public')->put('category', $request->file('image'));
            $thumbnailpath = public_path('storage/'.$path);
            $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($thumbnailpath);
//            $img->save($thumbnailpath);
            $category->cat_image = $path;
            $category->save();
            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' =>$category]);
        }
        else{
            $category = Category::find($category_id);
            $category->cat_name=$request->input('cat_name');
            $category->module_id=$request->input('module_id');

            if (!empty($request->file('image'))) {
                $path = Storage::disk('public')->put('category', $request->file('image'));
                $thumbnailpath = public_path('storage/'.$path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);
                if (!empty($category->cat_image)){
                    $image_path = public_path().'/storage/'.$category->cat_image;
                    unlink($image_path);
                }
                //Update Image
                $category->cat_image = $path;
            }
            $category->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' =>$category]);

        }


    }

    public function destroy(Request $request)
    {
        $category = $request->input('id');
        $c = Category::find($category);
        if (isset($c)) {
//            $video = Video::where('cat_id', $category)->get();
//            $pdf = Pdf::where('cat_id', $category)->get();
//            $product = Product::where('cat_id', $category)->get();
            DB::table('product')
                ->where('cat_id', '=',$category)
                ->update(['cat_id' => null]);
            DB::table('video')
                ->where('cat_id', '=',$category)
                ->update(['cat_id' => null]);
            DB::table('pdf')
                ->where('cat_id', '=',$category)
                ->update(['cat_id' => null]);
            DB::table('package')
                ->where('category_id', '=',$category)
                ->update(['category_id' => null]);

            //delete category
            $cat = Category::where('cat_id', $category)->first();
            if ($cat['cat_image'] != null) {
                $image_path = public_path() . '/storage/' . $cat['cat_image'];
                unlink($image_path);
            }
            Category::destroy($category);
//            DB::table('package')->where('category_id', $category)->delete();

            //delete video
//            if (!empty($video)) {
//                foreach ($video as $value) {
//                    DB::table('advertise')
//                        ->where('video_id', $value->id)
//                        ->delete();
//                    if ($value->image != null) {
//                        $image_path = public_path() . '/storage/' . $value->image;
//                        unlink($image_path);
//                    }
//                    if ($value->video != null) {
//                        $image_path = public_path() . '/storage/' . $value->video;
//                        unlink($image_path);
//                    }
//                }
//            }
//            DB::table('video')->where('cat_id', $category)->delete();


            //delete pdf
//            if (!empty($pdf)) {
//                foreach ($pdf as $value) {
//                    DB::table('advertise')
//                        ->where('pdf_id', $value->id)
//                        ->delete();
//                    if ($value->file != null) {
//                        $image_path = public_path() . '/storage/' . $value->file;
//                        unlink($image_path);
//                    }
//                }
//            }
//            DB::table('pdf')->where('cat_id', $category)->delete();


            //delete product
//            if (!empty($product)) {
//                foreach ($product as $value) {
//                    DB::table('advertise')
//                        ->where('product_id', $value->id)
//                        ->delete();
//                    $product_image = ProductImage::where('product_id', $value->id)->get();
//                    if (!empty($product_image)) {
//                        foreach ($product_image as $item) {
//                            $image_path = public_path() . '/storage/' . $item->image;
//                            unlink($image_path);
//                        }
//                    }
//                    if ($value->video != null) {
//                        $image_path = public_path() . '/storage/' . $value->video;
//                        unlink($image_path);
//                    }
//                    DB::table('product_image')->where('product_id', $value->id)->delete();
//                }
//            }
//            DB::table('product')->where('cat_id', $category)->delete();
            return response()->json(['status' => true, 'message' => 'Delete successfully.'], 200);
        }
        else{
            return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);

        }
    }



}
