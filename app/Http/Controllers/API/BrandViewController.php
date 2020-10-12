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
        $br_d=[];
        if ($request['brand_id'] == null){

            $brand= DB::table('brand')
                ->select(array('id','brand_name','image'))
                ->get()
                ->toArray();

            foreach ($brand as $item){
                $qu= DB::table('product')
                    ->select(array('product_name','detail'))
                    ->where('brand',$item->id)
                    ->get()
                    ->toArray();
                $pd = count($qu);
                array_push($br_d, ['Brand_id'=>$item->id,'Brand'=>$item->brand_name,'Brand_image'=>$item->image,'item_count'=>$pd]);
            }
            $v= $br_d;
        }else{
            $brand= Brand::where('id',$request['brand_id'])->get();
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
