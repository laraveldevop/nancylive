<?php

namespace App\Http\Controllers\API;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Product;
use App\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SponsorViewController extends Controller
{
    public function sponsorDetail(Request $request)
    {
        $v=[];
        $br_d=[];
        if ($request['sponsor_id'] == null){

            $sponsor= DB::table('sponsor')
                ->select(array('id','sponsor_name','image'))
                ->get()
                ->toArray();
            foreach ($sponsor as $item){
                $qu= DB::table('product')
                    ->select(array('product_name','detail'))
                    ->where('sponsor_id',$item->id)
                    ->get()
                    ->toArray();
                $pd = count($qu);
                array_push($br_d, ['sponsor_id'=>$item->id,'sponsor'=>$item->sponsor_name,'sponsor_image'=>$item->image,'item_count'=>$pd]);

            }
            $v= $br_d;
        }else{
            $sponsor= Sponsor::where('id',$request['sponsor_id'])->get();
            $product_view=[];
            $image_view=[];
            foreach ($sponsor as $item) {
                $product = Product::where('sponsor_id',$item->id)->get();
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
            $v=$sponsor;
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' =>$v]);

    }
}
