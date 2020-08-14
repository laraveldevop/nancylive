<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = DB::table('video')
        ->select(DB::raw('video.id,video.video_name,video.video,video.token,video.url,video.image as v_image,category.cat_name,artist.artist_name,artist.image,artist.about'))
        ->leftJoin('category', 'video.cat_id', '=', 'category.cat_id')
            ->leftjoin('artist','video.artist_id','=','artist.id')
            ->get()
            ->toArray();


        return view('container.video.index')->with(compact('video'));
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
            "price" => 'numeric'

//            "url" => array('nullable','regex:'.$regex),
//            'video'=> 'nullable|mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'

        ]);
        if ($request->hasFile('image') == null){
            $request->validate([
            'image' => 'required'
                ]);
        }
        else{
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);
        }
        if ($request->input('url') != null){
            $request->validate([
                "url" => 'url'
            ]);
        }
        if ($request->hasFile('video') != null){
            $request->validate([
                'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
            ]);
        }


        $video =new Video();

//        $video->video =$request->input('video');
        if ($request->hasFile('video')) {
            $file=$request->file('video');
            $fileName= $file->getClientOriginalExtension();
             $request->file('video')->getMimeType();
//            $request->video->move('storage/'.$fileName);
            $path = str_replace('public/', '', $request->file('video')->store('public'));
            $video->video = $path;

        }

        $video->cat_id =$request->input('cat_id');
        $video->artist_id =$request->input('artist_id');
        $video->video_name =$request->input('video_name');
        $video->detail =$request->input('detail');
        $video->token =$request->has('token');
        $video->price =$request->input('price');
        $video->url =$request->input('url');

        if ($request->file('image')) {
            $path = Storage::disk('public')->put('thumbnail', $request->file('image'));
            $video->image = $path;

        }

        $video->save();
        if ($request->has('token') == 1)
        {
            DB::table('advertise')->insert(
                ['video_id' => $video->id,'created_at' => now()]
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($video)
    {
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
                    ['video_id' => $request->id,'updated_at'=>now()]
                );
        }

        return response()->json([
            'val' => 'sucsses'
        ]);
    }
}
