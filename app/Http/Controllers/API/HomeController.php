<?php

namespace App\Http\Controllers\API;


use App\Artist;
use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkUser');
    }

    public function advertise()
    {
        $advertise= DB::table('advertise')
            ->select(DB::raw('advertise.id,video.video_name,video.image,video.video,pdf.pdf_name'))
            ->leftJoin('video','advertise.video_id','=','video.id')
            ->leftJoin('pdf','advertise.pdf_id','=','pdf.id')
            ->orderBy('advertise.id','desc')
            ->get()
            ->toArray();

        $category_video = DB::table('category')
            ->select(array('cat_id','cat_name','cat_image'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'video')
            ->get()
            ->toArray();
        $v=[];
        foreach ($category_video as $item) {
            $qu= DB::table('video')
                ->select(array('video_name','url','video','image'))
                ->where('cat_id',$item->cat_id)
                ->get()
                ->toArray();
            $v_d= count($qu);
            $v[] = ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'item-count'=>$v_d];
        }
        $category_pdf = DB::table('category')
            ->select(array('cat_id','cat_name','cat_image'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'pdf')
            ->get()
            ->toArray();
        $pdf=[];
        foreach ($category_pdf as $item){
            $qu= DB::table('pdf')
                ->select(array('pdf_name','file'))
                ->where('cat_id',$item->cat_id)
                ->get()
                ->toArray();
            $p_d = count($qu);
            $pdf = ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'item-count'=>$p_d];
        }
        $product=[];
        $category_product = DB::table('category')
            ->select(array('cat_id','cat_name','cat_image'))
            ->leftJoin('module','category.module_id', '=', 'module.id')
            ->where('module.module_name', '=', 'product')
            ->get()
            ->toArray();
        foreach ($category_product as $item){
            $qu= DB::table('product')
                ->select(array('product_name','detail'))
                ->where('cat_id',$item->cat_id)
                ->get()
                ->toArray();
            $pd = count($qu);
            $product = ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'item-count'=>$pd];
        }
        $brand= Brand::all();
        $br_d=[];
        foreach ($brand as $item){
            $qu= DB::table('product')
                ->select(array('product_name','detail'))
                ->where('brand',$item->id)
                ->get()
                ->toArray();
            $pd = count($qu);
            $br_d = ['Brand_id'=>$item->id,'Brand'=>$item->brand_name,'Brand_image'=>$item->brand_image,'item-count'=>$pd];

        }
        $results = DB::table('artist')->where('rate',5)->orderBy('rate','desc')->get();
        $artist =DB::table('artist')->where('rate','<',5)->orderBy('rate','desc')->get();
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Advertise'=>$advertise,'video' => $v,'Magazine'=>$pdf,'Product'=>$product,'Brand'=>$br_d,'Artiest'=>$artist,'SponserArtiest'=>$results]]);

    }

//    public function advertise() {
//        $advertise= DB::table('advertise')
//            ->select(DB::raw('advertise.id,video.video_name,video.image,video.video,pdf.pdf_name'))
//            ->leftJoin('video','advertise.video_id','=','video.id')
//            ->leftJoin('pdf','advertise.pdf_id','=','pdf.id')
//            ->orderBy('advertise.id','desc')
//            ->get()
//            ->toArray();
//
//
//        $pdf = DB::table('pdf')
//            ->leftJoin('category', 'pdf.cat_id', '=', 'category.cat_id')
//            ->select(DB::raw('pdf.id,category.cat_name,pdf.pdf_name,pdf.file,pdf.detail,pdf.price,pdf.token'))
//            ->orderBy('id','desc')
//            ->get()
//             ->toArray();
//         $product = DB::table('product')
//            ->select(DB::raw('product.id,category.cat_name,product.product_name,product.detail,product.price,product.quantity'))
//            ->leftJoin('category', 'product.cat_id', '=', 'category.cat_id')
//            ->get()
//            ->toArray();
//        $results = Artist::orderBy('rate','desc')->get();
//
//        $category = DB::table('category')
//            ->select(array('cat_id','cat_name'))
//            ->leftJoin('module','category.module_id', '=', 'module.id')
//            ->where('module.module_name', '=', 'video')
//            ->get()
//            ->toArray();
//        $v=[];
//        foreach ($category as $item) {
//            $qu= DB::table('video')
//                ->select(array('video_name','url','video','image'))
//                ->where('cat_id',$item->cat_id)
//                ->get();
//            $v[] = ['Category'=>$item->cat_name,'CategoryArray'=>$qu];
//        }
//        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Advertise'=>$advertise,'video' => $v,'Magazine'=>$pdf,'Product'=>$product,'Artiest'=>$results]]);
//
//    }

    public function artist() {
        $results = Artist::orderBy('rate','desc')->get();
        $v=[];
        foreach ($results as $item) {
            $qu= DB::table('video')
                ->select(array('video_name','url','video','image'))
                ->where('artist_id',$item->id)
                ->get();
            $v[] = ['Artist'=>$item->artist_name,'Artist Detail'=>$qu];
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Artist Info' => $v]]);


    }
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 401);
        }
        $artist = Artist::where('id', '=', $request['id'])->first();
//        echo $artist;die();
        if (isset($artist)){
            return response()->json(['status'=>true,'message'=>'Artist retrieved successfully.' ,'data'=>$artist->toArray(), ],200);
        }
        else{
            return response()->json(['status'=>false,'message'=>'Incorrect Id.' ,'data'=>$artist, ],200);
        }


    }

    public function userUpdate(Request $request)
    {
        $id= $request->header('USER_ID');
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'mobile' => ['required', 'string','numeric','min:10',
                Rule::unique('users')->ignore($id)],
            'image' => ['mimes:jpeg,jpg,png,gif'],
            'email' => [
                'required','string', 'email', 'max:255',
                Rule::unique('users')->ignore($id),
            ],
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all()], 422);
        }
        $data= User::find($id);
//        echo $data->image;die();
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->business_name = $request['business_name'];
        $data->city = $request['city'];
        $data->address = $request['address'];
        $data->mobile = $request['mobile'];
        if (!empty($request->hasFile('image'))) {
            $path = Storage::disk('public')->put('user', $request->file('image'));
            if (!empty($data->image)){
                $image_path = public_path().'/storage/'.$data->image;
                unlink($image_path);
            }
            $data->image = $path;
        }
        $data->save();
        return response()->json(['status'=>true,'message'=>'User Update successfully.' ,'data'=>$data, ],200);

    }

    public function changePassword(Request $request)
    {
        $id= $request->header('USER_ID');
        $validator = Validator::make($request->all(),[
            'new_password'=>['required','string','min:8','confirmed'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=> false,
                'message'=>$validator->errors()->all()], 422);
        }

        $user = User::where('id',$id)->first();
       $ps = Hash::make($request['password']);
        if (isset($user)) {
            if (Hash::check($request->password, $user->password)) {
                $user->password =  Hash::make($request['new_password']);
                $user->save();
                return response()->json(['status' => true, 'message' => 'Password Changed successfully.', 'data' => $user,], 200);
            }

            else{
                return response()->json(['status'=>true,'message'=>'Please Check Your Password' ,'data'=>[], ],200);

            }
        }
        return response()->json(['status'=>true,'message'=>'Please Check Your Password' ,'data'=>[], ],200);

    }




}
