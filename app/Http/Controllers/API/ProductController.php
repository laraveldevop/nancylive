<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Images;
use App\Product;
use App\ProductImage;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request['id'] == null && $request['user_id'] == null) {
            $products = Product::where('to_approve', 1)->get();
            foreach ($products as $item) {
                $category = Category::where('cat_id',$item->cat_id)->first();
                $brand = Brand::where('id',$item->brand)->first();
                $item['category_name'] = isset($category['cat_name'])?$category['cat_name']:null;
                $item['brand_name'] = isset($brand['brand_name'])?$brand['brand_name']:null;

                $qu = DB::table('product_image')
                    ->select(array('id', 'image'))
                    ->where('product_id', $item->id)
                    ->get();
                $item['images'] = $qu;
            }

            return response()->json(['status' => true, 'message' => 'Products retrieved successfully.', 'data' => $products->toArray(),], 200);
        } elseif ($request['id'] != null) {
            $products = Product::where('id', $request['id'])->get();
            foreach ($products as $item) {
                $category = Category::where('cat_id',$item->cat_id)->first();
                $brand = Brand::where('id',$item->brand)->first();
                $item['category_name'] = isset($category['cat_name'])?$category['cat_name']:null;
                $item['brand_name'] = isset($brand['brand_name'])?$brand['brand_name']:null;

                $qu = DB::table('product_image')
                    ->select(array('id', 'image'))
                    ->where('product_id', $item->id)
                    ->get();
                $item['images'] = $qu;
            }
            return response()->json(['status' => true, 'message' => 'Products retrieved successfully.', 'data' => $products,], 200);
        } elseif ($request['user_id'] != null) {
            $products = Product::where('CreatedBy', $request['user_id'])->get();
            foreach ($products as $item) {
                $category = Category::where('cat_id',$item->cat_id)->first();
                $brand = Brand::where('id',$item->brand)->first();
                $item['category_name'] = isset($category['cat_name'])?$category['cat_name']:null;
                $item['brand_name'] = isset($brand['brand_name'])?$brand['brand_name']:null;

                $qu = DB::table('product_image')
                    ->select(array('id', 'image'))
                    ->where('product_id', $item->id)
                    ->get();
                $item['images'] = $qu;
            }
            return response()->json(['status' => true, 'message' => 'Products retrieved successfully.', 'data' => $products], 200);
        }
    }

    public function productApprove(Request $request)
    {

        $product_approve = $request->approve;
        $product_id = $request->artist_id;
        if ($product_approve == null && $product_id == null){
            $products = Product::select(DB::raw('product.*,users.name,users.mobile as user_mobile'))->orderby('product.id','DESC')->leftjoin('users','product.CreatedBy', '=','users.id')->get();
            foreach ($products as $item) {
                $category = Category::where('cat_id',$item->cat_id)->first();
                $brand = Brand::where('id',$item->brand)->first();
                $item['category_name'] = isset($category['cat_name'])?$category['cat_name']:null;
                $item['brand_name'] = isset($brand['brand_name'])?$brand['brand_name']: null;

                $qu = DB::table('product_image')
                    ->select(array('id', 'image'))
                    ->where('product_id', $item->id)
                    ->get();
                $item['images'] = $qu;
            }
            return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $products],200);
        }
        $product = Product::find($product_id);
        if (isset($product)) {
            if ($product_approve == 0){
                $product->to_approve = 0;
                $product->save();
                return response()->json(['status' => true, 'message' => 'Not Approved', 'data' => $product],200);
            }
            elseif ($product_approve == 1) {
                $product->to_approve = 1;
                $product->save();
                return response()->json(['status' => true, 'message' => 'Approve Successfully', 'data' => $product],200);
            }
            else{
                $product->to_approve = 2;
                $product->save();
                return response()->json(['status' => true, 'message' => 'Reject Successfully', 'data' => $product],200);

            }
        }
        else{
            return response()->json(['status' => false, 'message' => 'Product Not Found'],422);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->header('USER_ID');
        $product_id =$request->input('id');
//        echo $product_id; die();
        if ($product_id == null) {
            $request->validate([
                'category_id' => 'required',
                'brand' => 'required',
                'product_name' => 'required',
                'detail' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'mobile' => 'required|numeric',
                'files' => 'required',
            ]);
            $product = new  Product();
            $product->cat_id = $request->input('category_id');
            $product->sponsor_id = $request->input('sponsor_id');
            $product->brand = $request->input('brand');
            $product->product_name = $request->input('product_name');
            $product->detail = $request->input('detail');
            $product->mobile = $request->input('mobile');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->token = 0;
            $product->to_approve = 0;
            $product->CreatedBy = $id;

            $product->save();

            $images = $request->file('files');
            if ($request->hasFile('files')) :
                foreach ($images as $item):
                    $path = Storage::disk('public')->put('product_images', $item);
                    $arr[] = $path;
                    $thumbnailpath = public_path('storage/' . $path);
                    $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save($thumbnailpath);
                    ProductImage::insert([
                        'product_id' => $product->id,
                        'image' => $path,
                        'created_at' => now()
                        //you can put other insertion here
                    ]);
                endforeach;
//            $image = implode(",", $path);
            else:
                $image = '';
            endif;
            return response()->json(['status' => true, 'message' => 'add successfully.', 'data' => $product], 200);
        }
        else{
            $request->validate([
                'category_id' => 'required',
                'brand' => 'required',
                'product_name' => 'required',
                'detail' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'mobile' => 'required|numeric',

            ]);
            $product = Product::find($product_id);
            $product->cat_id = $request->input('category_id');
            $product->sponsor_id = $request->input('sponsor_id');
            $product->brand = $request->input('brand');
            $product->product_name = $request->input('product_name');
            $product->detail = $request->input('detail');
            $product->mobile = $request->input('mobile');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->save();

            $images = $request->file('files');
            if ($request->hasFile('files')) :
//            $request->validate(['files'=>'mimes:jpg,jpeg,png']);
                foreach ($images as $item):

                    $path = Storage::disk('public')->put('product_images', $item);
                    $arr[] = $path;
                    $thumbnailpath = public_path('storage/'.$path);
                    $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save($thumbnailpath);
                    ProductImage::insert([
                        'product_id'=> $product->id,
                        'image'=>  $path,
                        'updated_at'=>now()
                        //you can put other insertion here
                    ]);
                endforeach;
                $image = implode(",", $arr);
            else:
                $image = '';
            endif;

            $remove_image = $request->input('remove_images');
            $myArray = explode(',', $remove_image);
            if (isset($myArray)) {
                foreach ($myArray as $item) {
                    $image = ProductImage::where('id', $item)->get();
                    if (!empty($image)) {
                        foreach ($image as $value) {
                            $image_path = public_path() . '/storage/' . $value->image;
                            unlink($image_path);
                        }
                        DB::table('product_image')->where('id', $item)->delete();
                    }
                }
            }
            return response()->json(['status' => true, 'message' => 'update successfully.', 'data' => $product], 200);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
       $product =  Product::where('id',$id)->first();
       if (isset($product)) {
           DB::table('product_image')->where('product_id', $id)->delete();
           DB::table('advertise')->where('product_id', $id)->delete();
           Product::destroy($id);
           return response()->json(['status' => true, 'message' => 'Delete successfully.'], 200);
       }
       else {
           return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);
       }

    }
}
