<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class CategoryController extends Controller
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function index()
    {
        $category = DB::table('category')
            ->select(DB::raw('category.cat_id,category.cat_name,cat_image,module.module_name'))
            ->leftJoin('module', 'category.module_id', '=', 'module.id')
            ->where('module.module_name','=','video')
            ->get()
            ->toArray();
        $pdf_category=  DB::table('category')
            ->select(DB::raw('category.cat_id,category.cat_name,cat_image,module.module_name'))
            ->leftJoin('module', 'category.module_id', '=', 'module.id')
            ->where('module.module_name','=','pdf')
            ->get()
            ->toArray();
        $product_category=  DB::table('category')
            ->select(DB::raw('category.cat_id,category.cat_name,cat_image,module.module_name'))
            ->leftJoin('module', 'category.module_id', '=', 'module.id')
            ->where('module.module_name','=','product')
            ->get()
            ->toArray();

        return view('container.category.index')->with(compact('category','pdf_category','product_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function create()
    {
        $module = DB::table('module')
            ->select(array('id', 'module_name'))
            ->orderBy('id', 'ASC')
            ->get()
            ->toArray();
        return view('container.category.create')->with('action', 'INSERT')->with('module',$module);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
//        echo $request->file('cat_image');die();
        $request->validate([
            'module_id'=> 'required',
            'cat_name' => ['required','unique:category'],

        ]);

        $category = new  Category();
        $category->cat_name = $request->input('cat_name');
        $category->module_id = $request->input('module_id');

        if (!empty($request->input('image_data'))) {
//            $path = Storage::disk('public')->put('category', $request->file('cat_image'));
            $category->cat_image = $request->input('image_data');

        }

        $category->save();
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|Response|\Illuminate\View\View
     */
    public function edit(Category $category)
    {
        $module = DB::table('module')
            ->select(array('id', 'module_name'))
            ->orderBy('module_name', 'ASC')
            ->get()
            ->toArray();
        return view('container.category.create')->with(compact('category','module'))->with('action','UPDATE');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'cat_name'=>['required']
        ]);
        $category->cat_name=$request->input('cat_name');
        $category->module_id=$request->input('module_id');

        if (!empty($request->input('image_data'))) {
//           $path =  Storage::disk('public')->put('category', $request->file('cat_image'));
           if (!empty($category->cat_image)){
              $image_path = public_path().'/storage/'.$category->cat_image;
             unlink($image_path);
           }
            //Update Image
            $category->cat_image = $request->input('image_data');
        }
        $category->save();
        return redirect('category');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function destroy($category)
    {
        Category::destroy($category);

        DB::table('video')->where('cat_id',$category)->delete();
        DB::table('pdf')->where('cat_id',$category)->delete();
        DB::table('product')->where('cat_id',$category)->delete();
        return redirect('category');

    }
}
