<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandViewController extends Controller
{
    public function brandDetail(Request $request)
    {
        $v=[];
        if ($request['brand_id'] == null){
            $brand= Brand::all();
            $v= $brand;
        }else{
            $product = Product::find($request['brand_id']);
            $v=$product;
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' =>$v]);

    }
}
