<?php

namespace App\Http\Controllers;

use App\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $brand= Brand::all();
        return view('container.brand.index')->with(compact('brand'));
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
            'image'=>'mimes:jpeg,jpg,png'

        ]);
        if ($request->file('image') == null){
            $request->validate([
                'image'=> 'required'
            ]);
        }

        $brand = new  Brand();
        $brand->brand_name = $request->input('brand_name');


        if ($request->file('image')) {
            $path = Storage::disk('public')->put('brand', $request->file('image'));
            $brand->image = $path;

        }

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
            'brand_name'=>['required']
        ]);
        $brand->brand_name=$request->input('brand_name');


        if (!empty($request->hasFile('image'))) {
            $path =  Storage::disk('public')->put('brand', $request->file('image'));
            if (!empty($brand->image)){
                $image_path = public_path().'/storage/'.$brand->image;
                unlink($image_path);
            }
            //Update Image
            $brand->image = $path;
        }
        $brand->save();
        return redirect('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand)
    {
        Brand::destroy($brand);

        DB::table('product')->where('brand',$brand)->delete();
        return redirect('brand');
    }
}
