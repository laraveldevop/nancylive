<?php

namespace App\Http\Controllers\API;

use App\Artist;
use App\Http\Controllers\Controller;
use App\Images;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $id = $request->header('USER_ID');
        $validator = Validator::make($request->all(), [
            'artist_name' => 'required',
            'about' => 'required',
            'city' => 'required',
            'firm_address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 422);
        }
        $artist_id = $request->input('id');
        if ($artist_id == null) {
            $request->validate([
                'image' => 'mimes:jpg,jpeg,png|required',
                'images' => 'required',
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
            $artist->rate = $request->input('rate');
            $artist->to_approve = 0;
            $artist->CreatedBy = $id;
            $image_path = Storage::disk('public')->put('artist', $request->file('image'));
            $thumbnailpath = public_path('storage/' . $image_path);
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
                    $path = Storage::disk('public')->put('images', $item);

                    $thumbnailpath = public_path('storage/' . $path);
                    $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save($thumbnailpath);

                    Images::insert([
                        'artist_id' => $artist->id,
                        'image' => $path,
                        'created_at' => now()
                        //you can put other insertion here
                    ]);


                endforeach;

//            $image = implode(",", $arr);
            else:
                $image = '';
            endif;

            return response()->json(['status' => true, 'message' => 'Add Successfully', 'data' => $artist]);
        } else {

            $artist = Artist::find($artist_id);
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

            if (!empty($request->file('image'))) {
                $request->validate([
                    'image' => 'mimes:jpg,jpeg,png',
                ]);
//            $path =  Storage::disk('public')->put('artist', $request->file('image'));
                if (!empty($artist->image)) {
                    $image_path = public_path() . '/storage/' . $artist->image;
                    unlink($image_path);
                }
                //Update Image
                $image_path = Storage::disk('public')->put('artist', $request->file('image'));
                $thumbnailpath = public_path('storage/' . $image_path);
                $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                $img->save($thumbnailpath);
                $artist->image = $image_path;
            }

            $artist->save();
            $images = $request->file('images');
            if ($request->hasFile('images')) :
                foreach ($images as $item):

                    $path = Storage::disk('public')->put('images', $item);
                    $arr[] = $path;
                    $thumbnailpath = public_path('storage/' . $path);
                    $img = Image::make($thumbnailpath)->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });
                    $img->save($thumbnailpath);
                    Images::insert([
                        'artist_id' => $artist->id,
                        'image' => $path,
                        'updated_at' => now()
                        //you can put other insertion here
                    ]);
                endforeach;
                $image = implode(",", $arr);
            else:
                $image = '';
            endif;

            $remove_image = $request->input('remove_images');
//            if ($remove_image) {
                foreach ($remove_image as $item) {
                    $image = Images::where('id', $item)->get();
                    if (!empty($image)) {
                        foreach ($image as $value) {
                            $image_path = public_path() . '/storage/' . $value->image;
                            unlink($image_path);
                        }
                        DB::table('image')->where('id', $item)->delete();
                    }
                }
//            }

            return response()->json(['status' => true, 'message' => 'Update Successfully', 'data' => $artist]);

        }


    }

    public function artistApprove(Request $request)
    {

        $artist_approve = $request->approve;
        $artist_id = $request->artist_id;
        if ($artist_approve == null && $artist_id == null) {
            $art = Artist::select(DB::raw('artist.*,users.name,users.mobile as user_mobile'))->orderby('artist.id', 'DESC')->leftjoin('users', 'artist.CreatedBy', '=', 'users.id')->get();
            foreach ($art as $item) {
                $images = Images::where('artist_id', $item->id)->get();
                $item['images'] = $images;

                $qu = Video::where('artist_id', $item->id)
                    ->get();
                foreach ($qu as $value) {
                    if ($value->price == null) {
                        $value['payment_status'] = 'free';
                    } else {
                        $value['payment_status'] = 'payable';
                    }
                    if ($value->url == null) {
                        $value['video_status'] = 1;
                    } else {
                        $value['video_status'] = 2;
                    }
                }
                $item['videos'] = $qu;
            }
            return response()->json(['status' => true, 'message' => 'Data Retrieve Successfully', 'data' => $art], 200);
        }
        $artist = Artist::find($artist_id);
        if (isset($artist)) {
            if ($artist_approve == 0) {
                $artist->to_approve = 0;
                $artist->save();
                return response()->json(['status' => true, 'message' => 'Not Approved', 'data' => $artist], 200);
            } elseif ($artist_approve == 1) {
                $artist->to_approve = 1;
                $artist->save();
                return response()->json(['status' => true, 'message' => 'Approve Successfully', 'data' => $artist], 200);

            } else {
                $artist->to_approve = 2;
                $artist->save();
//                $video = Video::where('artist_id', $artist_id)->get();
//                $art = Artist::where('id', $artist_id)->first();
//
//                if ($art['image'] != null) {
//                    $image_path = public_path() . '/storage/' . $art['image'];
//                    unlink($image_path);
//                }
//                if ($art['video'] != null) {
//                    $image_path =  $art['video'];
//                    unlink($image_path);
//                }
//                Artist::destroy($artist_id);
//
//                if (!empty($video)) {
//                    foreach ($video as $value) {
//                        DB::table('advertise')
//                            ->where('video_id', $value->id)
//                            ->delete();
//                        if ($value->image != null) {
//                            $image_path = public_path() . '/storage/' . $value->image;
//                            unlink($image_path);
//                        }
//                        if ($value->video != null) {
//                            $image_path = public_path() . '/storage/' . $value->video;
//                            unlink($image_path);
//                        }
//                    }
//                }
//                DB::table('video')->where('artist_id', $artist_id)->delete();
//
//                $image = Images::where('artist_id', $artist_id)->get();
//                if (!empty($image)) {
//                    foreach ($image as $item) {
//                        $image_path = public_path() . '/storage/' . $item->image;
//                        unlink($image_path);
//                    }
//                    DB::table('image')->where('artist_id', $artist_id)->delete();
//                }
                return response()->json(['status' => true, 'message' => 'Reject Successfully', 'data' => $artist], 200);
            }
        } else {
            return response()->json(['status' => false, 'message' => 'Artist Not Found'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Artist $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $artist = $request->input('id');
        $br = Artist::where('id', $artist)->first();
        if (isset($br)) {
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

            $image = Images::where('artist_id', $artist)->get();
            if (!empty($image)) {
                foreach ($image as $item) {
                    $image_path = public_path() . '/storage/' . $item->image;
                    unlink($image_path);
                }
                DB::table('image')->where('artist_id', $artist)->delete();
            }
            return response()->json(['status' => true, 'message' => 'Delete successfully.'], 200);
        } else {
            return response()->json(['status' => false, 'message' => 'Data Not Found.'], 422);

        }
    }
}
