<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $v=[];
        $user=  User::all();
        foreach($user as $item){
            $value =$item->roles->first();
            $item['role'] = isset($value['name']);
            $item['roles'] =null;
            array_push($v , $item);
        }
        return response()->json(['status' => true, 'message' => 'Data retrieved successfully.', 'data' => $v,], 200);


    }
}
