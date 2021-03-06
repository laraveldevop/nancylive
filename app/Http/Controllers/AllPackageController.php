<?php

namespace App\Http\Controllers;

use App\AllPackage;
use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AllPackageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = DB::table('package')->where([
            ['module_type', '=', null],
            ['content_count', '=', null],
            ['category_id','=',null]
        ])->paginate('10');
        return view('container.package.all_index')->with('package',$package);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.package.create_all')->with('action', 'INSERT');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'count_duration'=>'required',
            'detail'=>'required',
            'custom-radio-4'=>'required',
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
        $package->count_duration = $request->input('count_duration');
        $package->detail = $request->input('detail');
        $package->image = $request->input('image_data');
        $package->time_method = $method;
        if ($method == 'day'){
            $package->day = $request->input('count_duration');
        }
        elseif ($method == 'month'){
            $package->month = $request->input('count_duration');

        }
        else{
            $package->year = $request->input('count_duration');

        }

        $package->save();
        return redirect('all-package');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AllPackage  $allPackage
     * @return \Illuminate\Http\Response
     */
    public function show(AllPackage $allPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AllPackage  $allPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $allPackage)
    {
        return view('container.package.create_all')->with('action', 'UPDATE')->with(compact('allPackage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AllPackage  $allPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AllPackage $allPackage)
    {
        $request->validate([
            'name' => 'required',
            'price'=>'required',
            'count_duration'=>'required',
            'detail'=>'required',
            'custom-radio-4'=>'required',
        ]);
        $method=$request->input("custom-radio-4");
        $allPackage->name = $request->input('name');
        $allPackage->price = $request->input('price');
        $allPackage->count_duration = $request->input('count_duration');
        $allPackage->detail = $request->input('detail');
        $allPackage->time_method = $request->input("custom-radio-4");
        if ($method == 'day'){
            $allPackage->day = $request->input('count_duration');
        }
        elseif ($method == 'month'){
            $allPackage->month = $request->input('count_duration');

        }
        else{
            $allPackage->year = $request->input('count_duration');

        }
        if (!empty($request->input('image_data'))) {
//            $path =  Storage::disk('public')->put('brand', $request->file('image'));
            if (!empty($allPackage->image)){
                $image_path = public_path().'/storage/'.$allPackage->image;
                unlink($image_path);
            }
            //Update Image
            $allPackage->image = $request->input('image_data');
        }
        $allPackage->save();


        return redirect('all-package');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\AllPackage $allPackage
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($allPackage, Request $request)
    {
        $password = $request->input('password');
        $user_password = Auth::user()->getAuthPassword();
        if(Hash::check($password, $user_password)) {
        $pack = Package::where('id',$allPackage)->first();
        if ($pack['image'] != null) {
            $image_path = public_path() . '/storage/' . $pack['image'];
            unlink($image_path);
        }
        Package::destroy($allPackage);
            return redirect('all-package')->with('message', 'Delete Successfully');
        }
        return redirect('all-package')->with('delete', 'Password Not Valid');
    }
}
