<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
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
        $package = Package::where('module_type','!=', null)->get();
        return view('container.package.index')->with('package',$package);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {

        return view('container.package.create')->with('action', 'INSERT');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = DB::table('module')
            ->where('module_name','video')
            ->first();
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'content_count'=>'required',
            'detail'=>'required',
            'custom-radio-4'=>'required',
            'count_duration'=>'required',
            'image'=>'mimes:jpeg,jpg,png'

        ]);
        if ($request->file('image') == null){
            $request->validate([
                'image'=> 'required'
            ]);
        }
        $method =$request->input("custom-radio-4");

        $package=  new Package();
        $package->name = $request->input('name');
        $package->price = $request->input('price');
       $package->module_type =  $module->id;
        $package->content_count = $request->input('content_count');
        $package->detail = $request->input('detail');
        $package->time_method = $method;
        $package->count_duration = $request->input('count_duration');
        $package->image = $request->input('image_data');
        if ($method == 'day'){$package->day = $request->input('count_duration');
        }elseif ($method == 'month'){$package->month = $request->input('count_duration');
        }else{$package->year = $request->input('count_duration');
        }
        $package->save();
        return redirect('package');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */

    public function edit(Package $package)
    {
        return view('container.package.create')->with('action', 'UPDATE')->with(compact('package'));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $module = DB::table('module')
            ->where('module_name','video')
            ->first();
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'content_count'=>'required',
            'detail'=>'required',
            'custom-radio-4'=>'required',
            'count_duration'=>'required',
        ]);
        $method =$request->input("custom-radio-4");

        $package->name = $request->input('name');
        $package->price = $request->input('price');
       $package->module_type =  $module->id;
        $package->content_count = $request->input('content_count');
        $package->detail = $request->input('detail');
        $package->time_method = $method;
        $package->count_duration = $request->input('count_duration');
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
        return redirect('package');
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
