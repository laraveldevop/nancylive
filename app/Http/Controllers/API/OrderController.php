<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function orderPost(Request $request)
    {
//        $validator = Validator::make($request->all(),[
//            'user_id' => ['required', 'numeric'],
//            'product_id' => ['required', 'numeric'],
//            'total' => ['required', 'numeric'],
//            'transaction_id' => ['required', 'string'],
//            'status' => ['required', 'string'],
//            ]);
//
//        if ($validator->fails())
//        {
//            return response()->json([
//                'status'=> false,
//                'message'=>$validator->errors()->all()], 422);
//        }

        $userData = json_decode($request->getContent(), true);

        foreach ($userData as $key => $seat_id) {
            $order = new Order();
            $order->user_id = $seat_id['user_id'];
            $order->product_id = $seat_id['product_id'];
            $order->total = $seat_id['total'];
            $order->transaction_id = $seat_id['transaction_id'];
            $order->status = $seat_id['status'];
            $order->save();
        }
       $data =  Order::all();

//        Order::insert($json_array);
//        $test['token'] = time();
//        $test['data'] = json_encode($data);

//        $order =new Order();
//        $order->user_id = $request['user_id'];
//        $order->product_id = $request['product_id'];
//        $order->total = $request['total'];
//        $order->transaction_id = $request['transaction_id'];
//        $order->status = $request['status'];
//        $order->save();
        return response()->json(['status' => true, 'message' => 'Order Create successfully.', 'data' => $data], 200);

    }
}
