<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('product')
            ->select(DB::raw('product.id,product.product_name,product.video,product.detail,product.price,product.quantity,category.cat_name'))
            ->leftJoin('category', 'product.cat_id', '=', 'category.cat_id')
            ->get()
            ->toArray();
        return view('container.product.index')->with(compact('product'));


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

        return view('container.product.create')->with('action', 'INSERT')->with('category',$category);
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
            'product_name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',

        ]);


        $product = new  Product();
        $product->cat_id = $request->input('category_id');
        $product->product_name = $request->input('product_name');
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        if ($request->hasFile('video') != null){
            $request->validate([
                'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
            ]);
            $path = Storage::disk('public')->put('product', $request->file('video'));
            $product->video = $path;
        }

        $product->save();
        $images = $request->file('files');
        if ($request->hasFile('files')) :
            foreach ($images as $item):

                $path = Storage::disk('public')->put('product_images', $item);
                $arr[] = $path;
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
     * @return \Illuminate\Http\Response
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

        return view('container.product.create')->with('action', 'UPDATE')->with(compact('product','category'));
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
            'product_name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',

        ]);
        $product->cat_id = $request->input('category_id');
        $product->product_name = $request->input('product_name');
        $product->detail = $request->input('detail');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

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
        $images = $request->file('files');
        if ($request->hasFile('files')) :
            $request->validate(['files'=>'mimes:jpg,jpeg,png']);
            foreach ($images as $item):

                $path = Storage::disk('public')->put('product_images', $item);
                $arr[] = $path;
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
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        Product::destroy($product);
        return redirect('product');
    }
}
