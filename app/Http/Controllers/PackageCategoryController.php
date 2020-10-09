<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageCategoryController extends Controller
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
        $package = Package::where('category_id','!=', null)->get();
        return view('container.package.cat_index')->with('package',$package);
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
            ->where('module.module_name', '=', 'video')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();

        return view('container.package.create_cat')->with('action', 'INSERT')->with(compact('category'));
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
            'name' => 'required',
            'price'=>'required',
            'detail'=>'required',
            'custom-radio-4'=>'required',
            'count_duration'=>'required',
            'category_id'=>'required',
            'image'=>'mimes:jpeg,jpg,png'
        ]);
        if ($request->file('image') == null){
            $request->validate([
                'image'=> 'required'
            ]);
        }
        $ct= $request->input('category_id');
        $method =$request->input("custom-radio-4");

        $package=  new Package();
        $package->name = $request->input('name');
        $package->price = $request->input('price');
        $package->category_id = $ct;
        $package->detail = $request->input('detail');
        $package->time_method = $method;
        $package->count_duration = $request->input('count_duration');
        if ($method == 'day'){$package->day = $request->input('count_duration');
        }elseif ($method == 'month'){$package->month = $request->input('count_duration');
        }else{$package->year = $request->input('count_duration');
        }
        $package->image = $request->input('image_data');

        $package->save();
        return redirect('cat-package');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'video')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();

        return view('container.package.create_cat')->with('action', 'UPDATE')->with(compact('package','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'detail'=>'required',
            'custom-radio-4'=>'required',
            'count_duration'=>'required',
            'category_id'=>'required',
        ]);
        $package = Package::find($id);
        $ct= $request->input('category_id');
        $method =$request->input("custom-radio-4");

        $package->name = $request->input('name');
        $package->price = $request->input('price');
        $package->category_id = $ct;
        $package->count_duration = $request->input('count_duration');
        $package->detail = $request->input('detail');
        $package->time_method = $method;
        if ($method == 'day'){$package->day = $request->input('count_duration');
        }elseif ($method == 'month'){$package->month = $request->input('count_duration');
        }else{$package->year = $request->input('count_duration');
        }
        if (!empty($request->input('image_data'))) {
//            $path =  Storage::disk('public')->put('brand', $request->file('image'));
            if (!empty($package->image)){
                $image_path = public_path().'/storage/'.$package->image;
                unlink($image_path);
            }
            //Update Image
            $package->image = $request->input('image_data');
        }
        $package->save();
        return redirect('cat-package');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
