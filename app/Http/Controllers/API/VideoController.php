<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $video = Video::all();


        return response()->json(['status'=>true,'message'=>'Video retrieved successfully.' ,'data'=>$video->toArray(), ],200);
    }
}
