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
        $package = Package::where('content_count','!=', null)->get();
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
    public function createCat()
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
        $module = DB::table('module')
            ->where('module_name','video')
            ->first();
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'content_count'=>'required',
            'detail'=>'required',
        ]);
        $ct= $request->input('category_id');
        $method =$request->input("custom-radio-4");

        $package=  new Package();
        $package->name = $request->input('name');
        $package->price = $request->input('price');
        if ($ct == null){$package->module_type =  $module->id;}else{
            $package->category_id = $ct;
        }
        $package->content_count = $request->input('content_count');
        $package->detail = $request->input('detail');
        $package->time_method = $method;
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
    public function edit(Package $package)
    {
        //
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
        //
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
