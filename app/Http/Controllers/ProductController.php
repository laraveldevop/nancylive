<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')
            ->select(DB::raw('product.id,product.product_name,product.video,product.detail,product.mobile,product.price,product.quantity,product.token,category.cat_name,brand.brand_name,sponsor.sponsor_name'))
            ->where('product.to_approve', 1)
            ->leftJoin('category', 'product.cat_id', '=', 'category.cat_id')
            ->leftJoin('brand', 'product.brand', '=', 'brand.id')
            ->leftJoin('sponsor', 'product.sponsor_id', '=', 'sponsor.id')
//            ->leftJoin('product_image','product.id','=','product_image.product_id')
            ->paginate('10');
        $product_all = DB::table('product')
            ->select(DB::raw('product.id,product.product_name,product.video,product.detail,product.mobile,product.price,product.quantity,product.token,category.cat_name,brand.brand_name,sponsor.sponsor_name'))
            ->where('product.to_approve', 1)
            ->leftJoin('category', 'product.cat_id', '=', 'category.cat_id')
            ->leftJoin('brand', 'product.brand', '=', 'brand.id')
            ->leftJoin('sponsor', 'product.sponsor_id', '=', 'sponsor.id')
//            ->leftJoin('product_image','product.id','=','product_image.product_id')
            ->get();

        $product_approve =DB::table('product')
            ->select(DB::raw('product.id,product.product_name,product.video,product.detail,product.mobile,product.price,product.quantity,product.token,category.cat_name,brand.brand_name,sponsor.sponsor_name'))
            ->where('product.to_approve', 0)
            ->leftJoin('category', 'product.cat_id', '=', 'category.cat_id')
            ->leftJoin('brand', 'product.brand', '=', 'brand.id')
            ->leftJoin('sponsor', 'product.sponsor_id', '=', 'sponsor.id')
//            ->leftJoin('product_image','product.id','=','product_image.product_id')
            ->paginate('10');

        return view('container.product.index')->with(compact('product','product_all','product_approve'));


    }

    public function UpdateToApprove(Request $request)
    {
        if ($request->ajax()) {
            $data= $request->approve;

            $brand = Product::find($data);

            $brand->to_approve = 1;
            $brand->save();
            return response()->json($brand);
        }
    }

    public function UpdateToReject(Request $request)
    {
        if ($request->ajax()) {
            $product= $request->reject;
            Product::destroy($product);
            DB::table('product_image')->where('product_id',$product)->delete();
            DB::table('advertise')->where('product_id',$product)->delete();
            return response()->json($product);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'product')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();
        $brand= DB::table('brand')
            ->select(array('id','brand_name','image'))
            ->orderBy('brand_name', 'ASC')
            ->get()
            ->toArray();
        $sponsor= DB::table('sponsor')
            ->select(array('id','sponsor_name','image'))
            ->orderBy('sponsor_name', 'ASC')
            ->get()
            ->toArray();


        return view('container.product.create')->with('action', 'INSERT')->with(compact('category','brand','sponsor'));
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
            'category_id' => 'required',
            'brand' => 'required',
            'product_name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'mobile' => 'required|numeric',
            'files' => 'required',
            'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
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
        $product->token = $request->has('token');
        $product->to_approve = 1;
        $product->CreatedBy = Auth::user()->getAuthIdentifier();
        if ($request->hasFile('video') != null){
            $path = Storage::disk('public')->put('product', $request->file('video'));
            $product->video = $path;
        }

        $product->save();
        if ($request->has('token') == 1)
        {
            DB::table('advertise')->insert(
                ['product_id' => $product->id,'status'=>3,'created_at' => now()]
            );
        }
        $images = $request->file('files');
        if ($request->hasFile('files')) :
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
                    'created_at'=>now()
                    //you can put other insertion here
                ]);
            endforeach;
            $image = implode(",", $arr);
        else:
            $image = '';
        endif;

        return redirect('product');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'product')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();

        $brand= DB::table('brand')
            ->select(array('id','brand_name','image'))
            ->orderBy('brand_name', 'ASC')
            ->get()
            ->toArray();
        $sponsor= DB::table('sponsor')
            ->select(array('id','sponsor_name','image'))
            ->orderBy('sponsor_name', 'ASC')
            ->get()
            ->toArray();
        $image= DB::table('product_image')->where('product_id',$product->id)->get();
        return view('container.product.create')->with('action', 'UPDATE')->with(compact('product','category','brand','sponsor','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'brand' => 'required',
            'product_name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'mobile' => 'required|numeric',

        ]);
        $product->cat_id = $request->input('category_id');
        $product->sponsor_id = $request->input('sponsor_id');
        $product->brand = $request->input('brand');
        $product->product_name = $request->input('product_name');
        $product->detail = $request->input('detail');
        $product->mobile = $request->input('mobile');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->token = $request->has('token');
        if (!empty($request->hasFile('video'))) {
            $request->validate([
                'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
            ]);
            $path =  Storage::disk('public')->put('product', $request->file('video'));
            if (!empty($product->video)){
                $image_path = public_path().'/storage/'.$product->video;
                unlink($image_path);
            }
            //Update Image
            $product->video = $path;
        }
        $product->save();
        if ($request->has('token') == 1)
        {
            DB::table('advertise')->insert(
                ['product_id' => $product->id,'status'=>3,'created_at' => now()]
            );
        }
        else{
            DB::table('advertise')->where('product_id', '=', $product->id)->delete();
        }
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
        return redirect('product');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($product, Request $request)
    {
        $password = $request->input('password');
        $user_password = Auth::user()->getAuthPassword();
        if(Hash::check($password, $user_password)) {
        Product::destroy($product);
        DB::table('product_image')->where('product_id',$product)->delete();
        DB::table('advertise')->where('product_id',$product)->delete();
            return redirect('product')->with('message', 'Delete Successfully');
        }
        return redirect('product')->with('delete', 'Password Not Valid');
    }

    public function ads(Request $request)
    {
        if($request->val == 1){
            DB::table('product')
                ->where('id', $request->id)
                ->update(['token' => 0,'updated_at'=>now()]);
            DB::table('advertise')->where('product_id', '=', $request->id)->delete();

        } else {
            DB::table('product')
                ->where('id', $request->id)
                ->update(['token' => 1]);
            DB::table('advertise')
                ->updateOrInsert(
                    ['product_id' =>  $request->id],
                    ['product_id' => $request->id,'status'=> 3,'updated_at'=>now()]
                );
        }

        return response()->json([
            'val' => 'sucsses'
        ]);
    }
}
