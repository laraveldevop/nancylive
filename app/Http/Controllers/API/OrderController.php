<?php

namespace App\Http\Controllers\API;

use App\History;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\False_;

class OrderController extends Controller
{

    public function index()
    {
        $order =Order::
            Select(DB::raw('order.id,order.user_id,order.product_id,users.name,order.total,order.status,order.created_at'))
            ->leftJoin('users', 'order.user_id', '=', 'users.id')
            ->orderBy('order.id', 'desc')
            ->get();
        foreach ($order as $item){
            $products = DB::table('product')
               ->where('id','=',$item->product_id)
                ->get();
            $item['products']=$products;
            }



        return response()->json(['status' => true, 'message' => 'Order Retrieve successfully.', 'data' => $order], 200);


    }
    public function orderPost(Request $request)
    {
        $userData = json_decode($request->getContent(), true);

        $d =array();

        foreach ($userData as $key => $seat_id) {
            if ($seat_id['payment_status'] == 'true'){
                $order = new Order();
                $order->user_id = $seat_id['user_id'];
                $order->product_id = $seat_id['product_id'];
                $order->total = $seat_id['total'];
                $order->transaction_id = $seat_id['transaction_id'];
                $order->status = $seat_id['status'];
                $order->payment = $seat_id['payment_status'];
                $order->quantity = $seat_id['quantity'];
                $order->save();

                $history = new History();
                $history->order_id = $order->id;
                $history->user_id = $seat_id['user_id'];
                $history->product_id = $seat_id['product_id'];
                $history->total = $seat_id['total'];
                $history->transaction_id = $seat_id['transaction_id'];
                $history->status = $seat_id['status'];
                $history->payment = $seat_id['payment_status'];
                $history->quantity = $seat_id['quantity'];
                $history->save();
                array_push($d,$order);
            }
            elseif ($seat_id['payment_status']== 'false'){
                $history = new History();
                $history->user_id = $seat_id['user_id'];
                $history->product_id = $seat_id['product_id'];
                $history->total = $seat_id['total'];
                $history->transaction_id = $seat_id['transaction_id'];
                $history->status = $seat_id['status'];
                $history->payment = $seat_id['payment_status'];
                $history->quantity = $seat_id['quantity'];
                $history->save();
            }
            else{
                return response()->json(['status' => false, 'message' => 'payment status allow only true or false.', 'data' => $history], 200);

            }

        }

//            $data = Order::all();


            return response()->json(['status' => true, 'message' => 'Order Create successfully.', 'data' => $history], 200);


    }
}
