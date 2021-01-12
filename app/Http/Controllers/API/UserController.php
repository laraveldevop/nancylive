<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $v=[];
        $id= $request->header('USER_ID');
        $user=  User::where('id',$id)->get();
        foreach($user as $item){
            $value =$item->roles->first();
            $item['role'] = isset($value['name'])?$value['name']: null;
            array_push($v , $item);
        }
        return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $v,], 200);


    }
}
