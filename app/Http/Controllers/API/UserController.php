<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $v=[];
        $id= $request->header('USER_ID');
        $user = User::where('id',$id)->get();
        foreach($user as $item){
                $value =$item->roles->first();
                $update = User::find($item->id);
                $update->role_id = isset($value['id'])?$value['id']: null;
                $update->save();
            $item['role'] = isset($value['id'])?$value['id']: null;
                array_push($v , $item);

            }
            return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $v,], 200);
    }
    public function userList(Request $request)
    {

        $id= $request->user_id;
        if ($id != null){
//            $user=  User::where('id',$id)->get();
//            foreach($user as $item){
//                $value =$item->roles->first();
//                $item['role'] = isset($value['id'])?$value['id']: null;
//                array_push($v , $item);
//            }
            $user=  DB::table('users')->where('id',$id)->get();
            return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $user,], 200);
        }
        else{
            $user=  DB::table('users')->orderBy('id', 'DESC')->get();
//            foreach($user as $item){
//                $value =$item->roles->first();
//                $item['role'] = isset($value['id'])?$value['id']: null;
//                $update = User::find($item->id);
//                $update->role_id = isset($value['id'])?$value['id']: null;
//                $update->save();
////                array_push($v , $item);
//            }
            return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $user,], 200);
        }
    }
}
