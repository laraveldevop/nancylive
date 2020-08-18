<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Artist;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtistController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artist = Artist::all();
        return view('container.artist.index')->with(compact('artist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.artist.create')->with('action', 'INSERT');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'artist_name' => 'required',
            'about' => 'required',
            'city' => 'required',
            'firm_address' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'image' => 'required',
            'video'=> 'required|mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'


        ]);

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
        $artist->rate = $request->input('demo_vertical');
//        $artist->image = $request->input('image');
        if ($request->file('image')) {
            $path = Storage::disk('public')->put('artist', $request->file('image'));
            $artist->image = $path;

        }
        if ($request->hasFile('video')) {
            $file=$request->file('video');
            $fileName= $file->getClientOriginalExtension();
            $request->file('video')->getMimeType();
            $path = Storage::disk('public')->put('artist-video', $request->file('video'));
            $artist->video = $path;

        }
        $artist->save();


        $images = $request->file('files');
        if ($request->hasFile('files')) :
            foreach ($images as $item):

                $path = Storage::disk('public')->put('images', $item);
                $arr[] = $path;
                Image::insert( [
                    'artist_id'=> $artist->id,
                    'image'=>  $path,
                    'created_at'=>now()
                    //you can put other insertion here
                ]);
            endforeach;
            $image = implode(",", $arr);
        else:
            $image = '';
        endif;

        return redirect('artist');
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
        return view('container.artist.create')->with(compact('artist'))->with('action','UPDATE');

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
        $request->validate([
            'artist_name' => 'required',
            'about' => 'required',
            'city' => 'required',
            'firm_address' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',



        ]);
        $artist->artist_name = $request->input('artist_name');
        $artist->email = $request->input('email');
        $artist->city = $request->input('city');
        $artist->firm_address = $request->input('firm_address');
        $artist->phone = $request->input('phone');
        $artist->about = $request->input('about');
        $artist->facebook = $request->input('facebook');
        $artist->instagram = $request->input('instagram');
        $artist->youtube = $request->input('youtube');
        $artist->rate = $request->input('demo_vertical');

        if (!empty($request->hasFile('image'))) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png',
                ]);
            $path =  Storage::disk('public')->put('artist', $request->file('image'));
            if (!empty($artist->image)){
                $image_path = public_path().'/storage/'.$artist->image;
                unlink($image_path);
            }
            //Update Image
            $artist->image = $path;
        }
        if (!empty($request->hasFile('video'))) {
            $request->validate([
                'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
                ]);
            $v_path =  Storage::disk('public')->put('artist-video', $request->file('video'));
            if (!empty($artist->video)){
                $image_path = public_path().'/storage/'.$artist->video;
                unlink($image_path);
            }
            //Update Image
            $artist->video = $v_path;
        }

        $artist->save();
        $images = $request->file('files');
        if ($request->hasFile('files')) :
            foreach ($images as $item):

                $path = Storage::disk('public')->put('images', $item);
                $arr[] = $path;
                Image::insert([
                    'artist_id'=> $artist->id,
                    'image'=>  $path,
                    'updated_at'=>now()
                    //you can put other insertion here
                ]);
            endforeach;
            $image = implode(",", $arr);
        else:
            $image = '';
        endif;


        return redirect('artist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy($artist)
    {
        Artist::destroy($artist);
        DB::table('video')->where('artist_id',$artist)->delete();
        return redirect('artist');
    }
}
