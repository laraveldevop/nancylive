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
        if ($request['id'] == null && $request['user_id'] == null) {
            $video = Video::all();
            return response()->json(['status' => true, 'message' => 'Video retrieved successfully.', 'data' => $video->toArray(),], 200);

        }
        elseif ($request['id'] != null){
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
        }
        elseif ($request['user_id'] != null){
            $video = Video::where('CreatedBy', $request['user_id'])->get();
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
        }
        else {
            return response()->json(['status' => false, 'message' => 'Not Found.'], 422);

        }
    }

    public function store(Request $request)
    {
        $id = $request->header('USER_ID');
        $video_id = $request->input('id');
        if ($video_id == null) {
            $request->validate([
                'category_id' => 'required',
                'artist_id' => 'required',
                'video_name' => 'required',
                'detail' => 'required',
                "price" => 'numeric',
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

            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $video]);
        }
        else{
            $request->validate([
                'category_id' => 'required',
                'artist_id' => 'required',
                'video_name' => 'required',
                'detail' => 'required',
                "price" => 'numeric',
            ]);
            $video = Video::find($video_id);
            $video->cat_id = $request->input('category_id');
            $video->artist_id = $request->input('artist_id');
            $video->video_name = $request->input('video_name');
            $video->detail = $request->input('detail');
            $video->token = 0;
            $video->price = $request->input('price');

            if ($request->input('url') != null) {
                $request->validate([
                    "url" => 'url'
                ]);
                $video->url = $request->input('url');
                $video->video = null;
            }

            if ($request->hasFile('image') == null) {
                $request->validate([
                    'image' => 'image|mimes:jpeg,png,jpg'
                ]);
                $path = Storage::disk('public')->put('thumbnail', $request->file('image'));
                $video->image = $path;

            }


            $video->save();
            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $video]);

        }
    }

    public function destroy(Request $request)
    {
        $video = $request->input('id');
        $art = Video::where('id',$video)->first();
        if (isset($art)) {
            if ($art['image'] != null) {
                $image_path = public_path() . '/storage/' . $art['image'];
                unlink($image_path);
            }
            if ($art['video'] != null) {
                $image_path = public_path() . '/storage/' . $art['video'];
                unlink($image_path);
            }
            Video::destroy($video);
            DB::table('advertise')
                ->where('video_id', $video)
                ->delete();
            return response()->json(['status' => true, 'message' => 'Delete successfully.'], 200);

        }
        else{
            return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);
        }
    }


}
