<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use Pawlox\VideoThumbnail\VideoThumbnail;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Artist');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = DB::table('video')
        ->select(DB::raw('video.id,video.video_name,video.video,video.detail,video.token,video.url,video.image as v_image,category.cat_name,artist.artist_name,artist.image,artist.about'))
            ->where('video.to_approve','=',1)
        ->leftJoin('category', 'video.cat_id', '=', 'category.cat_id')
            ->leftjoin('artist','video.artist_id','=','artist.id')
            ->paginate(10);
        $video_approve = DB::table('video')
            ->select(DB::raw('video.id,video.video_name,video.video,video.detail,video.token,video.price,video.image as v_image,category.cat_name,artist.artist_name,artist.image,artist.about'))
            ->where('video.to_approve','=',0)
            ->leftJoin('category', 'video.cat_id', '=', 'category.cat_id')
            ->leftjoin('artist','video.artist_id','=','artist.id')
            ->get();


        return view('container.video.index')->with(compact('video','video_approve'));
    }

    public function UpdateToApprove(Request $request)
    {
        if ($request->ajax()) {
            $data= $request->approve;

            $video = Video::find($data);


            $video->to_approve = 1;
            $video->save();
            return response()->json($video);
        }
    }

    public function UpdateToReject(Request $request)
    {
        if ($request->ajax()) {
            $video = $request->reject;
//
            $art = Video::where('id',$video)->first();
//
//            if ($art['image'] != null) {
//                $image_path = public_path() . '/storage/' . $art['image'];
//                unlink($image_path);
//            }
//
//            Video::destroy($video);
//            DB::table('advertise')
//                ->where('video_id',$video)
//                ->delete();
            $art->to_approve = null;
            $art->save();
            return response()->json($video);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'video')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();
        $artist = DB::table('artist')
            ->select(array('id', 'artist_name'))
            ->orderBy('artist_name', 'ASC')
            ->get()
            ->toArray();

        return view('container.video.create')->with('action', 'INSERT')->with('category',$category)->with('artist',$artist);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_id'=> 'required',
            'video_name' => 'required',
            'detail'=>'required',
            "price" => 'numeric',
            "video_type" => 'required',
            "price_type" => 'required',
        ]);
        if ($request->hasFile('image') == null){
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg'
            ]);
        }
        if ($request->input('url') != null){
            $request->validate([
                "url" => 'url'
            ]);
        }

        $video =new Video();

        $video->cat_id =$request->input('cat_id');
        $video->artist_id =$request->input('artist_id');
        $video->video_name =$request->input('video_name');
        $video->detail =$request->input('detail');
        $video->token =$request->has('token');
        $video->price =$request->input('price');
        $video->url =$request->input('url');
        $video->video = $request->input('video_file_name');
        $video->image = $request->input('image_data');
        $video->to_approve = 1;
        $video->CreatedBy = Auth::user()->getAuthIdentifier();
//        if ($request->file('image')) {
//            $path = Storage::disk('public')->put('thumbnail', $request->file('image'));
//            $video->image = $path;
//
//        }


        $video->save();
        if ($request->has('token') == 1)
        {
            DB::table('advertise')->insert(
                ['video_id' => $video->id,'status'=>1,'created_at' => now()]
            );
        }
        return redirect('video');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }


    public function videoDownload(Request $request) {
            $file = $request->file('video_local');
//            $fileName = $file->getClientOriginalName();
        $md5Name = md5_file($request->file('video_local')->getRealPath());
        $guessExtension = $request->file('video_local')->guessExtension();
            $path =$file->storeAs('video',$md5Name.'.'.$guessExtension ,'s3');
            $request->video_local->getMimeType();
        echo  $path;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $category = DB::table('category')
            ->select(array('cat_id', 'cat_name'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'video')
            ->orderBy('cat_name', 'ASC')
            ->get()
            ->toArray();
        $artist = DB::table('artist')
            ->select(array('id', 'artist_name'))
            ->orderBy('artist_name', 'ASC')
            ->get()
            ->toArray();

        return view('container.video.create')->with('action', 'UPDATE')->with(compact('video','category','artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'cat_id'=> 'required',
            'video_name' => 'required',
            'detail'=>'required',
            "price" => 'numeric',
            "video_type" => 'required',
            "price_type" => 'required',
        ]);
        if ($request->input('url') != null){
            $request->validate([
                "url" => 'url'
            ]);
        }

        $video->cat_id =$request->input('cat_id');
        $video->artist_id =$request->input('artist_id');
        $video->video_name =$request->input('video_name');
        $video->detail =$request->input('detail');
        $video->token =$request->has('token');
        $video->price =$request->input('price');

        if (!empty($request->input('url'))){
            $video->video = null;
            $video->url =$request->input('url');
        }
        if (!empty($request->hasFile('video'))) {
            $request->validate([
                'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
            ]);
            $v_path =  Storage::disk('public')->put('', $request->file('video'));
            if (!empty($video->video)){
                $image_path = public_path().'/storage/'.$video->video;
                unlink($image_path);
            }
            //Update Image
            $video->video = $v_path;
            $video->url = null;
        }

        if (!empty( $request->input('image_data'))) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png',
            ]);
//            $path =  Storage::disk('public')->put('thumbnail', $request->file('image'));
            if (!empty($video->image)){
                $image_path = public_path().'/storage/'.$video->image;
                unlink($image_path);
            }
            //Update Image
            $video->image =  $request->input('image_data');;
        }
        $video->save();
        if ($request->has('token') == 1)
        {
            DB::table('advertise')->insert(
                ['video_id' => $video->id,'status'=>1,'created_at' => now()]
            );
        }
        else{
            DB::table('advertise')->where('video_id', '=', $video->id)->delete();
        }
        return redirect('video');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($video)
    {
        $art = Video::where('id',$video)->first();

        if ($art['image'] != null) {
            $image_path = public_path() . '/storage/' . $art['image'];
            unlink($image_path);
        }
        if ($art['video'] != null) {
            $image_path =  public_path() . '/storage/' .$art['video'];
            unlink($image_path);
        }
        Video::destroy($video);
        DB::table('advertise')
            ->where('video_id',$video)
            ->delete();
        return redirect('video');
    }

    public function ads(Request $request)
    {
        if($request->val == 1){
            DB::table('video')
                ->where('id', $request->id)
                ->update(['token' => 0,'updated_at'=>now()]);
            DB::table('advertise')->where('video_id', '=', $request->id)->delete();

        } else {
            DB::table('video')
                ->where('id', $request->id)
                ->update(['token' => 1]);
            DB::table('advertise')
                ->updateOrInsert(
                    ['video_id' =>  $request->id],
                    ['video_id' => $request->id,'status'=> 1,'updated_at'=>now()]
                );
        }

        return response()->json([
            'val' => 'sucsses'
        ]);
    }
}
