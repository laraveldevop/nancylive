<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Artist;
use App\Images;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        $artist = Artist::paginate(10);
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
            'image_data' => 'required',
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
        $artist->image = $request->input('image_data');
//        if ($request->file('image')) {
//            $path = Storage::disk('public')->put('artist', $request->file('image'));
//        }
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
        $image= DB::table('image')->where('artist_id',$artist->id)->get();
        return view('container.artist.create')->with(compact('artist','image'))->with('action','UPDATE');

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

        if (!empty($request->input('image_data'))) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png',
                ]);
//            $path =  Storage::disk('public')->put('artist', $request->file('image'));
            if (!empty($artist->image)){
                $image_path = public_path().'/storage/'.$artist->image;
                unlink($image_path);
            }
            //Update Image
            $artist->image = $request->input('image_data');
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
                $thumbnailpath = public_path('storage/'.$path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);
                Images::insert([
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
     * @param \App\Artist $artist
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($artist, Request $request)
    {
        $password = $request->input('password');
        $user_password = Auth::user()->getAuthPassword();
        if(Hash::check($password, $user_password)) {
            $video = Video::where('artist_id', $artist)->get();
            $art = Artist::where('id', $artist)->first();

            if ($art['image'] != null) {
                $image_path = public_path() . '/storage/' . $art['image'];
                unlink($image_path);
            }
            if ($art['video'] != null) {
                $image_path = public_path() . '/storage/' . $art['video'];
                unlink($image_path);
            }
            Artist::destroy($artist);

            if (!empty($video)) {
                foreach ($video as $value) {
                    DB::table('advertise')
                        ->where('video_id', $value->id)
                        ->delete();
                    if ($value->image != null) {
                        $image_path = public_path() . '/storage/' . $value->image;
                        unlink($image_path);
                    }
                    if ($value->video != null) {
                        $image_path = public_path() . '/storage/' . $value->video;
                        unlink($image_path);
                    }
                }
            }
            DB::table('video')->where('artist_id', $artist)->delete();

            $image = Image::where('artist_id', $artist)->get();
            if (!empty($image)) {
                foreach ($image as $item) {
                    $image_path = public_path() . '/storage/' . $item->image;
                    unlink($image_path);
                }
                DB::table('image')->where('artist_id', $artist)->delete();
            }
            return redirect('artist')->with('message', 'Delete Successfully');

        }
        return redirect('artist')->with('delete', 'Password Not Valid');
    }
}
