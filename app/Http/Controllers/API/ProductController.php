<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        if ($request['id'] != null) {
            $products = Product::where('id', $request['id'])->get();
            foreach ($products as $item) {
                $qu= DB::table('product_image')
                    ->select(array('id','image'))
                    ->where('product_id',$item->id)
                    ->get();
                $item['images']= $qu;
            }
            return response()->json(['status' => true, 'message' => 'Products retrieved successfully.', 'data' => $products,], 200);
        } else {
            $products = Product::all();
            foreach ($products as $item) {
                $qu= DB::table('product_image')
                    ->select(array('id','image'))
                    ->where('product_id',$item->id)
                    ->get();
                $item['images']= $qu;
            }

            return response()->json(['status' => true, 'message' => 'Products retrieved successfully.', 'data' => $products->toArray(),], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
