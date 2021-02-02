<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandViewController extends Controller
{
    public function brandApprove(Request $request)
    {

        $brand_approve = $request->approve;
        $brand_id = $request->brand_id;
        if ($brand_approve == null && $brand_id == null){
            $brand = Brand::select(DB::raw('brand.*,users.name,users.mobile as user_mobile'))->orderby('brand.id','DESC')->leftjoin('users','brand.CreatedBy', '=','users.id')->get();
            foreach ($brand as $item) {
                $qu = DB::table('product')
                    ->where('brand', $item->id)
                    ->get()
                    ->toArray();
                $item['product'] = $qu;
            }
            return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $brand],200);
        }
        $brand = Brand::find($brand_id);
        if (isset($brand)) {
            if ($brand_approve == 0){
                $brand->to_approve = 0;
                $brand->save();
                return response()->json(['status' => true, 'message' => 'Not Approved', 'data' => $brand],200);
            }
            if ($brand_approve == 1) {
                $brand->to_approve = 1;
                $brand->save();
                return response()->json(['status' => true, 'message' => 'Approve Successfully', 'data' => $brand],200);
            }
            elseif($brand_approve == 2){
                $brand->to_approve = 2;
                $brand->save();
                return response()->json(['status' => true, 'message' => 'Reject Successfully', 'data' => $brand],200);

            }
        }
        else{
            return response()->json(['status' => false, 'message' => 'Brand Not Found'],422);
        }
    }
    public function brandDetail(Request $request)
    {
        $v = [];
        $br_d = [];
        if ($request['brand_id'] == null && $request['user_id'] == null) {

            $brand = DB::table('brand')
                ->select(array('id', 'brand_name', 'image'))
                ->where('to_approve',1)
                ->get()
                ->toArray();

            foreach ($brand as $item) {
                $qu = DB::table('product')
                    ->select(array('product_name', 'detail'))
                    ->where('brand', $item->id)
                    ->get()
                    ->toArray();
                $pd = count($qu);
                array_push($br_d, ['Brand_id' => $item->id, 'Brand' => $item->brand_name, 'Brand_image' => $item->image, 'item_count' => $pd]);
            }
            $v = $br_d;
        } elseif ($request['brand_id'] != null) {
            $brand = Brand::where('id', $request['brand_id'])->get();
            $product_view = [];
            $image_view = [];
            foreach ($brand as $item) {
                $product = Product::where('brand', $item->id)->get();
                $item['product'] = $product;
                array_push($product_view, ['product' => $item]);
                foreach ($product as $value) {
                    $images = DB::table('product_image')
                        ->select('image')
                        ->where('product_id', $value->id)
                        ->get();
                    $value['image'] = $images;
                    array_push($image_view, ['product_name' => $item]);
                }
            }
            $v = $brand;
        }
        elseif ($request['user_id'] != null){
            $brand = Brand::where('CreatedBy', $request['user_id'])->get();
            $product_view = [];
            $image_view = [];
            foreach ($brand as $item) {
                $product = Product::where('id', $item->id)->get();
                $item['product'] = $product;
                array_push($product_view, ['product' => $item]);
                foreach ($product as $value) {
                    $images = DB::table('product_image')
                        ->select('image')
                        ->where('product_id', $value->id)
                        ->get();
                    $value['image'] = $images;
                    array_push($image_view, ['product_name' => $item]);
                }
            }
            $v = $brand;
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $v]);

    }

    public function brandView(Request $request)
    {
        $v = [];
        $br_d = [];
        if ($request['user_id'] == null) {

            $brand = DB::table('brand')
                ->select(array('id', 'brand_name', 'image'))
                ->where('to_approve','=',1)
                ->get()
                ->toArray();

            foreach ($brand as $item) {
                $qu = DB::table('product')
                    ->select(array('product_name', 'detail'))
                    ->where('brand', $item->id)
                    ->get()
                    ->toArray();
                $pd = count($qu);
                array_push($br_d, ['Brand_id' => $item->id, 'Brand' => $item->brand_name, 'Brand_image' => $item->image, 'item_count' => $pd]);
            }
            $v = $br_d;
        } else {
            $brand = Brand::where('CreatedBy', $request['user_id'])->get();
            $product_view = [];
            $image_view = [];
            foreach ($brand as $item) {
                $product = Product::where('id', $item->id)->get();
                $item['product'] = $product;
                array_push($product_view, ['product' => $item]);
                foreach ($product as $value) {
                    $images = DB::table('product_image')
                        ->select('image')
                        ->where('product_id', $value->id)
                        ->get();
                    $value['image'] = $images;
                    array_push($image_view, ['product_name' => $item]);
                }
            }
            $v = $brand;
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $v]);

    }

    public function store(Request $request)
    {
        $id= $request->header('USER_ID');
        $brand_id = $request->input('id');
        if ($brand_id == null) {
            $request->validate([
                'brand_name' => 'required',
                'mobile' => 'required',
                'image' => 'required'

            ]);
            if ($request->file('image') == null) {
                $request->validate([
                    'image' => 'mimes:jpeg,jpg,png'
                ]);
            }

            $brand = new  Brand();
            $brand->brand_name = $request->input('brand_name');
            $brand->mobile = $request->input('mobile');
            $brand->CreatedBy = $id;
            $brand->to_approve = 0;

            if ($request->file('image')) {
                $path = Storage::disk('public')->put('brand', $request->file('image'));
                $brand->image = $path;

            }

            $brand->save();
            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $brand]);
        }
        else{
            $request->validate([
                'brand_name'=>['required'],
                'mobile'=>['required'],
            ]);
            $brand = Brand::find($brand_id);
            $brand->brand_name=$request->input('brand_name');
            $brand->mobile=$request->input('mobile');


            if (!empty($request->input('image'))) {
            $path =  Storage::disk('public')->put('brand', $request->file('image'));
                if (!empty($brand->image)){
                    $image_path = public_path().'/storage/'.$brand->image;
                    unlink($image_path);
                }
                //Update Image
                $brand->image = $path;
            }
            $brand->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $brand]);

        }
    }

    public function destroy(Request $request)
    {
        $brand = $request->input('id');
        $br = Brand::where('id',$brand)->first();
        if (isset($br)){
            $product = Product::where('brand', $brand)->get();

            $cat = Brand::where('id', $brand)->first();
            if ($cat['image'] != null) {
                $image_path = public_path() . '/storage/' . $cat['image'];
                unlink($image_path);
            }
            Brand::destroy($brand);

            //delete product
            if (!empty($product)) {
                foreach ($product as $value) {
                    DB::table('advertise')
                        ->where('product_id', $value->id)
                        ->delete();
                    $product_image = ProductImage::where('product_id', $value->id)->get();
                    if (!empty($product_image)) {
                        foreach ($product_image as $item) {
                            $image_path = public_path() . '/storage/' . $item->image;
                            unlink($image_path);
                        }
                    }
                    if ($value->video != null) {
                        $image_path = public_path() . '/storage/' . $value->video;
                        unlink($image_path);
                    }
                    DB::table('product_image')->where('product_id', $value->id)->delete();
                }
            }
            DB::table('product')->where('brand', $brand)->delete();
            return response()->json(['status' => true, 'message' => 'Delete successfully.'], 200);

        }
        else {
            return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);
        }
    }
}
