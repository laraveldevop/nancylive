<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\False_;

class OrderController extends Controller
{
    public function orderPost(Request $request)
    {
        $userData = json_decode($request->getContent(), true);

        $d =array();
        foreach ($userData as $key => $seat_id) {
            $order = new Order();
            $order->user_id = $seat_id['user_id'];
            $order->product_id = $seat_id['product_id'];
            $order->total = $seat_id['total'];
            $order->transaction_id = $seat_id['transaction_id'];
            $order->status = $seat_id['status'];
            $order->save();
             array_push($d,$order);
        }

//            $data = Order::all();


            return response()->json(['status' => true, 'message' => 'Order Create successfully.', 'data' => $d], 200);


    }
}
