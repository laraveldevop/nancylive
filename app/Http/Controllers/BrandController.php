<?php

namespace App\Http\Controllers;

use App\Brand;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Product');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $brand= Brand::where('to_approve',1)->paginate(10);
        $brand_approve= Brand::where('to_approve',0)->get();
        return view('container.brand.index')->with(compact('brand','brand_approve'));
    }

    public function UpdateToApprove(Request $request)
    {
        if ($request->ajax()) {
            $data= $request->approve;

            $brand = Brand::find($data);


            $brand->to_approve = 1;
            $brand->save();
            return response()->json($brand);
        }
    }

    public function UpdateToReject(Request $request)
    {
        if ($request->ajax()) {
            $brand = $request->reject;

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

            return response()->json($brand);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.brand.create')->with('action', 'INSERT');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name'=> 'required',
            'image_data'=>'required',
            'mobile'=>'required'

        ]);
        if ($request->file('image') == null){
            $request->validate([
                'image'=> 'mimes:jpeg,jpg,png'
            ]);
        }

        $brand = new  Brand();
        $brand->brand_name = $request->input('brand_name');
        $brand->mobile = $request->input('mobile');
        $brand->image = $request->input('image_data');
        $brand->CreatedBy = Auth::user()->getAuthIdentifier();
        $brand->to_approve = 1;


//        if ($request->file('image')) {
//            $path = Storage::disk('public')->put('brand', $request->file('image'));
//            $brand->image = $path;
//
//        }

        $brand->save();
        return redirect('brand');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('container.brand.create')->with('action', 'UPDATE')->with('brand',$brand);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name'=>['required'],
            'mobile'=>['required'],
        ]);
        $brand->brand_name=$request->input('brand_name');
        $brand->mobile=$request->input('mobile');


        if (!empty($request->input('image_data'))) {
//            $path =  Storage::disk('public')->put('brand', $request->file('image'));
            if (!empty($brand->image)){
                $image_path = public_path().'/storage/'.$brand->image;
                unlink($image_path);
            }
            //Update Image
            $brand->image = $request->input('image_data');
        }
        $brand->save();
        return redirect('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Brand $brand
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand, Request $request)
    {
        $password = $request->input('password');
        $user_password = Auth::user()->getAuthPassword();
        if(Hash::check($password, $user_password)) {
//            $product = Product::where('brand', $brand)->get();
            DB::table('product')
                ->where('brand', '=',$brand)
                ->update(['brand' => null]);
            $cat = Brand::where('id', $brand)->first();
            if ($cat['image'] != null) {
                $image_path = public_path() . '/storage/' . $cat['image'];
                unlink($image_path);
            }
            Brand::destroy($brand);

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
//            DB::table('product')->where('brand', $brand)->delete();
            return redirect('brand')->with('message', 'Delete Successfully');
        }
        return redirect('brand')->with('delete', 'Password Not Valid');

    }
}
