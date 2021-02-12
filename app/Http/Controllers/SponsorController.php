<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Images;
use App\Product;
use App\ProductImage;
use App\Sponsor;
use App\SponsorImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SponsorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsor = Sponsor::paginate(10);
        return view('container.sponsor.index')->with(compact('sponsor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.sponsor.create')->with('action', 'INSERT');

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
            'sponsor_name' => 'required',
            'about' => 'required',
            'city' => 'required',
            'firm_address' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',
            'image' => 'required',
            'video'=> 'required|mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'


        ]);

        $sponsor = new  Sponsor();

        $sponsor->sponsor_name = $request->input('sponsor_name');
        $sponsor->email = $request->input('email');
        $sponsor->city = $request->input('city');
        $sponsor->firm_address = $request->input('firm_address');
        $sponsor->phone = $request->input('phone');
        $sponsor->about = $request->input('about');
        $sponsor->facebook = $request->input('facebook');
        $sponsor->instagram = $request->input('instagram');
        $sponsor->youtube = $request->input('youtube');
        $sponsor->image = $request->input('image_data');
        $sponsor->CreatedBy = Auth::user()->getAuthIdentifier();


//        if ($request->file('image')) {
//            $path = Storage::disk('public')->put('sponsor', $request->file('image'));
//            $sponsor->image = $path;
//
//        }
        if ($request->hasFile('video')) {
            $file=$request->file('video');
            $fileName= $file->getClientOriginalExtension();
            $request->file('video')->getMimeType();
            $path = Storage::disk('public')->put('sponsor-video', $request->file('video'));
            $sponsor->video = $path;

        }
        $sponsor->save();


        $images = $request->file('files');
        if ($request->hasFile('files')) :
            foreach ($images as $item):

                $path = Storage::disk('public')->put('sponsor_images', $item);
                $arr[] = $path;
                $thumbnailpath = public_path('storage/'.$path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);
                SponsorImage::insert( [
                    'sponsor_id'=> $sponsor->id,
                    'image'=>  $path,
                    'created_at'=>now()
                    //you can put other insertion here
                ]);
            endforeach;
            $image = implode(",", $arr);
        else:
            $image = '';
        endif;

        return redirect('sponsor');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        $image= DB::table('sponsor_image')->where('sponsor_id',$sponsor->id)->get();

        return view('container.sponsor.create')->with(compact('sponsor','image'))->with('action','UPDATE');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sponsor $sponsor)
    {
        $request->validate([
            'sponsor_name' => 'required',
            'about' => 'required',
            'city' => 'required',
            'firm_address' => 'required',
            'instagram' => 'required',
            'facebook' => 'required',
            'youtube' => 'required',



        ]);
        $sponsor->sponsor_name = $request->input('sponsor_name');
        $sponsor->email = $request->input('email');
        $sponsor->city = $request->input('city');
        $sponsor->firm_address = $request->input('firm_address');
        $sponsor->phone = $request->input('phone');
        $sponsor->about = $request->input('about');
        $sponsor->facebook = $request->input('facebook');
        $sponsor->instagram = $request->input('instagram');
        $sponsor->youtube = $request->input('youtube');

        if (!empty($request->input('image_data'))) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png',
            ]);
//            $path =  Storage::disk('public')->put('sponsor', $request->file('image'));
            if (!empty($sponsor->image)){
                $image_path = public_path().'/storage/'.$sponsor->image;
                unlink($image_path);
            }
            //Update Image
            $sponsor->image = $request->input('image_data');
        }
        if (!empty($request->hasFile('video'))) {
            $request->validate([
                'video'=> 'mimes:mp4,mov,ogg,qt,webm|min:1|max:500000'
            ]);
            $v_path =  Storage::disk('public')->put('sponsor-video', $request->file('video'));
            if (!empty($sponsor->video)){
                $image_path = public_path().'/storage/'.$sponsor->video;
                unlink($image_path);
            }
            //Update Image
            $sponsor->video = $v_path;
        }

        $sponsor->save();
        $images = $request->file('files');
        if ($request->hasFile('files')) :
            foreach ($images as $item):

                $path = Storage::disk('public')->put('sponsor_images', $item);
                $arr[] = $path;
                $thumbnailpath = public_path('storage/'.$path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);
                SponsorImage::insert([
                    'sponsor_id'=> $sponsor->id,
                    'image'=>  $path,
                    'updated_at'=>now()
                    //you can put other insertion here
                ]);
            endforeach;
            $image = implode(",", $arr);
        else:
            $image = '';
        endif;


        return redirect('sponsor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy($sponsor, Request $request)
    {
        $password = $request->input('password');
        $user_password = Auth::user()->getAuthPassword();
        if(Hash::check($password, $user_password)) {
//        $product = Product::where('sponsor_id',$sponsor)->get();
            DB::table('product')
                ->where('sponsor_id', '=',$sponsor)
                ->update(['sponsor_id' => null]);
        $cat = Sponsor::where('id',$sponsor)->first();
        if ($cat['image'] != null) {
            $image_path = public_path() . '/storage/' . $cat['image'];
            unlink($image_path);
        }
        if ($cat['video'] != null) {
            $image_path = public_path() . '/storage/' . $cat['video'];
            unlink($image_path);
        }
        Sponsor::destroy($sponsor);

//        if (!empty($product)) {
//            foreach ($product as $value) {
//                DB::table('advertise')
//                    ->where('product_id', $value->id)
//                    ->delete();
//                $product_image = ProductImage::where('product_id', $value->id)->get();
//                if (!empty($product_image)) {
//                    foreach ($product_image as $item) {
//                        $image_path = public_path() . '/storage/' . $item->image;
//                        unlink($image_path);
//                    }
//                }
//                if ($value->video != null) {
//                    $image_path = public_path() . '/storage/' . $value->video;
//                    unlink($image_path);
//                }
//                DB::table('product_image')->where('product_id', $value->id)->delete();
//            }
//        }
//        DB::table('product')->where('sponsor_id',$sponsor)->delete();

        $image = SponsorImage::where('sponsor_id', $sponsor)->get();
        if (!empty($image)) {
            foreach ($image as $item) {
                $image_path = public_path() . '/storage/' . $item->image;
                unlink($image_path);
            }
            DB::table('sponsor_image')->where('sponsor_id',$sponsor)->delete();
        }
            return redirect('sponsor')->with('message', 'Delete Successfully');
        }
        return redirect('sponsor')->with('delete', 'Password Not Valid');
    }
}
