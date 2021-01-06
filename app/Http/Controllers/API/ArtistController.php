<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class ArtistController extends Controller
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = $request->header('USER_ID');
        $validator = Validator::make($request->all(),[
            'artist_name' => 'required',
            'about' => 'required',
            'city' => 'required',
            'firm_address' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'image' => 'mimes:jpg,jpeg,png|required',
            'images' => 'required',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()], 422);
        }
        $artist = new  Artist();
        $artist->artist_name = $request->input('artist_name');
        $artist->email = $request->input('email');
        $artist->city = $request->input('city');
        $artist->firm_address = $request->input('firm_address');
        $artist->phone = $request->input('phone');
        $artist->about = $request->input('about');
        $artist->facebook = $request->input('facebook');
        $artist->instagram = $request->input('instagram');
        $artist->youtube = $request->input('youtube');
        $artist->rate = $request->input('rate');
        $artist->to_approve = 0;
        $artist->CreatedBy = $id;
        $image_path = Storage::disk('public')->put('artist', $request->file('image'));
        $thumbnailpath = public_path('storage/'.$image_path);
        $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save($thumbnailpath);
        $artist->image = $image_path;
        $artist->save();
        $images = $request->file('images');
        if ($request->hasFile('images')) :
            foreach ($images as $item):
                $path= Storage::disk('public')->put('images', $item);

                $thumbnailpath = public_path('storage/'.$path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);

                Images::insert( [
                    'artist_id'=> $artist->id,
                    'image'=>  $path,
                    'created_at'=>now()
                    //you can put other insertion here
                ]);


            endforeach;

//            $image = implode(",", $arr);
        else:
            $image = '';
        endif;

        return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' =>$artist]);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }
}
