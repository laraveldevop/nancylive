<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkUser');
    }
    public function advertise() {
        $advertise= DB::table('advertise')
            ->select(DB::raw('advertise.id,video.video_name,video.image,video.video,pdf.pdf_name'))
            ->leftJoin('video','advertise.video_id','=','video.id')
            ->leftJoin('pdf','advertise.pdf_id','=','pdf.id')
            ->orderBy('advertise.id','desc')
            ->get()
            ->toArray();


        $pdf = DB::table('pdf')
            ->leftJoin('category', 'pdf.cat_id', '=', 'category.cat_id')
            ->select(DB::raw('pdf.id,category.cat_name,pdf.pdf_name,pdf.file,pdf.detail,pdf.price,pdf.token'))
            ->orderBy('id','desc')
            ->get()
             ->toArray();
         $product = DB::table('product')
            ->select(DB::raw('product.id,category.cat_name,product.product_name,product.image,product.detail,product.price,product.quantity'))
            ->leftJoin('category', 'product.cat_id', '=', 'category.cat_id')
            ->get()
            ->toArray();
        $results = Artist::orderBy('rate','desc')->get();

        $category = DB::table('category')
            ->select(array('cat_id','cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'video')
            ->get()
            ->toArray();

        foreach ($category as $item) {
            $qu= DB::table('video')
                ->select(array('video_name','video','image'))
                ->where('cat_id',$item->cat_id)
                ->get();
            $v[] = ['Category'=>$item->cat_name,'CategoryArray'=>$qu];
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Advertise'=>$advertise,'video' => $v,'Magazine'=>$pdf,'Product'=>$product,'Artiest'=>$results]]);

    }
}
