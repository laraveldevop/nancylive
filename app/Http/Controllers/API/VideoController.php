<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(Request  $request)
    {

        if ($request['id'] != null) {
            $video = Video::where('id', $request['id'])->get();
            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video,], 200);
        }
        else {
            $video = Video::all();


            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video->toArray(),], 200);
        }
    }


}
