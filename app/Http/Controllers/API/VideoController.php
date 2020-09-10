<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(Request  $request)
    {

        if ($request['id'] != null) {
            $video = Video::where('id', $request['id'])->get();
            foreach ($video as $item){
                $vcat = Category::select('cat_name')->where('cat_id',$item->cat_id)->first();
                $item['cat_name']=$vcat->cat_name;
                if ($item->price == null){
                    $item['payment_status'] = 'free';
                }
                else{
                    $item['payment_status']= 'payable';
                }
                $artist = Artist::where('id',$item->artist_id)->get();
                $item['artist']= $artist;

            }
            $v = [$video];
            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video,], 200);
        }
        else {
            $video = Video::all();


            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video->toArray(),], 200);
        }
    }


}
