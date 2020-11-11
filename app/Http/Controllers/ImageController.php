<?php

namespace App\Http\Controllers;

use App\Images;
use App\ProductImage;
use App\SponsorImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }
    function uploadArtist(Request $request)
    {
        if ($request->ajax()) {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.jpg';
            $upload_path = public_path('storage/artist/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => 'artist/' . $image_name]);
        }
    }


    function uploadCategory(Request $request)
    {
        if ($request->ajax()) {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.jpg';
            $upload_path = public_path('storage/category/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => 'category/' . $image_name]);
        }
    }

    function uploadVideo(Request $request)
    {
        if ($request->ajax()) {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.jpg';
            $upload_path = public_path('storage/thumbnail/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => 'thumbnail/' . $image_name]);
        }
    }
    function uploadBrand(Request $request)
    {
        if ($request->ajax()) {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.jpg';
            $upload_path = public_path('storage/brand/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => 'brand/' . $image_name]);
        }
    }
     function uploadPackage(Request $request)
    {
        if ($request->ajax()) {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.jpg';
            $upload_path = public_path('storage/package/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => 'package/' . $image_name]);
        }
    }

    function uploadSponsor(Request $request)
    {
        if ($request->ajax()) {
            $image_data = $request->image;
            $image_array_1 = explode(";", $image_data);
            $image_array_2 = explode(",", $image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            $image_name = time() . '.jpg';
            $upload_path = public_path('storage/sponsor/' . $image_name);
            file_put_contents($upload_path, $data);
            return response()->json(['path' => 'sponsor/' . $image_name]);
        }
    }

    public function deleteImage(Request  $request)
    {
        if ($request->ajax()) {
            $image= $request->image;
            $artist = Images::where('id',$image)->first();
            $image_path = public_path().'/storage/'.$artist['image'];
            unlink($image_path);
            DB::table('image')->where('id',$image)->delete();
            return response()->json(asset('public/storage/'.$artist->image));
        }
    }

    public function deleteProductImage(Request  $request)
    {
        if ($request->ajax()) {
            $image= $request->image;
            $product = ProductImage::where('id',$image)->first();
            $image_path = public_path().'/storage/'.$product['image'];
            unlink($image_path);
            DB::table('product_image')->where('id',$image)->delete();
            return response()->json(asset('public/storage/'.$product->image));
        }
    }


     public function deleteSponsorImage(Request  $request)
    {
        if ($request->ajax()) {
            $image= $request->image;
            $sponsor = SponsorImage::where('id',$image)->first();
            $image_path = public_path().'/storage/'.$sponsor['image'];
            unlink($image_path);
            DB::table('sponsor_image')->where('id',$image)->delete();
            return response()->json($image);
        }
    }






}
