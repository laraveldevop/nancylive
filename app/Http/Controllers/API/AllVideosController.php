<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Product;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AllVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'video' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }

        $artist_id = $request->input('artist_id');
        $product_id = $request->input('product_id');
        $video_id = $request->input('video_id');
        if ($artist_id != null && $product_id == null && $video_id == null)
        {
            $artist= Artist::find($artist_id);
            if (isset($artist)) {
                $file = $request->file('video');
                $fileName = $file->getClientOriginalExtension();
                $request->file('video')->getMimeType();
                $path = Storage::disk('public')->put('artist-video', $request->file('video'));
                $artist->video = $path;
                $artist->save();
                return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $artist],200);
            }
            return response()->json(['status' => false, 'message' => 'Date Not Found'],422);


        }
        elseif ($product_id != null && $artist_id == null && $video_id == null)
        {
            $product = Product::find($product_id);
            if (isset($product)) {
                $path = Storage::disk('public')->put('product', $request->file('video'));
                $product->video = $path;
                $product->save();
                return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $product], 200);
            }
            return response()->json(['status' => false, 'message' => 'Date Not Found'],422);
        }
        elseif ($product_id == null && $artist_id == null && $video_id != null){
            $video = Video::find($video_id);
            if (isset($video)) {
                $file = $request->video;
                $fileName = $file->getClientOriginalExtension();
                $request->video->getMimeType();
                $path = str_replace('public/', '', $request->video->store('public'));
                $video->video = $path;
                $video->url = null;
                $video->save();
                return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $video], 200);
            }
            return response()->json(['status' => false, 'message' => 'Date Not Found'],422);

        }
        else{
            return response()->json(['status' => false, 'message' => 'Not Valid'],422);
        }
        return response()->json(['status' => false, 'message' => 'Not Valid'],422);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
