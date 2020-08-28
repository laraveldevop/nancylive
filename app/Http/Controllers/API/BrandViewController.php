<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $brand= Brand::where('id',$request['brand_id'])->paginate(15);
            $product_view=[];
            $image_view=[];
            foreach ($brand as $item) {
                $product = Product::where('brand',$item->id)->get();
                $item['product'] = $product;
                array_push($product_view,['product'=>$item]);
                foreach ($product as $value) {
                    $images= DB::table('product_image')
                        ->select('image')
                        ->where('product_id',$value->id)
                        ->get();
                    $value['image'] = $images;
                    array_push($image_view,['product_name'=>$item]);
                }
            }
            $v=$brand;
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' =>$v]);

    }
}
