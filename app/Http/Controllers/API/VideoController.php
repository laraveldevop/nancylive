<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Category;
use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function index(Request $request)
    {

        if ($request['id'] != null) {
            $video = Video::where('id', $request['id'])->get();
            foreach ($video as $item) {
                $vcat = Category::select('cat_name')->where('cat_id', $item->cat_id)->first();
                $item['cat_name'] = $vcat->cat_name;
                if ($item->price == null) {
                    $item['payment_status'] = 'free';
                } else {
                    $item['payment_status'] = 'payable';
                }
                $artist = Artist::where('id', $item->artist_id)->get();
                $item['artist'] = $artist;

            }
            $v = [$video];
            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video,], 200);
        } else {
            $video = Video::all();


            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video->toArray(),], 200);
        }
    }

    public function store(Request $request)
    {
        $id = $request->header('USER_ID');

        $request->validate([
            'category_id' => 'required',
            'artist_id' => 'required',
            'video_name' => 'required',
            'detail' => 'required',
            "price" => 'numeric',
            "image" => 'numeric',
        ]);




        $video = new Video();

        $video->cat_id = $request->input('category_id');
        $video->artist_id = $request->input('artist_id');
        $video->video_name = $request->input('video_name');
        $video->detail = $request->input('detail');
        $video->token = 0;
        $video->price = $request->input('price');
        $video->to_approve = 0;
        $video->CreatedBy = $id;
        if ($request->input('url') != null) {
            $request->validate([
                "url" => 'url'
            ]);
            $video->url = $request->input('url');
        }

        if ($request->hasFile('image') == null) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg'
            ]);
            $path = Storage::disk('public')->put('thumbnail', $request->file('image'));
            $video->image = $path;

        }


        $video->save();
        if ($request->has('token') == 1) {
            DB::table('advertise')->insert(
                ['video_id' => $video->id, 'status' => 1, 'created_at' => now()]
            );
        }
        return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' =>$video]);

    }


}
