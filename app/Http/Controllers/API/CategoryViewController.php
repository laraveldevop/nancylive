<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryViewController extends Controller
{
    public function productCategory()
    {
        $category = DB::table('category')
            ->select(array('cat_id','cat_name','cat_image'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'product')
            ->get()
            ->toArray();
        $v=[];
        foreach ($category as $item) {
            $qu= DB::table('product')
                ->select('*')
                ->where('cat_id',$item->cat_id)
                ->get();
            array_push($v , ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'Product'=>$qu]);

        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Category'=>$v]]);
    }
    public function videoCategory()
    {
        $category = DB::table('category')
            ->select(array('cat_id','cat_name','cat_image'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'video')
            ->get()
            ->toArray();
        $v=[];
        foreach ($category as $item) {
            $qu= DB::table('video')
                ->select('*')
                ->where('cat_id',$item->cat_id)
                ->get();
            array_push($v , ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'Videos'=>$qu]);

        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Category'=>$v]]);
    }

    public function pdfCategory()
    {
        $category = DB::table('category')
            ->select(array('cat_id','cat_name','cat_image'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'pdf')
            ->get()
            ->toArray();
        $v=[];
        foreach ($category as $item) {
            $qu= DB::table('pdf')
                ->select('*')
                ->where('cat_id',$item->cat_id)
                ->get();
            array_push($v , ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'Magazine'=>$qu]);

        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Category'=>$v]]);
    }
}
