<?php

namespace App\Http\Controllers\API;


use App\Artist;
use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Image;
use App\Order;
use App\ProductImage;
use App\User;
use App\Video;
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
            ->select(DB::raw('advertise.id,advertise.status,advertise.video_id,advertise.pdf_id,advertise.product_id,video.video_name,video.image,video.video,pdf.pdf_name,product.product_name'))
            ->leftJoin('video','advertise.video_id','=','video.id')
            ->leftJoin('pdf','advertise.pdf_id','=','pdf.id')
            ->leftJoin('product','advertise.product_id','=','product.id')
            ->orderBy('advertise.id','desc')
            ->get()
            ->toArray();
        $ad=[];

        foreach ($advertise as $item) {
            $product_image= ProductImage::where('product_id',$item->product_id)->first();
            if ($item->status == 1){
                $id= $item->video_id;
                $title= $item->video_name;
                $image= $item->image;
            }
            elseif ($item->status == 2)
            {
                $id= $item->pdf_id;
                $title= $item->pdf_name;
                $image= null;
            }
            elseif ($item->status == 3){
                $id= $item->product_id;
                $title= $item->product_name;
                $image= $product_image['image'];
            }
            else{
                $id= null;
                $title= null;
                $image= null;
            }
                array_push($ad, ['ad_id' => $item->id,'id'=>$id, 'status' => $item->status, 'title' =>$title,'image'=>$image,'video'=>$item->video]);


        }



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
            array_push($v , ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'item_count'=>$v_d]);
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
            array_push($pdf , ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'item_count'=>$p_d]);
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
            array_push( $product , ['category_id'=>$item->cat_id,'Category'=>$item->cat_name,'category_image'=>$item->cat_image,'item_count'=>$pd]);
        }
        $br_d=[];
        $brand= DB::table('brand')
            ->select(array('id','brand_name','image'))
            ->get()
            ->toArray();

        foreach ($brand as $item){
            $qu= DB::table('product')
                ->select(array('product_name','detail'))
                ->where('brand',$item->id)
                ->get()
                ->toArray();
            $pd = count($qu);
            array_push($br_d, ['Brand_id'=>$item->id,'Brand'=>$item->brand_name,'Brand_image'=>$item->image,'item_count'=>$pd]);
        }
        $spo=[];
        $sponsor= DB::table('sponsor')
            ->select(array('id','sponsor_name','image'))
            ->get()
            ->toArray();
        foreach ($sponsor as $item){
            $qu= DB::table('product')
                ->select(array('product_name','detail'))
                ->where('sponsor_id',$item->id)
                ->get()
                ->toArray();
            $pd = count($qu);
            array_push($spo, ['sponsor_id'=>$item->id,'sponsor'=>$item->sponsor_name,'sponsor_image'=>$item->image,'item_count'=>$pd]);
        }

        $results = DB::table('artist')->orderBy('rate','desc')->get();
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => ['Advertise'=>$ad,'video' => $v,'Magazine'=>$pdf,'Product'=>$product,'Brand'=>$br_d,'sponsor'=>$spo,'Artiest'=>$results]]);

    }


    public function artist(Request  $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()], 401);
        }
        $results = Artist::where('id',$request['id'])->orderBy('rate','desc')->get();
        $v=[];
        $video=[];
        foreach ($results as $item) {
            $images = Image::where('artist_id',$item->id)->get();
            $item['images']=$images;

            $qu= Video::where('artist_id',$item->id)
                ->get();
            foreach ($qu as $value) {
                if ($value->price == null){
                    $value['payment_status']= 'free';
                }
                else{
                    $value['payment_status']= 'payable';
                }
                if ($value->url == null){
                    $value['video_status'] = 1;
                }
                else{
                    $value['video_status'] = 2;
                }
            }
            $item['videos']=$qu;
        }


        $v = $results;
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $v]);


    }
    public function index()
    {

        $results = Artist::orderBy('rate','desc')->get();
        $v=[];
        foreach ($results as $item) {
            $qu= DB::table('image')
                ->select(array('id','image'))
                ->where('artist_id',$item->id)
                ->get();
            $item['images']= $qu;
        }
        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $results]);

    }
    public function order(){
            $order_product = DB::table('order')
                ->select(DB::raw('order.id as order_id,order.user_id,order.total as price,order.product_id,product.product_name'))
                ->leftJoin('product','order.product_id','=','product.id')
                ->get();

        return response()->json(['status' => true, 'message' => 'Available Data', 'data' => $order_product]);

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
        return response()->json(['status'=>true,'message'=>'User Update successfully.' ,'data'=>$data ],200);

    }

    public function changePassword(Request $request)
    {
        $id= $request->header('USER_ID');
        $validator = Validator::make($request->all(),[
            'new_password'=>['required','string','confirmed'],
            'password' => ['required', 'string'],
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
                $user->forgot_password_stat = 0;
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
